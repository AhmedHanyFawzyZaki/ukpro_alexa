<?php

/**
 * This is the model class for table "blog".
 *
 * The followings are the available columns in table 'blog':
 * @property integer $id
 * @property string $title
 * @property integer $user_id
 * @property string $post
 * @property string $image
 * @property integer $publish
 * @property integer $top_listed
 * @property string $create_date
 * @property string $slug
 * @property integer $sort
 */
class Blog extends SortableCActiveRecord
{
    public $orderField = 'sort';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{blog}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('title', 'unique'),
                array('title, post', 'required'),
                array('user_id, publish, sort, cat_id', 'numerical', 'integerOnly'=>true),
                array('title, image, slug', 'length', 'max'=>255),
                array('post, create_date', 'safe'),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('id, title, user_id, post, image, publish, top_listed, create_date, cat_id,slug, sort', 'safe', 'on'=>'search'),
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
                'cat' => array(self::BELONGS_TO, 'BlogCategory', 'cat_id'),
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
                'user_id' => 'User',
                'post' => 'Post',
                'image' => 'Image',
                'publish' => 'Publish',
                'top_listed' => 'Top Listed',
                'create_date' => 'Create Date',
                'slug' => 'Slug',
                'sort' => 'Sort',
                'cat_id' => 'Category',
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
            $criteria->compare('user_id',$this->user_id);
            $criteria->compare('post',$this->post,true);
            $criteria->compare('image',$this->image,true);
            $criteria->compare('publish',$this->publish);
            $criteria->compare('create_date',$this->create_date,true);
            $criteria->compare('slug',$this->slug,true);
            $criteria->compare('sort',$this->sort);
            $criteria->compare('cat_id',$this->cat_id);

            return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
            ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Blog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function beforeSave(){
            
            $this->slug = Helper::slugify($this->title);
            return true;
        }
}
