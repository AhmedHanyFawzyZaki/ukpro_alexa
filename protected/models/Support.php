<?php

/**
 * This is the model class for table "support".
 *
 * The followings are the available columns in table 'support':
 * @property integer $id
 * @property string $subject
 * @property string $content
 * @property string $email
 * @property string $attachment
 * @property integer $sort
 */
class Support extends SortableCActiveRecord
{
    public $orderField = 'sort';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{support}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('subject, content, email', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('subject, email', 'length', 'max'=>255),
			array('content, attachment', 'safe'),
                        array('attachment', 'file', 'types' => 'jpg, gif, png, pdf, doc, docx, odt, txt, xlsx, xls, csv, zip, rar', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject, content, email, attachment, sort', 'safe', 'on'=>'search'),
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
			'subject' => 'Subject',
			'content' => 'Content',
			'email' => 'Email',
			'attachment' => 'Attachment',
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
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('attachment',$this->attachment,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Support the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
