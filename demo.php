
<?php
session_start();
include 'Includes/nav.php';
include 'Includes/DBConnection.php';
$db = new DBConnection();
$db->Connect();

$sql="SELECT users.username,posts.post_id,posts.post_body,posts.likes,posts.dislikes,posts.post_date,posts.privacy
 FROM posts INNER JOIN users ON posts.user_id = users.user_id";
$result = mysqli_query($db->con,$sql);
$result=mysqli_fetch_all($result);
//echo print_r($result);
//die();
?>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='css/main.css' />
</head>

<body>
<section class="latest-posts">
    <div class="container">
        <h1 style="text-align: center">Latest Posts</h1>
        <div class="row ">
            <?php
            foreach ($result as $post){
                $username=$post[0];
                $postID=$post[1];
                $postBody=$post[2];
                $postLikes=$post[3];
                $postDislikes=$post[4];
                $postDate=$post[5];
                $postPrivacy=$post[6];

                echo"<div class=\"col-sm-12 col-md-7 edit\">";
                echo"<div class=\"card \">";
                echo" <div class=\"card-body\">";
                echo "<h5 class=\"card-title\">{$username} </h5>";
                echo"<h6 class=\"card-subtitle mb-2 text-muted\">{$postDate}</h6>";
                echo "<p class=\"card-text\">{$postBody}</p>";
                echo" <p class=\"count\">{$postLikes} likes</p>";
                echo "<p class=\"count\">700 comments</p>";
                echo "<p class=\"count\">{$postDislikes} Dislikes</p>";
                echo"<hr>";
                echo"<a href=\"#\" class=\"btn btn-primary\">Like</a>";
                echo"<a href=\"#\" class=\"btn btn-primary\">Comment</a>";
                echo"<a href=\"#\" class=\"btn btn-primary\">Dislike</a>";
                echo"</div>";
                echo"</div>";


                $commentQuery="SELECT DISTINCT users.username,comments.comment,comments.date from ((comments 
                INNER JOIN users ON comments.user_id=users.user_id) INNER JOIN posts ON comments.post_id ='$postID')";
                $comments = mysqli_query($db->con,$commentQuery);
                $comments=mysqli_fetch_all($comments);
                echo "<div class=\"col-sm-12\">";
                    echo "<div class=\"card \">";
                        echo "<div class=\"card-body\">";


                foreach ($comments as $newComment){
                    $name=$newComment[0];
                    $comment_body=$newComment[1];
                    $date=$newComment[2];

                                 echo"<h5 class=\"card - title\"> $name </h5>";
                                echo "<h6 class=\"card - subtitle mb - 2 text - muted\">$date</h6>";
                                echo"<p class=\"card - text\">$comment_body</p>";
                                echo "<hr>";
                }

                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo"<form class='\"commentform\"' id='formtocomment'>";
                           echo "<input type=\"hidden\" value=\"$postID\" name=\"postid\">";
                           echo "<input type=\"hidden\" name=\"username\" id='user'>";
                           
                           echo "<a href='#' class=\"btn btn - success commentbotton \" data-test='comment'>Comment</a>";
                           echo "<input type=\"text\" style=\" width: 100 %;margin - bottom: 10px;\" class=\"form - group commentvalue\" name='comment' id='commentvalue'>";
                   echo "</form>";
                echo"</div>";
            }
            $db->Disconnect();
            ?>
        </div>
    </div>
</section>

<!--end latest posts section-->

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/code.js"></script>
</body>
</html>
