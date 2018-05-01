<?php

class ApiController extends Controller {
	public $PROJECT_NAME = "Mobile API";
	public $MESSAGE_SUCCESS = "success";
	public $MESSAGE_FAIL = "fail";
	public $MESSAGE_ERROR = "error";
	public $MESSAGE_FAIL_EX = "fail_ex";
	public $MESSAGE_ACCESS_DENIED = "access_denied";
	public $MESSAGE_REGISTERED_BEFORE = "registered_before";
	public $MESSAGE_EMAIL_NOT_FOUND = "email_not_found";


	public function actionGetProducts()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$all = Product::model()->findAll();
				$response['message'] = $this->MESSAGE_SUCCESS;
				$response['count'] = count($all);

				$criteria = new CDbCriteria();
				$criteria->limit = $request['end'];
				$criteria->offset = $request['start'];

				$all = Product::model()->findAll($criteria);

				$all_arr = array();
				foreach($all as $item) {
					$arr['id'] = intval($item->id);
					$arr['title'] = $this->stringVal($item->title);

					$all_arr[] = $arr;
				}

				$response['products'] = $all_arr;
				echo json_encode($response);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionGetProductById()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$all = Product::model()->findAll();
				$response['message'] = $this->MESSAGE_SUCCESS;
				$response['count'] = count($all);

				$criteria = new CDbCriteria();
				$criteria->limit = $request['end'];
				$criteria->offset = $request['start'];;

				$all = Product::model()->findAll($criteria);

				$all_arr = array();
				foreach($all as $item) {
					$arr['id'] = intval($item->id);
					$arr['title'] = $this->stringVal($item->title);

					$all_arr[] = $arr;
				}

				$response['products'] = $all_arr;
				echo json_encode($response);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionLogin()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$user = User::model()->findByAttributes(array('email' => $request["email"], 'password' => User::simple_encrypt($request['password'])));

