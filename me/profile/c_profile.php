<?php
session_start();
if(isset($_SESSION['babba_user_id']) && !empty($_SESSION['babba_user_id'])){
    $babba_id=$_SESSION['babba_user_id'];
require '../me.php';
if(isset($_POST['formdata'])){
$formdata=$_POST['formdata'];

$pword1=$formdata[4];$pword2=$formdata[5];
if($pword1 === $pword2){




$me=new Me($babba_id);
$update_profile=$me->edit_user_profile($formdata);

  if($update_profile){
      echo true;
  }else{
      echo false;
  }
  
}else{
    echo "passwords do not match!";exit();
}

}else{
    echo false;
}
}else{
    header("Location: https://babba.com.ng/Logout/");
die();

}
?>
