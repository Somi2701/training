<?php
     $conn=mysqli_connect("localhost","root","","text") or die("connection failed");
     $sql = "SELECT * products";
     $result =mysqli_query($conn,$sql)  or die("connection failed");
     $output=";
     if(mysqli_num_rows)($result)> 0){
         $output.='';
         
?>