<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * this class will inherits all the functon of db class
 */
class model extends custom_exception {

    public $db = '';
     

    public function __construct() {
        global $obj_db;
            $this->db = $obj_db;
    }

    public function getOneData($id, $parama = '*') {
        //$this->db->join('countries as c','c.country_id=u.country','LEFT');
        //$this->db->where('u.'.$this->primary_key, $id);
        $this->db->where($this->primary_key, $id);
        return $this->db->getOne($this->tableName, $parama);
    }

    public function getAllData($parama) {
//        $this->db->where('request_id', $id);
        return $this->db->get($this->tableName, null, $parama);
    }

    public function insertData($data = array()) {
        if (!empty($data)) {
            return $this->db->insert($this->tableName, $data);
        }
        return false;
    }

//    public function updateData($id, $data = array()) {
//        $this->db->where($this->primary_key, $id);
//        if (!empty($data)) {
//            return $this->db->update($this->tableName, $data);
//        }
//        return false;
//    }

    public function getMsg($msgCode = 0, $str = '') {
        $txt = $this->globalMsg[$msgCode];
        return str_replace('%d', $str, $txt);
    }

}
