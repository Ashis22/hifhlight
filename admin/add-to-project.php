<?php 
$con =mysqli_connect("localhost","root","","tutorial");

	if(isset($_GET['val'])){
		$iid= (int)$_GET['val'];
		$sql= "select pid, ptitle, remarks from project where pid='$iid'";
	}	

	

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="..\style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="..\asset/prism.css">
	
	
</head>
<body>
	<nav>

		<div class="logo"><a href="hello.php">tutorial</a></div>


		<ul>
			
		</ul>
		<div class="login">
			<a href="admin\login.php">login</a>
			<span>logout option</span>
		</div>
	</nav>
	<div class="container">
		<div class="main">
			<div class="snippet">
				<h2>Project detail</h2>
				<?php 
				$result= mysqli_query($con,$sql);
						while($row = mysqli_fetch_assoc($result)){
							$title = $row['ptitle'];
							$remarks = $row['remarks'];
							echo "<h3>".$title."</h3><p>".$remarks."<p><br>";
						}
					$sql2 = "select * from projects where project_id ='$iid' order by position";
					$result2 =mysqli_query($con,$sql2);
					 	  if(mysqli_num_rows($result2) == 0){
					 	  	echo "ADD content<br>";
					 	  	$position = 1;
					 	  }else{
					 	  	$position = mysqli_num_rows($result2) +1;
					 	  	while($row2 = mysqli_fetch_assoc($result2)){
					 	  		$cid = $row2['content_id'];
					 	  	$sql3 = "select * from tut where id ='$cid'";
					 	  	$result3= mysqli_query($con,$sql3);
					 	  			$row3 = mysqli_fetch_assoc($result3);
					 	  			echo "<h3>".$row3['title']."</h3>".$row3['content']."<br>";
					 	  	?>
					 	  			<div class="code line-numbers">
					 	  				<pre><code class="language-<?php echo $row3['cat'];?>"><?php echo $row3['code']; ?></code></pre>
					 	  			</div>

					 	  	<?php 			
					 	  	}
					 	  }
					 	  if(isset($_POST['submit'])){
					 	  	$content2 = mysqli_real_escape_string($con, $_POST['name']);
					 	  	$content1 = explode(',',$content2);
					 	  	$content = end($content1);
					 	  	echo $content."<br>";
					 	  	echo $position;
					 	  	$sql4 ="insert into projects (project_id,content_id,position) values('$iid','$content','$position')";
					 	  	$result4 =mysqli_query($con,$sql4);
					 	  }
					  
				?> 
			</div>
			<hr>
			<div class="tutorial">
				<h3>Add content in project</h3>

				<form action="" method="post">
										
				Content:
				 <input type="text" name="name" id="title" autocomplete="off" class="nice" value=""><br><br>
				 
				
			
			<input type="submit" name="submit" id="" value="submit"> <br>
			</form>
			<a href='edit-project.php?val=<?php echo $iid; ?>'>edit it</a>
			</div>
			
			
			
		</div>
		
	</div>
	<script type="text/javascript">
		$(function() {
		     $( ".nice" ).autocomplete({
		       source: 'search_tut.php',
		     });
		  });
	</script>
	
	<script src="../asset/prism.js"></script>
</body>
</html>