
<?php
session_start();
include 'Includes/nav.php';
include 'Includes/DBConnection.php';
$db = new DBConnection();
$db->Connect();

$sql="SELECT users.username,posts.post_id,posts.post_body,posts.likes,posts.dislikes,posts.post_date,posts.Rating_state
 FROM posts INNER JOIN users ON posts.user_id = users.user_id order by posts.post_id DESC";
$result = mysqli_query($db->con,$sql);
$Allposts = mysqli_fetch_all($result, MYSQLI_ASSOC);
function getComments($post_id,$connection)
{

    $sql = "SELECT DISTINCT users.username,comments.comment,comments.date from ((comments 
    INNER JOIN users ON comments.user_id=users.user_id) INNER JOIN posts ON comments.post_id ='$post_id')";
    $r = mysqli_query($connection, $sql);

    echo "<div class=\"parent\">";
        echo "<div class=\"\">";
            echo "<div class=\"mystyle\" id='$post_id'>";
                while ($comment = mysqli_fetch_assoc($r)) {
                        $name = $comment['username'];
                        $comment_body = $comment['comment'];
                        $date = $comment['date'];

                        echo "       <div class='mycomment'>
                                        <h5 class=\"\">$name </h5>
                                        <h6 class=\"\">$date</h6>
                                        <p class=\"\" >$comment_body</p>
                                        <hr>
                                      </div>";
                        }
            echo "</div>";
        echo "</div>";
    echo "</div>";
    echo "<div class='form-style'>
                <form class='\"commentform\"' id='formtocomment'>
                    <input type=\"hidden\" value=\"$post_id\" name=\"postid\">
                    <input type=\"hidden\" value=\"{$_SESSION['username']}\" name=\"username\" id='user'>
                    <input type=\"text\" style=\" width: 100%;margin-bottom: 10px;\" class=\"form-group commentvalue \" 
                    name='comment' placeholder='Write a comment'>
                    <input type=\"submit\" style=\" width: 100%;margin-bottom: 10px;\" class=\"form-group commentbutton btn btn-dark\" name='submit' value='Comment'>
                    <p class='par'></p>                 
                </form>
           </div>";
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
                    <?php foreach ($Allposts as $post):?>

                        <div class="col-sm-12 col-md-7 edit">
                            <div class="card ">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $post["username"]; ?> </h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $post['post_date']; ?></h6>
                                    <p class="card-text"><?php echo $post['post_body']; ?></p>
                                    <p class="count" id="likes"><?php echo $post['likes']; ?> Like(s)</p>
                                    <p class="count" id="dislikes"><?php echo $post['dislikes']; ?> Dislike(s)</p>
                                    <hr>

                                    <a href="" class="btn btn-primary like" data-id="<?php echo $post['post_id'];?>"
                                    data-state="<?php echo $post['Rating_state'];?>">
                                        <?php if($post['Rating_state']==1):?>
                                            <span>Liked</span>
                                        <?php else:?>
                                            <span>Like</span>
                                        <?php endif;?>
                                    </a>
                                    <a href="" class="btn btn-primary dislike" data-id="<?php echo $post['post_id'];?>"
                                       data-state="<?php echo $post['Rating_state'];?>">
                                        <?php if($post['Rating_state']==2):?>
                                            <span>Disliked</span>
                                        <?php else:?>
                                            <span>Dislike</span>
                                        <?php endif;?>
                                    </a>
                                </div>
                            </div>
                            <?php
                                $ThePostId = $post['post_id'];
                                getComments($ThePostId,$db->con);
                            ?>
                        </div>
                    <?php endforeach;?>
                    <?php $db->Disconnect();?>
                </div>
            </div>
        </section>

    <!--end latest posts section-->

    <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/code.js"></script>
    </body>
</html>
