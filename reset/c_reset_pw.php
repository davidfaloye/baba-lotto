<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/dbconnect.php';


class PasswordChange extends Database{
    public $changed=false;
    function __construct($email,$code,$newpassword){
        
         
        $valid=$this->check_mail($email,$code);
        if($valid){
              $this->change_password($email,$newpassword);
    
            
        }else{
            $this->changed=false;
        }
        
    }
    
    function check_mail($email,$code){
        $this->connectDB();
        $sql="SELECT id FROM Players WHERE Email=? AND Password=?";
        if($x=$this->databasex->prepare($sql)){
            $x->bind_param('ss',$email,$code);
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
    
    function change_password($email,$newpassword){
         $this->connectDB();
$hashed=md5($newpassword);
        $sql="UPDATE Players SET Password=? , Re_Password=? WHERE Email=?";
        if($x=$this->databasex->prepare($sql)){
            $x->bind_param('sss',$hashed,$hashed,$email);
            $x->execute();
            $x->close();
        }
        $this->changed=true;
        $this->databasex->close();
        
    }
    

    
    
}


if(isset($_POST['fp'])){
$fp=trim($_POST['fp']);$sp=trim($_POST['sp']);$u=$_POST['u'];$c=$_POST['c'];
if($fp==$sp){
$new=new PasswordChange($u,$c,$fp);
if($new->changed){
    echo true;
}else{
    echo false;
}
}else{
   echo false; 
}
}
?>
