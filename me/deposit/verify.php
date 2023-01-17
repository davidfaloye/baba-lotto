<?php

require_once $_SERVER['DOCUMENT_ROOT'] .'/me/me.php';

    
    $ref=$_POST['reference'];
     $babba_id=$_POST['babbaid'];
$me=new Me($babba_id);
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_live_5092cafc848399730244f66df2b3b42a7e353f9d",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
      $res=json_decode($response);
      if($res->data->status=="success"){
    $res_amount=$res->data->amount;
    $res_email=$res->data->customer->email;
    $amount=$res_amount/100;
    $done=$me->deposit_funds($amount,$res_email,$ref);
    echo $done;
    
      }else{
          echo $res->data->message;
      }
  }

    
}
else{
    header("Location: https://babba.com.ng/Logout/");
die();

}


?>
