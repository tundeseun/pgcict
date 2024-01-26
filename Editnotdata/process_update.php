<?php
include "conn.php";
if (isset($_POST['UpdateRecord'])) {
    $iD = $_POST['iD'];
    $Faculty = $_POST['Faculty'];
    $Department = $_POST['Department'];
    $Degree = $_POST['Degree'];
    $field_of_interest = $_POST['field_of_interest'];
                $Update = "UPDATE biodata SET faculty = '$Faculty', department = '$Department', degree = '$Degree', specialization= '$field_of_interest' WHERE id=$iD";
            //$conn->query($Update);
            //$Update = mysqli_insert_id($conn);
            if ($conn->query($Update)) {
                echo "<script>alert('Student Record Updated Successfully')</script>";
                echo "<script>window.open('correctionmodule.php', '_self')</script>";
            }else 
            {

                echo "<script>alert('Error Updating Record')</script>";
                echo "<script>window.open('update.php', '_self')</script>";
                
            }
        }
    

    