<?php

namespace Blog\Controller;

use Blog\Form\Post;

use Blog\Model\PostTable;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class BlogController extends AbstractActionController
{
    /**
     * @var Blog\Model\PostTable
     */
    public $postTable;
    
    public function indexAction()
    {
        
    }
    
    public function listarAction()
    {
        $this->postTable = $this->getServiceLocator()->get('Blog\Model\PostTable');
        $results = $this->postTable->fetchAll();
        
        return new ViewModel(array(
            'results' => $results
            ));
    }
    
    public function crearAction()
    {
        $form = new Post();
        $post = $this->getServiceLocator()->get('Blog\Row\Post');
        $form->setInputFilter($post->getInputFilter());
        $form->setAttribute('action', $this->url()->fromRoute('test', array('action' => 'crear')));
        
        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
                $num = $post->savePost($form->getData());
                if ($num > 0) {
                    $this->redirect()->toRoute('test', array('action' => 'listar'));
                } else {
                    // TODO Mensaje de error
                }
            }
        }
        
        return new ViewModel(array(
            'form' => $form
            ));
    }
    
    public function pruebaAction()
    {}
}