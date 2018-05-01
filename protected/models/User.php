<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $fname
 * @property string $lname
 * @property string $image
 * @property string $details
 * @property integer $group
 * @property integer $active
 * @property integer $user_credit
 * @property string $last_login
 *
 * The followings are the available model relations:
 * @property UserDetails $userDetails
 */
class User extends SortableCActiveRecord {

    public $orderField = 'sort';
    public $password_repeat;
    public $verifyCode;
    public $newpassword;
    public $oldpassword;
    public $newpassword_repeat;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username,email', 'unique'),
            array('email', 'email'),
            array('subscribed_package_renewal_date, subscribed_package_id, subscribe_status, subscription_token, paypal_profile_id', 'safe'),
            array('username', 'length', 'max' => 50),
            array('email, fname, lname, image, pass_code, active_code, last_login', 'length', 'max' => 255),
            array('password', 'length', 'max' => 250),
            array('newpassword', 'compare', 'compareAttribute' => 'newpassword_repeat', 'on' => 'update'),
            array('details,groups_id,password_repeat,newpassword,newpassword_repeat,active, oldpassword, pass_reset, points, sort', 'safe'),
            array('email,username,fname,lname', 'required', 'on' => 'create ,update'),
            array('details', 'safe', 'on' => 'create'),
            // The following rule is used by search().
            array('username, email, password, fname, lname, image, details, groups_id, active, last_login', 'safe', 'on' => 'search'),
           // array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'register'),
            // when edit pass only
            //array('password,password_repeat', 'required', 'on' => 'changepass'),
            //array('password', 'compare', 'compareAttribute' => 'password_repeat', 'on' => 'changepass'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'usergroup' => array(self::BELONGS_TO, 'Groups', 'groups_id'),
            'subscribedPackage' => array(self::BELONGS_TO, 'SubscribePackage', 'subscribed_package_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'fname' => 'First name',
            'lname' => 'Last name',
            'image' => 'Image',
            'details' => 'Details',
            'groups_id' => 'Account Type',
            'active' => 'User Active',
            'password_repeat' => 'Repeat password',
            'verifyCode' => 'Verification Code',
            'subscribed_package_id'=>'Subscribed Package',
            'subscribed_package_renewal_date'=>'Subscribed Package Renewal Date',
            'subscribe_status'=>'Subscribe Status',
            'subscription_token'=>'Subscription Token',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('fname', $this->fname, true);
        $criteria->compare('lname', $this->lname, true);
        $criteria->compare('details', $this->details, true);
        $criteria->compare('groups_id', $this->groups_id, true);
        $criteria->compare('active', $this->active);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave() {
        if ($this->isNewRecord){
            //$this->created = new CDbExpression('NOW()'); // add action
            $this->password = User::hash($this->password);
        }
        
     return parent::beforeSave(); 
    }

    // Authentication methods
    public static function hash($value) {
        return User::simple_encrypt($value);
    }

    public static function simple_encrypt($text, $salt = "supertestpass123") {
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }

    public static function simple_decrypt($text, $salt = "supertestpass123") {
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }

    public function check($value) {
        $new_hash = User::simple_encrypt($value);
        if ($new_hash == $this->password) {
            return true;
        }
        return false;
    }

    public static function getProfileType() {
        if (Yii::app()->user->group == 1) {
            return 'member';
        } else if (Yii::app()->user->group == 2) {
            return '2';
        } else if (Yii::app()->user->group == 3) {
            return '3';
        } else if (Yii::app()->user->group == 4) {
            return '4';
        } else if (Yii::app()->user->group == 6) {
            return 'dashboard';
        } else {
            return '#';
        }
    }

    public static function CheckAdmin() {
        if (( Yii::app()->user->isGuest)) {
            return false;
        } else if (Yii::app()->user->group == 1) {
            return true;
        } else if (Yii::app()->user->group == 2) {
            return true;
        } else {
            return false;
        }
    }

    public static function CheckPermission($type) {
        if (( Yii::app()->user->isGuest)) {
            return false;
        }

        switch ($type) {
            case 'superadmin':
                if (Yii::app()->user->group == 1)
                    return true;
                break;
            case 'admin':
                if (Yii::app()->user->group == 2)
                    return true;
                break;
            case 'member':
                if (Yii::app()->user->group == 3)
                    return true;
                break;
            default:
                return false;
        } // switch
    }
    
    public static function IsSuscribedUser($id){
        $criteria = new CDbCriteria;
        $criteria->condition = 'TIMEDIFF(subscribed_package_renewal_date, \''.date('Y-m-d H:i:s').'\') > 0 and subscribe_status="3" and id='.$id;
        $user = User::model()->findAll($criteria);
        if(!empty($user))
        {
                return true;
        }
        else
        {
                return false;
        }
    }
    
    public static function CanCreateWebsite(){
        $user=  User::model()->findByPk(Yii::app()->user->id);
        //get number of websites
        $websites=Website::model()->findAllByAttributes(array('user_id'=>$user->id));
        // subscribed user or not?
        if($user->paypal_profile_id!='' && $user->subscribe_status==3 && $user->subscribed_package_id!='' && $user->subscription_token != '' && (strtotime($user->subscribed_package_renewal_date)>time())){
            if(count($websites) < $user->subscribedPackage->num_of_sites){
                return true;
            }
        }else{
            if(count($websites) < Settings::model()->findByPk(1)->default_site_num){
                return true;
            }
        }
        return false;
    }

}
