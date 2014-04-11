<?php
  namespace TODO;
  use Nette;

  class UserRepository extends Repository {
   public function findByName($username)
    {
        return $this->findAll()->where('username', $username)->fetch();
    }
    public function setPassword($id, $password)
    {
        $this->getTable()->where(array('id' => $id))->update(array(
            'password' => Authenticator::calculateHash($password)
        ));
    }    
  }