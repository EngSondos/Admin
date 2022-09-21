<?php
$title = "Login";

include_once("layout/header.php");
include_once("layout/navbar.php");



?>
<div class="container">
  <div class="row">
  <div class="offset-3 col-6 mt-5 text-center h1 text-primary">
    Login
  </div>
<div class="offset-4 col-4 mt-5">    
    <from>
      <div class="mb-3">
      <input type="text" placeholder="UserName" class="form-control">
      </div  >
      <div class="mb-3">
      <input type="password" placeholder="Password" class="form-control">

      </div  >

      <div class="mb-3">
      <button type="submit" class="btn btn-primary form-control" >Submit</button >


      </div>

    </from>
<?php


include_once("layout/scripts.php");
?>