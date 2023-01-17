<?php

if(isset($_POST['account_no']) && isset($_POST['bank_code'])){
    $account_no=$_POST['account_no'];
    $bank_code=$_POST['bank_code'];  

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=$account_no&bank_code=$bank_code",
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
    $response=json_decode($response);
    if($response->message=="Account number resolved"){
  echo strtoupper($response->data->account_name);
}else{
    echo "unresolved";
}
        
    }
}
else{
    echo "please submit correct info.";
}

?>
