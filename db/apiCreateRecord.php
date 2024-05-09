<?php
//Copy code from previous module for API
//Create a new record
include_once "dbFunctions.php";
header('Content-Type: application/json');

$MyDBConn = GetConnection();
$ItemImageURL = $_POST['itemImageURL'];
$ItemName = $_POST['itemName'];
$ItemPrice = $_POST['itemPrice'];
$category = $_POST['category'];
$MyJSONResult = MyJSONCreate($MyDBConn, $ItemImageURL, $ItemName, $ItemPrice, $category);

mysqli_close($MyDBConn);
?>