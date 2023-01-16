<?php
session_start();
require_once 'm-login.php'; 



if(isset($_POST['email'])){

    $email=trim($_POST['email']);
    $pword=trim($_POST['password']);


$_user=new Login($email,$pword);

$res=$_user->exists;
 if($res){
$babba_id=$_user->babba_id;
    $_SESSION['babba_user_email']=$email;
    $_SESSION['babba_user_id']=$babba_id;
    echo true;

      
 }
else{

      echo false;
}
}




?>