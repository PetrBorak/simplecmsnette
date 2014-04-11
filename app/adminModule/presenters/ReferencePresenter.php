<?php

namespace adminModule;
use \Nette\Application\UI\Form;
use \Nette\Templating\FileTemplate;

class ReferencePresenter extends BasePresenter{
    public $model;
    public $pagesModel;
    
    protected function startup(){
        parent::startup();
        $this->model = new ReferenceModel($this->db, $this->config);
        $this->pagesModel = new PagesModel($this->db, $this->config);
        $this->model->setLang($this->lang);
        $this->template->lang = $this->lang;
        $this->template->langs = $this->config->langs;
    }
    
    public function actionDefault(){
        $this->template->items = $this->model->getItems($this->lang, $this->config->langs);
    }
    
    public function addReference(){
        
    }
    
    public function createComponentAddreference(){
        $form  = new Form();
        foreach($this->config->langs as $lang){
            $form->addText('title'.$lang, gettext('Název reference'))->setAttribute('class', 'title-edit-form');
            $form->addText('created'.$lang, gettext('Datum vzniku reference'))->setAttribute('class', 'title-edit-form');
            $form->addTextArea('content'.$lang, gettext('Popis reference'))->setAttribute('class', 'content-edit-form mceEditor');
        }
        
        $categories = $this->pagesModel->fetchCategories($this->lang);
        $valuestoselect = array();
        
        foreach($categories as $category=>$itemcategory){
            $valuestoselect[$itemcategory['id']] = $itemcategory['title'];
        }
        
        $form->addSelect('categories',gettext('Kategorie'),$valuestoselect);
        $form->addSubmit('submit',gettext('Odeslat'))->setAttribute('class','btn btn-primary content');
        $form->onSuccess[] = $this->addReferenceff;
        return $form;
    }
    
    public function addReferenceff(Form $form){
        $values = $form->getValues();
        $this->model->addReference($values);
    }
    
    public function handleChangeRank(){
        $data = $this->request->getPost();
        $this->model->changeRank($data, $this->config->langs);
    }
    
    public function handleChangeRankImages(){
        $data = $this->request->getPost();
        $this->model->changeRankImages($data, $this->config->langs);
    }
    
    public function createComponentEditForm(){
        $id = $this->getParam();
        $id = $id['id'];
        $values = $this->model->getEditData($id, $this->config->langs);
        $form = $this->createComponentAddReference();
        
        foreach($this->config->langs as $lang){
            
            $intit = 'title'.$lang;
            $form[$intit]->setValue($values[$lang][0]['title']);
            $form['created'.$lang]->setValue($values[$lang][0]['created']);
            $form['content'.$lang]->setDefaultValue(htmlspecialchars_decode($values[$lang][0]['content']));
             
        }
        $form->addHidden('rank', $values['en'][0]['rank']);
        $categories = $this->pagesModel->fetchCategories($this->lang);
       
        $valuestoselect = array();
        
        foreach($categories as $category=>$itemcategory){
            $valuestoselect[$itemcategory['id']] = $itemcategory['title'];
        }

        
        for($i=1;$i<(count($valuestoselect)+1);$i++){
        
            if($i == $values['cs'][0]['category']){
                $actualCategory = $valuestoselect[$i];
                $valuestoselect = array($i => $valuestoselect[$i]) + $valuestoselect;
            }
            
        }
        
        $form['categories']->setItems($valuestoselect);
								$form->getElementPrototype()->addAttributes(array("class" => "ajax"));
								$form->onSuccess = array(0=>$this->editForm);
        return $form;
    }
				
				public function editForm(Form $form){
								
								$id = $this->getRequest()->getParameters();
								$id = $id['id'];
        $values = $form->getValues();
        $this->model->editReference($values, $id);
								$this->invalidateControl('editForm');
								
				}
				
				public function handleRemove($id){
								$id = $this->getRequest()->getParameters();
								$id = $id['id'];
								$this->model->removeReference($id, $this->config->langs);
								$this->template->items = $this->model->getItems($this->lang, $this->config->langs);
								$this->invalidateControl("items");
				}
				
    public function actionEdit($id){
        $this->template->images = $this->model->getSingle($id, $this->config->langs);
    }
    
    public function createComponentAddImage(){
        $form = new Form();
        
        foreach($this->config->langs as $lang){
            $form->addText('title'.$lang,gettext("Titulek k obrázku"))->setAttribute('class','title-edit-form');   
        }
        
        $form->addUpload('image',gettext("Obrázek"));
        $form->addSubmit('odeslat',gettext("Odeslat"))->setAttribute("class","btn btn-primary");
        $form->onSuccess[] = $this->addImageSave;
        return $form;
    }
    
    public function addImageSave(Form $form){
        $values = $form->getValues();
        $id = $this->getParameter();
        $id = $id['id'];        
        $this->model->saveAddImage($values,$id,$this->config->langs);
        $this->redirect("Reference:edit#images", array('id'=>$id));
    }
    
 
				
				public function handleGetformdata(){
								$this->invalidateControl();
								$id = $this->getParameter();
								$id = $id['imgid'][0];
								$this->payload->items = $this->model->getmodaldata($this->config->langs, $id);
				}
				
				public function handleSaveImageData(){
								$this->invalidateControl();
								$values = $this->getRequest()->getPost();
								$this->payload->items = $values;
								$this->model->saveImageData($values, $this->config->langs);
				}
				
								public function actionSaveImageData(){
								$values = $this->getRequest();
								$this->model->saveImageData($values->getParameters(), $this->config->langs);
				}
				public function getImages(){
								
				}
				public function handleRemoveImage(){
								$values = $this->getRequest()->getParameters();
								$id = $values['id'];
								$this->model->removeImage($values, $this->config->langs, $this);
								$this->template->images = $this->model->getSingle($id,$this->config->langs);
								$this->invalidateControl('images');
				}
    
}

