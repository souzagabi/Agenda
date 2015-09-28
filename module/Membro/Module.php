<?php

namespace Membro;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Membro\Service\MembroService;
use Membro\Service\ComissaoService;
use Membro\Form\MembroForm;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Membro\Form\MembroForm' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $repoComissao = $em->getRepository('Membro\Entity\Comissao');

                    $comissao = $repoComissao->fetchPairs();

                    return new MembroForm('membro', $comissao);
                },
                'Membro\Service\MembroService' => function($em) {
                    return new MembroService($em->get('Doctrine\ORM\EntityManager'));
                },
                'Membro\Service\ComissaoService' => function($em) {
                    return new ComissaoService($em->get('Doctrine\ORM\EntityManager'));
                },
            )
        );
    }

}
