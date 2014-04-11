<?php

/**
 * Homepage presenter.
 */
namespace adminModule;
use Todo;
use \Nette\Application\UI\Form;

class HomepagelistPresenter extends BasePresenter
{

        /** @var Todo\TaskRepository */

        
        public $content;
        private $taskRepository;
        private $model;
        private $id;


/*
        public function inject(HomepagelistModel $model )
        {
                $this->model = $model;
        }
*/


        protected function startup()
        {
                parent::startup();

                if (!$this->getUser()->isLoggedIn()) {
                        $this->redirect('Sign:in');
                }
                
                $this->model = new HomepagelistModel($this->db, $this->config);
                $this->content = $this->db->table('homepage')->find('content');

        }



        /** @return Todo\TaskListControl */
        public function renderDefault(){
            $this->template->content = $this->content;

        }
        
        public function createComponentUpdateform(){
            $this->id = $this->model->giveId($this->config->langs);
            $form = new Form();
            $lang = $this->getParameter();
            $lang = $lang['lang'];
            $langs = $this->config->langs;
            $content = $this->model->getContent($langs);
            
            foreach($content as $key=>$langcont){
                $langitem = $key;
                $langcontent = $langcont;
                $form->addTextArea('content'.$langitem, gettext('Obsah hlavní strany'), 100, 17)->setAttribute('class','mceEditor')->setDefaultValue($langcontent);
            }
            
            $form->addSubmit('submit', gettext('Odeslat'))->setAttribute('class','btn btn-primary content');
            $form->onSuccess[] = $this->updateFormSubmited;
            
            return $form;
            
        }
        
        public function updateFormSubmited(Form $form){
            $values = $form->getValues(true);
            $langs = $this->config->langs;
            $this->model->saveContent($values, $langs);
            $this->flashMessage('Data byla úspěšně uložena');
        }
        

        
        public function createComponentIncompleteTasks()
        {
                return new Todo\TaskListControl($this->taskRepository->findIncomplete(), $this->taskRepository);
        }



        /** @return Todo\TaskListControl */
        public function createComponentUserTasks()
        {
                $incomplete = $this->taskRepository->findIncompleteByUser($this->getUser()->getId());
                $control = new Todo\TaskListControl($incomplete, $this->taskRepository);
                $control->displayList = TRUE;
                $control->displayUser = FALSE;
                return $control;
        }

}