<?php

/**
 * This is the model class for table "authitemchild".
 *
 * The followings are the available columns in table 'authitemchild':
 * @property string $parent
 * @property string $child
 */
class AuthItemChildForm extends CFormModel
{
	public $parent;
	public $children = array();
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('parent, children', 'required'),
			array('parent', 'length', 'max'=>64),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'parent' => 'Parent',
			'children' => 'Children',
		);
	}

}