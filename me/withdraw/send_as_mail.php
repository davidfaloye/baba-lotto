<?php
session_start();
if(isset($_SESSION['babba_user_id']) && !empty($_SESSION['babba_user_id'])){
    $babba_id=$_SESSION['babba_user_id'];
    $babba_user_email=$_SESSION['babba_user_email'];
  if(isset($_POST['account_no'])){
      
      
$url = "https://api.paystack.co/transferrecipient";
 require_once $_SERVER['DOCUMENT_ROOT'] .'/me/me.php';
    $me=new Me($babba_id);
    $wallet=$me->wallet;
          $amount=trim($_POST['amount']);
      $amountx=str_replace(",","",$amount);
      
      
      if($wallet > $amountx){
      

      $name=trim($_POST['account_name']);
      $acc_no=trim($_POST['account_no']);
       $bank_name=trim($_POST['bank_name']);
       
$to = "payout@babba.com.ng";
$subject = "Withdrawal Request from ".$babba_user_email;
$txt = "N".$amount."-".$name."-".$acc_no."-".$bank_name;
$headers = "From: webmaster@example.com";
$reference=md5($txt);
$me->withdraw_funds($amountx,$babba_user_email,$reference);
if(mail($to,$subject,$txt,$headers)){
    echo "Success! Your transfer has been queued.";
}
       
       
       
       
       
       
      }else if($amount >= $wallet){
         echo "insufficient funds!"; 
          
      }
       
       
  }
  
  
  
}

?>
