<?php
session_start();
// Include database connection file
include_once('config.php');
if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}
?>

<?php

$location_with_image_name = $_GET['filename'];

if(file_exists($location_with_image_name)){
	$delete  = unlink($location_with_image_name);
	if($delete){
		echo "delete success";
		header("Location:images_ph.php");
	}else{
	echo "delete not success";
	header("Location:images_ph.php");
	}
}

include 'config.php';

$sql = "DELETE FROM  images WHERE file_name='$location_with_image_name'"; 
		if ($con->query($sql) === TRUE) {
		    echo "Deleted Sucessfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}

// Close MySQL connection
$con->close();

?>