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
        bottom:45%;
        right:45%;
        left:45%;
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

    </style>
</head>
 
<body>
	
	<nav class="navbar navbar-light white  sticky-top">
	<div class=""> 
        <a class="navbar-brand" href="#">
        <img src="https://babba.com.ng/assets/babba-logo.png" height="30" alt="babba logo">
        </a>
	</div>
	</nav>
        
    <div class="container pt-3 ">
 

 
    <!--Section: Content-->
        <section class="px-md-5 mx-md-5  mt-2 text-center text-lg-left dark-grey-text">
            <!--Grid row-->
            <div class="">
                <p class='text-justify'><h2>Click on the link sent to your email to activate your account!</h2></p>
                <a href="https://babba.com.ng/LogIn/" class="btn btn-info my-4 btn-xl orange darken-3" type="submit">Log In</a>
            </div>
        <!--Grid row-->
        </section>
    <!--Section: Content-->

        
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/tails.php'; ?>
        
</body>
</html>
