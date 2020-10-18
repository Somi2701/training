<?php
require_once "config.php";
$pd=$_POST["id"];
$sql1="SELECT * FROM products JOIN categories where `pid` ='{$pd}'";
$result1 = mysqli_query($conn, $sql1) or die("SQL Query Failed.");
if (mysqli_num_rows($result1) > 0 ) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        echo '
        
              <div class="row">
                
                <div class="col-md-6 col-sm-6 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div class="simpleLens-gallery-container" id="demo-1">
        <div class="simpleLens-container">
        <div class="simpleLens-big-image-container">
            <a class="simpleLens-lens-image" data-lens-image="resources/images/icons/w1.jpeg">
                <img src="'.$row1['path'].'" class="simpleLens-big-image">
            </a>
        </div>
    </div>
    <div class="simpleLens-thumbnails-container">
        <a href="#" class="simpleLens-thumbnail-wrapper"
            data-lens-image="resources/images/icons/w1.jpeg"
            data-big-image="resources/images/icons/w1.jpeg">
            <img src="'.$row1['path'].'">
        </a>                                    
        <a href="#" class="simpleLens-thumbnail-wrapper"
            data-lens-image="resources/images/icons/w1.jpeg"
            data-big-image="resources/images/icons/w1.jpeg">
            <img src="'.$row1['path'].'">
        </a>
        <a href="#" class="simpleLens-thumbnail-wrapper"
            data-lens-image="resources/images/icons/w1.jpeg"
            data-big-image="resources/images/icons/w1.jpeg">
            <img src="'.$row1['path'].'">
        </a>
    </div>
    </div>
    </div>
  </div>
  
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="aa-product-view-content">
      <h3>"'.$row1['name'].'"</h3>
      <div class="aa-price-block">
        <span class="aa-product-view-price"><?php echo "'.$row1['price'].'" ?></span>
        <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
      </div>
      <p><?php echo $row4["desc"] ?></p>
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
          Category: <a href="#">"'.$row1['cname'].'"</a>
        </p>
      </div>
      <div class="aa-prod-view-bottom">
        <a  id = "cart" href="cart.php?id='.$row1['pid'].'" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
        <a id= "detail"  href="product-detail.php?pId='.$row1['pid'].'" class="aa-add-to-cart-btn">View Details</a>
      </div>
    </div>
  </div>
</div>
   
        ';
    }
} else {
    echo "Error : " .$sql. "<br>" .$conn -> error;
}
?>
