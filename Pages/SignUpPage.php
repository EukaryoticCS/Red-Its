<?php
include_once("../components/Header.php");
?>

<script>
    var request = new XMLHttpRequest();

    function makeuser() {
        $username = document.getElementById('username').value;
        $password = document.getElementById('password').value;

        request.onload = () => { console.log("made it here!"); window.location = './index.php' }; //LET'S FUCKING GOOOOOOO
        request.open("POST", "../db/apiCreateUser.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send('username=' + $username + "&password=" + $password);
    }
</script>

<h1>Signup</h1>
<div>
    <label for="username">Username</label>
    <input type="text" id="username" name="username" />
</div>

<div>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" />
</div>

<div>
    <label for="password_confirmation">Repeat password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" />
</div>

<button onclick="makeuser()">Sign up</button>

<?php
include_once "../components/Footer.php";
?>