<?php

class Dashboard_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function listaMesa(){
        $amesas = $this->db->select('select * from mesa where ativo = 1');
        $mesas = array();
        foreach ($amesas as $value) {
            $a = new MesaDOM($value['numeroMesa'], $value['status']);
            array_push($mesas, $a);
        }
        return $mesas;
    }
}