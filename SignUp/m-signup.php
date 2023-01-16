<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/dbconnect.php'; 


class SignUp extends Database{
    public $act_code; public $sent=false; public $wallet=0;
   
  public $error=array();
     
    
    function user_exists($email,$phone_number){
     
        $this->connectDB();
        $check_email="SELECT Email FROM Players WHERE Email=?";
            $check_number="SELECT Phone_Number FROM Players WHERE Phone_Number=?";
              
        if($x=$this->databasex->prepare($check_email)){
            $x->bind_param('s',$email);$x->execute();$x->store_result();$rows1=$x->num_rows();
            if($rows1>0){
                $this->error[]='This email is already in use!';
            }else{
                
            }
            $x->close();
        }
        
          if($x=$this->databasex->prepare($check_number)){
            $x->bind_param('s',$phone_number);$x->execute();$x->store_result();$rows2=$x->num_rows();
            if($rows2>0){
                $this->error[]='This phone number is already in use!';
            }else{
                
            }
            $x->close();
        }
        
        
         $this->databasex->close();
        
    }
    
    
    
    
    function sign_up($signup_data){
       
     $this->user_exists($signup_data[2],$signup_data[3]);
      if(empty($this->error)){
          $today=date('Y-m-d');
          $act_status='no';$act_code=mt_rand(1000000,10000000);
          $this->act_code=$act_code;
          $this->connectDB();
          $hashed=md5($signup_data[4]);
          $babba_id="BA".mt_rand(12345,98765);
        
          $sql="INSERT INTO Players (First_Name,Last_Name,Email,Phone_Number,Password,Re_Password,Activation_Status,Activation_Code,Babba_ID,Wallet,Date_Joined) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
          if($x=$this->databasex->prepare($sql)){
              $x->bind_param('sssssssssis',$signup_data[0],$signup_data[1],$signup_data[2],$signup_data[3],$hashed,$hashed,$act_status,$act_code,$babba_id,$this->wallet,$today);
              $x->execute();
              
              return 'Ready';
              $x->close();
          }else{
              return 'error';
          }
          $this->databasex->close();
      }
      
     else{
         return 'Duplicity';
     } 
      
      
    }
   
    
        function send_mail($email){
        $code=$this->act_code;
$linx = "https://babba.com.ng/SignUp/activate.php?ac=$code&pl=$email";
$to = $email;
$subject = 'Activate your account';
$message = "Click on the link below to activate your account ".$linx;
$headers = "From: babba@babba.com.ng" . "\r\n";
 
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









class ActivatePlayer extends Database{
    
    function check($email,$code){
        $status='no';
        $this->connectDB();
        $check_email="SELECT id FROM Players WHERE Email=? AND Activation_Code=? AND Activation_Status=?";
              
        if($x=$this->databasex->prepare($check_email)){
            $x->bind_param('sis',$email,$code,$status);$x->execute();$x->store_result();$rows1=$x->num_rows();
            if($rows1>0){
                return true;
            }else{
                return false;
            }
            $x->close();
        }
        
        
         $this->databasex->close();
    }
    
    
    function activate($email){
        $status="activated";
        $this->connectDB();
        $sql="UPDATE Players SET Activation_Status=? WHERE Email=?";
        if($x=$this->databasex->prepare($sql)){
            $x->bind_param('ss',$status,$email);
            $x->execute();
            
            $x->close();
        }
        
         $this->databasex->close();
        
        
    }
    
}
?>
