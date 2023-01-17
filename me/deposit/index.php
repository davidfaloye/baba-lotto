<!doctype html>
<html>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/heads.php'; ?>
    <?php
    $babba_id=$_SESSION['babba_user_id'];
    ?>
    <body>
        <div class='container mt-4 pt-4 ' >
            <div class='card p-4 d-flex flex-column justify-content-center align-items-center mb-5'>
         <form id="paymentForm" class='col-lg-6 col-md-12'>

  <div class="form-group text-left">
    <label for="amount" class='text-left font-weight-bold'>Amount (&#8358;)</label>
    <input type="text" id="amount" class='form-control z-depth-1' style='border:solid 1px #F85827;' placeholder='enter amount' required />
      <small>Min: &#8358; 50</small>
      <small>Max: &#8358; 10,000</small>
  </div>


  <div class="form-submit" align='center'>
    <button type="submit" class='btn btn-xl selected btn-rounded' onclick="payWithPaystack()"> Pay with Paystack</button>
  </div>
</form>
</div>

</div>



     <?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/tails.php'; ?>
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script>
    const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
      e.preventDefault();
    var amount=$("input#amount").val();
    amount=parseFloat(amount.replace(/,/g,''));
    if(amount < 49 || amount > 10000){
    Toastify({
  text: 'min deposit is 50 Naira & max is 10,000 Naira',
  duration: 4000,
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right, #e91e63 , #e91e63)",
  stopOnFocus: true, // Prevents dismissing of toast on hover

}).showToast();
        
    }else{

  let handler = PaystackPop.setup({
    key: 'pk_live_cc1ebb7cdb8bdada47e59fdf24ecec0751e59f85', // Replace with your public key
    email: "<?= $babba_user_email ?>",
    amount: amount * 100,
//channels:['card'],
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
Toastify({
  text: 'payment cancelled',
  duration: 3000,
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right, #e91e63 , #e91e63)",
  stopOnFocus: true, // Prevents dismissing of toast on hover

}).showToast();
    },
    callback: function(response){
         var reference = response.reference;
         var babbaid="<?= $babba_id ?>";
         var str="reference="+reference+"&babbaid="+babbaid;
      let message = 'Payment complete! Reference: ' + reference;
     // alert(message);
      $.ajax({
          data:str,
          url:'verify.php',
          method: 'POST',
         success:function(data){
             if(data==1){
                 window.location.href="https://babba.com.ng/me/"
             }else{
                   Toastify({
  text: data,
  duration: 5000,
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right, #e91e63 , #e91e63)",
  stopOnFocus: true, // Prevents dismissing of toast on hover

}).showToast();
             }
         }
          
      });
  
    }
  });
  handler.openIframe();
    }
}
</script>
    </body>
</html>
