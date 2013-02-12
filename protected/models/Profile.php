<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $nickName
 * @property string $email
 * @property string $dateBirth
 * @property string $city
 * @property string $phoneNumber
 * @property string $gender
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property User[] $users
 */
class Profile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profile the static model class
	 */
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstName, lastName, nickName, email, dateBirth, phoneNumber, gender', 'required'),
			array('firstName, lastName, nickName, city', 'length', 'max'=>80),
			array('email', 'length', 'max'=>50),
			array('email', 'email', 'checkMX'=>true),
			array('phoneNumber', 'length', 'max'=>15),
			array('gender', 'length', 'max'=>1),
			array('modified', 'safe'),
			array('created','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>true,'on'=>'insert'),
			array('created','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
			array('created','default','value'=>new CDbExpression('created'),'setOnEmpty'=>false,'on'=>'update'),
			array('created','default','value'=>new CDbExpression('created'),'setOnEmpty'=>true,'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, firstName, lastName, nickName, email, dateBirth, city, phoneNumber, gender, created, modified', 'safe', 'on'=>'search'),
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
			'User' => array(self::HAS_ONE, 'User', 'idProfile'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'nickName' => 'Nick Name',
			'email' => 'Email',
			'dateBirth' => 'Date Birth',
			'city' => 'City',
			'phoneNumber' => 'Phone Number',
			'gender' => 'Gender',
			'created' => 'Created',
			'modified' => 'Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('nickName',$this->nickName,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('dateBirth',$this->dateBirth,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('phoneNumber',$this->phoneNumber,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function beforeSave()
	{
		
			$this->dateBirth = new CDbExpression("str_to_date('{$this->dateBirth}', '%d %M %Y')");
		
		return parent::beforeSave();
	}
}