<?php
namespace adminModule;

class CategoriesPresenter extends BasePresenter {
				private $model;
				private $errors = array(
					 array('cs'=> 'Je třeba zadat údaje pro obě jazykové mutace', 'en'=>'both languages must be filled in'),
				);
				
				public function startup(){
								parent::startup();
								$this->model = new CategoriesModel($this->db, $this->config);
				}
				
				public function actionAddCategory(){
								$this->invalidateControl('items');
								$data = $this->request->getParameters();
								if(strlen($data['en-nameofcategory']) > 0 && strlen($data['cs-nameofcategory']) > 0){
												//$this->model->addCategory($data);
												$this->template->response = "podminka splnena";
								} else {
												$this->template->response = "podminka nesplnena";
								}
				}
	
				public function handleAddCategory(){
								$this->invalidateControl('items');
								$data = $this->request->getParameters();
								if(strlen($data['en-nameofcategory']) > 0 && strlen($data['cs-nameofcategory']) > 0){
												$this->model->addCategory($data);
												$this->payload->formresponse = 'Data byla uložena';			
								} else {
												$this->payload->formresponse = $this->errors[0][$this->lang];
								}
				}
				
				public function handleRemove($id){
								$data = $this->request->getParameters();
								$this->model->removeuser($data);
				}
				
				
				public function actionDefault(){
								$this->template->items = $this->model->getAll();
								$this->template->langs = $this->config['langs'];
				}
				
				public function handleChangeRank(){
								/*$data = $this->request->getParameters();
								$data['item'] = array($data['item01'],$data['item02'],$data['item03']);
								*/
								
								$data = $this->request->getPost();
								$this->model->changeRank($data);
				}
}
