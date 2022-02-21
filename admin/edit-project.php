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
					while($row2 = mysqli_fetch_assoc($result2)){
						$cid = $row2['content_id'];
						$sql3 = "select title from tut where id='$cid'";
						$result3 =mysqli_query($con,$sql3);
						$row3 = mysqli_fetch_assoc($result3);
						if($row3 && $row3['title'] == !''){
						echo $row2['id']." ".$row3['title']." ".$row2['content_id']." ".$row2['position']."<br>";
					}else{
						echo " for the id ".$row2['id']." in projects table content has moved for content id ".$row2['content_id']." on tut table where order of it in project table is ".$row2['position']."<br>";
					}

					}
					 	  
					  
				?> 
			</div>
			<hr>
			<div class="tutorial">
				<h3>edit content in project</h3>

				<form action="" method="post">
				id: <input type="text" name="same id" id="" placeholder="enter id no where you want to make change"><br>						
				Content:
				 <input type="text" name="name" id="title" autocomplete="off" class="nice" value="" placeholder="look for content if it has moved"><br><br>
				 
				
			
			<input type="submit" name="submit" id="" value="update"> <br>
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