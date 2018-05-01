<?php

/**
 * This is the model class for table "features".
 *
 * The followings are the available columns in table 'features':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $home_image
 * @property string $color
 * @property integer $sort
 */

class Features extends SortableCActiveRecord
{
    public $orderField = 'sort';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{features}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('title, home_image, inner_image, color', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, home_image, color, sort', 'safe', 'on'=>'search'),
                     array('home_image', 'file', 'types' => 'jpg, gif, png,jpeg', 'allowEmpty' => 'true'), 
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
			'title' => 'Title',
			'description' => 'Description',
			'image' => 'Image',
			'color' => 'Color',
			'sort' => 'Sort',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('home_image',$this->home_image,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Features the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}   
         
public  static function getClass($color)
    {
        switch ($color) {
            case "yellow":
                echo "feat1" ;
               break;
           
            case "red":
            echo  "feat2" ;
            break;
         case "green":
                echo "feat3" ;
               break;
           
            case "violet":
            echo  "feat4" ;
            break;
         case "orange":
                echo "feat5" ;
               break;
         case "orange":
                echo "feat5" ;
               break;
            default:
                break;
        }  
    }
    
}
