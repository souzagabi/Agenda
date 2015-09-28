<?php

namespace Pessoa;

return array(
    'router' => array(
        'routes' => array(
            'pessoa' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/pessoa',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Pessoa\Controller',
                        'controller' => 'Pessoas',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Pessoa\Controller',
                                'controller' => 'Pessoas'
                            )
                        )
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Pessoa\Controller',
                                'controller' => 'Pessoas'
                            )
                        )
                    )
                )
            ) // fim pessoa
        ) // fim routes
    ),
    'controllers' => array(
        'invokables' => array(
            'Pessoa\Controller\Pessoas' => 'Pessoa\Controller\PessoasController',
            'Pessoa\Controller\Filhos' => 'Pessoa\Controller\FilhosController',
            'Pessoa\Controller\Tesouraria' => 'Pessoa\Controller\TesourariaController',
            'Pessoa\Controller\Classificacao' => 'Pessoa\Controller\ClassificacaoController',
            //'Pessoa\Model\Comissao' => 'Pessoa\Controller\ComissaoController',
            //'Pessoa\Controller\Membro' => 'Pessoa\Controller\MembroController',
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../../Base/view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../../Base/view/error/404.phtml',
            'error/index' => __DIR__ . '/../../Base/view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'translator' => array(
        'locale' => 'pt_BR',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../../Base/language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
        'fixture' => array(
            'Pessoa_fixture' => __DIR__ . '/../src/Pessoa/Fixture',
        ),
    ),
);
