<?php
session_start();
if(isset($_SESSION['babba_user_id']) && !empty($_SESSION['babba_user_id'])){
    $babba_id=$_SESSION['babba_user_id'];
include '../me.php';

$me=new Me($babba_id);
$wallet=$me->wallet;


    $stake=$_POST['stake'];
    $numbers=$_POST['numbers'];
    if($stake > $wallet){
    echo false;
    exit();
    }else{
        
    $res=$me->place_stake($stake,$numbers);
if($res){
    $ticket_id=$me->ticket_id;
      echo $ticket_id;

}else{
    echo false;
}
    
    }


}else{
    echo false;
}
?>
