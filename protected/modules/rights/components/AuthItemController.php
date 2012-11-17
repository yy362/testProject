<?php

abstract class AuthItemController extends RightsController {
	
	public $defaultAction = 'admin';
	
	public function actions() {
		$editConfig = array(
			'class' => 'AuthItemEditAction',
			'defaults' => array(
				'type' => $this->getType(),
			),
		);
		return array(
			'create' => $editConfig,
			'update' => $editConfig,
		);
	}
	
	public function actionDeleteChild($parent, $child) {
		$this->authManager->removeItemChild($parent, $child);
	}
	
	public function actionGetItemChildren($name, $layer, $path) {
		$items = $this->authManager->getItemChildren($name);
		$this->renderPartial('/authItem/_authItem', array(
			'items' => $items,
			'layer' => $layer+1,
			'path' => $path,
		));
	}
	
	public function actionAddChilds() {
		$model = new AuthitemChildForm();
		if(isset($_POST['AuthItemChildForm'])) {
			$model->attributes = $_POST['AuthItemChildForm'];
			if($model->validate()) {
				foreach($model->children as $child) {
					$this->authManager->addItemChild($model->parent, $child);
				}
			}
		}
		$this->redirect($this->createUrl('update', array('id'=>$model->parent)));
	}
	
	public function getAuthItemTypes() {
		return array(
			CAuthItem::TYPE_OPERATION => 'Operation',
			CAuthItem::TYPE_ROLE => 'Role',
			CAuthItem::TYPE_TASK => 'Task',
		);
	}
	
	
	public function actionAjaxChildAdmin() {
		$items = $this->authManager->getRootItems($this->getType());
		$this->renderPartial('/authItem/admin', array(
			'rootItems' => $items,
		));
	}
	
	abstract public function getType();
	
	public function actionAdmin() {
		$items = $this->authManager->getRootItems($this->getType());
		$this->render('/authItem/admin', array(
			'rootItems' => $items,
		));
	}
	
}

?>