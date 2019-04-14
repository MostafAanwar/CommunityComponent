<?php
session_start();
include 'Includes/DBConnection.php';
    $db=new DBConnection();
    $db->Connect();
    $post=$_POST['post-body'];
    $privacy=$_POST['privacy'];
    $userId=1;
    $date=date("Y/m/d H:i:s");
$sql = "INSERT INTO posts (post_body,privacy,user_id,likes,dislikes,post_date)
 values ('$post','$privacy','$userId',0,0,'$date')";
mysqli_query($db->con,$sql);
$db->Disconnect();

