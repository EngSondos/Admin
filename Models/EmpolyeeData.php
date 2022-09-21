<?php
namespace Models;
use Models\Connection;

Class EmpolyeeData extends Connection{
    public $table= "department_empolyee";
    function ReadData(){
            $query ="SELECT *  From {$this->table}";
            $statment = $this->conn->query($query);
            return $statment;    
        
    }
}