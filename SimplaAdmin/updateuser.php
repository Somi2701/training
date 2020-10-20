<?php
    $uid = $_POST["id"];
    $uname = $_POST["name"];
    $upassword = $_POST["password"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    
    
    require_once "config.php";
    
    $sql = "UPDATE users SET `uname` = '{$uname}', `upassword` = '{$upassword}',  `uemail`='{$email}',
    `dob` = '{$dob}', `address` = '{$address}' WHERE `uid` = {$uid}";
    
    if (mysqli_query($conn, $sql)) { 
        echo 1;
    } else {
        echo "Error : " .$sql. "<br>" .$conn -> error;
    }
?>

