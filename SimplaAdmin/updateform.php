<?php

$p_id = $_POST["id"];
require_once "config.php";

$sql='SELECT * FROM `users` WHERE `uid` ="'.$p_id.'"';
$result = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($result) > 0 ) {

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
                <tr>
                    <td>User Name</td>
                    <td><input type='text' id='editname' value='{$row["uname"]}'> </td>
                </tr>
                <tr>
                    <td>User Password</td>
                    <td><input type='text' id='editpassword' value='{$row["upassword"]}'> </td>
                </tr>
                <tr>
                    <td>User Email</td>
                    <td><input type='text' id='editemail' value='{$row["uemail"]}'> </td>
                </tr>
                <tr>
                    <td>User DOB</td>
                    <td><input type='text' id='editdob' value='{$row["dob"]}'> </td>
                </tr>
                <tr>
                    <td>User Address</td>
                    <td><input type='text' id='editaddress' value='{$row["address"]}'> </td>
                    <input type='hidden' id='editid' value='{$row["uid"]}'>
                </tr>  
                <tr>
                    <td></td>
                    <td><input type='submit' id='edit-submit' value='save'></td>;
                </tr>";
                

    }

    mysqli_close($conn);

    echo $output;
} else {
    echo "<h2>No Record Found.</h2>";
    echo "Error : " .$sql. "<br>" .$conn -> error;
}

?>

