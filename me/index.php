<!doctype html>
<html lang="en">

<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/heads.php'; ?>
    
<?php $cards=["blue-gradient","purple-gradient","aqua-gradient","peach-gradient"]; ?>   
    

        
        
        <div class="container my-5">


  <!--Section: Content-->
  <section class="text-center dark-grey-text">

    <!-- Section heading -->
    <h3 class="font-weight-bold pb-2 mb-4 blink orange-text">Play Now & Win!</h3>


    <!-- Grid row -->
    <div class="row d-flex justify-content-center align-items-center">

<?php
$number=1;$d=0;
foreach($cards as $card){
 $number++;$d++;
?>

      <!-- Grid column -->
      <div class="col-lg-3 col-md-6 mb-4  wow fadeIn delay-<?= $d."s" ?>">
        <!-- Card -->
        <div class="card <?= $card ?>">

         
          <div class="card-body white-text">
     

            <h2 class="font-weight-bold "><?= $number ?>/89</h2>
            <p >Pick <?= $number ?> numbers of your choice to win</p>
            <a class="btn btn-outline-white btn-rounded launchmodal" id="launchmodal" aria-label='<?= $number ?>'>PLAY</a>

</div>
</div>
</div>
      <!-- Grid column -->

<?php
}
?>


    </div>
    <!-- Grid row -->

  </section>
  <!--Section: Content-->


</div>
        
    <form id='selform' method="POST" action="confirm.php">
        <input type='hidden' id="selectedno" name='numbers' />
    </form>

<!-- Full Height Modal Right -->
<div class="modal fade right" id="numberboard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-top" role="document">


    <div class="modal-content">
      <div class="modal-header elegant-color">
        <h4 class="modal-title w-100 orange-text" id="myModalLabel"></h4>
        <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class='container-fluid'>
    <div align='center' class='row' >
        <?php
        
        for($i=1;$i<90;$i++){
            
            ?>
            
        <div id="<?= $i ?>"  class='col-auto number circle m-2 d-flex align-items-center justify-content-center'><?= $i ?></div>    
            
            <?php
        }
        
        ?>
    </div>
</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-outline-grey btn-lg" id='clear'>Clear</button>
        <button type="button" class="btn selected btn-lg" id='submitnumbers'>Next</button>
      </div>
    </div>
  </div>
</div>
<!-- Full Height Modal Right -->    
    
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/tails.php'; ?>
        
          <script type='text/javascript'>
             $(function(){
                 var arr=[];
                 var nop=2;
                 
                 $(".launchmodal").click(function(){
                     nop=$(this).attr("aria-label");
                     $("#myModalLabel").html("Pick <b>"+ nop + " </b>numbers")
                    $("#numberboard").modal('show');
                    
                    $("div.number").removeClass('selected');
                    arr.splice(0, arr.length)
                 });
                 
                $("div.number").click(function(){
                    var id=this.id;

                    var hc=$(this).hasClass('selected');
                    if(hc==true){
                        arr.splice( arr.indexOf(id), 1 );
                         $(this).removeClass("selected"); 
                          
                    }else{
                        if(arr.length < nop){
                        arr.push(id);
                        $(this).addClass("selected"); 
                    }
                    else if(arr.length == nop){
     var lastselected=arr.pop();
    $("#"+lastselected).removeClass("selected");
    arr.push(id);
    $(this).addClass("selected"); 
    
}
}



});



$("#submitnumbers").click(function(){
        if(arr.length == nop){
    $('button').attr('disabled',true);
    var send=arr.join();
    $("input#selectedno").val(send);
    $('form#selform').submit();
    }else{
     Toastify({
  text: "select a total of "+nop+" numbers",
  duration: 3000,
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right, #e91e63 , #e91e63)",
  stopOnFocus: false, // Prevents dismissing of toast on hover

}).showToast();    
    }
});











$("#clear").click(function(){
    $("div.number").removeClass('selected');
    arr.splice(0, arr.length);
    nop=2;
});
              
                
                
                
                
                
                
                
                
                
                
                
                
             });
             </script>

    </body>
    </html>
