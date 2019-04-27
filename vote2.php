<?php 
	session_start();
	$_SESSION['userid'] = 2;
	$userid = $_SESSION['userid'];
	$connect = mysqli_connect('localhost' , 'root' , '' , 'like');

	$query = "
		SELECT posts.id , posts.text , COUNT(likes.id) as likes 
		From posts LEFT JOIN likes ON posts.id = likes.postid
		GROUP BY posts.id
		";
	$result = mysqli_query($connect , $query);

	 while ($row = mysqli_fetch_array($result)) {	?>
	<div class="content">		
	<?php	echo '<h3>'.$row['text'].'</h3>'.' ';  
		$query2 = "	SELECT * FROM likes WHERE userid= 2 AND postid=".$row["id"]."";
		$result2 = mysqli_query($connect , $query2);


		if (mysqli_num_rows($result2) == 1)
			echo '<a href="vote2.php?type=posts&id='.$row["id"].'">
				<button class="unlike"><i class="far fa-thumbs-down"></i></button>
				</a>'.'';
		else  {
			echo '<a href="vote2.php?type=poste&id='.$row["id"].'">
				<button class="like"><i class="far fa-thumbs-up"></i></button>
				</a>'.' ';
		}
		echo $row['likes'];
	?>	
		</div>
	<?php
	}

	if (isset($_GET["type"] , $_GET["id"]))
	{

		$type = $_GET["type"]; 
		$id = $_GET["id"];

		if ($type == "poste"){
			$query = "
				INSERT INTO `likes`(`userid`, `postid`) VALUES ($userid ,$id )
			";
			mysqli_query($connect , $query);
			header("location: vote2.php");
		}
		elseif ($type == "posts") {
			$query = "
				DELETE FROM `likes` WHERE postid=$id
			";
			mysqli_query($connect , $query);
			header("location: vote2.php");
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Like</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<style type="text/css">
		button
		{
			width: 60px;
			height: 20px;
			border-radius:20%;
		}
		.content
		{
			width: 50px auto;
			height: 30% auto;
			border: 1px solid #cbcbcb;
			padding: 4px;
		}
	</style>
</head>
<body>

</body>
</html>