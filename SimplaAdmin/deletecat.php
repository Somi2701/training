
 <?php
include "config.php";
if (isset($_GET['sku'])) {
    $sku = $_GET['sku'];
    if ($_GET['action'] == 'delete') {
        $sql = "DELETE FROM categories WHERE id=cname";
        if (mysqli_query($conn, $sql)) {
            echo "record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
}
?>
