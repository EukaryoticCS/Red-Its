<?php
include_once "dbFunctions.php";
header('Content-Type: application/json');

$MyDBConn = GetConnection();
$UserId = $_POST['userId'];
$MyJSONResult = DeleteUser($MyDBConn, $UserId);

mysqli_close($MyDBConn);
?>