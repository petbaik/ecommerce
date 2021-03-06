<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ecommerce\Models;
 use Ecommerce\App\DB;

class BaseModel {
    
    public $db = null;
    public $table = null;
    public function __construct($table) {
       
        $this->db = new DB;
       
        $this->db = $this->db->connect();
        $this->table = $table;
        
    }
    
    public function all () {
        $stmt = $this->db->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        return $stmt;
    }
    
    public function find ($id) {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE id=?");
        $stmt->execute([$id]);
        $stmt = $stmt->fetch();
        return $stmt;
    }
    
    public function insert($data) {
        $columns = "";
        $values = [];
        $placeholders = "";
        $counter = 0;
       
        // INSERT INTO table (email,name) VALUES ('a','2');
        foreach($data  as $key=>$value) {
            $columns .= $key ;
            array_push($values,$value);
            $placeholders .= "?";
            if(count($data) - 1  != $counter) {
                $columns .= ",";
               
                $placeholders .= ",";
            }
            
            $counter++;
        } 
        
        $stmt = $this->db->prepare("INSERT INTO $this->table ( $columns) VALUES ($placeholders)");
        $stmt->execute($values);
        
        return $this->db->lastInsertId();
    }
}