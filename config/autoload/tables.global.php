<?php

use Blog\Model\PostTable;
use Blog\Model\Post;
use Zend\Db\ResultSet\ResultSet;

return array(
    'service_manager' => array(
        'factories' => array(
            'Blog\Model\PostTable' =>  function($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                
                $post = $sm->get('Blog\Row\Post');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($post);
                $table = new PostTable('posts', $dbAdapter, null, $resultSetPrototype);
                return $table;
            },
            'Blog\Row\Post' => function($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $post = new Post('id_post', 'posts', $dbAdapter);
                return $post;
            }
        )
    )
);