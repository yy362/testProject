<?php

class ImportController extends RightsController {
	
	public function actionIndex() {
		
		$app = Yii::app();
		$nodes = $this->getNodes($app);
		$this->createAuthItem($nodes);
		$this->render('index');
		
	}
	
	
	public function createAuthItem($nodes, $root = '') {
		$auth = $this->authManager;
		foreach($nodes as $k=>$v) {
			$node = is_array($v)?$k:$v;
			$path = $root?$root.'.'.$node:$node;
			$auth->createOperation($path);
			if($root)
				$auth->addItemChild($root, $path);
			if(is_array($v))
				$this->createAuthItem($v, $path);
		}
		
	}
	
	public function getNodes($parent) {
		$nodes = array();
		$nodes = $this->getControllers($parent->controllerPath);
		foreach($parent->modules as $subModule=>$config)
			$nodes[$subModule] = $this->getNodes($parent->getModule($subModule));
		return $nodes;
	}
	
	public function getControllers($path) {
		$files = CFileHelper::findFiles($path, array(
			'fileTypes' => array('php'),
		));
		$c = array();
		foreach($files as $file) {
			$pi = pathinfo($file);
			if(preg_match('/^([A-Z]\w*)Controller$/', $pi['filename'], $matches))
				$c[lcfirst($matches[1])] = $this->getActions($pi['filename'], $file);
		}
		return $c;
	}
	
	public function getActions($name, $path) {
		include_once $path;
		$rc = new ReflectionClass($name);
		$actions = array();
		foreach($rc->getMethods() as $rm) {
			if($rm->isPublic() && preg_match('/^action([A-Z]\w*)$/', $rm->getName(), $matches))
				$actions[] = lcfirst($matches[1]);
			if($rm->getName() == 'actions') {
				$outers = $rm->invoke($rc->newInstanceArgs(array($name)));
				foreach($outers as $outerName=>$outer)
					$actions[] = $outerName;
			}
		}
		return $actions;
	}
	
}

?>