<?php

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\ArrayAdapter;

abstract class AbstractController extends AbstractActionController {

    protected $em;
    protected $service;
    protected $entity;
    protected $form;
    protected $route;
    protected $controller;

    /**
     * Lista resultados
     * @return array|void
     */
    public function indexAction() {

        $list = $this->getEm()->getRepository($this->entity)->findAll();

        $page = $this->params()->fromRoute('page');

        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
                ->setDefaultItemCountPerPage(5);

        if ($this->flashMessenger()->hasSuccessMessages()) {
            return new ViewModel(array('data' => $paginator, 'page' => $page, 'success' => $this->flashMessenger()->getSuccessMessages()));
        }
        if ($this->flashMessenger()->hasErrorMessages()) {
            return new ViewModel(array('data' => $paginator, 'page' => $page, 'error' => $this->flashMessenger()->getErrorMessages()));
        }

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }

    /**
     * Incluir um registro
     * @return \Base\Controller\ViewModel
     */
    public function inserirAction() {
        $form = new $this->form();
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
        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form));
    }

    /**
     * 
     * @return \Base\Controller\ViewModel
     */
    public function editarAction() {
        $form = new $this->form();
        $request = $this->getRequest();

        $param = $this->params()->fromRoute('id', 0);
        $repository = $this->getEm()->getRepository($this->entity)->find($param);

        //$repository = $this->getEm()->getRepository($this->entity);
        //$entity = $repository->find($this->params()->fromRoute('id', 0));

        /* if ($this->params()->fromRoute('id', 0)) {
          $form->setData($entity->toArray());
          } */
        if ($repository) {
            /* ================================ converte a data para string ===================================== */
            $array = array();
            foreach ($repository->toArray() as $key => $value) {
                if ($value instanceof \DateTime) {
                    $array[$key] = $value->format('d/m/Y');
                } else {
                    $array[$key] = $value;
                }
            }
            $form->setData($array);
            /* ==================================================================================== */
            if ($request->isPost()) {
                $form->setData($request->getPost());
                if ($form->isValid()) {
                    $service = $this->getServiceLocator()->get($this->service);
                    $data = $request->getPost()->toArray();
                    $data['id'] = (int) $param;
                    //$service->editar($request->getPost()->toArray());

                    if ($service->editar($data)) {
                        $this->flashMessenger()->addSuccessMessage('Atualizado com sucesso !!');
                    } else {
                        $this->flashMessenger()->addErrorMessage('Não foi possível atualizar! Tente mais tarde.');
                    }
                    return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
                }
            }

            //return new ViewModel(array('form' => $form));
        } else {
            $this->flashMessenger()->addInfoMessage('Registro não foi encontrado !');
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
        }
        if ($this->flashMessenger()->hasSuccessMessages()) {
            return new ViewModel(array('form' => $form, 'success' => $this->flashMessenger()->getSuccessMessages(),
                'id' => $param));
        }

        if ($this->flashMessenger()->hasErrorMessages()) {
            return new ViewModel(array('form' => $form, 'error' => $this->flashMessenger()->getErrorMessages(),
                'id' => $param));
        }
        if ($this->flashMessenger()->hasInfoMessages()) {
            return new ViewModel(array('form' => $form, 'warning' => $this->flashMessenger()->getInfoMessages(),
                'id' => $param));
        }
        $this->flashMessenger()->clearMessages();
        return new ViewModel(array('form' => $form, 'id' => $param));
    }

    public function excluirAction() {
        $service = $this->getServiceLocator()->get($this->service);
        if ($service->excluir($this->params()->fromRoute('id', 0))) {
            $this->flashMessenger()->addSuccessMessage('Registro deletado com sucesso!!');
        } else {
            $this->flashMessenger()->addErrorMessage('Não foi possível deletar o registro !!');
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->em;
    }

}
