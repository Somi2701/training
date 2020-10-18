<?php include ('config.php');?>
   <?php include('header.php'); ?>
   <?php include('delete.php'); ?>
   <?php include('sidebar.php'); ?>

 
<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['q1'])) {
        $q1 = implode(',', $_POST['q1']);
    }
    $name = $_POST["name"];
    $price = $_POST["price"];
    $image = $_FILES["image"]["name"];
    $category= $_POST["categories"];
    $description = $_POST["short_description"];
   // $lon_description = $_POST["long_description"];//
    if (isset($_FILES["image"])) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], "image/" . $image)) {
            // echo "image uploaded successfully";

        } else {
            echo "upload failed";
        }
    }
    $sql = "INSERT INTO products(`name`,price,`image`,`category`,`tags`,`short_description`)
     VALUES('$name','$price','$image','$categories','$q1','$description')";
     
    if (mysqli_query($conn, $sql)) {
        // header("location:products.php");//
        // echo "row inserted successfully";//

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
include('sidebar.php');
?>

<!-- Wrapper for the radial gradient background -->


<div id="main-content">
    <!-- Main Content Section with everything -->

    <noscript>
        <!-- Show a notification if the user has disabled javascript -->
        <div class="notification error png_bg">
            <div>
                Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
            </div>
        </div>
    </noscript>

    <!-- Page Head -->
    <h2>Welcome John</h2>
    <p id="page-intro">What would you like to do?</p>
    <div class="content-box">
        <div class="content-box-header">
            <h3>PRODUCTS</h3>
            <ul class="content-box-tabs">
                <li><a href="#tab1" class="default-tab">Manage</a></li>
                <li><a href="#tab2">Add</a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <!-- End .content-box-header -->
        <div class="content-box-content">
            <div class="tab-content default-tab" id="tab1">
                <!-- This is the target div. id must match the href of this div's tab -->

                <table>
                    <thead>
                        <tr>
                            <th><input class="check-all" type="checkbox" /></th>
                            <th>Product Id </th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Categories</th>
                            <th>Short_Discription</th>
                            <th>long_Discription</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        <?php
                        include('config.php');
                     
                        $sql = "SELECT * FROM products";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            //echo "yes here it is";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
									<td><input type="checkbox"/></td>
									<td>' . $row["id"] . '</td>
									<td>' . $row["name"] . '</td>
									<td>' . $row["price"] . '</td>
									<td><img src="image/' . $row["image"] . '"  width="100" height="100"></td>	
									<td>' . $row["tags"] . '</td>
                                    <td>' . $row["category"] . '</td>
                                    <td>' . $row["short_description"].'</td>
                                    <td>' . $row["long_description"].'</td>
									
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
            <!-- <div class="pagination"> -->
        </div> <!-- End .pagination -->
        <!-- End #tab1 -->

        <div class="tab-content" id="tab2">
            <?php if (isset($_GET['sku'])) :
                $sql = "SELECT * FROM `addproduct1` WHERE ProductSKU='" . $_GET['sku'] . "'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            endif
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <p>
                        <label>Name</label>
                        <input class="text-input small-input" type="text" id="small-input" name="name" value="" /> <!-- Classes for input-notification: success, error, information, attention -->
                        <br /><small>A small description of the field</small>
                    </p>
                    <p>
                        <label>Price</label>
                        <input class="text-input small-input" type="text" id="small-input" name="price" value="" />
                        <!-- Classes for input-notification: success, error, information, attention -->
                        <br /><small>A small description of the field</small>
                    </p>
                    <p>
                        <div>
                            <?php if (isset($row['image'])) {
                                echo '<img src="image/' . $row["image"] . '">';
                            } ?>
                        </div>
                        <label>Image</label>
                        <input class="text-input small-input" type="file" id="small-input" name="image" value="" /> <!-- Classes for input-notification: success, error, information, attention -->
                        <br /><small>A small description of the field</small>
                    </p>
                    <p>
                        <label>Categories</label>
                        <select name="categories" class="small-input" id='cid'>
                            <option value="Men" <?php if (isset($row['Categories']) && $row['Categories'] == "Men") { ?> selected="selected" <?php
                                                                                                                                            } ?>>Men</option>
                            <option value="Women" <?php if (isset($row['Categories']) && $row['Categories'] == "Women") { ?> selected="selected" <?php
                                                                                                                                                } ?>>Women</option>
                            <option value="Kids" <?php if (isset($row['Categories']) && $row['Categories'] == "Kids") { ?> selected="selected" <?php
                                                                                                                                            } ?>>Kids</option>
                            <option value="Electronis" <?php if (isset($row['Categories']) && $row['Categories'] == "Electronis") { ?> selected="selected" <?php
                                                                                                                                                        } ?>>Electronis</option>
                            <option value="Sports" <?php if (isset($row['Categories']) && $row['Categories'] == "Sports") { ?> selected="selected" <?php
                                                                                                                                         } ?>>Sports</option>
                        </select>
                       
                    </p>
                    <p>
                        <label>Tags </label>
                        <input name="q1[]" type="checkbox" value="fashion">Fashion
                        <input name="q1[]" type="checkbox" value="ecommerce">Ecommerce
                        <input name="q1[]" type="checkbox" value="shop">Shop
                        <input name="q1[]" type="checkbox" value="handbag">Handbag
                        <input name="q1[]" type="checkbox" value="laptop">Laptop
                        <input name="q1[]" type="checkbox" value="headphone">Headphone
              
                    </p>
                    <p>
                        <label>Description</label>
                        <textarea name="short_description" rows="4" cols="50">
                            </textarea>
                    </p>
    
                    <p>
						<label> Long Description </label>
				<textarea class="text-input textarea wysiwyg"  name="textfield" cols="70" rows="10"></textarea>
								</p>
                    
                    <p>
                        <input class="button" type="submit" value="Submit" name="submit" />
                    </p>
                </fieldset>

                <div class="clear"></div>
                <!-- End .clear -->
            </form>
        </div> <!-- End #tab2 -->
    </div> <!-- End .content-box-content -->
</div>
<?php include('footer.php'); ?>

                   <!--  <script>
						$(document).ready(function(){
							$("#addproduct").on('click', function(e){
								//alert("done");
								e.preventDefault();
								var name= $("#name").val();
								var price= $("#price").val();
								var photo= $("#photo").val();
								var category= $("#category").val();
								var sdesc= $("#sdesc").val();
								var ldesc= $("#ldesc").val();
                              url : "addproduct.php",
									type : "POST",
									data : {
										pname : name,
										pprice : price,
										pphoto : photo, 
										pcategory : category, 
										psdesc : sdesc,
										pldesc : ldesc
										},  
									success : function(data){
										alert(data);
										if(data==1){
											alert("successfully done");
										} else {
											alert("error message");

						}