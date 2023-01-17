<!doctype html>
<html>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/heads.php'; ?>
    <?php
    include 'get_banks.php';
    $banks=$response->data;
    
    ?>
    <body>
        <div class='container mt-4 pt-2 ' >
            <div class='card '>
                <div class='px-2'>
            <p class='font-weight-bold'><h3>Withdrawal</h3>
                <small >Before you can play a game, you need to deposit money into your wallet. The minimum amount you can deposit is 50 Naira</small></p>
                </div>
            <div class=' d-flex justify-content-center align-items-center'>
                
         <form id="withdrawform" class='col-lg-6 col-md-12'>
<input type='hidden' id="hidden" name="bank_name" />
  <div class="form-group my-4">
<label for='bank'>Bank Account</label>
    <select class="form-control js-example-basic-single" id='bank' name="bank_code" required>
        <option value=''>-- Choose a Bank -</option>
<?php
foreach($banks as $bank){
    ?>
    <option value="<?= $bank->code ?>"><?= $bank->name ?></option>
    
    <?php
}


?>
</select>

  </div>
  
  <div class='form-group my-4' >
      <label for='account_no'>Account Number</label>
  <input type='tel' maxlength='10' class='form-control' name='account_no' id='account_no' required/>

  </div>
  
    <div class='form-group my-4'>
      <label for='account_name'>Account Name</label>
  <input type='text' class='form-control' name='account_name' id='account_name'   required />
  <small id='unresolved'></small>
  </div>
  
  
   <div class='form-group my-4' >
                   <label for='amount'>Amount to withdraw</label> 
                   <div class="input-group mt-0 mb-3">
         <div class="input-group-prepend ">
    <span class="input-group-text md-addon selected font-weight-bold z-depth-1">&#8358;</span>
  </div>
  <input type='text' class='form-control ' name='amount' id='amount'   required />
    </div>
  </div>

  <div class="form-group my-4" align='center'>
    <button type="submit" class='btn btn-xl selected btn-rounded' id='submit'> next </button>
  </div>
</form>
</div>
</div>
</div>
     <?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/tails.php'; ?>
<script src="https://js.paystack.co/v1/inline.js"></script> 

<script>
   $(function(){
 var  get_acc_name= function() {
var account_no=$('input#account_no').val();
var bank_code=$('select#bank option:selected').val();
var bank_name=$("select#bank option:selected").text();
$("input#hidden").val(bank_name);
    if(account_no.length == 10 && bank_code !== ''){
$("#unresolved").empty();
var str="account_no="+account_no+"&bank_code="+bank_code;
    $.ajax({
        data:str,
        method:"POST",
        url:"verify_account_no.php",
        success:function(data){
            data=data.trim();
            if(data=="unresolved"){
        $("#unresolved").html("Account holder name not verifiable.");
            }else{
           $("input#account_name").val(data);
           $("#submit").focus();
            }
        }
    });
    }
}
$('input#account_no').keyup(get_acc_name);
$('select#bank').change(get_acc_name);


       
       $("form#withdrawform").submit(function(){
$("button#submit").attr("disabled", true);
           var formData = new FormData(this);

 $.ajax({
            type: "POST",
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
			url: 'send_as_mail.php',
			data: formData,
			async:true,
			success: function (data) {
		Toastify({
  text: data,
  duration: 3000,
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right, #e91e63 , #e91e63)",
  stopOnFocus: true, // Prevents dismissing of toast on hover

}).showToast();

 setTimeout(function(){location.reload(); }, 3000);

			}
           });
           return false;
       })
   });
</script>

    </body>
</html>
