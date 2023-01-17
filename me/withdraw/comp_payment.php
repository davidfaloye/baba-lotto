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
      $amount=str_replace(",","",$amount);
      
      
      if($wallet > $amount){
      
      
      $name=trim($_POST['account_name']);
      $acc_no=trim($_POST['account_no']);
      $bank_code=trim($_POST['bank_code']);

      $amountik=$amount * 100;
  $fields = [
    'type' => "nuban",
    'name' => $name,
    'account_number' => $acc_no,
    'bank_code' => $bank_code,
    'currency' => "NGN"
  ];
  $fields_string = http_build_query($fields);
  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_live_5092cafc848399730244f66df2b3b42a7e353f9d",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
  $result=json_decode($result);
  $recipient_code=$result->data->recipient_code;
$msgx=$result->message;

  if($msgx=="Transfer recipient created successfully"){
 
  $url2 = "https://api.paystack.co/transfer";
  $fields2 = [
    'source' => "balance",
    'amount' => $amountik,
    'recipient' => $recipient_code,
    'reason' => "Babba Funds Payout"
  ];
  $fields_string2 = http_build_query($fields2);
  
  //open connection
  $ch2 = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch2,CURLOPT_URL, $url2);
  curl_setopt($ch2,CURLOPT_POST, true);
  curl_setopt($ch2,CURLOPT_POSTFIELDS, $fields_string2);
  curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_live_5092cafc848399730244f66df2b3b42a7e353f9d",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch2,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result2 = curl_exec($ch2);
  $result2=json_decode($result2);
  
    $status=$result2->message;
    
    if($status=="Transfer has been queued"){
    $reference=$result2->data->reference;
    $me->withdraw_funds($amount,$babba_user_email,$reference);
}
  

  
  echo $status;
  
  
  }else{
      echo "unsuccessful please try again.";
  }
  
  
  
  
  
      }else{
         echo "insufficient funds!"; 
          
      }
  
  
  
  
  
  
  
  }
  
}else{
    echo "an error occured! logout and try again.";
}
?>
