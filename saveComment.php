<?php
session_start();
include 'Includes/DBConnection.php';

$userId=1;
if(isset($_POST['postid'])&&isset($_POST['username'])&&isset($_POST['comment'])){
    if(!empty($_POST['postid'])&&!empty($_POST['username'])&&!empty($_POST['comment'])){

        $db=new DBConnection();
        $db->Connect();
        $date=date("Y/m/d H:i:s");

        $postId = $_POST['postid'];
        $username = $_POST['username'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO comments (comment,date,user_id,post_id)
        values ('$comment','$date','$userId','$postId')";
        mysqli_query($db->con,$sql);
        $db->Disconnect();

        echo "      <div class='mycomment'>
                        <h5 class=\"card-title\">$username </h5>
                        <h6 class=\"card-subtitle mb-2 text-muted\">$date</h6>
                        <p class=\"card-text\" >$comment</p>
                        <hr>
                     </div>";
    }
}