
<?php
session_start();
include 'Includes/nav.php';
include 'Includes/DBConnection.php';
$db = new DBConnection();
$db->Connect();

$sql="SELECT users.username,posts.post_id,posts.post_body,posts.likes,posts.dislikes,posts.post_date
 FROM posts INNER JOIN users ON posts.user_id = users.user_id";
$result = mysqli_query($db->con,$sql);

function getComments($post_id,$connection){

    $sql="SELECT DISTINCT users.username,comments.comment,comments.date from ((comments 
    INNER JOIN users ON comments.user_id=users.user_id) INNER JOIN posts ON comments.post_id ='$post_id')";
    $r = mysqli_query($connection,$sql);

        echo "<div class=\"col-sm-12\">";
            echo "<div class=\"card \">";
               echo "<div class=\"card-body\">";
            while($comment = mysqli_fetch_assoc($r)) {
                $name=$comment['username'];
                $comment_body=$comment['comment'];
                $date=$comment['date'];
                echo "<h5 class=\"card-title\">$name </h5>
                     <h6 class=\"card-subtitle mb-2 text-muted\">$date</h6>
                     <p class=\"card-text\">$comment_body</p>
                     <hr>";
                }
                     echo"<form class='\"commentform\"'>
                           <input type=\"hidden\" value=\"$post_id\" name=\"postid\">
                           <input type=\"hidden\" value=\"{$_SESSION['username']}\" name=\"username\" id='user'>
                           <input type=\"text\" style=\" width: 100%;margin-bottom: 10px;\" class=\"form-group\" name='comment' id='commentvalue'>
                           <a href=\"#\" class=\"btn btn-success commentbotton\" >Comment</a>                          
                     </form>";

               echo "</div>";
            echo "</div>";
        echo "</div>";

}

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
                    while($post = mysqli_fetch_assoc($result)){
                        $postID=$post["post_id"];
                         echo"<div class=\"col-sm-12 col-md-7 edit\">";
                              echo"<div class=\"card \">";
                                   echo" <div class=\"card-body\">";
                                   echo "<h5 class=\"card-title\">{$post["username"]} </h5>";
                                   echo"<h6 class=\"card-subtitle mb-2 text-muted\">{$post['post_date']}</h6>";
                                   echo "<p class=\"card-text\">{$post['post_body']}</p>";
                                   echo" <p class=\"count\">{$post['likes']} likes</p>";
                                   echo "<p class=\"count\">700 comments</p>";
                                   echo "<p class=\"count\">{$post['dislikes']} Dislikes</p>";
                                   echo"<hr>";
                                   echo"<a href=\"#\" class=\"btn btn-primary\">Like</a>";
                                   echo"<a href=\"#\" class=\"btn btn-primary\">Comment</a>";
                                   echo"<a href=\"#\" class=\"btn btn-primary\">Dislike</a>";
                                    echo"</div>";
                                echo"</div>";
                                getComments($postID,$db->con);
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
