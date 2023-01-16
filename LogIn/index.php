<?php
header("Location: https://babba.com.ng/index.html");
die();
// session_start();

// if(isset($_SESSION['babba_user_email']) && !empty($_SESSION['babba_user_email'])){

// header("Location: https://babba.com.ng/me/");
// die();

// }
?>
<!doctype html>
<html lang="en">
    
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       

       
       
 <title>
            Babba Lotto
        </title>
  <link rel="icon" href="https://babba.com.ng/assets/babba-favicon.png" type="image/png" sizes="50x50">
        <meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=yes' />
        <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
 
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<style>
    @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
    body{
          height:100vh;  
    }

.btn-rounded{
    border-radius: 10em;
}
.theme_color{
      background-color: #FF6652;
 color:white !important;
}

.txt_color{
    color:#636363 !important;
}
 .img-fit{
       
        height:150px !important;
        max-height:150px !important;
        width:auto;
    }
.cover_photo{
    width:50%;
    max-height:300px !important;
}
.ad_dim{
     height:285px !important;
    width:50%;
   
}
@media screen and (max-width: 960px) {
.cover_photo{
    width:100%;
    max-height:225px !important;
}
.ad_dim{
    height:30% !important;
    width:64%;
}
}

@media only screen and (min-width: 600px) { 
        .img-fit{
       
        height:300px !important;
        max-height:300px !important;
    }
         .title{

    font-size:100px;

}  
    }


#overlay{
    position:fixed;
    top:0;
    bottom:0;
    width:100vw;
    height:100vh;
    background:rgba(255,255,255,0.5);
    z-index:999;
}

.loader.awesome-spin {
    position:absolute;
    top:45%;
    width:10%;
    height:10%;
    transform-origin: center center;
    border: var(--line-width, 2px) solid var(--loader-color-secondary, #F85827);
    border-right-color: var(--loader-color-primary, transparent);
    width: var(--loader-width, 50px);
    height: var(--loader-height, 50px);
    border-radius: 50%;
    animation: circle-loader var(--animation-duration, 1s) infinite ease-out;
  }
  
@keyframes circle-loader {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@-webkit-keyframes blinker {
  from {opacity: 1.0;}
  to {opacity: 0.0;}
}
.blink{
	text-decoration: blink;
	-webkit-animation-name: blinker;
	-webkit-animation-duration: 0.6s;
	-webkit-animation-iteration-count:infinite;
	-webkit-animation-timing-function:ease-in-out;
	-webkit-animation-direction: alternate;
}



.orange-text{
    color:#F85827 !important;
}
 .nav-link{
                font-weight:bold;
            }
</style>
 </head>
 
  <body>

		<nav class="navbar navbar-light white  sticky-top navbar-expand-lg navbar-light white scrolling-navbar">

    <div class="container-fluid">

        <!-- Brand -->

          <a class="navbar-brand waves-effect" href="#">
      <img src="https://babba.com.ng/assets/babba-logo.png" height="30" alt="babba logo">
    </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i id="navbar-icon" class="fas fa-bars"></i>

        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
   
 
          <!-- Right -->
          <ul class="navbar-nav">
               <li class="nav-item">
              <a href="https://babba.com.ng/me/" class="nav-link waves-effect">
                <i class="fas fa-th-large orange-text px-1"></i>Play
              </a>
            </li> 
            
               <li class="nav-item">
              <a href="https://babba.com.ng/results/" class="nav-link waves-effect">
                <i class="fas fa-poll-h orange-text px-1"></i>Results
              </a>
            </li> 
            
            <li class="nav-item">
              <a href="https://help.babba.com.ng" class="nav-link waves-effect">
               <i class="fas fa-question-circle orange-text px-1"></i>Help Centre
              </a>
            </li> 
          
          </ul>

        </div>

      </div>


		</nav>

	

  <div class="container pt-3 d-flex flex-column justify-content-center align-items-center">
      <img src="https://babba.com.ng/assets/babba-logo.png" class='img-responsive' height="50" alt="babba logo">
<?php
include $_SERVER['DOCUMENT_ROOT'] .'/assets/carousel.php';
?>
 <div class=''>
    <!--Section: Content-->
    <section class="px-md-5 mx-md-5  mt-2 text-center text-lg-left dark-grey-text">


      <!--Grid row-->
      <div class="row d-flex justify-content-center mt-3">

        <!--Grid column-->
        <div class="col-md-12 text-center" >
<p><h4 class='font-weight-bold'>Log In</h4></p>
          <!-- Default form register -->
          <form class="text-center" id="login">

            <div class="form-row mb-4">
              <div class="col-md-12">
                  <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name='email' required>
              </div>
              <div class="col-md-12">
                <!-- Password -->
            <input type="password" id="password" class="form-control mb-4" placeholder="Password" minlength='7'
              aria-describedby="defaultRegisterFormPasswordHelpBlock1" name='password' required>
              </div>
            </div>


          
            
            <div class='form-group'>
            <!-- Sign up button -->
            <button id='login' class="btn btn-info my-2 btn-block orange darken-3" type="submit">Log in</button>
  <a  class="forgot_password text-primary"><span  data-toggle="modal" data-target="#forgot_password_modal" style='cursor:pointer;'>Forgot your password?</span></a>
</div>

  <p>
              <em>don't have an account?</em>
              <a href="https://babba.com.ng/SignUp/">Sign Up</a>

          </form>
          <!-- Default form register -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->


    </section>
    <!--Section: Content-->

      </div>  
    </div>
    
    

<!-- Modal -->
<div class="modal fade" id="forgot_password_modal" tabindex="-1" role="dialog" aria-labelledby="forgot_password_modal_"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header orange darken-3">
        <h5 class="modal-title" id="forgot_password_modal_"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5" align='center' id='response'>

        <form id='fp_form'>
            <div class='form-group w-200 mt-3'>
                <input type='email' name='fp_email' id='fp_email' placeholder='Email address' class='form-control' required />
            </div>
            <div>
                <button type='submit' class='btn orange darken-3 white-text' id='fp_submit'>submit</button>
            </div>
        </form>
       
      </div>
    
    </div>
  </div>
</div>
 
    
    
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/tails.php'; ?>

          <script type='text/javascript'>
             $(function(){
                    $("form#login").submit(function(){

       $('button#login').prop('disabled', true);

                   
      var formData = new FormData(this);

 $.ajax({
                type: "POST",
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
			    url: 'c-login.php',
				data: formData,
			async:true,
			success: function (data) {
	
	if(data==1){
	    window.location.href="https://babba.com.ng/me";
	}else{      
		   Toastify({
  text: "Invalid login details...",
  duration: 3000,
  
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right,#eb3349 , #f45c43)",
  stopOnFocus: true, // Prevents dismissing of toast on hover
  onClick: function(){} // Callback after click
}).showToast();

	 $('button#login').prop('disabled', false);
	}
			},
    });
                
   
       return false;
                 }); 
                 
                 
                 
                              $("form#fp_form").submit(function(){
                      $('#fp_submit').attr('disabled',true);
                      var fp_email=$('input#fp_email').val();
                      fp_email=fp_email.trim();
                      var datastring='email='+fp_email;
                      $.ajax({
                          type:'POST',
                          url:'c_forgot_password.php',
                          data:datastring,
                          success:function(data){
                            
                              $('#response').html('If an account exists for '+fp_email+', you will receive a password reset link.');
                              $('#fp_submit').attr('disabled',false);
                              $('input#fp_email').val('')
                               
                             
                          }
                      })
                      
                      return false;
                  })
                  
                  
               
             });
             </script>

    </body>
    </html>