<?php
if(isset($_GET['u']) && isset($_GET['c'])){
    $u=trim($_GET['u']); $c=trim($_GET['c']);
}
else{
header("Location: https://babba.com.ng/LogIn/");
die();

}
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
            
          
          </ul>

        </div>

      </div>


		</nav>

	
       <div class='container  my-3' align='center'>
      <img src="https://babba.com.ng/assets/babba-logo.png" class='img-responsive' height="50" alt="babba logo">
  <form id='resetpw' class='py-5 px-3 mx-2 white z-depth-1'>
      <div class='form-group my-2'>
          <label>New Password</label>
          <input type='password' name='reset_pw' id='fp' class='form-control' minlength="7" required />
         
          
      </div>
      
       <div class='form-group my-2'>
          <label>Confirm New Password</label>
          <input type='password' name='reset_pw' id='sp' class='form-control' minlength="7" required />
         
          
      </div>
      
      <div align='center'>
          <button class='btn btn-rounded theme_color  text-lowercase' type='submit' id='submit'>update password</button>
          
      </div>
  </form>
  
  
    
</div>
   

   
   
   
   
   
   
   
   
   
   <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    $(function(){
       var user_email="<?= $u ?>";var reset_code="<?= $c ?>";
       $('form#resetpw').submit(function(){
         
           var fp=$("input#fp").val();
           var sp=$("input#sp").val();
           
           if(fp !== sp){
               	   Toastify({
  text: "Password do not match!",
  duration: 3000,
  
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right,#eb3349 , #f45c43)",
  stopOnFocus: true, // Prevents dismissing of toast on hover
  onClick: function(){} // Callback after click
}).showToast();

           }else{
                  $('button#submit').prop('disabled', true);
                      $("button#submit").html('<center><i class="fas fa-spinner fa-spin"></i></center>');
               var datastr="fp="+fp+"&sp="+sp+"&u="+user_email+"&c="+reset_code;
               $.ajax({
                   type:'POST',
                   url:'c_reset_pw.php',
                   data:datastr,
                   success:function(data){
                       if(data==1){
                                          	   Toastify({
  text: "Done!",
  duration: 3000,
  
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right,blue , blue)",
  stopOnFocus: true, // Prevents dismissing of toast on hover
  onClick: function(){} // Callback after click
}).showToast();
                           window.location.href='https://babba.com.ng/LogIn'
                       }
                       else{
                           console.log('email/code combo wrong');
                           $('button#submit').prop('disabled', false);
	    $("button#submit").html('update password');
                       }
                   }
                   
                   
                   
               })
           }
           return false;
       }) 
        
    });
</script>

   </body>
   </html>