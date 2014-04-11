<?php
use Nette\Application\UI\Form;
  class TaskPresenter extends \adminModule\BasePresenter {
    private $listRepository;
    private $userRepository;
    private $taskRepository;
    
    public function startup(){
      parent::startup();
      $this->listRepository = $this->context->listRepository;
      $this->userRepository = $this->context->userRepository;
      $this->taskRepository = $this->context->taskRepository;
      
     if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }
    
    private $list;
    
            public function actionDefault($id)
        {
                $this->list = $this->listRepository->findBy(array('id' => $id))->fetch();
                if ($this->list === FALSE) {
                        $this->setView('notFound');
                }
        }



        public function renderDefault($id)
            {
                $this->template->list = $this->list;
            }


        protected function createComponentTaskList()
            {
                if ($this->list === NULL) {
                    $this->error('Wrong action');
                }
                return new Todo\TaskListControl($this->listRepository->tasksOf($this->list), $this->taskRepository);
            }
        
        protected function createComponentTaskForm()
            {
                $userPairs = $this->userRepository->findAll()->fetchPairs('id', 'name');

                $form = new Form();
                $form->addText('text', 'Úkol:', 40, 100)
                    ->addRule(Form::FILLED, 'Je nutné zadat text úkolu.');
                $form->addSelect('userId', 'Pro:', $userPairs)
                    ->setPrompt('- Vyberte -')
                    ->addRule(Form::FILLED, 'Je nutné vybrat, komu je úkol přiřazen.');
                $form->addSubmit('create', 'Vytvořit');
                
                $form->onSuccess[] = $this->taskFormSubmitted;

                return $form;
            }
            
            public function taskFormSubmitted(Form $form)
                {
                    $this->taskRepository->createTask($this->list->id, $form->values->text, $form->values->userId);
                    $this->flashMessage('Úkol přidán.', 'success');
                    $this->redirect('this');
                }
  }