<?php
$title = "Department";

include_once("layout/header.php");
include_once("layout/navbar.php");


use Models\Department;


$department = new Department;
$departmens=$department->read()->fetch_all();
$alert="";
if (isset($_GET['Action'])) {
  $department->setName($_GET['name']);
 if( $department->create()){
  $alert="<div class = 'alert alert-success'>Department Added Successfully</div>";
 }
}
if(isset($_GET['edit'])){
$departmentdata=$department->getdepartmentdata($_GET['edit'])->fetch_assoc();
}
if(isset($_GET['editsubmit'])){
  $department->setName($_GET['name']);
   $department->update( $_GET['id']);
   
}

?>
<div class="container">
  <div class="row">
<div class="offset-3 col-6 mt-5">    
    <h1 class="text-center text-primary"><?= $title?> </h1>
</div>
    <div class="offset-3 col-6 mt-5">
      <?= $alert ?? ""?>
      <?= $deletemessage ?? ""?>
      <form method="get">
      <div class="mb-3">
          <label class="form-label">id</label>
          <input type="text" class="form-control " readonly  name="id" value="<?= $departmentdata['id'] ?? "" ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" value="<?= $departmentdata['name'] ?? "" ?>">
        </div>
      
        <?php if(isset($_GET['edit'])){?>
                  <button name="editsubmit" class="btn btn-primary w-100" >Edit</button>
       <?php } else {?>
        <button name="Action" class="btn btn-primary w-100 mt-5">Add Department</button>
        <?php }?> 
      </form>
    </div>
    <div class="offset-3 col-6 mt-5">
<table class="table">
<?php


include_once("layout/scripts.php");
?>