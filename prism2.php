<?php 
$con =mysqli_connect("localhost","root","","tutorial");

	$sql= "select * from tut";

	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// foreach ($row as $value) {
	// 	echo $value["cat"]."</br>";
	// }
			


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="asset/prism.css">
	<style>
		.code{
			width: 50vw;
			/*margin-left: auto;*/
			/*margin-right: auto;*/
		}
	</style>
	
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
		<ol>
		<?php foreach ($row as $value) { ?>
		<h3><?php echo "<li>".$value["title"]."</li>"; ?></h3>
		<div class="code">
			<?php echo $value["content"]; ?>
		</div>
		<div class="code line-numbers">
			<pre><code class="language-<?php echo $value['cat'];?>"><?php echo $value['code']; ?></code></pre>
		</div>
		<?php } ?>
		</ol>

	</div>
	<script src="asset/prism.js"></script>
</body>
</html>