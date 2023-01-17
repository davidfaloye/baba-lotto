<div id="overlay" class='d-none'>
    <div class='d-flex justify-content-center align-items-center'>
    <div class='loader awesome-spin'>
       </div> 
    </div>
</div>   
   <?php
    if(isset($_SESSION['babba_user_id'])){
        ?>
<div class='container mb-5 mt-3 d-flex flex-row-lg flex-column-md justify-content-start align-items-start'>
    <a href="https://help.babba.com.ng"  class='text-primary mx-2'>Need help?</a>
 
    <a id="transaction_history" class='text-primary mx-2'>Transaction history</a>
   
</div>
 <?php
    }
    ?>
<!-- Footer -->

<footer align='center' class='mb-0 mt-5 pt-5 grey-text'>
   <p>All rights reserved &copy; <?= date("Y") ?>, Babba Group</p>
</footer>

<!-- Modal -->
<div class="modal fade" id="ticket_modal" tabindex="-1" role="dialog" aria-labelledby="ticket_modal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="m-title">Tickets</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id='tmbody' align='center'>
          <div class='text-justify'>
      <p><b>Please read these Terms of Service (“Terms”, “Terms of Service”) carefully before using the https://babba.com.ng website (the “Service”) operated by Babba (“us”, “we”, or “our”).</b><br>

Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.

By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>
<br>
<b>Accounts</b>
<p>
When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.

You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.

You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.
</p>
<b>Intellectual Property</b>
<p>
The Service and its original content, features and functionality are and will remain the exclusive property of Babba and its licensors.</p>
<br>
<b>Links To Other Web Sites</b>
<p>
Our Service may contain links to third-party web sites or services that are not owned or controlled by Babba.

Babba has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Babba shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.

We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>
<br>
<b>Termination</b>
<p>
We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.

All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.

We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.

Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.

All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.
</p><br>
<b>Disclaimer</b>
<p>
Your use of the Service is at your sole risk. The Service is provided on an “AS IS” and “AS AVAILABLE” basis. The Service is provided without warranties of any kind, whether express or implied, including, but not limited to, implied warranties of merchantability, fitness for a particular purpose, non-infringement or course of performance.
</p><br>
<b>Governing Law</b>
<p>
These Terms shall be governed and construed in accordance with the laws of Nigeria without regard to its conflict of law provisions.

Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.
<br></p>
<b>Changes</b>
<p>
We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.

By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.
<br></p>
<b>Contact Us</b>
<p>
If you have any questions about these Terms, please contact us.
<p>support@babba.com.ng</p>
<p>breach@babba.com.ng</p>
</p>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-orange" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

   <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> 
		     <script src="https://babba.com.ng/assets/p5.js"></script>
<script src="https://babba.com.ng/assets/vanta.js"></script> 
<script>
$(function(){
    
            $( document ).ajaxStart(function() {
  $('#overlay').removeClass('d-none');
});
  $( document ).ajaxStop(function() {
  $('#overlay').addClass('d-none');
});

    $('.carousel').carousel({
interval: 3000
});

$('.navbar-toggler').click(function(){
    $('#navbar-icon').toggleClass('fas fa-times fas fa-bars')
});

$('#tickets').click(function(){
          $('#tmbody').empty();
            $('#tmbody').html('<i class="fas fa-spinner fa-pulse"></i>');
    $('#tmbody').load("https://babba.com.ng/me/tickets/get_tickets.php")
        $("h5#m-title").html('My Tickets');
    $("#ticket_modal").modal('show');
    
});


$('a#transaction_history').click(function(){
      $('#tmbody').empty();
                  $('#tmbody').html('<i class="fas fa-spinner fa-pulse"></i>');
    $('#tmbody').load("https://babba.com.ng/me/trans_history.php")
        $("h5#m-title").html('Transaction History');
    $("#ticket_modal").modal('show');
    
});

    $('.js-example-basic-single').select2();
});


</script>
  <script>
        $('input#stake,input#amount').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });
});
</script>
 <script>
      $( document ).ready(function() {
  new WOW().init();
});
  </script>
  
    
        
        <script>
VANTA.TOPOLOGY({
  el: "#body",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00,
 color: 0xe16a16,
  backgroundColor: 0xffffff
});
</script>
