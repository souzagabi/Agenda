<?php

namespace Base;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

      /*============== translate de message into portuguese ===================*/
        $translator = $e->getApplication()->getServiceManager()->get('MvcTranslator');
        $translator->addTranslationFile(
                'phpArray', 
                dirname(dirname(__DIR__)) . '/vendor/zendframework/zendframework/resources/languages/pt_BR/Zend_Validate.php', //这个路径不对的话会报错
                'default', 'pt_BR'
        );
        $translator->setLocale('pt_BR');  
        \Zend\Validator\AbstractValidator::setDefaultTranslator($translator, 'default');
        /*============== translate de message into portuguese ===================*/
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

}
