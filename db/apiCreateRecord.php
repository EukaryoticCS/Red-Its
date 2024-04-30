<?php
//Copy code from previous module for API
//Create a new record
include_once "dbFunctions.php";
header('Content-Type: application/json');

$MyDBConn = GetConnection();
$ItemImageURL = $_POST['itemImageURL'];
$ItemName = $_POST['itemName'];
$ItemPrice = $_POST['itemPrice'];
$MyJSONResult = MyJSONCreate($MyDBConn, $ItemImageURL, $ItemName, $ItemPrice);

mysqli_close($MyDBConn);
?>