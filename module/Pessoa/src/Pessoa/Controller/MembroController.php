<?php

namespace Pessoa\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class MembroController extends AbstractController {

    public function __construct() {
        $this->entity = "Pessoa\Entity\Membro";
        $this->service = "Pessoa\Service\MembroService";
        $this->form = "Pessoa\Form\MembroForm";
        $this->controller = "membro";
        $this->route = "pessoa/default";
    }

    public function inserirAction() {
        $form = $this->getServiceLocator()->get($this->form);

       $request = $this->getRequest();

        if ($request->isPost()) {
            
            $form->setData($postData);
            
            if ($form->isValid()) {

                $form->getData();

                $service = $this->getServiceLocator()->get($this->service);
                if ($service->inserir($request->getPost()->toArray())) {
                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso !!');
                } else {
                    $this->flashMessenger()->addErrorMessage('Não foi possível cadastrar! Tente mais tarde.');
                }

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'inserir'));
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

        return new ViewModel(array('form' => $form));
    }

    public function editarAction() {
        //==************************** Bloco carrega o formulário na tela *********************************==//
        $form = $this->getServiceLocator()->get($this->form);

        $request = $this->getRequest();
        
        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0))
            $form->setData($entity->toArray()); //preenche os dados no form
        //$form->setData($postData);
        //==********************************** Fim do bloco ************************************************==//
        if ($request->isPost()) {
            $form->setData($postData);
            //var_dump($postData);die;
            //$form->setData($request->getPost());
            if ($form->isValid()) {

                $form->getData();

                $service = $this->getServiceLocator()->get($this->service);
                if ($service->editar($request->getPost()->toArray())) {
                    $this->flashMessenger()->addSuccessMessage('Atualizado com sucesso !!');
                } else {
                    $this->flashMessenger()->addErrorMessage('Não foi possível atualizar! Tente mais tarde.');
                }

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
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

        return new ViewModel(array('form' => $form));
    }

}
