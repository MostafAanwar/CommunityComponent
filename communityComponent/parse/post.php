<?php include './includes/config.php'; ?>

<?php
if(isset($_POST['post'])) {
    $post = strip_tags(mysql_real_escape_string($_POST['post']));
    $user = $_SESSION['username'];
    
    mysql_query("INSERT INTO post VALUES(4,2,'c++','$user',now(),'$post')");
    echo "<div class='success'>Posted</div>";
}
?>