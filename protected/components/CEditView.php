<?php

class CEditView extends CWidget {
	
	public $model;
	
	protected function getRelationByFk($model, $fkName) {
		foreach($model->getMetaData()->relations as $relation) {
			if($relation->foreignKey == $fkName)
				return $relation;
		}
		return null;
	}
	
	protected function createElements($model, $parent = null, $path = null) {
		
		$config = array();
		if($path) {
			$config['class'] = 'TbFieldset';
			$config['legend'] = $path;
		}
		if(!$parent)
			$parent = $model;
		
		foreach($model->getMetaData()->columns as $name=>$column) {
			$attributePath = $path?$path.'.'.$name:$name;
			if($column->isPrimaryKey || $column->isForeignKey) continue;
			$relation = $this->getRelationByFk($parent, $name);
			if($relation) continue;
			
			if($column->type == 'string' && ($column->size === null || $column->size == 255)) {
				$type = 'textarea';
			} else {
				if(preg_match('/password/', $name))
					$type = 'password';
				else
					$type = 'text';
			}
			
			$config['elements'][] = array($attributePath, $type);
		}
		
		foreach($model->getMetaData()->relations as $name=>$relation) {
			if($relation instanceof CHasOneRelation) {
				$path = $path?$path.'.'.$name:$name;
				$config['elements'][$name] = $this->createElements(new $relation->className, $model, $path);
			}
		}
		
		return $config;
	}
	
	protected function formatCode($code) {
		$code = trim($code);
		$code = preg_replace(array(
			'/  /', '/\d+\s=>\s*/m',  '/\s=>\s\n\s*/', 
		), array(
			"\t", '', ' => ',
		), $code);
		return $code;
	}
	
	public function run() {
		$config = $this->createElements($this->model);
		$config['buttons'] = array(
			'submit' => array('type' => 'submit'),
			'reset' => array('type' => 'reset'),
		);
		$config['activeForm'] = array(
			'class' => 'TbActiveForm',
			'type' => TbActiveForm::TYPE_HORIZONTAL,
			'enableAjaxValidation' => true,
			'id' => 'User-form',
		);
		$code = $this->formatCode(var_export($config, true));
		$form = new TbForm($config, $this->model);
		echo $form->render();
	}

}

?>