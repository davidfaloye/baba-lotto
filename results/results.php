<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/dbconnect.php'; 
date_default_timezone_set('Africa/Lagos');

class Results extends Database{
    public $empt="";
    public $public_x="yes";
    
    function get_all(){
$xyz=[];$zyx=[];
        $this->connectDB();
        $sql="SELECT Date_X,Generated_X,Date_Time FROM Generated_X WHERE Generated_X <> ? AND Public=? ORDER BY id DESC";
        if($x=$this->databasex->prepare($sql)){
            $x->bind_param('ss',$this->empt,$this->public_x);
            $x->execute();
            $x->store_result();
            if($x->num_rows() > 0){
                
                $x->bind_result($date_x,$numbers,$date_time);
                while($x->fetch()){
                    $xyz['date_x']=$date_x;
                    $ex=explode(",",$numbers);
                    $xyz['num1']=$ex[0];
                    $xyz['num2']=$ex[1];
                    $xyz['num3']=$ex[2];
                    $xyz['num4']=$ex[3];
                    $xyz['num5']=$ex[4];
                    $xyz['time_x']=date("h:i a", strtotime($date_time));
                    $zyx[]=$xyz;
                }
                
            }
            $x->close();
            
            return json_encode($zyx);
        }
        $this->databasex->close();
    }
    
    
        function get_one($date){
$xyz=[];$zyx=[];
        $this->connectDB();
        $sql="SELECT Date_X,Generated_X,Date_Time FROM Generated_X WHERE Date_X=? AND Generated_X <> ? AND Public=?";
        if($x=$this->databasex->prepare($sql)){
            $x->bind_param('sss',$date,$this->empt,$this->public_x);
            $x->execute();
            $x->store_result();
            if($x->num_rows() > 0){
                
                $x->bind_result($date_x,$numbers,$date_time);
                while($x->fetch()){
                    $xyz['date_x']=$date_x;
                    $ex=explode(",",$numbers);
                    $xyz['num1']=$ex[0];
                    $xyz['num2']=$ex[1];
                    $xyz['num3']=$ex[2];
                    $xyz['num4']=$ex[3];
                    $xyz['num5']=$ex[4];
                    $xyz['time_x']=date("h:i a", strtotime($date_time));
                    $zyx[]=$xyz;
                }
                
            }
            $x->close();
            
            return json_encode($zyx);
        }
        $this->databasex->close();
    }
    
    
}

?>
