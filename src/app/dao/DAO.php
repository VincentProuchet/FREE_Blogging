<?php


use DB\Cortex;

/**
 * 
 * @author Vincent
 *
 */
class DAO extends Cortex
{
    protected $db = 'DB', $primary = 'id',$table , $fluid = true;
    
    
    public function __construct(){
        // recupération de la base de données        
        parent::__construct($this->db,$this->table,$this->fluid);
    }
}

