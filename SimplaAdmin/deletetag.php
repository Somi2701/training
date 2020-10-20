<?php
if (isset($_POST['sid'])) {
    $p_id = $_POST["sid"];
    require_once "config.php";
    $sql='DELETE FROM tags WHERE `tid` = "'.$p_id.'"';

    if (mysqli_query($conn, $sql)) {
        echo 1;
    } else {
        echo "Error : " .$sql. "<br>" .$conn -> error;
    }
    mysqli_close($conn);
}
