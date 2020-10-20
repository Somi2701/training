<?php include('header.php');?>
     <?php include('sidebar.php');?> 
	 <?php include('config.php');?> 
		
	 <?php 
                               $sql1="SELECT * FROM categories";
                               $result1=mysqli_query($conn, $sql1) or die("Query Unsuccessful.");
                               while ($row1=mysqli_fetch_assoc($result1)) {
                                   ?>
                                 <option value="<?php echo $row1['cname'];?>">
                                   <?php echo $row['cname']?></option>
                                   <?php 
                               } ?>   
                         
					
	 <div id="main-content"> <!-- Main Content Section with everything -->

        <noscript> <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
  <div>
	   Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
  </div>
</div>
</noscript>

<!-- Page Head -->
<h2>Welcome </h2>
<p id="page-intro">What would you like to do?</p>

<div class="clear"></div> <!-- End .clear -->

<div class="content-box"><!-- Start Content Box -->

<div class="content-box-header">

<h3>categories</h3>

<ul class="content-box-tabs">
  <li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
  <li><a href="#tab2">Add Products</a></li>
</ul>

<div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

<div class="tab-content default-tab" id="tab1"> 
<!-- This is the target div. id must match the href of this div's tab -->
</div> <!-- End #tab1 -->

          <div class="tab-content" id="tab2">
							<form action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <p>
                        <label>Name</label>
                        <input class="text-input small-input" type="text" id="small-input" name="name" value="" /> <!-- Classes for input-notification: success, error, information, attention -->
                        <br /><small>A small description of the field</small>
                    </p>
					<p>
                        <input class="button" type="submit" value="Submit" name="submit" />
                    </p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
		
			
			<script>
      $(document).ready(function(){
        function loadTable(){
          $.ajax({
            url : "displaycat.php",
            type : "POST",
            success : function(data){
              $("#show").html(data);
              }
            });
        }
        loadTable(); 
        $('#save').on('click', function(e){
          e.preventDefault();
          var name = $("#name").val();
          $.ajax({
            url: "insertcat.php",
            type : "POST",
            data : {sname:name},
            success : function(data){
            alert(data);
            //console.log(data);
            if(data == 1){
              loadTable();
              alert("Successfully Added");  
            } else {
              alert("failed");
            }
            }
          });
        });
        loadTable(); 
        $(document).on("click",".delete", function(){
                //e.preventDefault();
                var name = $(this).data('id');
                
                if(confirm("Are you sure?")) {
                    $.ajax({
                    url: "deletecat.php",
                    type : "POST",
                    data : {sid:name},
                    success : function(data){
                      loadTable();
                    if(data == 1){
                    alert("Successfully Deleted");  
                    } else {
                    alert("failed");
                    }
                }
                });
                }
                });
                //Show Modal Box
                $(document).on("click",".edit", function(){
                  $("#show").toggle();
                $("#modal").show();
                //$("#show").hide();

                $("#close-btn").show();
                $("h2").show();
                var eid = $(this).data("eid");
                    //alert(eid);
                $.ajax({
                    url: "update1cat.php",
                    type: "POST",
                    data: {id: eid},
                    success: function(data) {
                        //alert(data);
                    $("#modal-form table").html(data);
                    }
                })
                });
                //Hide Modal Box
                $("#close-btn").click(function(){
                    $("#modal-form").hide();
                });
                //Save Update Form
                $(document).on("click","#edit-submit", function(e){
                  e.preventDefault();
                  //$("#modal-form").toggle();
                  var id = $("#editid").val();
                  var name = $("#editname").val();
                  $.ajax({
                  url: "updatecat.php",
                  type : "POST",
                  data : {id: id, name: name},
                  success: function(data) {
                    if(data == 1){
                      //$("#modal-form").hide();
                      //$("#show").show();
                      //loadTable();
                        alert("successfully updated");
                        //$("#modal").hide();
                    }
                  }
                });
                //$("#show").show();
                loadTable();
                $("#show").show();
        });
       
      });
  </script>
</body>
</html>

			
			<!-- Start Notifications -->
			<!--
			<div class="notification attention png_bg">
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
			</div>
			
			<!-- End Notifications -->
	
			<?php include('footer.php');?>
