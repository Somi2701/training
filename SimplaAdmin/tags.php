<?php include("header.php");?>
      <?php include("sidebar.php");?>
      <?php include("config.php");?>

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

      <div class="clear"></div> <!-- End .clear -->

      <div class="content-box"><!-- Start Content Box -->

      <div class="content-box-header">

      <h3>Product Details</h3>

      <ul class="content-box-tabs">
        <li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
        <li><a href="#tab2">Add Tags</a></li>
      </ul>

      <div class="clear"></div>

      </div> <!-- End .content-box-header -->

      <div class="content-box-content">

      <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
        
        <div class="notification attention png_bg">
          <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
          <div>
            This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
          </div>
        </div>
        <div id="#modal">
            <div id="modal-form">
              <h2>Edit Form</h2>
            <div id="close-btn">X</div>
            <table cellpadding="10px" width="100%">
            </table>
         </div>
        </div>
        <div id="show">
          
        </div>
       
      </div> <!-- End #tab1 -->
      <div class="tab-content" id="tab2">

        <form method="post">
          
        <form action="" method="post">
          
          <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            
            <p>
              <label>Product </label>
                <input class="text-input small-input" type="text" id="name" name="name"/> 
                <span class="input-notification success png_bg">Successful message</span> 
                <!-- Classes for input-notification: success, error, information, attention -->
                <br /><small>A small description of the field</small>
            </p>
            <p>
              <input class="button" type="submit" id ="save" value="Submit" name="save"/>
            </p>
            
          </fieldset>
          
          <div class="clear"></div><!-- End .clear -->
          
        </form>
        <?php
    
        ?>
        
      </div> <!-- End #tab2 -->        

      </div> <!-- End .content-box-content -->

      </div> <!-- End .content-box -->
    
      <div class="clear"></div>

    

<?php require "footer.php";?>

  <script>
      $(document).ready(function(){
        function loadTable(){
          $.ajax({
            url : "displaytag.php",
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
            url: "inserttag.php",
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
                //var element=this;
                //alert(name);
                if(confirm("Are you sure?")) {
                    $.ajax({
                    url: "deletetag.php",
                    type : "POST",
                    data : {sid:name},
                    success : function(data){
                      loadTable();
                    //alert(data);
                    //console.log(data);
                    if(data == 1){
                    //$(element).closest("tr").fadeOut();
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
                    url: "updateformtag.php",
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
                  $.ajax({
                  url: "updatetag.php",
                  type : "POST",
                  data : {id: id, name: name},
                  success: function(data) {
                    if(data == 1){
                      alert("successfully updated");
                     // setTimeout(function(){
                       // window.location=window.location
                    //  },100);
                    }
                  }
                });
        });
      });
  </script>
</body>
</html>

