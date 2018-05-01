<?php

/**
 * This is the model class for table "contact".
 *
 * The followings are the available columns in table 'contact':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $image
 * @property string $salutation
 * @property string $title
 * @property string $mobile
 * @property integer $call
 * @property string $department
 * @property integer $account_id
 * @property string $primary_street
 * @property string $primary_city
 * @property string $primary_state
 * @property string $primary_postcode
 * @property string $primary_country
 * @property string $alternate_street
 * @property string $alternate_city
 * @property string $alternate_state
 * @property string $alternate_postcode
 * @property string $alternate_country
 * @property string $office_phone
 * @property string $fax
 * @property string $description
 * @property integer $reports_to
 * @property integer $sync_to_outlook
 * @property integer $source_id
 * @property integer $campaign_id
 * @property integer $language_id
 * @property integer $assigned_to
 * @property string $date_created
 * @property string $date_modified
 * @property integer $company_id
 * @property integer $employee_id
 */
class Contact extends CActiveRecord {

    public $search_key;
    public $search_value;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Contact the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{contact}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('call, account_id, reports_to, sync_to_outlook, source_id, campaign_id, language_id, assigned_to, company_id, employee_id', 'numerical', 'integerOnly' => true),
            array('first_name, last_name, image, salutation, title, mobile, department, primary_street, primary_city, primary_state, primary_postcode, primary_country, alternate_street, alternate_city, alternate_state, alternate_postcode, alternate_country, office_phone, fax, date_created, date_modified', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, first_name, last_name, image, salutation, title, mobile, call, department, account_id, primary_street, primary_city, primary_state, primary_postcode, primary_country, alternate_street, alternate_city, alternate_state, alternate_postcode, alternate_country, office_phone, fax, description, reports_to, sync_to_outlook, source_id, campaign_id, language_id, assigned_to, date_created, date_modified, company_id, employee_id, search_key, search_value', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array('search_value' => 'Filter',
            'id' => Yii::t('translate', 'ID'),
            'first_name' => Yii::t('translate', 'First Name'),
            'last_name' => Yii::t('translate', 'Last Name'),
            'image' => Yii::t('translate', 'Image'),
            'salutation' => Yii::t('translate', 'Salutation'),
            'title' => Yii::t('translate', 'Title'),
            'mobile' => Yii::t('translate', 'Mobile'),
            'call' => Yii::t('translate', 'Call'),
            'department' => Yii::t('translate', 'Department'),
            'account_id' => Yii::t('translate', 'Account'),
            'primary_street' => Yii::t('translate', 'Primary Street'),
            'primary_city' => Yii::t('translate', 'Primary City'),
            'primary_state' => Yii::t('translate', 'Primary State'),
            'primary_postcode' => Yii::t('translate', 'Primary Postcode'),
            'primary_country' => Yii::t('translate', 'Primary Country'),
            'alternate_street' => Yii::t('translate', 'Alternate Street'),
            'alternate_city' => Yii::t('translate', 'Alternate City'),
            'alternate_state' => Yii::t('translate', 'Alternate State'),
            'alternate_postcode' => Yii::t('translate', 'Alternate Postcode'),
            'alternate_country' => Yii::t('translate', 'Alternate Country'),
            'office_phone' => Yii::t('translate', 'Office Phone'),
            'fax' => Yii::t('translate', 'Fax'),
            'description' => Yii::t('translate', 'Description'),
            'reports_to' => Yii::t('translate', 'Reports To'),
            'sync_to_outlook' => Yii::t('translate', 'Sync To Outlook'),
            'source_id' => Yii::t('translate', 'Source'),
            'campaign_id' => Yii::t('translate', 'Campaign'),
            'language_id' => Yii::t('translate', 'Language'),
            'assigned_to' => Yii::t('translate', 'Assigned To'),
            'date_created' => Yii::t('translate', 'Date Created'),
            'date_modified' => Yii::t('translate', 'Date Modified'),
            'company_id' => Yii::t('translate', 'Company'),
            'employee_id' => Yii::t('translate', 'Employee'),
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
        if ($this->search_key == 'all' && isset($this->search_value)) {
            $criteria->compare('id', $this->search_value, true, 'OR');
            $criteria->compare('first_name', $this->search_value, true, 'OR');
            $criteria->compare('last_name', $this->search_value, true, 'OR');
            $criteria->compare('image', $this->search_value, true, 'OR');
            $criteria->compare('salutation', $this->search_value, true, 'OR');
            $criteria->compare('title', $this->search_value, true, 'OR');
            $criteria->compare('mobile', $this->search_value, true, 'OR');
            $criteria->compare('call', $this->search_value, true, 'OR');
            $criteria->compare('department', $this->search_value, true, 'OR');
            $criteria->compare('account_id', $this->search_value, true, 'OR');
            $criteria->compare('primary_street', $this->search_value, true, 'OR');
            $criteria->compare('primary_city', $this->search_value, true, 'OR');
            $criteria->compare('primary_state', $this->search_value, true, 'OR');
            $criteria->compare('primary_postcode', $this->search_value, true, 'OR');
            $criteria->compare('primary_country', $this->search_value, true, 'OR');
            $criteria->compare('alternate_street', $this->search_value, true, 'OR');
            $criteria->compare('alternate_city', $this->search_value, true, 'OR');
            $criteria->compare('alternate_state', $this->search_value, true, 'OR');
            $criteria->compare('alternate_postcode', $this->search_value, true, 'OR');
            $criteria->compare('alternate_country', $this->search_value, true, 'OR');
            $criteria->compare('office_phone', $this->search_value, true, 'OR');
            $criteria->compare('fax', $this->search_value, true, 'OR');
            $criteria->compare('description', $this->search_value, true, 'OR');
            $criteria->compare('reports_to', $this->search_value, true, 'OR');
            $criteria->compare('sync_to_outlook', $this->search_value, true, 'OR');
            $criteria->compare('source_id', $this->search_value, true, 'OR');
            $criteria->compare('campaign_id', $this->search_value, true, 'OR');
            $criteria->compare('language_id', $this->search_value, true, 'OR');
            $criteria->compare('assigned_to', $this->search_value, true, 'OR');
            $criteria->compare('date_created', $this->search_value, true, 'OR');
            $criteria->compare('date_modified', $this->search_value, true, 'OR');
            $criteria->compare('company_id', $this->search_value, true, 'OR');
            $criteria->compare('employee_id', $this->search_value, true, 'OR');
        } elseif (isset($this->search_value) && $this->search_key != 'all') {
            $criteria->compare($this->search_key, $this->search_value, true);
        } else {
            $criteria->compare('id', $this->id);
            $criteria->compare('first_name', $this->first_name, true);
            $criteria->compare('last_name', $this->last_name, true);
            $criteria->compare('image', $this->image, true);
            $criteria->compare('salutation', $this->salutation, true);
            $criteria->compare('title', $this->title, true);
            $criteria->compare('mobile', $this->mobile, true);
            $criteria->compare('call', $this->call);
            $criteria->compare('department', $this->department, true);
            $criteria->compare('account_id', $this->account_id);
            $criteria->compare('primary_street', $this->primary_street, true);
            $criteria->compare('primary_city', $this->primary_city, true);
            $criteria->compare('primary_state', $this->primary_state, true);
            $criteria->compare('primary_postcode', $this->primary_postcode, true);
            $criteria->compare('primary_country', $this->primary_country, true);
            $criteria->compare('alternate_street', $this->alternate_street, true);
            $criteria->compare('alternate_city', $this->alternate_city, true);
            $criteria->compare('alternate_state', $this->alternate_state, true);
            $criteria->compare('alternate_postcode', $this->alternate_postcode, true);
            $criteria->compare('alternate_country', $this->alternate_country, true);
            $criteria->compare('office_phone', $this->office_phone, true);
            $criteria->compare('fax', $this->fax, true);
            $criteria->compare('description', $this->description, true);
            $criteria->compare('reports_to', $this->reports_to);
            $criteria->compare('sync_to_outlook', $this->sync_to_outlook);
            $criteria->compare('source_id', $this->source_id);
            $criteria->compare('campaign_id', $this->campaign_id);
            $criteria->compare('language_id', $this->language_id);
            $criteria->compare('assigned_to', $this->assigned_to);
            $criteria->compare('date_created', $this->date_created, true);
            $criteria->compare('date_modified', $this->date_modified, true);
            $criteria->compare('company_id', $this->company_id);
            $criteria->compare('employee_id', $this->employee_id);
        }


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}