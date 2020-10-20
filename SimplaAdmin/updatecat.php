<?php
    $pid = $_POST["id"];
    $pname = $_POST["name"];
    
    require_once "config.php";
    
    $sql = "UPDATE categories SET `cname` = '{$pname}' WHERE cid = {$pid}";
    
    if (mysqli_query($conn, $sql)) { 
        echo 1;
    } else {
        echo "Error : " .$sql. "<br>" .$conn -> error;
    }
?>