
<?php include ('header.php'); 
?>

  <!-- catg header banner section-->
  <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form action="" class="aa-login-form">
                  <label for="">Username or Email address<span>*</span></label>
                   <input type="text" placeholder="Username or email">
                   <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password">
                    <button type="submit" class="aa-browse-btn">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <form action="" class="aa-login-form" method="post">
                    <label for="">Username<span>*</span></label>
                    <input type="text" placeholder="Username" id='name'>
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" id='password'>
                    <label for="">Confirm Password<span>*</span></label>
                    <input type="password" placeholder="Confirm password" id='repassword'>
                    <label for="">Email<span>*</span></label>
                    <input type="email" placeholder="Email" id='email'><br>
                    <label for="">DOB<span>*</span></label>
                    <input type="date" placeholder="Date of Birth" id='dob'><br>
                    <label for="">Address<span>*</span></label>
                    <input type="text" placeholder="Address" id='address'>
                    <button type="submit" class="aa-browse-btn">Register</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

 <?php include('footer.php');?>

 <script>
      $(document).ready(function(){
        $("#register").on("click",function(e){
          e.preventDefault();
         // e.preventDefault();
          var name = $("#name").val();
          var password = $("#password").val();
          var repassword = $("#repassword").val();
          var email = $("#email").val();
          var dob = $("#dob").val();
          var address = $("#address").val();
          $.ajax({
              url: "registrationform.php",
              type : "POST",
              data : {name:name, password: password, repassword: repassword, email: email, dob: dob, address: address},
              success : function(data){
                //alert(data);
                if (data==1) {
                  alert("successfully register");
                } else {
                  alert("failed");
                }
              }
          });
        });
      });
  </script>

 