<?php
// include database connection file
include_once("dbConnect.php");

// Get id from CoursAdm to delete that course
$id = $_GET['id'];

// Delete course row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM courses WHERE id=$id");

// After delete redirect to CoursAdm, so that course list will be displayed.
header("Location:CoursAdm.php");
?>

