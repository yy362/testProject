<?php

class RightsController extends Controller {
	public $layout = 'default';
	
	public function getAuthManager() {
		return Yii::app()->authManager;
	}
}

?>