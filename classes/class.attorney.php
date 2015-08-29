<?php

class attorney extends model {

    public $tableName = 'attorney';
    public $primaryKey = 'attorney_id';

    /**
     * 
     * get list of all atorney
     */
    public function GetAttorneyList() {
        return $this->db->get($this->tableName, null, '*');
    }

    /**
     * get detail of particular attorney
     */
    public function GetAttorneyDetailById($attorney_id) {
        $this->db->where($this->primaryKey, $attorney_id);
        return $this->db->getOne($this->tableName, null, '*');
    }

}
