<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Đăng nhập thành công</h1>
	<?php session_start(); echo($_SESSION["test"])?>
	<form action="success.php" id="form" method="GET">
		<div class="form-control">
			<label for="">What's your name?</label>
			<input type="text" name="name" placeholder="Type your name..">
		</div>
		<button type="submit">Ok</button>
	</form>
	<?php 
	if(isset($_GET["name"])){
		$username = $_GET["name"];	
		if($username){
			echo "Hello $username";
		}
	}	
	?>
	
</body>
</html>
