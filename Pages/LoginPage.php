<?php
include_once "../components/Header.php";
ob_start();
session_start();


if(isset( $_POST["userId"])) {
    $_SESSION["userId"] = $_POST["userId"];
};
?>



<h2 style="margin-left:10rem; margin-top:5rem;">Enter Username and Password</h2>
<script>
    msg = '';
    var request = new XMLHttpRequest();

    function readUser() {
        $username = document.getElementById('username').value;
        $password = document.getElementById('password').value;

        request.open("POST", "../db/apiLoginUser.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.onload = () => {
            console.log(request)
            if (request.responseText) {
                myResponse = request.responseText;
                myUser = JSON.parse(myResponse)[0];
                var newRequest = new XMLHttpRequest();
                newRequest.open('POST', './LoginPage.php', true);
                newRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                newRequest.onload = function () {
                    window.location = './Shop/ShopPage.php'
                }
                newRequest.send('userId=' + myUser);
            }
        }; //LET'S FUCKING GOOOOOOO

        request.send('username=' + $username + "&password=" + $password);
    }
</script>


<h4 style="margin-left:10rem; color:red;"><?php echo $msg; ?></h4>
<br /><br />
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" />
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" />
    </div>
    <section style="margin-left:2rem;">
        <button type="button" onclick="readUser()" name="login">Login</button>
        <br />
        <a href="../Pages/SignUpPage.php">Sign up</a>
    </section>
</form>


<?php
include_once "../components/Footer.php";
?>