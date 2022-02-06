<?php 

function getfiles() {

	global $conn;
	$sql = "SELECT * FROM files";
	$result = mysqli_query($conn, $sql);

	// fetch all posts as an associative array called $posts
	$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $files;
}


?>