<?php
session_start();
include 'Includes/DBConnection.php';
$db = new DBConnection();
$db->Connect();

$postId = $_POST['postid'];
$state = $_POST['state'];
$to = $_POST['to'];

if($to === 'like'){
    $query = "SELECT posts.likes from posts where posts.post_id = $postId";
    $result = mysqli_query($db->con, $query);
    $likes = mysqli_fetch_assoc($result);

    $newLikes = $likes['likes']+1;
    $q = "update posts set posts.likes = $newLikes,posts.Rating_state = 1 where posts.post_id = $postId";
    mysqli_query($db->con,$q);
    $db->Disconnect();
    echo $newLikes;
}
if($to === 'unlike'){
    $query = "SELECT posts.likes from posts where posts.post_id = $postId";
    $result = mysqli_query($db->con, $query);
    $likes = mysqli_fetch_assoc($result);

    $newLikes = $likes['likes']-1;
    $q = "update posts set posts.likes = $newLikes,posts.Rating_state = 0 where posts.post_id = $postId";
    mysqli_query($db->con,$q);
    $db->Disconnect();
    echo $newLikes;
}
if($to === 'dislike'){
    $query = "SELECT posts.dislikes from posts where posts.post_id = $postId";
    $result = mysqli_query($db->con, $query);
    $Dislikes = mysqli_fetch_assoc($result);

    $newDisLikes = $Dislikes['dislikes']+1;
    $q = "update posts set posts.dislikes = $newDisLikes,posts.Rating_state = 2 where posts.post_id = $postId";
    mysqli_query($db->con,$q);
    $db->Disconnect();
    echo $newDisLikes;
}
if($to === 'undislike'){
    $query = "SELECT posts.dislikes from posts where posts.post_id = $postId";
    $result = mysqli_query($db->con, $query);
    $Dislikes = mysqli_fetch_assoc($result);

    $newDisLikes = $Dislikes['dislikes']-1;
    $q = "update posts set posts.dislikes = $newDisLikes,posts.Rating_state = 0 where posts.post_id = $postId";
    mysqli_query($db->con,$q);
    $db->Disconnect();
    echo $newDisLikes;
}
if($to === 'likeUnDislike'){
    $finalResult = array();

    $query = "SELECT posts.likes,posts.dislikes from posts where posts.post_id = $postId";
    $result = mysqli_query($db->con, $query);
    $likesAndDislikes = mysqli_fetch_assoc($result);

    $newDisLikes = $likesAndDislikes['dislikes']-1;
    $newLikes=$likesAndDislikes['likes']+1;
    $q = "update posts set posts.dislikes = $newDisLikes,posts.likes=$newLikes,posts.Rating_state = 1 where posts.post_id = $postId";
    mysqli_query($db->con,$q);
    $db->Disconnect();

    $finalResult=[
        'likes'=>$newLikes,
        'dislikes'=>$newDisLikes
    ];
    echo json_encode($finalResult);
}
if($to === 'dislikeUnlike'){
    $finalResult = array();

    $query = "SELECT posts.likes,posts.dislikes from posts where posts.post_id = $postId";
    $result = mysqli_query($db->con, $query);
    $likesAndDislikes = mysqli_fetch_assoc($result);

    $newDisLikes = $likesAndDislikes['dislikes']+1;
    $newLikes=$likesAndDislikes['likes']-1;
    $q = "update posts set posts.dislikes = $newDisLikes,posts.likes=$newLikes,posts.Rating_state = 2 where posts.post_id = $postId";
    mysqli_query($db->con,$q);
    $db->Disconnect();

    $finalResult=[
        'likes'=>$newLikes,
        'dislikes'=>$newDisLikes
    ];
    echo json_encode($finalResult);
}