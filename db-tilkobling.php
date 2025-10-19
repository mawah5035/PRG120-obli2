<?php
$host = "b-studentsql-1.usn.no";
$user ="mawah5035"; 
$pass = "5128mawah5035";
$db = "mawah5035";

$db= mysqli_connect($host, $user, $pass, $db);

if($db->connect_error) {
    die("Tilkoblingsfeil:" . $db->connect_error);
}

?>
