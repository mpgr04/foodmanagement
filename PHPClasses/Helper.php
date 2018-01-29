<?php

class DatabaseHelper
{
    public function Connect($server, $user, $password, $db="")
    {
        if ($db=="") {
            $connection=mysqli_connect($server, $user, $password);
        } else {
            $connection=mysqli_connect($server, $user, $password, $db);
        }
        
        if($connection!=""){
            
            if($connection!=false){
                return $connection;
            }
        }
    }
    public function Disconnect($dbc){
        if($dbc!=""){
            mysqli_close($dbc);
        }
        
    }
    public function CheckConnection($dbc){
        
        if($dbc!=""){
            $result=mysqli_ping($dbc);
            return $result;
        }
        
    }
    public function GetRowNr($resultObject){
        
        if($resultObject!=""){
            $value=mysqli_num_rows($resultObject);
            return $value;
        }
        
    }
    public function Query($connection,$query){
        $result=mysqli_query($connection,$query);
        
        return $result;
    }
    public function RESCStr($connection,$string){
        
        $str=mysqli_real_escape_string($connection,$string);
        return $str;
        
    }
}
?>