				$arr = $this->fetchUserObject($user);
				$response["message"] = $this->MESSAGE_SUCCESS;
				$response["user"] = $arr;
				echo json_encode($response);
			}
		}
		catch(Exception $ex) {
			echo $ex;
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function fetchUserObject($user)
	{
		if (count($user) == 0) {
			return new stdClass();
		} else {
			$arr = array();
			$arr["id"] = intval($user->id);
			$arr["username"] = $this->stringVal($user->username);
			$arr["email"] = $this->stringVal($user->email);
			$arr["firstName"] = $this->stringVal($user->fname);
			$arr["lastName"] = $this->stringVal($user->lname);
			$arr["photo"] = $this->stringVal($user->image);
			$arr["active"] = intval($user->active);

			return $arr;
		}
	}

	public function actionRegisterDevice()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				if ($this->authUser($request['user']) == true) {
					$device_id = $request['deviceId'];
					$user_id = $request['user']['id'];

					$user_notification_model = UserNotifications::model()->findByAttributes(array('user_id' => $user_id, 'device_id' => $device_id));
					if (count($user_notification_model) > 0) {
						$this->responseWithMessage($this->MESSAGE_REGISTERED_BEFORE);
						return;
					}

					$user_device = new UserNotifications();
					$user_device->user_id = $user_id;
					$user_device->device_id = $device_id;
					$user_device->created_at = date('Y-m-d H:i:s');

					if ($user_device->save()) {
						$this->responseWithMessage($this->MESSAGE_SUCCESS);
					} else {
						$this->responseWithMessage($this->MESSAGE_FAIL);
					}
				}
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionTerms()
	{
		try {
			$response["message"] = $this->MESSAGE_SUCCESS;
			$pages = Pages::model()->findByPk(3);
			if (!empty($pages)) {
				$response["content"] = $pages->details;
			}
			echo json_encode($response);
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionRegister()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				// if the username or email found it returns found and die after that
				$this->checkUserDataFound('username', $request["username"]);
				$this->checkUserDataFound('email', $request["email"]);

				$model = new User;
				$model->username = $request["username"];
				$model->password = $request["password"];
				$model->fname = $request["firstName"];
				$model->lname = $request["lastName"];
				$model->email = $request["email"];

				if ($model->save()) {
					$details = $request["address"];

					$model_details = new UserDetails();
					$model_details->user_id = $model->id;
					$model_details->address = $details["address"];
					$model_details->city = $details["city"];
					$model_details->state = $details["state"];
					$model_details->zipcode = $details["postcode"];
					$model_details->phone_no = $details["phone"];

					if ($model_details->save()) {
						$arr = $this->fetchUserObject($model);
						$response["message"] = $this->MESSAGE_SUCCESS;
						$response["user"] = $arr;
						echo json_encode($response);
					} else {
						$model->delete();
						$this->responseWithMessage($this->MESSAGE_FAIL);
					}
				} else {
					$this->responseWithMessage($this->MESSAGE_FAIL);
				}
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionUpdateProfile()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$user = $request['user'];
				if ($this->authUser($user) == true) {
					// if the username or email found it returns found and die after that
					$this->checkUserDataFound('username', $request["username"], $user['id']);
					$this->checkUserDataFound('email', $request["email"], $user['id']);

					$model = User::model()->findByPk($user['id']);
					$model->username = $request["username"];
					$model->email = $request["email"];
					$model->fname = $request["firstName"];
					$model->lname = $request["lastName"];
					$model->image = $request["photo"];
					$model->password = $request["password"] ;

					if ($model->save(false)) {
						$details = $request["address"];

						$model_details = UserDetails::model()->findByAttributes(array('user_id' => $model->id));
						if (!$model_details) {
							$model_details = new UserDetails();
							$model_details->user_id = $user['id'];
						}
						$model_details->phone_no = $request["phone"];
						$model_details->address = $details["address1"];
						$model_details->address2 = $details["address2"];
						$model_details->city = $details["city"];
						$model_details->country_id = $details["countryId"];
						$model_details->state = $details["state"];
						$model_details->zipcode = $details["postcode"];

						if ($model_details->save(false)) {
							$this->responseWithMessage($this->MESSAGE_SUCCESS);
						} else {
							$this->responseWithMessage($this->MESSAGE_FAIL);
						}
					} else {
						$this->responseWithMessage($this->MESSAGE_FAIL);
					}
				}
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionForgetPassword()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$email = $request['email'];
				$usermodel = User::model()->findByAttributes(array('email' => $email));

				if (count($usermodel) == 0) {
					$this - $this->responseWithMessage($this->MESSAGE_EMAIL_NOT_FOUND);
				} else {
					// create randomkey
					$key = Helper::GenerateRandomKey();
					$usermodel->pass_reset = 1;
					$usermodel->pass_code = $key;
					$usermodel->save(false);
					// send email
					$message = 'Dear customer,
					Please follow this link to reset your password :
					Username:' . $usermodel->username . '
					URL: ' . Yii::app()->params['webSite'] . '/home/reset/hash/' . $usermodel->pass_code . '
					';
					$this->sendEmail(Yii::app()->params['email'], $model->email , $this->PROJECT_NAME . ' Admininstrator', $this->PROJECT_NAME . ' - password reset', $message);
				}
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionContactInfo()
	{
		try {
			$settings = Settings::model()->findByPk(1);
			if (empty($settings)) {
				$this->responseWithMessage($this->MESSAGE_FAIL);
			} else {
				$info['address'] = $settings['adress'];
				$info['city'] = $settings['city'];
				$info['state'] = $settings['state'];
				$info['postcode'] = $settings['post_code'];
				$info['longitude'] = $settings['long'];
				$info['latitude'] = $settings['lat'];
				$info['phone'] = $settings['phone'];

				$response["message"] = $this->MESSAGE_SUCCESS;
				$response['info'] = $info;
				echo json_encode($response);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionContactus()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$this->sendEmail($request['email'], Yii::app()->params['email'], $this->PROJECT_NAME . ' Contactus' , $request['subject'] , $request['message']);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionCountries()
	{
		try {
			$regions = Regions::model()->findAll();
			$all_arr = array();
			foreach ($regions as $region) {
				$arr["id"] = intval($region->id);
				$arr["title"] = $this->stringVal($region->country);

				$all_arr[] = $arr;
			}

			$response["message"] = $this->MESSAGE_SUCCESS;
			$response["countries"] = $all_arr;
			echo json_encode($response);
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionStates()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$criteria = new CDbCriteria();
				$criteria->condition = "region_id = " . $request["countryId"];
				$subregion = Subregions::model()->findAll($criteria);

				$response["message"] = $this->MESSAGE_SUCCESS;
				$all_arr = array();

				foreach ($subregion as $region) {
					$arr["id"] = intval($region->id);
					$arr["title"] = $this->stringVal($region->name);

					$all_arr[] = $arr;
				}

				$response["message"] = $this->MESSAGE_SUCCESS;
				$response["states"] = $all_arr;
				echo json_encode($response);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionCategories()
	{
		try {
			$categories = $this->selectCategories('0');
			$all_arr = array();
			$response["categories"] = $all_arr;

			if (count($categories) > 0) {
				foreach ($categories as $category) {
					$arr = $this->fetchCategories($this->convertCategoryToArray($category));
					$all_arr [] = $arr;
				}
			}

			$response["message"] = $this->MESSAGE_SUCCESS;
			$response["categories"] = $all_arr;
			echo json_encode($response);
		}
		catch(Exception $ex) {
			echo $ex;
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	private function fetchCategories($row)
	{
		$categories = $this->selectCategories($row['id']);
		$sub_arr = array();

		foreach ($categories as $category) {
			$sub = $this->convertCategoryToArray($category);
			// check for parent -> true recursion
			if (count($this->selectCategories($sub['id'])) > 0) {
				$sub = $this->fetchCategories($sub);
			}

			$sub_arr[] = $sub;
		}

		$row['subCategories'] = $sub_arr;
		return $row;
	}

	public function selectCategories($parent_id = '0')
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "parent_id = " . $parent_id;
		$categories = Category::model()->findAll($criteria);
		return $categories;
	}

	private function convertCategoryToArray($category)
	{
		$arr["id"] = intval($category->id);
		$arr["title"] = $this->stringVal($category->title);
		$arr["desc"] = $this->stringVal($category->desc);
		$arr["parentId"] = intval($category->parent_id);

		return $arr;
	}

	public function actionUpload()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				if ($this->authUser($request['user']) == true) {
					$binary = $request['binary'];
					$ext = $request['ext'];
					$type = $request['type'];
					// decode binary data
					$decoded = base64_decode($binary);
					// make the path
					$file_name = md5(uniqid(rand(), 1)) . "." . strtolower($ext);
					$root_dir = explode("protected", Yii::app()->basePath);

					$path = $root_dir[0] . "/media/" . $type;
					// if the folder not found it will make the directory
					if (!file_exists($path)) {
						mkdir($path);
					}

					$upload_path = $path . "/" . $file_name;
					// write data
					$fp = fopen($upload_path, 'wb');
					if (!fwrite($fp, $decoded)) {
						$this->responseWithMessage($this->MESSAGE_FAIL);
						die();
					}
					fclose($fp);
					header('Content-Type: application/json');
					$response["message"] = $this->MESSAGE_SUCCESS;
					$response["file"] = $file_name;
					echo json_encode($response);
				}
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	/**
	 * Default actions and methods
	 */

	public function init()
	{
		Yii::app()->setComponents(array(
		        'errorHandler' => array(
		            'errorAction' => '/api/error'
		            )
		        ));
	}

	public function actionError()
	{
		$this->responseWithMessage($this->MESSAGE_ERROR);
	}

	public function actionIndex()
	{
		$this->actionError();
	}

	public function responseWithMessage($message)
	{
		$response['message'] = $message;
		echo json_encode($response);
	}

	public function parseRequest()
	{
		try {
			if (isset($_POST) && count($_POST) > 0) {
				$request = json_decode($_POST['data'], true);
				if ($request) {
					return $request;
				} else {
					$this->responseWithMessage($this->MESSAGE_ERROR);
				}
			} else {
				$this->responseWithMessage($this->MESSAGE_ERROR);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_ERROR);
			// return false;
		}
		die();
		// return false;
	}

	public function stringVal($val)
	{
		return $val == null ? "" : $val;
	}

	public function authUser($user)
	{
		$model = User::model()->findByAttributes(array('id' => $user['id'], 'email' => $user["email"], 'password' => User::simple_encrypt($user['password'])));
		if (count($model) == 0) {
			$this->responseWithMessage($this->MESSAGE_ACCESS_DENIED);
			return false;
		}
		return true;
	}

	public function checkUserDataFound($key, $value, $id = '')
	{
		$user_model = User::model()->findByAttributes(array($key => $value));
		if ($user_model) {
			if ($id != '') {
				if ($user_model->id != $id) {
					$this->responseWithMessage($key . '_found');
					die();
				}
			} else {
				$this->responseWithMessage($key . '_found');
				die();
			}
		}
	}

	public function sendEmail($from, $to, $from_title, $subject, $message)
	{
		$mail = new YiiMailer();
		$mail->setFrom($from, $from_title);
		$mail->setTo($to);
		$mail->setSubject($subject);
		$mail->setBody($message);
		if ($mail->send()) {
			$this->responseWithMessage($this->MESSAGE_SUCCESS);
		} else {
			$this->responseWithMessage($this->MESSAGE_FAIL);
		}
	}
    
    public function integerVal($val) {
        return $val == null ? 0 : $val;
    }
    
    public function actionGetLeads(){
       // echo"yes";
        $start = $_REQUEST['start'];
        $end = $_REQUEST['end'];
        $return = array();
        $arr = array();
        $result = array();
        //// if no parameters /////
        if($start == '' or $end == ''){
           $return = array('message' => 'error'); 
        }else{
            $leads = Lead::model()->findAll(); 
           
                $count = $start;
                
                $employee = array();
                foreach($leads as $lead){
                    if($count <= $end){
                        $result['id'] = $this->integerVal($lead->id);
                        $result['name'] = $this->stringVal($lead->salutation).'. '.$this->stringVal($lead->first_name).' '.$this->stringVal($lead->last_name);
                        $result['status'] = $this->stringVal($lead->status->title);
                        $result['accountName'] = $this->stringVal($lead->account_name);
                        $result['phone'] = $this->stringVal($lead->mobile);
                        $result['email'] = $this->stringVal($lead->email);
                        $employee['name'] = $this->stringVal($lead->employee->fname).' '.$this->stringVal($lead->employee->lname);
                        $employee['id'] = $this->integerVal($lead->employee_id);
                        $result['ukEmployee'] = $employee; 
                        $arr[]=$result;
                    }
                    $count++;
                }            
                $return = array('message' => 'success', 'count' => count($leads), 'leads' => $arr);

        }
        echo json_encode($return);
    }
 
    public function actionGetLeadsDetails(){
        $id = $_REQUEST['id'];
        $return = array();
        $account = array();
        $contact = array();
        
        //// if no parameters /////
        if($id == ''){
           $return = array('message' => 'error'); 
        }else{
            $lead = Lead::model()->findByPk($id); 
            
            $account['name'] = $this->stringVal(Lead::model()->getApiAccount($id)->title);
            $account['id'] = $this->integerVal(Lead::model()->getApiAccount($id)->id);
            $contact['name'] = $this->stringVal(Lead::model()->getApiContact($id)->salutation).'. '.$this->stringVal(Lead::model()->getApiContact($id)->first_name).' '.$this->stringVal(Lead::model()->getApiContact($id)->last_name);
            $contact['id'] = $this->integerVal(Lead::model()->getApiContact($id)->id);
            $return = array('message' => 'success', 'jobTitle' => $this->stringVal($lead->title), 'country' => $this->stringVal($lead->primary_country), 'city' => $this->stringVal($lead->primary_city),
                'street' => $this->stringVal($lead->primary_street), 'postcode' => $this->stringVal($lead->primary_postcode), 'fax' => $lead->fax, 'twitter' => $this->stringVal($lead->twitter),
                'description' => $this->stringVal($lead->description), 'statusDescription' => $this->stringVal($lead->status_description), 'contact' => $contact, 'account' => $account);                
        }   
        echo json_encode($return);
    }
    
    public function actionEditLead(){
        $lead_id = $_REQUEST['leadId'];
        $desc = $_REQUEST['description'];
        $status_desc = $_REQUEST['stausDescription'];
        $return = array();
        
        if($lead_id == '' or $desc == '' or $status_desc == ''){
            $return = array('message' => 'error');
        }
        else{
                $lead = Lead::model()->findByPk($lead_id);
                $lead->description = $desc;
                $lead->status_description = $status_desc;
                if($lead->save(false)){
                    $return = array('message' => 'success');   
                }else{
                    $return = array('message' => 'fail');    
                }
            }
        echo json_encode($return);
    }
    
    public function actionGetUkEmployeeDetails(){
        $emp_id = $_REQUEST['id'];
        $return = array();
        if($emp_id == ''){
            $return = array('message' => 'error');
        }
        else{
            $employee = User::model()->findByPk($emp_id);
                $return = array('message' => 'success', 'fname' => $this->stringVal($employee->fname), 'lname' => $this->stringVal($employee->lname), 
                    'title' => $this->stringVal($employee->title), 'officePhone' => $this->stringVal($employee->office_phone), 'mobile' => $this->stringVal($employee->mobile), 
                    'fax' => $this->stringVal($employee->fax), 'postCode' => $this->stringVal($employee->postal_code), 'email' => $this->stringVal($employee->email));
                
        }
        echo json_encode($return);
    }
    
    public function actionGetUkContactDetails(){
        $contact_id = $_REQUEST['id'];
        $return = array();
        if($contact_id == ''){
            $return = array('message' => 'error');
        }
        else{
            $contact = Contact::model()->findByPk($contact_id);
            $return = array('message' => 'success', 'Salutation' => $this->stringVal($contact->salutation) , 'fname' => $contact->first_name,
                'lname' => $this->stringVal($contact->last_name), 'department' => $this->stringVal($contact->department) ,'title' => $this->stringVal($contact->title), 'phone' => $this->stringVal($contact->mobile), 
                'fax' => $this->stringVal($contact->fax), 'country' => $this->stringVal($contact->alternate_country), 'city' => $this->stringVal($contact->alternate_city), 
                'postCode' => $this->stringVal($contact->alternate_postcode), 'email' => $this->stringVal($contact->email), 'description' => $this->stringVal($contact->description));
        }
        echo json_encode($return);
    }
    
    public function actionGetUkAccountDetails(){
        $account_id = $_REQUEST['id'];
        $return = array();
        $employee = array();
        if($account_id == ''){
            $return = array('message' => 'error');
        }
        else{
            $account = Account::model()->findByPk($account_id);
            $employee = array('name' => $this->stringVal($account->assignedTo->username), 'id' =>$this->integerVal($account->assignedTo->id) );
            $return = array('message' => 'success', 'name' => $this->stringVal($account->title), 'website' => $this->stringVal($account->website),
                'industry' => $this->stringVal($account->industry->title), 'assignedTo' => $employee,
                'email' => $this->stringVal($account->email), 'phone' => $this->stringVal($account->office_phone), 'billingStreet' => $this->stringVal($account->billing_street), 'billingCity' => $this->stringVal($account->billing_city), 
                'billingPostcode' => $account->billing_postcode, 'billingCountry' => $this->stringVal($account->billing_country), 'fax' => $account->fax, 
                'description' => $this->stringVal($account->description));
        }
        echo json_encode($return);
    }
    
    public function actionGetOpportunities(){
        $start = $_REQUEST['start'];
        $end = $_REQUEST['end'];
        $return = array();
        $arr = array();
        //// if no parameters /////
        if($start == '' or $end == ''){
           $return = array('message' => 'error'); 
        }
        else{ 
            $opportunities = Opportunity::model()->findAll(); 
                $count = $start;
                $result = array();
                $employee = array();
                foreach($opportunities as $opportunity){
                    if($count <= $end){
                        $result['id'] = $this->integerVal($opportunity->id);
                        $result['name'] = $this->stringVal($opportunity->title);
                        $result['accountName'] = $this->stringVal($opportunity->account->title);
                        $result['status'] = $this->stringVal($opportunity->status->title);
                        $result['likely'] = $this->stringVal($opportunity->likely);
                        $result['type'] = $this->stringVal($opportunity->type);
                        $result['leadSource'] = $this->stringVal($opportunity->source->title);
                        $result['nextStep'] = $this->stringVal($opportunity->next_step);
                        $employee['name'] = $this->stringVal($opportunity->employee->fname).' '.$this->stringVal($opportunity->employee->lname);
                        $employee['id'] = $this->integerVal($opportunity->employee_id);
                        $result['ukEmployee'] = $employee; 
                        $arr[]=$result;
                    }
                    $count++;
                }            
                $return = array('message' => 'success', 'count' => count($opportunities), 'opportuinities' => $arr);
        }
        echo json_encode($return);
    }
    
    public function actionGetOpportuinitiesDetails(){
        $id = $_REQUEST['id'];
        $return = array();
     
        //// if no parameters /////
        if($id == ''){
           $return = array('message' => 'error'); 
        }else{
            $opportunity = Opportunity::model()->findByPk($id); 
            $return = array('message' => 'success', 'description' => $this->stringVal($opportunity->description), 
                'likely' => $this->stringVal($opportunity->likely), 'worst' => $this->stringVal($opportunity->worst), 'best' => $this->stringVal($opportunity->best),
                'closeDate' => $this->stringVal($opportunity->expected_close_date));
        }   
        echo json_encode($return);
    }
}
?>
