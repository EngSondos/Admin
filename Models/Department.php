<?php
namespace Models;
use Models\Crud;
use Models\Connection;

Class Department extends Connection implements Crud {

private $name,$id;
public $table ="department";
 function getdepartmentdata($id){
    $query = "SELECT * FROM {$this->table} Where `id` = ? ";
    $statment = $this->conn->prepare($query);
    if(!$statment){
        return false;
    }
    $statment->bind_param("i",$id);
    $statment->execute();
    return $statment->get_result();

 }
function create()
{
    $query = "INSERT INTO {$this->table} (`name` ) Values (?)";
    $statment = $this->conn->prepare($query);
    if(!$statment){
        return false;
    }
    $statment->bind_param("s",$this->name );
    return $statment->execute();
}
function update($id)
{

    $query="UPDATE {$this->table} SET `name` = ?   Where `id` = ?";
    $statment = $this->conn->prepare($query);
    if(!$statment){
        return false;
    }
    $statment->bind_param("si", $this->name,  $id);
    return $statment->execute();
}
function delete($id)
{
    $query="DELETE From {$this->table} Where `id` = ?";
    $statment = $this->conn->prepare($query);
    if(!$statment){
        return false;
    }
    $statment->bind_param("i", $id);
    return $statment->execute();

}
function read()
{
    $query ="SELECT * From {$this->table}";
    $statment = $this->conn->query($query);
    return $statment;     
}

/**
 * Get the value of name
 */ 
public function getName()
{
return $this->name;
}

/**
 * Set the value of name
 *
 * @return  self
 */ 
public function setName($name)
{
$this->name = $name;

return $this;
}
}
?>