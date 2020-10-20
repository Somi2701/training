<?php
require_once 'config.php';
$errors=array();
$name = $_POST["name"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];
$email = $_POST["email"];
$dob = $_POST["dob"];
$address = $_POST["address"];

if ($password != $repassword) {
    $errors['i'] = "password not match";
}
$u = "SELECT uname FROM users WHERE uname='$name'";
$uu = mysqli_query($conn, $u);
if (mysqli_num_rows($uu) > 0) {
    $errors['user'] = "Username Already Exist";
}

$e = "SELECT uemail FROM users WHERE uemail='$email'";
$ee = mysqli_query($conn, $e);
if (mysqli_num_rows($ee) > 0) {
    $errors['email'] = "Email Already Exist";
}
$_SESSION["store"] =$errors;
if (sizeof($errors)==0) {
    $sql ="INSERT INTO users (`uname`, `upassword`, `uemail`, `dob`, `address`)
    VALUES ('".$name."', '".$password."', '".$email."', '".$dob."', '".$address."')";
   
    if (mysqli_query($conn, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}

?>
