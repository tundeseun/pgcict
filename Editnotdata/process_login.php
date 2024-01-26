<?php
include "conn.php";
if (isset($_POST['Submit'])) {


    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $check = "SELECT * FROM admin WHERE Email='$email' AND Password='$password'";
    $result = $conn->query($check);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if ($row) {
        session_start();
        $_SESSION['id'] = $email;
        header('location: correctionmodule.php');
    } else {
        echo "<script>alert('Invalid login details')</script>";
        echo "<script>window.open('login.php', '_self')</script>";
    }
}
