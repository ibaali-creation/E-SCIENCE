<?php

// connect to the database
$url='localhost';
$username='root';
$password='';

$link = new mysqli($url,$username,$password,'filedata');
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 




if ( isset( $_FILES['fileToUpload'] ) ) {
	if ($_FILES['fileToUpload']['type'] == "application/pdf") {
		$source_file = $_FILES['fileToUpload']['tmp_name'];
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $id = round(microtime(true));
        $newfilename = $id . '.' . end($temp);
		$dest_file = "../uploads/".$newfilename;
        $filename = $_FILES['fileToUpload']['name'];
        $size = $_FILES['fileToUpload']['size'];
        $publisher = $_POST['publisher'];
        $mail = $_POST['email'];
        $title = $_POST['title'];
        $des = $_POST['description'];

        move_uploaded_file( $source_file, $dest_file )
        or die ("Error!!");
        if($_FILES['fileToUpload']['error'] == 0) {
            $sql = "INSERT INTO files (id,name,publisher,email,title,description) VALUES ('$id','$filename','$publisher','$mail','$title','$des')";
            if(mysqli_query($link, $sql)){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
 
            
            print "Pdf file uploaded successfully!";
            print "<b><u>Details : </u></b><br/>";
            print "File Name : ".$_FILES['fileToUpload']['name']."<br.>"."<br/>";
            print "File Size : ".$_FILES['fileToUpload']['size']." bytes"."<br/>";
            print "File location : upload/".$_FILES['fileToUpload']['name']."<br/>";
        }
		
	}
	else {
		if ( $_FILES['fileToUpload']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['fileToUpload']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['fileToUpload']['error']."<br/>";
		}
	}
}



    


mysqli_close($link);
?>