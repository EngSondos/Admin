<?php
namespace Models;
class Employee extends Connection implements Crud
{

    private $table = "empolyee";
    private $name, $email, $password, $salary,$departmentid;
    function getemployeedata($id){
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
        $query = "INSERT INTO {$this->table} (`name`,`salary`,`email` , `password`,`departmentid` ) Values (?,?,?,? ,?)";
        $statment = $this->conn->prepare($query);
        if(!$statment){
            return false;
        }
        $statment->bind_param("sdssi",$this->name , $this->salary , $this->email , $this->password ,$this->departmentid);
        return $statment->execute();
    }
    function update($id)
    {

        $query="UPDATE {$this->table} SET `name` = ? ,`salary` = ? , `email` = ?  , `password` = ? `departmentid` = ?  Where `id` = ?";
        $statment = $this->conn->prepare($query);
        if(!$statment){
            return false;
        }
        $statment->bind_param("sdssii", $this->name , $this->salary , $this->email , $this->password ,$this->departmentid, $id);
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
        $query ="SELECT id , name, salary , email  From {$this->table}";
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
 

    /**
     * Get the value of salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     *
     * @return  self
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of departmentid
     */ 
    public function getDepartmentid()
    {
        return $this->departmentid;
    }

    /**
     * Set the value of departmentid
     *
     * @return  self
     */ 
    public function setDepartmentid($departmentid)
    {
        $this->departmentid = $departmentid;

        return $this;
    }
}
