<?php
$con = mysqli_connect("127.0.0.1","root","","communityDB");
    if(isset($_POST['submit'])){
        
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $md5pass = md5($pass);
        $query = mysqli_query($success,"select * from user where userName ='$username' and password = '$md5pass' Limit 1");
        $get = mysqli_fetch_assoc($success,$query);
        $sql = mysqli_query($success, "SELECT * FROM user WHERE username = '".$_POST['username']."' and password = '".md5($_POST['password'])."'");
        $row = mysqli_num_rows($sql);
        if($get = ""){
            echo "no such user";
        }
        else{
            echo "logged in";
        }
    }
?>