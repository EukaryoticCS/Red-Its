<?php
session_start();

include "../Images";
if (!isset($_SESSION["CurrentThemeIndex"])) {
    $_SESSION["CurrentThemeIndex"] = 0;
}

if (!isset($_SESSION["MyTheme"])) {
    $_SESSION["MyTheme"] = "StyleSheet";
}

if (!isset($_SESSION["userId"])) {
    $_SESSION["userId"] = 0;
}

?>

<html>
<head>
    <meta content="text/html" charset="iso-8859-1" />
    <title>Red-Its - Red Goods and More</title>
    <link rel="stylesheet" type="text/css" href="/<?php echo $_SESSION["MyTheme"]; ?>.css" />
</head>
<br />
<body>
    <div class="menu_bar">
        <div class="center">
            <a class="beautiful_a_tag" href="/Pages/index.php">Home</a>
            &nbsp;
            <a class="beautiful_a_tag" href="/Pages/Shop/ShopPage.php">Shop</a>
            &nbsp;
            <a class="beautiful_a_tag" href="/Pages/AboutPage.php">About</a>
            &nbsp;
            <a class="beautiful_a_tag" href="/Pages/LoginPage.php">Login</a>
            <div id="secretbutton"></div>
            &nbsp;
            <button class="beautiful_a_tag" onclick="change_theme()"><img width="20" height="20" src="/Images/theme_icon.png" /></button>
        </div>
    </div>



    <script>
        var request = new XMLHttpRequest; 
        var userRequest = new XMLHttpRequest;
        let user = {};

        function change_theme() {
            theme_index = <?php echo $_SESSION["CurrentThemeIndex"] ?>;
            request.open('GET', '/Pages/ChangeTheme.php');
            request.setRequestHeader("Content-type", "application/x-www-fm-urlenced");
            request.send();
            request.onload = () => { window.location = '<?php echo $_SERVER['REQUEST_URI']; ?>' }; //LET'S FUCKING GOOOOOOO

        }

        window.onload = function () {
            const userId = <?php echo $_SESSION['userId']; ?>;
            loadUser(userId);
        }

        function loadUser($userId) {
            userRequest.open("POST", "../../db/apiGetUser.php");
            userRequest.onload = userLoaded;
            userRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            userRequest.send('userId=' + $userId);
        }

        function userLoaded(event) {
            user = userRequest.responseText !== "" ? JSON.parse(userRequest.responseText)[0] : {};
            if (user.admin) {
                document.getElementById("secretbutton").innerHTML = "&nbsp; <a class='beautiful_a_tag' href='/Pages/CreatePage.php'>Create Listing</a>";
            } else {
                document.getElementById("secretbutton").innerHTML = "";
            }
        }

    </script>
