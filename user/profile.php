<?php
session_start();
// if(!isset($_SESSION['user_id'])){
//     header("location: index.php");
// } 
$con =mysqli_connect("localhost","root","","tutorial");

// $user_id = $_SESSION['user_id'];
// $sql = "SELECT * FROM users WHERE user_id='$user_id'";
// $result = mysqli_query($link, $sql);

// $count = mysqli_num_rows($result);

// if($count == 1){
//     $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
//     $username = $row['username'];
//     $email = $row['email']; 
// }else{
//     echo "There was an error retrieving the username and email from the database";   
// }





 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<nav>

		<div class="logo"><a href="hello.php">tutorial</a></div>


		<ul>
			
		</ul>
		<div class="login">
			<ul>
				  <li><a href="#">Logged in as <b><?php echo $username; ?></b></a></li>
				<li><a href="logout.php">Log out</a></li>
			</ul>
			
		</div>
	</nav>
	
</body>
</html>