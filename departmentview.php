<?php
$title = "Department";

include_once("layout/header.php");
include_once("layout/navbar.php");


use Models\Department;


$department = new Department;
$departmens=$department->read()->fetch_all();
$alert="";
if(isset($_GET['delete'])){
  if($department->delete($_GET['delete'])){
    $deletemessage="<div class = 'alert alert-success'>Department Deleted Successfully</div>";
  }else{
    $deletemessage="<div class = 'alert alert-danger'>This Department Can not deleted</div>";

  }
}
?>
<div class="container">
  <div class="row">
<div class="offset-3 col-6 mt-5">    
<?= $deletemessage ?? ""?>

    <h1 class="text-center text-primary"><?= $title?> </h1>
</div>
    
    <div class="offset-3 col-6 mt-5">
<table class="table">

<?php 
$result=$department->read()->fetch_all();



foreach($result as $departmentData){
   ?> 
   <tr>
    <?php 
    foreach($departmentData as $data){
      
      ?>
      <td><?=$data?></td>
      <?php 
    }
    ?>
    <form>
    <td> 
     <button class="btn btn-danger" name = "delete" value="<?=$departmentData[0] ?>">delete</button>
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