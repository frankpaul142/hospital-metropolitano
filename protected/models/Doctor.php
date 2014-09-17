<?php

/**
 * This is the model class for table "doctor".
 *
 * The followings are the available columns in table 'doctor':
 * @property integer $id
 * @property integer $speciality_id
 * @property string $name
 * @property string $lastname
 * @property string $picture
 * @property string $gender
 * @property string $site
 * @property string $phone
 * @property string $cellphone
 * @property string $address
 * @property string $user_hinari
 * @property string $pass_hinari
 * @property string $email
 * @property string $fellowship
 * @property string $interests
 * @property string $title
 * @property string $specialism
 *
 * The followings are the available model relations:
 * @property Speciality $speciality
 */
class Doctor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'doctor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, lastname, gender, title, specialism', 'required'),
			array('speciality_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>250),
			array('lastname, picture, address, email', 'length', 'max'=>150),
			array('gender', 'length', 'max'=>1),
			array('site, user_hinari, pass_hinari', 'length', 'max'=>255),
			array('phone, cellphone', 'length', 'max'=>10),
			array('fellowship, interests', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, speciality_id, name, lastname, picture, gender, site, phone, cellphone, address, user_hinari, pass_hinari, email, fellowship, interests, title, specialism', 'safe', 'on'=>'search'),
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
			'speciality' => array(self::BELONGS_TO, 'Speciality', 'speciality_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'speciality_id' => 'Speciality',
			'name' => 'Name',
			'lastname' => 'Lastname',
			'picture' => 'Picture',
			'gender' => 'Gender',
			'site' => 'Site',
			'phone' => 'Phone',
			'cellphone' => 'Cellphone',
			'address' => 'Address',
			'user_hinari' => 'User Hinari',
			'pass_hinari' => 'Pass Hinari',
			'email' => 'Email',
			'fellowship' => 'Fellowship',
			'interests' => 'Interests',
			'title' => 'Title',
			'specialism' => 'Specialism',
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
		$criteria->compare('speciality_id',$this->speciality_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('cellphone',$this->cellphone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('user_hinari',$this->user_hinari,true);
		$criteria->compare('pass_hinari',$this->pass_hinari,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('fellowship',$this->fellowship,true);
		$criteria->compare('interests',$this->interests,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('specialism',$this->specialism,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Doctor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
