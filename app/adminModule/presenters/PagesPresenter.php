<?php


namespace adminModule;
use \Nette\Application\UI\Form;
use \Nette\Templating\FileTemplate;

class PagesPresenter extends BasePresenter {
    public $content;
    private $taskRepository;
    private $model;
    private $id;    
    private $actualPageId;
        
    protected function startup()
        {
            parent::startup();

            if (!$this->getUser()->isLoggedIn()) {
                        $this->redirect('Sign:in');
            }
            $this->model = new PagesModel($this->db, $this->config);
            $this->model->setLang($this->lang);
            $this->content = $this->db->table('homepage')->find('content');
            $this->template->lang = $this->lang;
            $this->template->langs = $this->config->langs;
        }
        
    public function actionDefault(){
        $lang = $this->lang;
        $this->template->items = $this->model->getItems($lang);
    }
    
    public function actionEdit($id){
        $this->actualPageId = $id;
        
    }
    
    public function createComponentEditForm(){
        
        $langids = array();
        
        if($this->actualPageId == NULL){
            foreach($this->config->langs as $lang){
              $langids[$lang] = NULL;    
            }
        }else{
            foreach($this->config->langs as $lang){
                    $langids[$lang] = $this->actualPageId;
                }    
        }
        
        $content = $this->model->fetchEditContent($langids);
        $form  = new Form();
        $lang = $this->getParameter();
        $lang = $lang['lang'];
        
        foreach($content as $lang=>$contentin){
        $form->addText('titleEditPage'.$lang, gettext('titulek stránky'))->setAttribute('class','title-edit-form')->setValue($contentin[0]['title']);
        $form->addTextArea('contentEditPage'.$lang, gettext('Obsah stránky'),100,17)->setAttribute('class','content-edit-form mceEditor')->setValue(htmlspecialchars_decode($contentin[0]['content']));
        }
        
        $categories = $this->model->fetchCategories($this->lang, $this->actualPageId);
        $valuestoselect = array();
        
        foreach($categories as $category=>$itemcategory){
            $valuestoselect[$itemcategory['id']] = $itemcategory['title'];
        }
        
        for($i=1;$i<(count($valuestoselect)+1);$i++){
        
            if($i == $content[$lang][0]['category']){
                $actualCategory = $valuestoselect[$i];
                $valuestoselect = array($i => $valuestoselect[$i]) + $valuestoselect;
            }
            
        }
        
        $form->addSelect('categories',gettext('Kategorie'),$valuestoselect);
            
        $form->addSubmit('submit', gettext('Odeslat'))->setAttribute('class','btn btn-primary content');
        $form->onSuccess[] = $this->editFormsubmit;
        return $form;
    }
    
    public function editFormsubmit(Form $form){
        $values = $form->getValues(true);
        $this->actualPageId = $this->actualPageId == NULL ? $this->model->createPage($this->config->langs) : $this->actualPageId;
        $this->model->saveValuesEdit($values, $this->config->langs, $this->actualPageId['cs']);
    }
    
    public function handleChangeRank(){
        $data = $this->request->getPost();
        $this->model->changeRank($data, $this->config->langs);
    }
    
    public function actionAddPage(){
        $this->setView('edit');
    }
    
    public function actionRemove($id){
        $datatemp = $this->model->removePage($id, $this->config->langs);
        dump($datatemp);
        /*$this->setView('edit');*/
        $this->redirect('Pages:default');
    }
}
  
