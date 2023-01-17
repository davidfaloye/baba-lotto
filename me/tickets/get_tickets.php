<?php
session_start();
if(isset($_SESSION['babba_user_id']) && !empty($_SESSION['babba_user_id'])){
    $babba_id=$_SESSION['babba_user_id'];
include '../me.php';

$me=new Me($babba_id);
$tickets=json_decode($me->get_tickets());
if(empty($tickets)){
    ?>
    <div class='d-flex justify-content-center align-items-center'>
                    <p><h4><i class="fas fa-quote-left pr-2"></i>You have no tickets!</h4></p>
                </div>
    
    <?php
}
else{
    ?>
    <div class='table-responsive'>
    <table class='table'>
        <thead>
        <tr><th>#</th><th>ticket id</th><th>status</th><th>date played</th></tr>
        </thead>
<tbody>
    
    <?php
    $sn=0;
    foreach($tickets as $val){
        $sn++;
        ?>
        
        <tr><td><?= $sn ?></td><td><a class='text-primary' href="https://babba.com.ng/me/tickets/?t=<?= $val->tid ?>"><?= $val->tid ?></a></td><td><?= $val->status ?></td><td><?= $val->d_played ?></td></tr>
        
        
        
        
        <?php
        
        
        
        
    }
    
    ?>
    
    
    
    
</tbody>
    </table>
    </div>
    <?php
}
}else{
    header("Location: https://babba.com.ng/Logout/");
die();

}
?>
