<?php
session_start();
?>

<html>
<head>
    <meta content="text/html" charset="iso-8859-1" />
    <title>Red-Its - Red Goods and More</title>
    <link rel="stylesheet" type="text/css" href="../<?php echo $_SESSION["MyTheme"]; ?>.css"  />
</head>
<br />
<body>
    <div class="menu_bar">
        <div class="center">
            <a class="beautiful_a_tag" href="../Pages/index.php">Home</a>
            &nbsp;
            <a class="beautiful_a_tag" href="../Pages/CreatePage.php">Create</a>
            &nbsp;
            <a class="beautiful_a_tag" href="../Pages/ReadPage.php">View All</a>
            &nbsp;
            <a class="beautiful_a_tag" href="../Pages/ReadOnePage.php">Search</a>
            &nbsp;
            <a class="beautiful_a_tag" href="../Pages/UpdatePage.php">Update</a>
            &nbsp;
            <button class="beautiful_a_tag" onclick="change_theme()"><img width="20" height="20" src="../Images/theme_icon.png" /></button>
        </div>
    </div>




   <script>
       var request = new XMLHttpRequest;

       function change_theme()
       {
           theme_index = <?php echo $_SESSION["CurrentThemeIndex"]?>;           request.open('GET', '../Pages/ChangeTheme.php');
           request.setRequestHeader("Content-type", "application/x-www-fm-urlenced");
           request.send();
           request.onload = () => { window.location = '..<?php echo $_SERVER['REQUEST_URI']; ?>' }; //LET'S FUCKING GOOOOOOO

       }

   </script>
    