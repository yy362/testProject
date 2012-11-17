<?php

class CURDController extends Controller {
	
	public function actions() {
		return array_merge(parent::actions(), array(
			'create' => array(
				'class' => 'CModelEditAction',
				'modelClass' => $this->modelClass,
			),
			'update' => array(
				'class' => 'CModelEditAction',
				'modelClass' => $this->modelClass,
			),
			'view' => array(
				'class' => 'CModelViewAction',
				'modelClass' => $this->modelClass,
			),
			'admin' => array(
				'class' => 'CModelAdminAction',
				'modelClass' => $this->modelClass,
			),
			'delete' => array(
				'class' => 'CModelDeleteAction',
				'modelClass' => $this->modelClass,
			),
		));
	}
	
}

?>