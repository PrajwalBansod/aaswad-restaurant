<?php
error_reporting(0);
$servername = "localhost";
$username   = "root"; 
$password   = ""; 
$dbname     = "myprogramming2";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn)
 {
    "Connection ok ";

}
 else
 {
    echo "Connected failed".mysqli_connect_error();
}
?>
