<!doctype html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/heads.php'; ?>

<?php
if(isset($_POST['numbers'])){
$arr=trim($_POST['numbers']);
$selected=explode("," , $arr);
?>



        
        <div class="container my-3">
            <div class='row mdb-color d-flex justify-content-center align-items-center mb-4 py-3' >
                <?php
                foreach($selected as $numbers){
                    
            ?>
            
        <div  class='col-auto mx-2 number p-2 circle selected m-2 d-flex align-items-center justify-content-center'><?= $numbers ?></div>    
            
            <?php
        }
        
        ?> 
                
            </div>
            
            <div align='center'>
        <h3 class="font-weight-bold pb-2 mt-4 orange-text">Your stake</h3>

            <div class='col-lg-6 col-md-12'>
                <form id='wallet_form'>
            <div class="input-group mt-0 mb-3">
  <div class="input-group-prepend ">
    <span class="input-group-text md-addon selected font-weight-bold z-depth-1">&#8358;</span>
    <!--<span class="input-group-text md-addon">0.00</span>-->
  </div>
  <input type="text" id='stake' class="form-control z-depth-1"  aria-label="Naira amount" autofocus required>
</div>


<div class='mt-5 pt-2'>
    <button class='btn btn-cyan btn-xl btn-rounded py-4' id='wallet' type='submit'><i class="fas fa-wallet px-2 fa-2x"></i>Deduct from wallet</button>
</div>
</form>
            </div>
            
         </div>   
            
            
            


</div>













<?php

}else{
echo "<script>window.location.href='https://babba.com.ng/me/'</script>";
die();
}
?>








    </body>
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/tails.php'; ?>

<script>
    $(function(){
        var numberx="<?= $arr ?>";
        $("#wallet_form").submit(function(){
            var wallet="<?= $wallet ?>";
            var stake=$("input#stake").val();
            wallet=parseFloat(wallet.replace(/,/g,''));
            stake=parseFloat(stake.replace(/,/g,''));
              if(stake < 10){
                 Toastify({
  text: "minimum stake amount is 10 naira!",
  duration: 3000,
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right, #e91e63 , #e91e63)",
  stopOnFocus: true, // Prevents dismissing of toast on hover

}).showToast();
            }
            else if(stake > wallet){
                 Toastify({
  text: "insufficient wallet funds!",
  duration: 3000,
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right, #e91e63 , #e91e63)",
  stopOnFocus: true, // Prevents dismissing of toast on hover

}).showToast();
            }else{
                  
                          swal({
  title: "Confirm stake and proceed",
  text: "",
  icon: "warning",
  buttons: ["cancel", "Yes, proceed"],
  dangerMode: false,
 
}).then((willDelete) => {
  if (willDelete) {
      
      var str="stake="+stake+"&numbers="+numberx;
      
      $.ajax({
          type:"POST",
          data:str,
          url:"tickets/generate_ticket.php",
          success:function(data){
            
              if(data==0){
                   Toastify({
  text: "an error occured, logout and try again!",
  duration: 30000,
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right, #e91e63 , #e91e63)",
  stopOnFocus: true, // Prevents dismissing of toast on hover

}).showToast();
             }else{
                window.location.href="https://babba.com.ng/me/tickets/?t="+data.trim();
             }
          }
      });
  
  } else {
  }
});

}
return false;
        });
        
        
    });
</script>

    </body>
    </html>
