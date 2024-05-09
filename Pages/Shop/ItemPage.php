<?php
include_once("../../components/Header.php");
include_once("../../components/ShopLinks.php");
?>
<script>
    window.onload = function () {
        console.log("Onload worked");
        loadJson();
    };
    function loadJson() {
        picked_item = <?php echo $_GET['id']; ?>
        request.open('POST', '../db/apiReadOneRecord.php'); //Call endpoint
        request.onload = loadComplete
        request.send();
    }

    function loadComplete(evt) {
        var myResponse = null;
        var myData = null;
        var myReturn = "";

        myResponse = request.responseText;
        console.log(myResponse);
        myData = JSON.parse(myResponse);
        console.log(myData);
        for (index in myData) {
            myReturn += "<br /> <img src=" + myData[index].imageUrl + "><br />" + myData[index].name + "<br /> " + myData[index].price;
        }
        document.getElementById("JsonData").innerHTML = myReturn;
    }
</script>



