<?php

class RightsModule extends CWebModule
{
	private $_assetsUrl = null;
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'rights.models.*',
			'rights.components.*',
		));
	}
	
	public function getAssetsUrl()
	{
		if($this->_assetsUrl===null)
			$this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('rights.assets'), false, -1, true);
		return $this->_assetsUrl;
	}
	
	public function getSubMenuItems()
	{
		static $items = array(
			array('label'=>'Assignment', 'url'=>array('/rights/assignment')),
			array('label'=>'Operation', 'url'=>array('/rights/operation')),
			array('label'=>'Role', 'url'=>array('/rights/role')),
			array('label'=>'Task', 'url'=>array('/rights/task')),
			array('label'=>'Tools', 'url'=>array('/rights/tools')),
		);
		$controllerId = Yii::app()->controller->id;
		$route = '/rights/'.$controllerId;
		foreach($items as &$item) {
			if($item['url'][0] == $route) {
				$item['active'] = true;
				break;
			}
		}
		return $items;
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
