<?php


return array(
        'controllers' => array(
                'invokables' => array(
                        'Blog\Controller\Blog' => 'Blog\Controller\BlogController'
                ),
        ),
        
        'router' => array(
                'routes' => array(
                        'test' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    // http://localhost/test/test
                                    'route'    => '/blog[/[:action]]',
                                    'constraints' => array(
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Blog\Controller\Blog',
                                        'action'     => 'index'
                                        ),
                                ),
                        ),
                ),
        ),
        
        'view_manager' => array(
                'template_path_stack' => array(
                        'blog' => __DIR__ . '/../view',
                ),
        ),
);