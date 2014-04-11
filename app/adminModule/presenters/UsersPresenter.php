<?php

namespace adminModule;
use \Nette\Application\UI\Form;
use Nette\Utils\Html;


class UsersPresenter extends BasePresenter {
				public $model;
				public $pagesModel;
				public $acl;
				public $role;
				protected function startup(){
								parent::startup();
								$this->acl = $this->context->permission;
        $this->model = new UsersModel($this->db, $this->config);
        $this->pagesModel = new PagesModel($this->db, $this->config);
        $this->model->setLang($this->lang);
        $this->template->lang = $this->lang;
        $this->template->langs = $this->config->langs;
				}
				
				public function actionDefault(){
								$this->template->acl = $this->acl;
								$this->template->user = $this->getUser();
								$userrole = $this->template->user->getRoles();
								$userrole = $userrole[0];
								$this->template->userrole = $userrole;
								$userrole = $this->getUser()->getRoles();
								$userrole = $userrole[0];
								if($this->acl->isAllowed($userrole,'users')){
												$this->template->users = $this->model->getUsers($this->config->langs);
								}
								
								$this->template->path = ROOT;
				}
					public function handleEdit(){
									$this->invalidateControl('users');
									$values = $this->getRequest()->getParameters();
									$this->payload->formresponse = $values;
									
									
									$id = $values['userid'];
									$password01 = $values['password01'];
									$password02 = $values['password02'];
									if($password01 == $password02){
													$this->model->edit($id, $values);
													$this->payload->formresponse = 'Heslo bylo změněno';
									} else {
													$this->payload->formresponse = 'Hesla se neshodují.';
									}
									
					}	
					
					public function handleRemove(){
									$values = $this->getRequest()->getParameters();
									$this->model->removeuser($values);
									$this->template->users = $this->model->getUsers($this->config->langs);
									$this->invalidateControl('users');
									$this->payload->removeuserresponse = 'User byl úspěšně odstaněn.';
					}
					
					public function handleAdd(){
									$values = $this->getRequest()->getParameters();
									if($values['password'] == $values['password02']){
												$this->model->addUser($values, $this->context->authenticator);
												$this->payload->formresponse = "User byl pridan";
													$this->template->users = $this->model->getUsers($this->config->langs);
												$this->invalidateControl('users');
									} else {
												$this->invalidateControl('users');	
												$this->payload->formresponse = "Hesla se neshodují";	
									}
									
					}
					
					public function actionAdd(){
									$values = $this->getRequest()->getParameters();
									if($values['password'] == $values['password02']){
												$this->model->addUser($values);
												$this->invalidateControl('users');
												$this->payload->formresponse = "User byl pridan";
									} else {
												$this->invalidateControl('users');	
												$this->payload->formresponse = "Hesla se neshodují";	
									}
									
					}					
					
					/*
						public function createComponentAddUser(){
									$form  = new Form();

									$label = HTML::el('label', array('class'=>'required dib w200 mr10'))->setText('Zadejte heslo:');
									$form->addPassword('password',$label)->setRequired('Zvolte si heslo');
									$label = HTML::el('label', array('class'=>'required dib w200 mr10'))->setText('Zopakujte své heslo:');
									$form->addPassword('password02',$label)->setRequired("Zadejete heslo znovu pro kontrolu");
									$form->addSubmit('submit',gettext('Odeslat'))->setAttribute('class','btn btn-primary');
									$form->getElementPrototype()->addAttributes(array('id'=>'addUserForm', 'class'=>'ajax'));
									$form->onSuccess[] = $this->addUser;
									return $form;
					}
													


					public function addUser(Form $form){
									$values = $this->getRequest()->getPost();
									$this->model->addUser($values);
									$this->invalidateControl('users');
					}
					 */
					
					public function actionFormAddUser(){
									
					}
					

}
