<?php

class AuthItemEditAction extends CModelEditAction {
	
	public $ajaxId = 'authItem-form';
	public $view = '/authItem/edit';
	public $successedUrl = 'Yii::app()->controller->createUrl("update", array("id"=>$model->name))';
	
	public function getModelClass() {
		return 'AuthItemForm';
	}
	
	protected function doSave($model) {
		if($this->modelId) {
			$authItem = $this->model2authItem($model);
			$this->getController()->getAuthManager()->saveAuthItem($authItem, $this->modelId);
			return true;
		} else {
			return $this->getController()->getAuthManager()->createAuthItem(
				$model->name, $model->type, $model->description,
				$model->bizRule, $model->data
			);
		}
	}
	
	protected function authItem2model($authItem) {
		$class = $this->getModelClass();
		$model = new $class;
		foreach($model->attributeNames() as $name)
			$model->$name = $authItem->$name;
		return $model;
	}
	
	protected function model2authItem($model) {
		$authItem = new CAuthItem(
			$this->getController()->getAuthManager(), 
			$model->name, 
			$model->type,
			$model->description,
			$model->bizRule,
			$model->data
		);
		return $authItem;
	}
	
	protected function loadModel($id=null,$s=null) {
		$model = null;
		if($id) {
			$authItem = $this->getController()->getAuthManager()->getAuthItem($id);
			$model = $this->authItem2model($authItem);
		} else {
			$class = $this->getModelClass();
			$model = new $class;
		}
		return $model;
	}

}

?>