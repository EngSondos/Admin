<?php
$title = "Employee";

include_once("layout/header.php");
include_once("layout/navbar.php");


use Models\Employee;
use Models\Department;


$employee = new  Employee;
$departmen = new Department;
$departmens=$departmen->read()->fetch_all();
$alert="";
if (isset($_GET['Action'])) {
  $employee->setName($_GET['name'])->setSalary($_GET['salary'])->setEmail($_GET['email'])->setPassword($_GET['password'])->setDepartmentid($_GET['depId']);
 if( $employee->create()){
  $alert="<div class = 'alert alert-success'>Employee Added Successfully</div>";
 }
}
if(isset($_GET['edit'])){
$employeedata=$employee->getemployeedata($_GET['edit'])->fetch_assoc();
}
if(isset($_GET['editsubmit'])){
  $employee->setName($_GET['name'])->setSalary($_GET['salary'])->setEmail($_GET['email'])->setPassword($_GET['password'])->setDepartmentid($_GET['depId']);
   $employee->update( $_GET['id']);
}
if(isset($_GET['delete'])){
  $employee->delete($_GET['delete']);
}
?>
<div class="container">
  <div class="row">
<div class="offset-3 col-6 mt-5">    
    <h1 class="text-center text-primary"><?= $title?> </h1>
</div>
    <div class="offset-3 col-6 mt-5">
      <?= $alert ?>
      <form method="get">
      <div class="mb-3">
          <label class="form-label">id</label>
          <input type="text" class="form-control " readonly  name="id" value="<?= $employeedata['id'] ?? "" ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" value="<?= $employeedata['name'] ?? "" ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" value="<?= $employeedata['email'] ?? "" ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" value="<?= $employeedata['password'] ?? "" ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Salary</label>
          <input type="number" class="form-control" name="salary" value="<?= $employeedata['salary'] ?? "" ?>">
        </div>
        <label>Department</label>
       <select class="form-control" name ="depId">
        <?php
      foreach($departmens as $dep){
        ?>
      <option value="<?= $dep[0]?>" <?php if ( isset($employeedata) && $dep[0] == $employeedata['departmentid']) {echo "selected";}?> ><?= $dep[1]?> </option>
     <?php }
        ?>
       </select>
        <?php if(isset($_GET['edit'])){?>
                  <button name="editsubmit" class="btn btn-primary w-100 mt-5" >Edit</button>
       <?php } else {?>
        <button name="Action" class="btn btn-primary w-100 mt-5">Add Employee</button>
        <?php }?> 
      </form>
    </div>
    <div class="offset-2 col-8 mt-5">
<table class="table">

<?php 
$result=$employee->read()->fetch_all();



foreach($result as $employeeData){
   ?> 
   <tr>
    <?php 
    foreach($employeeData as $data){
      
      ?>
      <td><?=$data?></td>
      <?php 
    }
    ?>
    <form>
    <td> 
      <button class="btn btn-warning" name="edit" value="<?=$employeeData[0] ?>">edit</button>
  <button class="btn btn-danger" name = "delete" value="<?=$employeeData[0] ?>">delete</button>
  </td>
    </form>
   </tr>
   <?php 
}
?>
</table>
<?php


include_once("layout/scripts.php");
?>