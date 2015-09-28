<?php

namespace Pessoa\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class FilhosController extends AbstractController {

    public function __construct() {
        $this->entity = "Pessoa\Entity\Filho";
        $this->service = "Pessoa\Service\FilhoService";
        $this->form = "Pessoa\Form\FilhoForm";
        $this->controller = "filhos";
        $this->route = "pessoa/default";
    }

    public function inserirAction() {

        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());


            if ($form->isValid()) {
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
            $form->setData($entity->toArray());
        //==********************************** Fim do bloco ************************************************==//
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
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
