<?php

include 'AppModel.php';

class AppRepository {

    protected $f3;
    
    protected $db;
    
    protected $table;

    function __construct($table) {

        global $db;

        $this->table = $table;
        $f3 = Base::instance();
        $this->f3 = $f3;
        $this->db = $db;
    }

    public function createRecord($definition) {
        try {
            $entity = $this->getModel();

            foreach ($definition as $key => $value) {
                $entity->{$key} = $value;
            }
            
            return $entity->save();
        } catch (PDOException $exception) {
            throw new ErrorException($exception);
        }
    }

    public function deleteRecord($id) {
        try {
            $entity = $this->getModel();

            $entity->load(array('id=?', $id));

            return $entity->erase();
        } catch (PDOException $exception) {
            throw new ErrorException($exception);
        }
    }

     
    /*
     * @param idArray = ['field' => 'value']
     */
    public function updateRecord($idArray, $definition) {
        try {
            $entity = $this->getModel();
            $entity->load($idArray);
            $entity->copyfrom($definition);

            return $entity->update();
        } catch (PDOException $exception) {
            throw new ErrorException($exception);
        }
    }

    public function updateByAttributes($id, $attributes) {
        try {
            foreach($attributes as $key => $value){
                $updateDefinition = array(
                    'table' => $this->table,
                    'id' => $id,
                    'attribute' => $key,
                    'value' => $value
                );
                
                $entity = $this->getModel();
                $updated[] = $entity->updateAttribute($updateDefinition);
            }
            
            return $updated;
        } catch (PDOException $exception) {
            throw new ErrorException($exception);
        }
    }

    public function getAllRecords() {
        try {
            $records = $this->getModel()->all();

            return $records;
        } catch (PDOException $exception) {
            throw new ErrorException($exception);
        }
    }

    public function getByAttribute($attribute, $value) {
        try {
            $records = $this->getModel()->findByAttribute($attribute, $value);

            return $records;
        } catch (PDOException $exception) {
            throw new ErrorException($exception);
        }
    }
    
    public function getByAttributes($attributesArray) {
        try {
            $records = $this->getModel()->findByAttributes($attributesArray);

            return $records;
        } catch (PDOException $exception) {
            throw new ErrorException($exception);
        }
    }

    public function getByAttributeLike($attribute, $value) {
        try {
            $records = $this->getModel()->findByAttributeLike($attribute, $value);

            return $records;
        } catch (PDOException $exception) {
            throw new ErrorException($exception);
        }
    }

    public function getWhereAttributeIsNot($attribute, $value) {
        try {
            $results = $this->db->exec("SELECT * FROM issues WHERE status != 'unassigned'");

            return $results;
        } catch (PDOException $exception) {
            throw new ErrorException($exception);
        }
    }

    public function rawQuery($sql){
        try{
            $results = $this->db->exec($sql);

            return $results;
        } catch (PDOException $exception) {
            throw new ErrorException($exception);
        }
    }

    protected function getModel() {
        return new AppModel($this->db, $this->table);
    }

    public function getDbConnection() {
        return $this->db;
    }

}
