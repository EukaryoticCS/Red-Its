<?php
include_once("../components/Header.php");
?>

<h1>Signup</h1>
    <form action="/db/apiCreateUser.php" method="post" id="signup" novalidate>        
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        </div>
        
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        
        <!--<div>
            <label for="password_confirmation">Repeat password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>-->
        
        <button onclick="makeuser">Sign up</button>
    </form>

<?php
//if (strlen($_POST["password"]) < 8) 
//{
//    die("Password must be at least 8 characters");
//}

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
?>

<script>
    var request = new XMLHttpRequest();

    function makeuser()
    {
        $username = document.getElementById('username').value;
        $password = document.getElementById('password').value;

        request.open("POST", "../db/apiCreateUser.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send('username=' + $username + "password=" + $password);

        request.onload = () => { window.location = './ShopPage.php' }; //LET'S FUCKING GOOOOOOO
    }
</script>

<?php
include_once "../components/Footer.php";
?>