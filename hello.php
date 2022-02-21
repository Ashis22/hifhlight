<?php 
$con =mysqli_connect("localhost","root","","tutorial");
if(isset($_GET['val'])){
	$id= (int)$_GET['val'];
}	
if (isset($_POST['submit'])){
	$cat = mysqli_real_escape_string($con, $_POST['language']);
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$description = mysqli_real_escape_string($con, $_POST['description']);
	$code= mysqli_real_escape_string($con,$_POST['code']);
	// $pattern = '/</i';
	// $ncode = preg_replace($pattern, '&lt', $code);
	
	// $title= "<p>boiler plate for html</p>";
	// 	$cat = "html";
	// $str =$_POST['code'];

	// echo $code;
	// exit();
	$sql= "insert into tut (cat,title,content,code) values ('$cat','$title','$description','$code')";

	// echo $sql;
	// exit();
	
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
	<link rel="stylesheet" href="asset/prism.css">
	<script src="tinymce/tinymce.min.js"></script>
		<script>
			tinymce.init({
	  selector: 'textarea',
	  // height: 400,
	  fontsize_formats: '10pt 12pt 14pt 16pt 18pt',
	  menubar: false,
	  force_p_newlines : false,
	  forced_root_block : '',
	  theme: 'modern',
	  plugins: [
	    
	    'lists preview',
	    'wordcount',
	    'emoticons  fullscreen'
	  ],
	  toolbar1: ' fontsizeselect bold aligncenter alignjustify emoticons  preview ',
	  image_advtab: true,
	  templates: [
	    
	    
	  ],
	  content_css: [
	    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	    '//www.tinymce.com/css/codepen.min.css'
	  ]
	 });
		</script>
	
</head>
<body>
	<nav>

		<div class="logo"><a href="hello.php">tutorial</a></div>


		<ul>
			<?php 
			$cat_query = "select distinct cat from tut";
			$cat_result = mysqli_query($con,$cat_query);
			while($cat_row = mysqli_fetch_assoc($cat_result)){
				echo "<li>".$cat_row['cat']."</li>";
			}
			?>
		</ul>
		<div class="login">
			<a href="admin\login.php">login</a>
		</div>
	</nav>
	<div class="container">
		<div class="main">
			<div class="snippet">
				<h3>all snippet</h3>
				<ol>
					
						<?php 
						while($row = mysqli_fetch_assoc($result1)){
							$id = $row['id'];
							$title = $row['title'];
							echo "<li>".$row['cat']." "."<a href=\"hello.php?val=$id\"><strong>$title</strong></a>"."</li>";
						}
					    ?>
					</li>
				</ol>
			</div>
			<hr>
			<div class="tutorial">

				<form action="" method="post">
						language:
						<select name="language" class="custom-select">
						<option>-lang-</option>
						<option value="php">php</option>
						<option value="css">css</option>
						<option value="markup">html</option>
						<option value="sql">sql</option>
						<option value="py">python</option>
						<option value="Git">git</option>
					</select><br><br>
					Title:
					 <input type="text" name="title" id="title" autocomplete="off"><br>
					 <label for="description">Description:</label>
					 <textarea name="description" autocomplete="off" rows="4"></textarea>
					code:
				<textarea name="code" autocomplete="off" rows="15"></textarea><br>
				<input type="submit" name="submit" id="" value="submit"> <br><br>
				</form>
			</div>
			
			
			
		</div>
		<div class="right">
			<h3>view code snippet</h3>
			<div>
				 <div class="code-block">

				 	<?php
				 	if(isset($_GET['val'])){
				 		$iid= (int)$_GET['val'];
				 		$sql2= "select * from tut where id='$iid'";

				 		$result2 = mysqli_query($con, $sql2);

				 		$row2 = mysqli_fetch_assoc($result2);
				 	?>
				 	<h4><?php echo $row2['content']; ?></h4>
				 	<pre><code class="language-<?php echo $row2['cat']; ?>"><?php echo $row2['code']; ?></code></pre>
				 	<?php }
				 	else{
				 		echo "click on the link";
				 	}
				 	?>
				</div>
			</div>
				<a href='edit.php?val=<?php echo $iid; ?>'>edit it</a>
		</div>
	</div>
	<script>
		CKEDITOR.replace('content');
	</script>
	<script src="asset/prism.js"></script>
	<?php  ?>
</body>
</html>