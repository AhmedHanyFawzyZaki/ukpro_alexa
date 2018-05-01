<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property integer $user_id
 * @property integer $package_id
 * @property string $token
 * @property string $price
 * @property string $order_date
 * @property string $points
 * @property integer $status_id
 * @property integer $sort
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Package $package
 * @property OrderStatus $status
 */
class Order extends SortableCActiveRecord
{
    public $orderField = 'sort';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
            return '{{order}}';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    array('user_id, package_id, status_id, sort', 'numerical', 'integerOnly'=>true),
                    array('token, order_date, payer_id', 'length', 'max'=>255),
                    array('price, points', 'length', 'max'=>10),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, package_id, token, price, order_date, points, status_id, sort', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'package' => array(self::BELONGS_TO, 'Package', 'package_id'),
			'status' => array(self::BELONGS_TO, 'OrderStatus', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'package_id' => 'Package',
			'token' => 'Token',
			'price' => 'Price',
			'order_date' => 'Order Date',
			'points' => 'Points',
			'status_id' => 'Status',
			'sort' => 'Sort',
                        'payer_id'=>'Payer ID',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('package_id',$this->package_id);
		$criteria->compare('token',$this->token,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('order_date',$this->order_date,true);
		$criteria->compare('points',$this->points,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('sort',$this->sort);
                $criteria->compare('payer_id',$this->payer_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
            return parent::model($className);
	}
}
