<?php
require 'config.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    //echo  sucess;
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
            <td><input type="checkbox"/></td>
            <td>' . $row["id"] . '</td>
            <td>' . $row["name"] . '</td>
            <td>' . $row["price"] . '</td>
            <td><img src="upload/' . $row["image"] . '"  width="100" height="100"></td>	
            <td>' . $row["tags"] . '</td>
            <td>' . $row["category"] . '</td>
            
            <td>
                <!-- Icons -->
            
                 <a id="subject" href="products.php?sku=' . $row["id"] . '&action=delete" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
                
            </td>
        </tr>';
    }
}
?>
</tbody>
</div>
</table>
<?php
$sql1 = "Select * from products";
$result1 = mysqli_query($conn, $sql1) or die("error");
if (mysqli_num_rows($result1) > 0) {
$total_records = mysqli_num_rows($result1);

}

?>