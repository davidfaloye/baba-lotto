<?php
header("Location: https://babba.com.ng/Logout/");
die();
// session_start();

// if(isset($_SESSION['babba_user_id']) && !empty($_SESSION['babba_user_id'])){

// $babba_user_id=$_SESSION['babba_user_id'];
// $babba_user_email=$_SESSION['babba_user_email'];

// }
// else{
// header("Location: https://babba.com.ng/Logout/");
// die();
// }
// require_once $_SERVER['DOCUMENT_ROOT'] .'/me/me.php'; 


// $me=new Me($babba_user_id);
// $wallet=number_format($me->wallet);
// $name=$me->fname;
?>
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
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
body{
    height:100vh;
    font-family:'Open Sans' !important;
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

.circle{
    border:solid 1.45px #F85827; height:60px; width:60px;  border-radius:50%;
    font-weight:bold; font-size:150%;
    color:#000;
}
.circle:hover{
   cursor:pointer; 
}
.selected{
    background-color:#F85827; border:none; color:white; font-weight:bold;
}
/*#start,#close{*/
                
/*                width:210px;*/
/*                line-height:auto;  */
 
/*                transform: rotate(45deg);*/
/*                border-radius:10px;*/
/*                position:static;*/
/*            }*/
/*.stay{*/
/*     transform: rotate(-45deg);color:white;*/
/*     height:210px;*/
/*}*/

.orange-text{
    color:#F85827 !important;
}

            .nav-link{
                font-weight:bold;
            }
            td{
                color:#2e2e2e !important;
                font-weight:bold !important;
            }
        </style>
 </head>
 <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '589450828601545');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=589450828601545&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
 
  <body >

	
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
          <ul class="navbar-nav mr-auto">
               <li class="nav-item">
              <a class="nav-link waves-effect">
               Hello, <?= $name ?>
              </a>
            </li> 
            
            <li class="nav-item">
              <a class="nav-link  waves-effect mr-2 font-weight-bold">
       Wallet: &#8358;<?= $wallet ?>
              </a>
              
            
            </li>
             
             
            <li class="nav-item">
              <a  class="nav-link waves-effect border border-light rounded mr-2" href="https://babba.com.ng/me/deposit">
                Deposit
              </a>
            </li>
     
            <li class="nav-item">
              <a  class="nav-link waves-effect border border-light rounded mr-2 " href="https://babba.com.ng/me/withdraw">
                Withdraw
              </a>
            </li>
          </ul>
 
          <!-- Right -->
          <ul class="navbar-nav">
               <li class="nav-item">
              <a href="https://babba.com.ng/me/" class="nav-link waves-effect">
                <i class="fas fa-th-large orange-text px-1"></i>Play
              </a>
            </li> 
            
             <li class="nav-item">
              <a href="https://babba.com.ng/me/profile/" class="nav-link waves-effect">
                <i class="far fa-user orange-text px-1"></i>Profile
              </a>
            </li> 
            
            
            <li class="nav-item">
              <a id='tickets' class="nav-link waves-effect">
          <i class="fas fa-clipboard-list orange-text px-1"></i>My tickets
              </a>
            </li> 
            
            
             <li class="nav-item">
              <a href="https://babba.com.ng/results/" target='_blank' class="nav-link waves-effect">
                <i class="fas fa-poll-h orange-text px-1"></i>Results
              </a>
            </li> 
            
            <li class="nav-item">
              <a href="https://babba.com.ng/Logout/" class="nav-link waves-effect">
                  <i class="fas fa-sign-out-alt orange-text px-1"></i>Log out
              </a>
            </li> 
          
          </ul>

        </div>

      </div>


		</nav>
