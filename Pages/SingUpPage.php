<?php
include_once "Header.php";
?>

<h1>Signup</h1>
    <form action="process-signup.php" method="post" id="signup" novalidate>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        
        <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email">
        </div>
        
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        
        <div>
            <label for="password_confirmation">Repeat password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        
        <button>Sign up</button>
    </form>

<?php
if (strlen($_POST["password"]) < 8) 
{
    die("Password must be at least 8 characters");
}

if (empty($_POST["username"])) {
    die("Username is required");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) 
{
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) 
{
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$mysqli = require __DIR__ . "/dbFunctions.php";

$sql = "INSERT INTO user (Username, password)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
    $_POST["username"],
    $password);  
if ($stmt->execute()) {

    header("Location: /Shop/ShopPage.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("Username already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
?>

<?php
include_once "Footer.php";
?>