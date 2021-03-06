<?php

/**
 * This is the model class for table "bk_course".
 *
 * The followings are the available columns in table 'bk_course':
 * @property integer $id
 * @property string $name
 * @property integer $faculty_id
 *
 * The followings are the available model relations:
 * @property Faculty $faculty
 * @property Note[] $notes
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'bk_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(); // no user input for this model
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'faculty' => array(self::BELONGS_TO, 'Faculty', 'faculty_id'),
			'notes' => array(self::HAS_MANY, 'Note', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nama',
			'faculty_id' => 'Fakultas',
		);
	}
}