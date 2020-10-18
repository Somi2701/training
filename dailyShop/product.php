<?php require_once 'header.php'; ?>
<?php require_once 'config.php'; ?>

  <!-- / menu -->  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Fashion</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li class="active">Women</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
            <div id="show">
            <div id="hide">
              <ul class="aa-product-catg">
              
                <?php
                $result_per_page =5;
                $sq="SELECT * FROM products";
              
                $res = mysqli_query($conn, $sq) or die("SQL Query Failed.");
                $number_of_results =mysqli_num_rows($res);
                $number_of_pages =ceil($number_of_results / $result_per_page);
                //$page=$_GET['page'];
                if (isset($_GET['page'])) {
                    $page=$_GET['page'];;
                } else {
                    $page=1;
                } 
                $this_page_first_result = ($page-1) * $result_per_page;
                $sql="SELECT * FROM `products` ORDER BY `pid` DESC LIMIT {$this_page_first_result}, {$result_per_page}";
               /*  $sql="SELECT * FROM products"; */

          
                $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
                  if (mysqli_num_rows($result) >0) {
                     while ($row = mysqli_fetch_assoc($result)) {
                          //print_r($row);
                        ?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img src="<?php echo $row["path"] ?>" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="cart.php?id=<?php echo $row["pid"] ?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $row["name"] ?></a></h4>
                      <span class="aa-product-price">$<?php echo $row["price"] ?></span><span class="aa-product-price"><del><?php echo $row["price"] ?></del></span>
                      <p class="aa-product-descrip"><?php echo $row["desc"] ?></p>
                    </figcaption>
                  </figure>                          
                  <div class="aa-product-hvr-content">
                    <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a> -->
                    <a href="" class="one" data-id="<?php echo $row["pid"] ?>" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-hot" href="#">HOT!</span>
                  
                  </li>
                        <?php 
                            }
                          }
                          
                      ?>
            
                      
                      
              </ul> 
              </div>
              </div>
              <!--  view modal// -->      
              <script>
                  $(document).ready(function(){
                    $(document).on("click",".one", function(e){
                      e.preventDefault();
                        var id=$(this).data("id");
                        //alert(id);
                          $.ajax({
                        url: "View.php",
                        type : "POST",
                        data : {id:id},
                        success : function(data){
                         
                        //alert(data);
                        //console.log(data);
                         

                        $("#show1").html(data); 
                    }  
                      });
                });
              });
                          
              </script>
                  <?php
                    $sql4="SELECT * FROM products";
              
                    $result4 = mysqli_query($conn, $sql4) or die("SQL Query Failed.");
                    if (mysqli_num_rows($result4) > 0 ) {
                        while ($row4 = mysqli_fetch_assoc($result4)) {
                            //print_r($row);
                            ?>     
                               
                     <!-- /  view modal --> 
                     <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">       
        <div class="modal-dialog">
          <div class="modal-content">                      
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  
                   <div id="show1"></div>
                   </div>                        
                </div>
                </div>
                </div>
    <?php 
                }
              } 
                ?>  
  </div>
  <div class="aa-product-catg-pagination">
    <nav>
      <ul class="pagination">
        <li>
        <?php if ($page>1) {?>
          <a href="#" aria-label="Previous">Prev
            <span aria-hidden="true">&laquo;</span>
          </a>
          <?php } ?>
        </li>
        <?php
          for ($i=1; $i<=$number_of_pages; $i++) {
              if ($i==$page) {
                  $active='active';
              } else {
                  $active ='';
              }
              ?>
                <li <?php echo $active ?>><a href="product.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
              <?php 
            }
          ?>
          <li>
          <?php if ($number_of_pages>$page) {?>
            <a href="#" aria-label="Next">Next
            <span aria-hidden="true">&raquo;</span>
            <?php } ?>
          </a>
        </li>
      </ul>
    </nav>
  </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
              <?php 
                $sql2="SELECT * FROM categories";
                $result2=mysqli_query($conn, $sql2) or die("Query Unsuccessful.");

                while ($row2=mysqli_fetch_assoc($result2)) {
                    ?>
                    <li><a class ="cat" href="" data-id="<?php echo $row2['cname'] ?>" ><?php echo $row2['cname'] ?></a></li> 
                    
                <?php } ?>
                <li><a href="" id="cat1">Show All</a></li>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
              <?php 
                $sql3="SELECT * FROM tags";
                $result3=mysqli_query($conn, $sql3) or die("Query Unsuccessful.");
                while ($row3=mysqli_fetch_assoc($result3)) {
                    ?>
                    <a class="tags" href="#" data-id="<?php echo $row3['tname']?>"><?php echo $row3['tname'] ?></a>
                <?php } ?>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="submit">Filter</button>
               </form>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                  <a class="aa-color-green" href="#"></a>
                  <a class="aa-color-yellow" href="#"></a>
                  <a class="aa-color-pink" href="#"></a>
                  <a class="aa-color-purple" href="#"></a>
                  <a class="aa-color-blue" href="#"></a>
                  <a class="aa-color-orange" href="#"></a>
                  <a class="aa-color-gray" href="#"></a>
                  <a class="aa-color-black" href="#"></a>
                  <a class="aa-color-white" href="#"></a>
                  <a class="aa-color-cyan" href="#"></a>
                  <a class="aa-color-olive" href="#"></a>
                  <a class="aa-color-orchid" href="#"></a>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->
  <script>
$(document).ready(function(){
    $(document).on("click",".cat", function(e){
      e.preventDefault();
        var name = $(this).data('id');
        //alert(name);
        $.ajax({
            url: "cartadd.php",
            type: "POST",
            data: {id: name},
            success: function(data) {
                //alert(data);
            $("#hide").hide();
            $("#show").html(data);
            }
        });
        $(document).on("click",".cat", function(e){
          e.preventDefault();
            $("#hide").shows();
            $("#show").hide();
        });
    });
    $(document).on("click",".tags", function(e){
      e.preventDefault();
      var name1 = $(this).data('id');
      //var n=unserialize(name1);
      alert(name1);
    // $.ajax({
          // url: "tagload.php",
           // type: "POST",
           // data: {id1: name1},
           // success: function(data) {
                //alert(data);
           // $("#hide").hide();
           // $("#show").html(data);
            }
        });
        $(document).on("click",".tags", function(e){
          e.preventDefault();
            $("#hide").shows();
            $("#show").hide();
        });
    });
});

</script>
<?php require_once 'footer.php' ?>
