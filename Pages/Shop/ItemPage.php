<?php
include_once("../../components/Header.php");
include_once("../../components/ShopLinks.php");
session_start();
?>

<p id="JsonData">NO DATA!</p>

<script>
    let itemRequest = new XMLHttpRequest();

    window.onload = function () {
        const userId = <?php echo $_SESSION['userId'] ?>;
        loadUser(userId);
        loadJson();
    };

    function loadJson() {
        picked_item = <?php echo $_GET['id']; ?>;
        console.log(picked_item);
        itemRequest.open('POST', '../../db/apiReadOneRecord.php'); //Call endpoint
        itemRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        itemRequest.onload = loadComplete
        itemRequest.send('itemId=' + picked_item);
    }

    function loadComplete(evt) {
        var myResponse = null;
        var myData = null;
        var myReturn = "";

        myResponse = itemRequest.responseText;
        console.log(myResponse);
        myData = JSON.parse(myResponse)[0];
        myReturn += "<br /> <img src=" + myData.jsonImageURL + " style='width:25%'/><br />" + myData.jsonName + "<br /> " + myData.jsonPrice;
        document.getElementById("JsonData").innerHTML = myReturn;
    }
</script>



