<?php 
	session_start();
	$username = $_GET["username"];
	$pass = $_GET["password"];

	// Create connection
	$conn = new mysqli('localhost', 'root', '', 'testqlsv');
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM sinhvien where name='$username' and address='$pass'";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$_SESSION["test"] = $sql;
	  header("Location: success.php");
	} else {

	  header("Location: index.php");
	}
	$conn->close();
 ?>