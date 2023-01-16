<?php
require_once 'm-signup.php';  
if(isset($_GET['ac']) && isset($_GET['pl'])){
    $email=trim($_GET['pl']); $code=trim($_GET['ac']);
$activate=new ActivatePlayer();
$check=$activate->check($email,$code);
if($check){
$activate->activate($email);

?>
<!doctype html>
<html lang="en">
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/heads.php'; ?>
<div class='container my-5 ' align=center>
    <i class='fas fa-check fa-3x mb-3 text-success animated rotateIn'></i>"<br>
<p>Your account has been activated!</p>
<hr/>
<div>
    <a href='htps://babba.com.ng/me/'><button class='btn btn-lg blue darken-3  white-text btn-rounded'>
        Go to Dashboard
    </button></a>
</div>
</div>

    
    
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/tails.php'; ?>
        
        
        
    </body>
    </html>
<?php
}else{
  echo "oops! something went wrong.";  
}
    
    
    
}else{
    
}






?>
