<?php
namespace Blog\Form;

use Zend\Form\Form;

class Post extends Form
{
    public function __construct($name = "")
    {
        parent::__construct('postform');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'titulo',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Titulo'
                ),
            'attributes' => array(
                'class' => 'input-large'
                )
            ));
        
        $this->add(array(
            'name' => 'contenido',
            'type' => 'Zend\Form\Element\Textarea',
            'options' => array(
                'label' => 'Contenido'
            ),
            'attributes' => array(
                'class' => 'input-xlarge',
                'rows'  => 7
            ),
        ));
        
        $this->add(array(
            'name' => 'guardarpost',
            'type' => 'Zend\Form\Element\Submit',
            'options' => array(
                'label' => 'Guardar'
                ),
            'attributes' => array(
                'value' => 'Guardar'
                    )
            ));
    }
}