<?php

if(isset($_POST['date_x'])){
$date_x=date("Y-m-d",strtotime($_POST['date_x']));
require 'results.php';
$babba=new results();
$results=json_decode($babba->get_one($date_x));
 ?>
 
 <?php
                if(empty($results)){
                    ?>
                    <div><h3 class='grey-text'>No result found for this date!</h3></div>
                    
                    <?php
                }else{
                ?>
         <div class='table-responsive'>
             <table class='table'>
                 <thead>
             <tr class='font-weight-bold text-center'><th>Draw Date & Time</th><th>Draw Result</th></tr>
                 </thead>
                 <tbody>
                     <?php
                     foreach($results as $val){
                         ?>
                         
                          <tr>
                        <td class='d-flex flex-column justify-content-center align-items-center'>
                        <div><?= $val->date_x ?></div>
                        <div><?= $val->time_x ?></div> 
                        </td>
                        <td>
                        <div class='row d-flex justify-content-center align-items-center' >
                        <div class='col-auto mx-2 number p-2 circle selected m-0 d-flex align-items-center justify-content-center'><?= $val->num1 ?></div>
                         <div class='col-auto mx-2 number p-2 circle selected m-0 d-flex align-items-center justify-content-center'><?= $val->num2 ?></div>
                          <div class='col-auto mx-2 number p-2 circle selected m-0 d-flex align-items-center justify-content-center'><?= $val->num3 ?></div>
                           <div class='col-auto mx-2 number p-2 circle selected m-0 d-flex align-items-center justify-content-center'><?= $val->num4 ?></div>
                            <div class='col-auto mx-2 number p-2 circle selected m-0 d-flex align-items-center justify-content-center'><?= $val->num5 ?></div>
                        </div>
                        </td>
                        </tr>
                         <?php
                     }
                     
                     
                     ?>
                 </tbody>
             </table>
         </div>
         <?php
                }
                
        ?>
         
    <?php
}else{
    echo "No date selected";
}


?>
