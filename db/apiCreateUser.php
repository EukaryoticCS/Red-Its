<?php
include_once "dbFunctions.php";
header('content-type: application/json');

$MyDBConn = GetConnection();
$Username = $_POST['username'];
$Password = $_POST['password'];
$MyJSONResult = CreateUser($MyDBConn, $Username, $Password);

mysqli_close($MyDBConn);
?>