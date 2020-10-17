<?php
require_once "config.php";
$pd=$_POST["id"];

$sql1="SELECT * FROM products where `pid` ='{$pd}'";
$result1 = mysqli_query($conn, $sql1) or die("SQL Query Failed.");
if (mysqli_num_rows($result1) > 0 ) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        echo '
        <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">                      
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-6 col-sm-6 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div class="simpleLens-gallery-container" id="demo-1">
                      <div class="simpleLens-container">
                          <div class="simpleLens-big-image-container">
                              <a class="simpleLens-lens-image" data-lens-image="resources/images/icons/w1.jpeg">
                                  <img src="'.$row1["path"].'">
                              </a>
                          </div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          <a href="#" class="simpleLens-thumbnail-wrapper"
                             data-lens-image="resources/images/icons/w1.jpeg"
                             data-big-image="resources/images/icons/w1.jpeg">
                              <img src="'.$row1["path"].'">
                          </a>                                    
                          <a href="#" class="simpleLens-thumbnail-wrapper"
                             data-lens-image="resources/images/icons/w1.jpeg"
                             data-big-image="resources/images/icons/w1.jpeg">
                              <img src="'.$row1["path"].'">
                          </a>
                          <a href="#" class="simpleLens-thumbnail-wrapper"
                             data-lens-image="resources/images/icons/w1.jpeg"
                             data-big-image="resources/images/icons/w1.jpeg">
                              <img src="'.$row1["path"].'">
                          </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>'.$row1["name"].'</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">'.$row1["name"].'</span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
            
                    </div>
                    <p>'.$row1["name"].'</p>
                    <h4>Size</h4>
                    
                    <div class="aa-prod-view-size">
                      <a href="#">S</a>
                      <a href="#">M</a>
                      <a href="#">L</a>
                      <a href="#">XL</a>
                    </div>
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select name="" id="">
                          <option value="0" selected="1">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#">Polo T-Shirt</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <a href="#" class="aa-add-to-cart-btn">View Details</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>                        
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
        ';
    }
    echo 1;
} else {
    echo "Error : " .$sql. "<br>" .$conn -> error;
}
?>
