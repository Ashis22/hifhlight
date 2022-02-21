<?php 

$con =mysqli_connect("localhost","root","","tutorial");

$sql= "select * from tut";

$result = mysqli_query($con, $sql);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Tutorial Snippet</title>
</head>
<body>
	<nav>
		<div class="logo">tutorial</div>
		<ul>
			<li>php</li>
			<li>css</li>
			<li>html</li>
			<li>sql</li>
			<li>python</li>
		</ul>
		<div class="login">
			<a href="admin\login.php">login</a>
		</div>
		<div class="project">
			<ul>
				<li>project1</li>
				<li>project2</li>
				<li>project3</li>
				<li>project4</li>
				<li>project5</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="main">
			
			
			
			<hr>
			<div class="snippet">
				<h3>all snippet</h3><br>
				
					
						<?php 
						while($row = mysqli_fetch_assoc($result)){
							echo "<h4>".$row['title']."</h4>";
							echo "<p>".$row['content']."</p> <br>";
						}
					    ?>
					
			</div>

		</div>
		<div class="right">
			<h3>view code snippet</h3>
			<div>
				 <div class="code-block">
				 	<?php $row1 = mysqli_fetch_assoc($result1); ?>
				 	<pre><code class="language-<?php echo $row1['cat']; ?>"><?php echo $row1['content']; ?></code></pre>
				 </div>
			</div>
		</div>
	</div>
	
</body>
</html>