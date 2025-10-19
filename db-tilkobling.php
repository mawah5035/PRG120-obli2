<?php
$host = "b-studentsql-1.usn.no";
$user ="mawah5035"; 
$pass = "5128mawah5035";
$db = "mawah5035";

$conn= mysqli_connect($host, $user, $pass, $db);

if($conn->connect_error) {
    die("Tilkoblingsfeil:" . $conn->connect_error);
}

?>
