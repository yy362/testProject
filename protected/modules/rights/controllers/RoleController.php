<?php

class RoleController extends AuthItemController {
	
	public function getType() {
		return CAuthItem::TYPE_ROLE;
	}

}

?>