<?php
header("Location: https://babba.com.ng/index.html");
die();
// require 'results.php';
// $babba=new results();
// $results=json_decode($babba->get_all());
?>
<!doctype html>
<html lang="en">
<head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       

       
       
 <title>
            Babba Lotto
        </title>
  <link rel="icon" href="https://babba.com.ng/assets/babba-favicon.png" type="image/png" sizes="50x50">
        <meta name='viewport' content='width=device-width, initial-scale=.8, user-scalable=no' />
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


.circle{
    border:solid 1.45px #F85827; height:50px; width:50px;  border-radius:50%;
    font-weight:bold; font-size:100%;
    color:#000;
}
.circle:hover{
   cursor:pointer; 
}
.selected{
    background-color:#F85827; border:none; color:white; font-weight:bold;
}

.orange-text{
    color:#F85827 !important;
}

            .nav-link{
                font-weight:bold;
            }
            td,th{
                color:#2e2e2e !important;
                font-weight:bold !important;
            }
        </style>
 </head>
 
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






        
        <div class="container-fluid my-3">
            <div class='mdb-color d-flex flex-column justify-content-around align-items-center mb-4 py-3' >
            <div><h1 class='white-text'>Results</h1></div>
                <div >
                      <form class="my-2 d-flex flex-row justify-content-center align-items-center" id='search_form' >
                          <div class='form-group'>

    <input  type="date" class="form-control" placeholder='search' id='search' required /></div>
   <div class='form-group'> <button class="btn btn-outline-white btn-md my-2 " type="submit">Search</button></div>
  </form>
                </div>
            </div>
            
            <div align='center' id="results">
                <?php
                if(empty($results)){
                    ?>
                    <div><h3 class='grey-text'>No results found</h3></div>
                    
                    <?php
                }else{
                ?>
         <div class='table-responsive'>
             <table class='table'>
                 <thead>
                     <tr class='font-weight-bold text-center'><th class=''>Draw Date & Time</th><th>Draw Result</th></tr>
                 </thead>
                 <tbody>
                     <?php
                     foreach($results as $val){
                         ?>
                         
                         <tr>
                        <td class='d-flex flex-column justify-content-center align-items-center'>
                        <div><?= $val->date_x ?></div>
                        <div><?= $val->time_x ?></div> 
                        </td>
                        <td>
                        <div class='row d-flex justify-content-center align-items-center' >
                        <div class='col-auto mx-2 number p-2 circle selected m-0 d-flex align-items-center justify-content-center'><?= $val->num1 ?></div>
                         <div class='col-auto mx-2 number p-2 circle selected m-0 d-flex align-items-center justify-content-center'><?= $val->num2 ?></div>
                          <div class='col-auto mx-2 number p-2 circle selected m-0 d-flex align-items-center justify-content-center'><?= $val->num3 ?></div>
                           <div class='col-auto mx-2 number p-2 circle selected m-0 d-flex align-items-center justify-content-center'><?= $val->num4 ?></div>
                            <div class='col-auto mx-2 number p-2 circle selected m-0 d-flex align-items-center justify-content-center'><?= $val->num5 ?></div>
                        </div>
                        </td>
                        </tr>
                         
                         <?php
                     }
                     
                     
                     ?>
                 </tbody>
             </table>
         </div>
         <?php
                }
                
        ?>
         
         </div>   
            
            
            


</div>









    </body>
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/tails.php'; ?>

<script>
    $(function(){
       $("form#search_form").submit(function(){
           
           var date_x=$("input#search").val();
           var str="date_x="+date_x;
           $.ajax({
               url:'get_results.php',
               type:"POST",
               data:str,
               success:function(data){
                   $("div#results").html(data);
               }
               
           });
           
           return false;
       });
        
        
    });
</script>

    </body>
    </html>
