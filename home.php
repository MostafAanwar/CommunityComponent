<?php
session_start();
$_SESSION['username']="Ahmed Nabil";
$_SESSION['userid']=1;
include 'Includes/nav.php';
?>

<html>
<head>
    <link rel='stylesheet' type='text/css' href='css/home.css' />
</head>
    <body>
        <div class='middle'>
            <div id='post'>
                <form action='#' method='post'>
                <h3>Job Description: </h3>
                <textarea rows="4" cols="50" placeholder = 'Write a brief description about the job.' required></textarea>                
                <h3>Main activities:</h3>
                <textarea rows="4" cols="50" placeholder = 'Write the main tasks the applicant will do.' required></textarea>
                <h3>Application Deadline: </h3>
                <input type="date" required>
                <h3>Duration: </h3>
                <h3>Salary: </h3>
                <input type = "number" min="0" max="">
                <h3>Extra details: </h3>
                <textarea rows="4" cols="50" placeholder = 'Write a brief description about the job.'></textarea>
                <div class="sub"><input type='submit' name='submitp' id='submitp' value='Post' /></div>
                </form>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/code.js"></script>
    </body>
</html>