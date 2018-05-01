<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property integer $id
 * @property string $facebook
 * @property string $twitter
 * @property string $email
 * @property string $support_email
 * @property string $paypal_email
 * @property string $api_username
 * @property string $api_password
 * @property string $signature
 * @property string $address
 * @property integer $paypal_live
 * @property integer $auto_surfing_points
 * @property string $business_hours
 * @property 
 */
class Settings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{settings}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('paypal_live, slider_min_points, slider_max_points', 'numerical', 'integerOnly'=>true),
			array('facebook, twitter, google, youtube, email, support_email, paypal_email, api_username, api_password, signature, address, business_hours, logo, default_site_num, how_work_video, alexa_ranking, alexa_features, alexa_take_tour', 'length', 'max'=>255),
                        array('auto_surfing_points, cost_of_5k_points, referral_points, surfing_period, user_intial_points', 'safe'),
			array('how_work_video', 'url', 'defaultScheme' => 'http'),
                        // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, facebook, google, twitter, pinterest, email, press_email, support_email, blog_email, paypal_email, temp1, temp2, temp3, temp4, api_username, api_password, signature, paypal_fee, paypalextra_fee, site_commession, phone, mobile, fax, address', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'email' => 'Email',
			'support_email' => 'Support Email',
			'paypal_email' => 'Paypal Email',
			'api_username' => 'PayPal Username',
			'api_password' => 'PayPal Password',
			'signature' => 'PayPal Signature',
			'address' => 'Address',
                        'how_work_video' => 'How To Work Video URL',
			'paypal_live' => 'PayPal Live',
                        'slider_min_points'=>'Slider Min Points',
                        'slider_max_points'=>'Slider Max Points',
                        'default_site_num'=>'Default Sites Num.',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('support_email',$this->support_email,true);
		$criteria->compare('paypal_email',$this->paypal_email,true);
		$criteria->compare('api_username',$this->api_username,true);
		$criteria->compare('api_password',$this->api_password,true);
		$criteria->compare('signature',$this->signature,true);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Settings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
