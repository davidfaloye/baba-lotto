<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/dbconnect.php';


class PasswordReset extends Database{
    public $sent=false;
    public $resetx;
    public $email;
    function __construct($email){
        
         
        $valid=$this->check_mail($email);
        if($valid){
           $this->email=$email;
              $this->deactivate_password($email);
            $this->reset_mail($email);
            
        }
        
    }
    
    function check_mail($email){
        $this->connectDB();
        $sql="SELECT id FROM Players WHERE Email=?";
        if($x=$this->databasex->prepare($sql)){
            $x->bind_param('s',$email);
            $x->execute();
            $x->store_result();
            $rows=$x->num_rows();
            if($rows>0){
        
                return true;
            }else{
                return false;
            }
            $x->close();
        }
        $this->databasex->close();
    }
    
    function deactivate_password($email){
         $this->connectDB();
  $code = '123456789qazwsxedcrfvtgbyhnujmikolp';
  $code = str_shuffle($code).time();
  $code = substr($code,0, 10);
  $this->resetx=md5($code);
        $sql="UPDATE Players SET Password=? , Re_Password=? WHERE Email=?";
        if($x=$this->databasex->prepare($sql)){
            $x->bind_param('sss',$this->resetx,$this->resetx,$email);
            $x->execute();
            $x->close();
        }
        $this->databasex->close();
    }
    
    function reset_mail($email){
        $code=$this->resetx;

$linx = "https://babba.com.ng/LogIn/reset/?c=".$code."&u=".$email;
$to = $email;
$subject = 'Password Reset';
$message = "Click on the link below to reset your password "."\r\n".$linx;
$headers = "From: hello@babba.com.ng" . "\r\n";
 
if (mail($to, $subject, $message, $headers))
{
    $this->sent= true;
}
else
{
    $this->sent= false;
}
    }
    
    
}


if(isset($_POST['email'])){
$email=trim($_POST['email']);
$new=new PasswordReset($email);

$new->email;
if($new->sent){
    echo true;
}else{
    echo false;
}
}
?>