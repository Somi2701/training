<?php  include('header.php');?>	

<?php  include('config.php');?>	            
                                 <?php
                                if(!empty($_SESSION["shopping_cart"])) {
                                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                             ?>
                            <div class="aa-prod-view-bottom">
                              <a href="insertcart.php" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                            <?php
                            $result = mysqli_query($con,"SELECT * FROM `products`");
                          while($row = mysqli_fetch_assoc($result)){
                              echo "<div class='product_wrapper'>
                              <form method='post' action=''>
                              <input type='hidden' name='code' value=".$row['id']." />
                              <div class='image'><img src='".$row['image']."' /></div>
                              <div class='name'>".$row['name']."</div>
                              <div class='price'>$".$row['price']."</div>
                              <button type='submit' class='buy'>Buy Now</button>
                              </form>
                              </div>";
                                  }
                          mysqli_close($con);
                          ?>
                          
                          <div style="clear:both;"></div>
                          
                          <div class="message_box" style="margin:10px 0px;">
                          <?php echo $status; ?>
                          <?php
                                if(!empty($_SESSION["shopping_cart"])) {
                                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                             ?>
                            <div class="aa-prod-view-bottom">
                              <a href="insertcart.php" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                            <?php
                            $result = mysqli_query($con,"SELECT * FROM `products`");
                          while($row = mysqli_fetch_assoc($result)){
                              echo "<div class='product_wrapper'>
                              <form method='post' action=''>
                              <input type='hidden' name='code' value=".$row['id']." />
                              <div class='image'><img src='".$row['image']."' /></div>
                              <div class='name'>".$row['name']."</div>
                              <div class='price'>$".$row['price']."</div>
                              <button type='submit' class='buy'>Buy Now</button>
                              </form>
                              </div>";
                                  }
                          mysqli_close($con);
                          ?>
                          
                          <div style="clear:both;"></div>
                          
                          <div class="message_box" style="margin:10px 0px;">
                          <?php echo $status; ?>
                          
                          <?php  include('footer.php');?>	