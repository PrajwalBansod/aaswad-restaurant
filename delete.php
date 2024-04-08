<?php
include("connection.php");
$id =$_GET['id'];
$sql="DELETE FROM reg3 WHERE id='$id'";
$data =mysqli_query($conn,$sql);
if($data) {
    header("Location: show.php?id=$id");
}
else {
echo " record not deleted";
}
?>

