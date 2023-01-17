<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/dbconnect.php'; 
date_default_timezone_set('Africa/Lagos');

class Me extends Database{
    public $wallet;public $fname;
    public $babba_id;public $ticket_id;
    public $empt="";
    
    
    function __construct($babba_id){
        $this->babba_id=$babba_id;
        $this->connectDB();
        $sql="SELECT Wallet,First_Name FROM Players WHERE Babba_ID=?";
        if($x=$this->databasex->prepare($sql)){
            $x->bind_param('s',$babba_id);
            $x->execute();
            $x->store_result();
            if($x->num_rows() > 0){
                
                $x->bind_result($wallet_val,$fname);
                $x->fetch();
                $this->wallet=$wallet_val;
                $this->fname=$fname;
            }
            $x->close();
            
            
        }
        $this->databasex->close();
    }
    
    
    
    
    function place_stake($stake,$numbers){
        $newwallet=$this->wallet - $stake;
        $status='pending';$date=date("Y-m-d");$time=date("H:i");
        $valid_date=date("Y-m-d", strtotime("+7 day"));
        $let = substr(md5(microtime()),rand(0,26),5);
        $num=  mt_rand(10000000,90000000);
        $ticket_id=$let."-".$num;
        $n_c=count(explode(",", $numbers));
        $category=$n_c."/89";
         $this->connectDB();
         $this->check_date($date);
         $sql="INSERT INTO Draws(Babba_ID,Ticket_ID,Category,Numbers,Stake,Status,Date_Played,Time_Played,Validity_Date,Generated_X,Public) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
         if($x=$this->databasex->prepare($sql)){
            $x->bind_param('ssssissssss',$this->babba_id,$ticket_id,$category,$numbers,$stake,$status,$date,$time,$valid_date,$this->empt,$this->empt);
            $x->execute();
            
              $x->close();
              $this->wallet_update($newwallet);
              $this->ticket_id=$ticket_id;
              return true;
              
         }else{
             return false;
         }
         $this->databasex->close();
    }
    
    
    function check_date($date){
        $sql="SELECT id FROM Generated_X WHERE Date_X=?";
    if($x=$this->databasex->prepare($sql)){
            $x->bind_param('s',$date);
            $x->execute();
            $x->store_result();
            $rows=$x->num_rows();
            if($rows > 0){
                
            }else{
                $this->update_admin($date);
            }
           $x->close(); 
    }
    }
    
    function update_admin($date){
        $sql="INSERT INTO Generated_X(Date_X,Generated_X,Date_Time,Public) VALUES (?,?,?,?)";
         if($x=$this->databasex->prepare($sql)){
            $x->bind_param('ssss',$date,$this->empt,$this->empt,$this->empt);
            $x->execute();
            
              $x->close();

    }
    }
    
    
    function wallet_update($newwallet){
        $sql="UPDATE Players SET Wallet=? WHERE Babba_ID=?";
        if($x=$this->databasex->prepare($sql)){
            $x->bind_param('is',$newwallet,$this->babba_id);
            $x->execute();
            
              $x->close();
        }
    }
    
    
    
    
    
    
    function get_ticket_info($ticket_id){
        $ticket_data=[];
    $this->connectDB();
    $sql="SELECT Category, Numbers, Stake, Status, Date_Played, Time_Played, Validity_Date,Public FROM Draws WHERE Babba_ID =? AND Ticket_ID=?";
    if($x=$this->databasex->prepare($sql)){
        $x->bind_param('ss',$this->babba_id,$ticket_id);
        $x->execute();
        $x->store_result();
        if($x->num_rows() > 0){
            $x->bind_result($category,$numbers,$stake,$status,$date_played,$time_played,$validity_date,$public);
            $x->fetch();
           $ticket_data['tid']=$ticket_id;
           $ticket_data['category']=$category;
           $ticket_data['numbers']=str_replace(","," , ",$numbers);
           $ticket_data['stake']=$stake;

           $ticket_data['d_played']=$date_played;
           $ticket_data['t_played']=$time_played;
           $ticket_data['d_valid']=$validity_date;
           if($public=="yes"){
            $ticket_data['status']=$status;
           }else{
            $ticket_data['status']='pending';
           }
            
        }
        
      $x->close();
        } 
        $this->databasex->close(); 
        
        return $ticket_data;
    }
    
    
    
