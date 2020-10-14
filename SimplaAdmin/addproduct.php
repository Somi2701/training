<?php

require 'config.php';
  $name=$_POST["pname"];
  $price=$_POST["pprice"];
  $photo=$_POST["pphoto"];
  $category=$_POST["pcategory"];
  $sdesc=$_POST["psdesc"];
  $ldesc=$_POST["pldesc"];
  //echo $place.$email.$password1;
  $sql = "INSERT INTO products( `name`, `price`, `short_description`, `long_description`,`category_id`) VALUES ('{$name}', '{$price}', '{$sdesc}', '{$ldesc}', '{$category}')";
 // $result= mysqli_query($con, $sql) or die($con);
if (mysqli_query($con, $sql)) {
    echo 1;
} else {
    print_r(mysqli_error_list($con));
}
?>