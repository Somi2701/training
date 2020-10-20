<?php 
        include("header.php");
       include("sidebar.php");
	   include("config.php");
	   
       global $number_of_pages;
       ?>

      <div id="main-content"> <!-- Main Content Section with everything -->

      <noscript> <!-- Show a notification if the user has disabled javascript -->
      <div class="notification error png_bg">
        <div>
          Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
        </div>
      </div>
      </noscript>

      <!-- Page Head -->
      <h2>Welcome Admin</h2>
      <p id="page-intro">What would you like to do?</p>
        
      <div class="content-box-content">
      
         <div id="show">
      <div class="clear"></div> <!-- End .clear -->

      <div class="content-box"><!-- Start Content Box -->

      <div class="content-box-header">

      <h3>User Details</h3>

      <ul class="content-box-tabs">
        <li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
      </ul>

      <div class="clear"></div>

      </div> <!-- End .content-box-header -->

      <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
        
        <div class="notification attention png_bg">
          <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
          <div>
            This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
          </div>
        </div>
        
       <?php
            global $number_of_pages;
            $result_per_page =5;
            $sq="SELECT * FROM users";
        
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
            
            $sql="SELECT * FROM users LIMIT {$this_page_first_result}, {$result_per_page}";
            $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
            $output = "";
            if (mysqli_num_rows($result) > 0 ) {
               
      ?>
        <table>
          
          <thead>
            <tr>
                <th><input class="check-all" type="checkbox" /></th>
                <th>User Id</th>
                <th>User Email</th>
                <th>User Name</th>
                <th></th>
                <th>User Password</th>
                <th></th>
                <th>User DOB</th>
                <th>User Address</th>
                <th>Action</th>
               <!--  <th width="200px">User Email</th> -->
                

            </tr>
            
          </thead>
          <tfoot>
            <tr>
              <td colspan="6">
                <div class="bulk-actions align-left">
                  <select name="dropdown">
                    <option value="option1">Choose an action...</option>
                    <option value="option2">Edit</option>
                    <option value="option3">Delete</option>
                  </select>
                  <a class="button" href="#">Apply to selected</a>
                </div>
                
                <div class="pagination">
                  <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
                  <?php
                    for ($i=1;$i<=$number_of_pages;$i++) {
                      ?>
                      <a href="users.php?page=<?php echo $i ?>" class="number" title="1"><?php echo $i ?></a>
                      <?php
                    }
                  ?>
                  <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
                </div> <!-- End .pagination -->
                <div class="clear"></div>
              </td>
            </tr>
          </tfoot>
        
          
          <tbody>
          <?php
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
            <tr>
              <td><input type="checkbox" /></td>
              <td><?php echo $row["uid"] ?></td>
              <td><a href="#" title="title"><?php echo $row["uemail"] ?></a></td>
              <td><?php echo $row["uname"] ?><td>
              <td><?php echo $row["upassword"] ?><td>
              <td><?php echo $row["dob"] ?></td>
              <td><?php echo $row["address"] ?></td>
              <td>    
                  <a href="" class="edit" data-uid="<?php echo $row["uid"] ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
                  <a href="?id=<?php echo $row["uid"] ?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
              </td>
            </tr>
            <?php
              }
            }
            if (isset($_GET['id'])) {
              $p_id = $_GET["id"];
              $sql1='DELETE FROM users WHERE `uid` = "'.$p_id.'"';
              if (mysqli_query($conn, $sql1)) {
                echo '<script>alert("successfully deleted")</script>';
              }
            }
            ?>
         
          </tbody>
          
        </table>
        
      </div> <!-- End #tab1 -->

     

      </div> <!-- End .content-box-content -->

      </div> <!-- End .content-box -->
    
      <div class="clear"></div>

          </div>
      <!-- Start Notifications -->

      <!--<div class="notification attention png_bg">
      <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div>
      Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
      </div>
      </div>
      <div class="notification information png_bg">
      <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div>
      Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
      </div>
      </div>
      <div class="notification success png_bg">
      <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div>
      Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
      </div>
      </div>
      <div class="notification error png_bg">
      <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div>
      Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
      </div>
      </div>-->

      <!-- End Notifications -->

      <?php require "footer.php";?>
      <script>
         $(document).ready(function(){
          $(document).on("click",".edit", function(e){
            e.preventDefault();
                $("#show").hide();
                $("#modal").show();
                $("#close-btn").show();
                $("h2").show();
                var uid = $(this).data("uid");
                    //alert(eid);
                $.ajax({
                    url: "userupdateform.php",
                    type: "POST",
                    data: {id: uid},
                    success: function(data) {
                        //alert(data);
                    $("#modal-form table").html(data);
                    }
                })
                });
                //Hide Modal Box
                $("#close-btn").click(function(){
                  
                    $("#modal-form").hide();
                    setTimeout(function(){
                        window.location=window.location
                      },100);
                });
                //Save Update Form
                $(document).on("click","#edit-submit", function(e){
                  e.preventDefault();
                  //$("#modal-form").toggle();
                  var id = $("#editid").val();
                  var name = $("#editname").val();
                  var email = $("#editemail").val();
                  var password = $("#editpassword").val();
                  var dob = $("#editdob").val();
                  var address = $("#editaddress").val();
                  
                  $.ajax({
                  url: "updateuser.php",
                  type : "POST",
                  data : {id: id, name: name, email: email, password: password, dob: dob, address: address},
                  success: function(data) {
                    if(data == 1){
                      alert("successfully updated");
                      setTimeout(function(){
                        window.location=window.location
                      },100);
                       
                    }
                  }
                });
        });
         });
    
      </script>
      <div id="#modal">
            <div id="modal-form">
              <h2>Edit Form</h2>
            <div id="close-btn">X</div>
            <table cellpadding="10px" width="100%">
            </table>
         </div>
