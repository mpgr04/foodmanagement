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
        
        if($connection){
            return $connection
        }
    }
    public function Disconnect($dbc){
        mysqli_close($dbc);
    }
    public function CheckConnection($dbc){
        $result=mysqli_ping($dbc);
        
        return $result;
    }
    public function GetRowNr($resultObject){
        $value=mysqli_num_rows($resultObject);
        return $value;
    }
    public function Query($connection,$query){
        mysqli_query($connection,$query);
    }
}
?>