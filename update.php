<?php
include("db.php");

$diary=mysqli_real_escape_string($conn,$_POST['diary']);
$sid=$_SESSION['id'];
$sql="UPDATE `diary` SET `note`='$diary' WHERE id=$sid ";
if (mysqli_query($conn, $sql)) {
	 echo "Record updated successfully";
}else{
    echo "Error updating record: ".mysqli_error($conn);
}
mysqli_close($conn);
?>