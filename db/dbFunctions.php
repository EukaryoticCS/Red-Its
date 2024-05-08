<?php

define("DB_USER", "MyUser");
define("DB_PASSWORD", "talasIV");
define("DB_SERVER", "localhost");
define("DB_NAME", "csc_270");

function GetConnection()
{
    $DatabaseConnection = @mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME)
        or die("Failed to connect to DB: " . DB_SERVER . " :: " . DB_NAME . " :: " . DB_USER);
    return $DatabaseConnection;
}

function MyJSONGetOne($DatabaseConnection, $itemId)
{
    $query = "SELECT JSON_OBJECT('jsonId', item.id,
	'jsonImageURL', item.imageURL,
    'jsonName', item.name,
    'jsonPrice', item.price) as Json1
    FROM shopitems item
    WHERE item.id = $itemId;";

    $result = mysqli_query($DatabaseConnection, $query);

    return $result;
}

function MyJSONGetAll($DatabaseConnection)
{
    $query = "SELECT JSON_OBJECT('jsonId', item.id,
	'jsonImageURL', item.imageURL,
    'jsonName', item.name,
    'jsonPrice', item.price,
    'jsonCategory', item.category) as Json1
    FROM shopitems item;";

    return @mysqli_query($DatabaseConnection, $query);
}

function MyJSONCreate($DatabaseConnection, $imageURL, $name, $price)
{
    $query = "INSERT INTO shopitems (imageURL, name, price) VALUES ('$imageURL', '$name', $price);";

    return @mysqli_query($DatabaseConnection, $query);
}

function MyJSONUpdate($DatabaseConnection, $itemId, $imageURL, $name, $price)
{
    $query = "UPDATE shopitems
    SET imageURL = '$imageURL',
	name = '$name',
    price = $price
    WHERE id = $itemId;";

    return @mysqli_query($DatabaseConnection, $query);
}

function MyJSONDelete($DatabaseConnection, $itemId)
{
    $query = "DELETE FROM shopitems
    WHERE id = $itemId;";

    return @mysqli_query($DatabaseConnection, $query);
}

function GetUser($DatabaseConnection, $userId) {
    $query = "SELECT JSON_OBJECT('userId', user.id,
    'username', user.username,
    'password', user.password,
    'admin', user.admin) as Json1
    FROM users user
    WHERE user.id = $userId;";

    return @mysqli_query($DatabaseConnection, $query);
}

function CreateUser($DatabaseConnection, $username, $password) {
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password');";

    return @mysqli_query($DatabaseConnection, $query);
}

function DeleteUser($DatabaseConnection, $userId) {
    $query = "DELETE FROM users
    WHERE id = $userId;";

    return @mysqli_query($DatabaseConnection, $query);
}
?>