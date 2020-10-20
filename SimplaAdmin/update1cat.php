<?php


$p_id = $_POST["id"];
require_once "config.php";

$sql='SELECT * FROM `categories` WHERE `cid` ="'.$p_id.'"';
$result = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($result) > 0 ) {

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                <td width='90px'>Category Name</td>
                    <td><input type='text' id='editname' value='{$row["cname"]}'> </td>
                    <input type='hidden' id='editid' value='{$row["cid"]}'>
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

