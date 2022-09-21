<?php
namespace Models;
class Connection {
 private $hostname ="localhost";
 private $username ="root";
 private $password ='';
 private $dbname="department";
 public \mysqli $conn;
 function __construct(){
    $this->conn = new \mysqli($this->hostname,$this->username,$this->password,$this->dbname);
 }
 function __destruct(){
   $this->conn->close();
 }
}