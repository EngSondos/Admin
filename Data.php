<?php

use Models\EmpolyeeData;

$title = "Employee Data";

include_once("layout/header.php");
include_once("layout/navbar.php");


$empolyee = new EmpolyeeData;
?>

<div class="container">
    <div class="row">
    <div class="offset-3 col-6 mt-5">    
    <h1 class="text-center text-primary"><?= $title?> </h1>
</div>
    <div class="offset-2 col-8 mt-5">
    <table class="table">
        <tr>
            <th>DepId</th>
            <th>DepName</th>
            <th>employeeId</th>
            <th>employeeName</th>
            <th>Salary</th>
            <th>Email</th>
        </tr>
        <?php
        $result = $empolyee->ReadData()->fetch_all();

        // print_r($result);

        foreach ($result as $departmentData) {
        ?>
            <tr>
                <?php
                foreach ($departmentData as $data) {

                ?>
                    <td><?= $data ?></td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>
    <a href="departmentview.php" class="btn btn-primary"> Departments</a>
</div>
    </div>
</div>

    <?php

    include_once("layout/scripts.php");
    ?>