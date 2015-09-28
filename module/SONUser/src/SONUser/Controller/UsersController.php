<?php

namespace SONUser\Controller;

use Zend\View\Model\ViewModel;

class UsersController extends CrudController 
{

    public function __construct() 
    {
        $this->entity = "SONUser\Entity\User";
        $this->form = "SONUser\Form\UserForm";
        $this->service = "SONUser\Service\UserService";
        $this->controller = "users";
        $this->route = "sonuser-admin";
    }
 
     public function editAction()
    {
        $form = new $this->form();
        $request = $this->getRequest();
        
        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id',0));
        
        if($this->params()->fromRoute('id',0))
        {
            $array = $entity->toArray();
            unset($array['password']);
            $form->setData($array);
        }
            
        
        if($request->isPost())
        {
            $form->setData($request->getPost());
            if($form->isValid())
            {
                $service = $this->getServiceLocator()->get($this->service);
                if($service->update($request->getPost()->toArray())){
                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso !!');
                } else {
                    $this->flashMessenger()->addErrorMessage('Não foi possível cadastrar! Tente mais tarde.');
                }
                
                return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
            }
        }
        if ($this->flashMessenger()->hasSuccessMessages()) {
            return new ViewModel(array('form' => $form, 'success' => $this->flashMessenger()->getSuccessMessages()));
        }

        if ($this->flashMessenger()->hasErrorMessages()) {
            return new ViewModel(array('form' => $form, 'error' => $this->flashMessenger()->getErrorMessages()));
        }
        if ($this->flashMessenger()->hasInfoMessages()) {
            return new ViewModel(array('form' => $form, 'warning' => $this->flashMessenger()->getInfoMessages()));
        }
        $this->flashMessenger()->clearMessages();
        
        return new ViewModel(array('form'=>$form));
    }
}
