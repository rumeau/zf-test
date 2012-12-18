<?php

namespace Blog\Model;

use Zend\Db\TableGateway\TableGateway;

class PostTable extends TableGateway
{
    /**
     * Obtiene todos los posts en la tabla posts
     * 
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function fetchAll()
    {
        $result = $this->select();
        return $result;
    }
    
    
}