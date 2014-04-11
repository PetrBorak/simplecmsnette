<?php

namespace Todo;

use Nette,
        Nette\Security,
        Nette\Utils\Strings;


/**
 * Users authenticator.
 */
class Authenticator extends Nette\Object implements Security\IAuthenticator
{
        /** @var UserRepository */
        private $users;
        private $user;
								private $db;



        public function __construct(\Nette\Database\Connection $database)
        {
                $this->db = $database;
        }



        /**
         * Performs an authentication.
         * @return Nette\Security\Identity
         * @throws Nette\Security\AuthenticationException
         */
        public function authenticate(array $credentials)
        {
                list($username, $password) = $credentials;
                $row = $this->db->table('user')->where('username',$username)->fetch();

                if (!$row) {
                        throw new Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);
                }

                if ($row->password !== md5($password)) {
                        throw new Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
                }


                $this->user =  new Security\Identity($row->id, $row->role,array('username'=>$row->username));
                return $this->user;
 
 
        }


        /**
         * @param  int $id
         * @param  string $password
         */
        public function setPassword($id, $password)
        {
                $this->users->findBy(array('id' => $id))->update(array(
                        'password' => md5($password),
                ));
        }



        /**
         * Computes salted password hash.
         * @param string
         * @return string
         */

}