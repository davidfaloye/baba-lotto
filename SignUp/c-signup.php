<?php
//session_start();
require_once 'm-signup.php'; 



if(isset($_POST['email']) && !empty($_POST['email'])){
    
    $fname=trim($_POST['firstname']);
    $lname=trim($_POST['lastname']);
    $email=trim($_POST['email']);
    $pword1=trim($_POST['password1']);
    $pword2=trim($_POST['password2']);
    $mobile=trim($_POST['mobile']);
    if($pword1!==$pword2){
        echo 'passwords do not match!';
        exit();
    }
    
$signup_data=array($fname,$lname,$email,$mobile,$pword1);

$new_user=new SignUp();

$res=$new_user->sign_up($signup_data);
 if($res=='Duplicity'){
   echo  $new_user->error[0];
      
 }
else{
    $new_user->send_mail($email);
   // $_SESSION['babba_user_id']=md5($email.time());
    echo true;
   
}
}




?>
