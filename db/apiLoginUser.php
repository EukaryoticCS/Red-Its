<?php
include_once "dbFunctions.php";
header('Content-Type: application/json');

$MyDBConn = GetConnection();
$username = $_POST['username'];
$password = $_POST['password'];
$MyJSONResult = MyJSONLoginUser($MyDBConn, $username, $password);


$MyJSON = null;
$row = null;
$rowArray = null;

if ($MyJSONResult) {
    while ($row = mysqli_fetch_array($MyJSONResult)) {
        $rowArray[] = json_decode($row[0]);
    }
    $MyJSON = json_encode($rowArray);
}

mysqli_close($MyDBConn);


echo $MyJSON;

?>