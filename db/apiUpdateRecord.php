<?php
//Build SQL dynamically to leave fields as is if empty
//Given id and data, update a record
include_once "dbFunctions.php";
header('Content-Type: application/json');

$MyDBConn = GetConnection();
$ItemId = $_POST['itemId'];
$ItemImageURL = $_POST['itemImageURL'];
$ItemName = $_POST['itemName'];
$ItemPrice = $_POST['itemPrice'];
$MyJSONResult = MyJSONUpdate($MyDBConn, $ItemId, $ItemImageURL, $ItemName, $ItemPrice);

mysqli_close($MyDBConn);
?>