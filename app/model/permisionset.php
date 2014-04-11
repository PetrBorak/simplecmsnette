<?php
 use Nette\Security\Permission;
	
	class PermissionSet extends Permission {
	public function __construct(){
				$this->addRole('guest');
				$this->addRole('admin');
				$this->addRole('superadmin');
				$this->addResource('articles');
				$this->addResource('categories');
				$this->addResource('users');
				
				$this->allow('guest', array('articles'));
				$this->allow('admin', array('articles','categories'));
				$this->allow('superadmin', array('articles','categories','users'));
	 }
	}

