<!doctype html>
<html lang="en">

<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/heads.php'; ?>


   <?php
if(isset($_GET['t']) && !empty($_GET['t'])){
$ticket_id=$_GET['t'];

$ticket_data=$me->get_ticket_info($ticket_id);


}else{
header("Location: https://babba.com.ng/me/");
die();
}

?>     
        
        <div class="container my-5" >
            
            
            <?php
            if(empty($ticket_data)){
                ?>
                
                <div class='d-flex justify-content-center align-items-center'>
                    <p><h4><i class="fas fa-quote-left pr-2"></i>Ticket ID not found!</h4></p>
                </div>
                
                <?php
            }else{
                
                    ?>
                    
                    	<!-- Grid row -->
    <div class="row d-flex justify-content-center align-items-center">


      <!--Grid column-->
      <div class="col-lg-4 col-md-6 mb-4 text-center">
        <!--Card-->
        <div class="card testimonial-card">
          <!--Background color-->
          <div class="card-up blue-gradient">
          </div>
          <!--Avatar-->
          <div class="avatar mx-auto white">
            <img src="https://babba.com.ng/assets/babba-logo.png" class="img-responsive pt-2" height='50' alt='Babba Lotto'>
          </div>
          <div class="card-body">
            <!--Name-->
            <h4 class="font-weight-bold mb-4"><?= $ticket_data['tid'] ?></h4>
   
            <!--Quotation-->
            <p class="dark-grey-text mt-4">
                <table class='table'>
                    <tbody>
                <tr>
                    <td>Draw Date</td><td><?= $ticket_data['d_played']." ".$ticket_data['t_played'] ?></td>
                </tr>        
                 <tr>
                    <td>Valid Until</td><td><?= $ticket_data['d_valid']." ".$ticket_data['t_played'] ?></td>
                </tr> 
                 <tr>
                    <td>Sales Date</td><td><?= $ticket_data['d_played']." ".$ticket_data['t_played'] ?></td>
                </tr> 
                    </tbody>
                </table>
                
            </p>
             <hr>
             
             <p>
                 <h3>
                     <?= $ticket_data['numbers'] ?>
                 </h3>
             </p>
            <hr>
            <p><h6>Status</h6>
                 <h3>
                     <?= $ticket_data['status'] ?>
                 </h3>
             </p>
                         <hr>
            <p>
                <h3>
                  <?= $ticket_data['category']." @ &#8358;".number_format($ticket_data['stake']) ?>   
                </h3>
            </p>
              <div>-------------------------------</div>
            <p class='font-weight-bold'>Total stake: &#8358;<?= number_format($ticket_data['stake']) ?></p>
            <div>-------------------------------</div>
            <p>
        <h6>GOOD LUCK!!!</h6>
        <h6>HAPPY WINNING!!!</h6>
            </p>
            <hr>
            <p><h4 class="font-weight-bold mb-4"><?= $ticket_data['tid'] ?></h4></p>
          </div>
        </div>
        <!--Card-->
      </div>
      <!--Grid column-->



    </div>
    <!-- Grid row -->

                    
                    <?php
            
            }
            
            
            ?>
            
            
            
            </div>
            
            
            <?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/tails.php'; ?>
            
            
            
            
    </body>
    </html>
