<?php

class DBConnection
{

    public $host="localhost";
    public $user="root";
    public $pass="";
    public $DB="communitydb";
    public $con;

    public function Connect(){
        $this->con=new mysqli($this->host,$this->user,$this->pass,$this->DB);
        if(!$this->con){
            echo "<h1>Connection Failed</h1>";
            exit();
        }
    }
    public function Disconnect(){
        $done=mysqli_close($this->con);
        if(!$done){
            echo "<h1>Closing Connection Failed</h1>";
        }
    }
}