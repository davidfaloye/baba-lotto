<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/dbconnect.php'; 


class LogIn extends Database{
    public $babba_id;
public $exists=false;
     
    
    function __construct($email,$pword){
     $hashed=md5($pword);
        $this->connectDB();$activated="activated";
        $sql="SELECT Babba_ID FROM Players WHERE Email=? AND Password=? AND Activation_Status=?";
              
        if($x=$this->databasex->prepare($sql)){
$x->bind_param('sss',$email,$hashed,$activated);$x->execute();$x->store_result();$rows=$x->num_rows();
            if($rows>0){
                $x->bind_result($babba_id);$x->fetch();

                $this->babba_id=$babba_id;
                $this->exists=true;
            }else{
                $this->exists=false;
            }
            $x->close();
        }
        
        
         $this->databasex->close();
        
    }
    
    

   
    

    
    
}


?>