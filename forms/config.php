<?php 
	session_start();

    $conn = mysqli_connect("localhost", "root", "", "filedata");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
?>