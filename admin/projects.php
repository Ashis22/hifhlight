<?php 
$con =mysqli_connect("localhost","root","","tutorial");
if (isset($_POST['submit'])){
	$ptitle = mysqli_real_escape_string($con, $_POST['ptitle']);
	$remarks = mysqli_real_escape_string($con, $_POST['remarks']);
	
	
	$sql= "insert into project (ptitle,remarks) values ('$ptitle','$remarks')";	
	$result = mysqli_query($con, $sql);

}
	$sql1= "select id, cat, title from tut";

	$result1 = mysqli_query($con, $sql1);

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	
	
</head>
<body>
	<nav>

		<div class="logo"><a href="hello.php">tutorial</a></div>


		<ul>
			<?php 
			$cat_query = "select * from project";
			// to get specifific project
			$cat_result = mysqli_query($con,$cat_query);
			while($cat_row = mysqli_fetch_assoc($cat_result)){
				echo "<li>".$cat_row['cat']."</li>";
			}
			?>
		</ul>
		<div class="login">
			<a href="admin\login.php">login</a>
			<span>logout option</span>
		</div>
	</nav>
	<div class="container">
		<div class="main">
			<div class="snippet">
				<h3>all snippet</h3>
				<ol>
					
						<!-- <?php 
						while($row = mysqli_fetch_assoc($result1)){
							$id = $row['id'];
							$title = $row['title'];
							echo "<li>".$row['cat']." "."<a href=\"hello.php?val=$id\"><strong>$title</strong></a>"."</li>";
						}
					    ?> -->
					</li>
				</ol>
			</div>
			<hr>
			<div class="tutorial">

				<form action="" method="post">
						
					Project Title:
					 <input type="text" name="ptitle" id="title" autocomplete="off"><br>
					 <label for="remarks">Remarks:</label>
					 <textarea name="remarks" autocomplete="off" rows="4"></textarea>
					
				
				<input type="submit" name="submit" id="" value="submit"> <br><br>
				</form>
			</div>
			
			
			
		</div>
		
	</div>
	
	<script src="asset/prism.js"></script>
</body>
</html>