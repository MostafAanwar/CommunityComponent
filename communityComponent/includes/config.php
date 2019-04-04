<?php
//connect to DB
$con = mysqli_connect("127.0.0.1","root","","communityDB");
//echo "ok everything is gut";
//mysql_query("INSERT INTO post VALUES(5,1,'c++','xxHackerUserxx',CURRENT_TIMESTAMP,'This is a test post content')");
$sql = "INSERT INTO post VALUES(54242,14242421,'c','xxHackerUserxx',,'This is a test post content')";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

?>