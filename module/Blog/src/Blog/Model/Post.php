<?php
namespace Blog\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterInterface;
use \DateTime;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\Db\RowGateway\RowGateway;

class Post extends RowGateway implements InputFilterAwareInterface
{
    public $inputFilter;
    
    public function savePost($data)
    {
        $now = new DateTime();
        
        $data['id_post'] = isset($data['id_post'])  ? $data['id_post']       : null;
        $data['fecha']  = isset($data['fecha'])     ? $data['fecha']         : $now->format('Y-m-d H:i:s');
        $data['estado'] = isset($data['estado'])    ? (int) $data['estado']  : 1;
        $data['autor']  = isset($data['autor'])     ? $data['autor']         : 'Robot Escritor';
        
        if (isset($data['guardarpost'])) {
            unset($data['guardarpost']);
        }
        
        parent::populate($data, isset($data['id_post']) ? true : false);
        
        return parent::save();
    }
    
    public function getDate($format = null)
    {
        $parts = explode(' ', $this->fecha);
        $string = $parts[0] . 'T' . $parts[1];
        $date = new Datetime($string);
        
        if ($format !== null) {
            return $date->format($format);
        }
        
        return $date;
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        return null;
    }
    
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'titulo',
                'required' => true,
                'filter' => array(
                    array('name' => 'HtmlEntities'),
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array('name' => 'StringLength',
                        'options' => array(
                            'min' => 5,
                            'max' => 50
                        ))
                )
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'contenido',
                'required' => true,
                'filter' => array(
                    array('name' => 'HtmlEntities'),
                    array('name' => 'StringTrim')
                )
            )));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
    
    public function update()
    {
        
    }
}
