<?php

namespace adminModule; 

class UsersModel extends \BaseModel {
				public function getUsers($lang){
								$users = $this->db->query('select * from user')->fetchAll();
								return $users;
				}
				
				public function edit($id, $values){
								$this->db->query('update user set password="'.md5($values['password01']).'" where id='.$id)->execute();
				}
				
				public function removeUser($values){
								$this->db->query('delete from user where id ='.$values['userid']);
				}
				
				public function addUser($values, $authenticator){
								$this->db->query('insert into user (username, password, role, name) values ("'.$values['username'].'", "'.md5($values['password']).'", "'.$values['roleuser'].'", "'.$values['name'].'")');
				}
}

