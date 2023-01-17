<?php
session_start();
if(isset($_SESSION['babba_user_id']) && !empty($_SESSION['babba_user_id'])){
$babba_user_email=$_SESSION['babba_user_email'];


$curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/customer/$babba_user_email",
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
  
  $responsex = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
    $responsex=json_decode($responsex);
    if($responsex->status==true){
  $user_idx=$responsex->data->id;

  
  
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction?customer=$user_idx",
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
    $history=$response->data;
$status=$response->status;
if($status == true){
        ?>
        <div class='table-responsive'>
        <table class='table'>
            <thead>
                <tr><th>Date</th><th>Amount</th><th>Payment Channel</th><th>Status</th></tr>
            </thead>
            <tbody>
    <?php
        foreach($history as $val){?>
          <tr>
              <td><?= $val->created_at ?></td>
               <td><?= "&#8358;".number_format($val->amount/100) ?></td>
                <td><?= $val->channel ?></td>
                 <td><?= $val->status ?></td>
          </tr>        
                  
                  
                 
    <?php
  }
  ?>
  
            </tbody>
        </table>
        </div>
        
        <?php
}else{
    ?>
      <p><h4><i class="fas fa-quote-left pr-2"></i>No transactions found!</h4></p>
    
    <?php
}
 }
    }else{
        ?>
      <p><h4><i class="fas fa-quote-left pr-2"></i>No transactions found!</h4></p>
    
    <?php
    }
}
?>
