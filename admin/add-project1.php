<?php 





 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../asset/prism.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<title>Add Project</title>
</head>
<body>
	<h3>add project</h3>
	<form action="" method="post">
		Title: <input type="text" name="tut" id=""><br>
		Add snippet: <input type="text" name="add-snippet" class="nice" placeholder="details"><br><br>
		<div id="artistList"></div>
		order:<input type="number" name="number"><br>
		<input type="submit" name="add" id="" value="add to project">
	</form>

		
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