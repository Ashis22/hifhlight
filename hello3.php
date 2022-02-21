<?php 
$con =mysqli_connect("localhost","root","","tutorial");

	$sql= "select * from tut";

	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_assoc($result);

			// echo $row["cat"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="asset/prism.css">
	<title>Document</title>
	
	
</head>
<body>
	<nav>
		<div class="logo">tutorial</div>
		<ul>
			<li>php</li>
			<li>css</li>
			<li>html</li>
			<li>sql</li>
		</ul>
		<div class="login">
			<a href="admin\login.php">login</a>
		</div>
	</nav>
	<div class="main">
		<h3><?php echo $row["title"]; ?></h3>
		<div class="code">
			<?php echo $row['content']; ?>
		</div>
		<div class="code">
			<pre>
				<code class="language-<?php echo $row['cat']; ?>">
					<?php echo $row['code']; ?>
				</code>
			</pre>
		</div>
		
		

	</div>
	
	<script src="../asset/prism.js"></script>
	
</body>
</html>