    function get_tickets(){
              $zyx=[];  $ticket_data=[];
    $this->connectDB();
    $sql="SELECT Ticket_ID, Status, Date_Played,Public FROM Draws WHERE Babba_ID =? ORDER BY id DESC";
    if($x=$this->databasex->prepare($sql)){
        $x->bind_param('s',$this->babba_id);
        $x->execute();
        $x->store_result();
        if($x->num_rows() > 0){
            
             $x->bind_result($tids,$status,$date_played,$public);
            while($x->fetch()){
           $ticket_data['tid']=$tids;

           if($public=="yes"){
            $ticket_data['status']=$status;
           }else{
            $ticket_data['status']='pending';
           }
           $ticket_data['d_played']=date("Y-m-d", strtotime($date_played));
           $zyx[]=$ticket_data;
            }
            
        }
        
      $x->close();
        } 
        $this->databasex->close(); 
        
        return json_encode($zyx);
    }
    
    
    
    
     function user_profile(){
 
        $user_profile=[];
        $xyz=[];
        $this->connectDB();
         $sql="SELECT First_Name,Last_Name,Phone_Number,Email,Password,Re_Password FROM Players WHERE Babba_ID=?";
         if($x=$this->databasex->prepare($sql)){
             $x->bind_param('s',$this->babba_id);
             $x->execute();
             $x->store_result();
             $x->bind_result($fname,$lname,$phone,$email,$pword1,$pword2);
             $x->fetch();
                 
                 $user_profile['firstname']=$fname;
                 $user_profile['lastname']=$lname;
                 $user_profile['phone']=$phone;
                 $user_profile['email']=$email;
                 $user_profile['pword1']=$pword1;
                 $user_profile['pword2']=$pword2;
             
             $x->close();
             
         }
         $this->databasex->close();
         
         return $user_profile;
     }
     
     
     
     
     
     
        function edit_user_profile($profile_edited_data){
            $hashed=$profile_edited_data[4];
             $this->connectDB();
             $sql="UPDATE Players SET First_Name=?,Last_Name=?,Phone_Number=?,Email=?,Password=?, Re_Password=? WHERE Babba_ID=?";
             if($x=$this->databasex->prepare($sql)){
                 $x->bind_param("sssssss",$profile_edited_data[0],$profile_edited_data[1],$profile_edited_data[2],$profile_edited_data[3],$hashed,$hashed,$this->babba_id);
                 $x->execute();
                 $x->close();
                 return true;
             }else{
                 return false;
             }
             
             $this->databasex->close();
            
            
        }
     
     
     
     
     
     
     function deposit_funds($amount,$email,$reference){
                   $this->update_paystack_log($reference,$amount,'deposit');
          $this->connectDB();

             $sql="UPDATE Players SET Wallet=Wallet+? WHERE Babba_ID=? AND Email=?";
             if($x=$this->databasex->prepare($sql)){
                 $x->bind_param("iss",$amount,$this->babba_id,$email);
                 $x->execute();
                 $x->close();
                 return true;
             }else{
                 return false;
             }
             
             $this->databasex->close();
            
         
         
     }
     
          function withdraw_funds($amount,$email,$reference){
            $this->update_paystack_log($reference,$amount,'deposit');
          $this->connectDB();

             $sql="UPDATE Players SET Wallet=Wallet-? WHERE Babba_ID=? AND Email=?";
             if($x=$this->databasex->prepare($sql)){
                 $x->bind_param("iss",$amount,$this->babba_id,$email);
                 $x->execute();
                 $x->close();
                 return true;
             }else{
                 return false;
             }
             
             $this->databasex->close();
            
         
         
     }
     
     
     
     function update_paystack_log($reference,$amount,$activity){
         $date_time=date("Y-m-d H:i:s");
          $this->connectDB();
          $sql="INSERT INTO  Wallet_Logs(Babba_ID,Activity,Amount,Reference,Date_Time) VALUES(?,?,?,?,?)";
             if($x=$this->databasex->prepare($sql)){
                 $x->bind_param("ssiss",$this->babba_id,$activity,$amount,$reference,$date_time);
                 $x->execute();
                 $x->close();
              
             }
                          $this->databasex->close();
     }
     
     
     
     
     
}



?>
