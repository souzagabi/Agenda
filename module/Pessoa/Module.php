<?php

namespace Pessoa;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Pessoa\Service\FilhoService;
use Pessoa\Service\TesourariaService;
use Pessoa\Service\ClassificacaoService;
use Pessoa\Service\PessoaService;
use Pessoa\Service\ComissaoService;
use Pessoa\Service\MembroService;
use Pessoa\Form\FilhoForm;
use Pessoa\Form\TesourariaForm;
use Pessoa\Form\PessoaForm;
use Pessoa\Form\MembroForm;

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
                'Pessoa\Form\FilhoForm' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $repoPessoa = $em->getRepository('Pessoa\Entity\Pessoa');

                    $pais = $repoPessoa->fetchPairs();

                    return new FilhoForm('filho', $pais);
                },
                'Pessoa\Form\TesourariaForm' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $repoPessoa = $em->getRepository('Pessoa\Entity\Pessoa');

                    $pessoa = $repoPessoa->fetchPairs();

                    return new TesourariaForm(null, $pessoa);
                },
                'Pessoa\Form\PessoaForm' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $repoClass = $em->getRepository('Pessoa\Entity\Classificacao');
                    $classificacoes = $repoClass->fetchPairs();

                    return new PessoaForm('pessoa', $classificacoes);
                },
                'Pessoa\Form\MembroForm' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $repoComissao = $em->getRepository('Pessoa\Entity\Comissao');
                    $comissao = $repoComissao->fetchPairs();

                    return new MembroForm('membro', $comissao);
                },
                'Pessoa\Service\PessoaService' => function($sm) {
                    return new PessoaService($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Pessoa\Service\ClassificacaoService' => function($em) {
                    return new ClassificacaoService($em->get('Doctrine\ORM\EntityManager'));
                },
                'Pessoa\Service\FilhoService' => function($sm) {
                    return new FilhoService($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Pessoa\Service\TesourariaService' => function($sm) {
                    return new TesourariaService($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Pessoa\Service\ComissaoService' => function($sm) {
                    return new ComissaoService($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Pessoa\Service\MembroService' => function($sm) {
                    return new MembroService($sm->get('Doctrine\ORM\EntityManager'));
                },
            )
        );
    }

}
