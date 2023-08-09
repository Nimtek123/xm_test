<?php

use DB\SQL\Mapper;

class AppModel extends Mapper {
    
    protected $db;

    public function __construct(\DB\SQL $db, $table) {
        
        $this->db = $db;

        parent::__construct($this->db, $table);
    }

    public function all() {
        $this->load();

        return $this->query;
    }

    public function findById($id) {

        $this->load('id =' . $id);

        return $this->query;
    }

    public function findByRelated($foreignKey, $value) {

        $this->load($foreignKey . '=' . $value);

        return $this->query;
    }

    public function findByAttribute($attribute, $value) {

        $this->load(array($attribute . ' = ?', $value));
        
        return $this->query;
    }
    
    public function findByAttributes($attributes) {
         $this->load($attributes);

        return $this->query;
    }

    public function findByAttributeLike($attribute, $value) {
        
        $this->load(array($attribute.' LIKE ?','%'.$value.'%')); 

        return $this->query;
    }

    public function updateAttribute($updateDefinition) 
    {
        $results = $this->db->exec('UPDATE '.$updateDefinition['table'].' SET '.$updateDefinition['attribute'].' = "'.$updateDefinition['value'].'" WHERE id ='.$updateDefinition['id']);
        
        return $results;
    }
}