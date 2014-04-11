<?php

namespace adminModule;
use \Nette\Application\UI;
use \Nette\Application\UI\Form;



/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{


	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
        protected function createComponentSignInForm()
        {
            $form = new Form();
            $form->addText('username', 'Uživatelské jméno:', 30, 20);
            $form->addPassword('password', 'Heslo:', 30);
            $form->addCheckbox('persistent', 'Pamatovat si mě na tomto počítači');
            $form->addSubmit('login', 'Přihlásit se');
            $form->onSuccess[] = $this->signInFormSubmitted;
            return $form;
        }
        
        public function signInFormSubmitted(Form $form)
        {
            try {
                $user = $this->getUser();

                $values = $form->getValues();
                if ($values->persistent) {
                    $user->setExpiration('+30 days', FALSE);
                }
                $user->login($values->username, $values->password);
                $this->flashMessage('Přihlášení bylo úspěšné.', 'success');
                $this->redirect('Homepage:');
            } catch (NS\AuthenticationException $e) {
                $form->addError('Neplatné uživatelské jméno nebo heslo.');
            }
        }        


	public function signInFormSucceeded($form)
	{
		$values = $form->getValues();

		if ($values->remember) {
			$this->getUser()->setExpiration('14 days', FALSE);
		} else {
			$this->getUser()->setExpiration('20 minutes', TRUE);
		}

		try {
			$this->getUser()->login($values->username, $values->password);
			$this->redirect('Homepage:');

		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('in');
	}

}