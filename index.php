<?php
session_start();
$_SESSION['username']="Ahmed Nabil";
$_SESSION['userid']=1;
include 'Includes/nav.php';
?>
<html>
<head>
    <link rel='stylesheet' type='text/css' href='css/main.css' />
</head>
    <body>
        <div class='middle'>
            <div id='post'>
                <form action='#' method='post' id="myform">
                    <textarea id='post-body' name='post-body' placeholder = 'Post something'></textarea>
                    <div class="desc">Choose the type of your post (Hint: Private means unseen for others)</div>
                    <input type="radio" name="privacy" value="0" class="privacy"> Private<br>
                    <input type="radio" name="privacy" value="1" class="privacy"> Public<br>
                    <div class="sub"><input type='submit' name='submitp' id='submitp' value='Post' /></div>
                </form>
                <div id="demo">
                    <ol id="demolist">

                    </ol>>
                </div>
            </div>
            <div id='newsfeed'>

            </div>
            <div class='sidepanel'>
                <img alt='profile picture' src="img/fancypixel.jpg" height='250' width='200' />
                <br />
                <hr />
                <div class='activity'>
                    <h2>Activity</h2>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/code.js"></script>
    </body>
</html>
