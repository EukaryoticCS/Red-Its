<?php
//Given an id, delete a record
include_once "dbFunctions.php";
header('Content-Type: application/json');

$MyDBConn = GetConnection();
$ItemId = $_POST['itemId'];
$MyJSONResult = MyJSONDelete($MyDBConn, $ItemId);

mysqli_close($MyDBConn);
?>