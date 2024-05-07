<?php
include_once("../components/Header.php");
include("../components/Card.php");
//Given an id, read record
//Read all records -- May do 2 separate pages instead

?>

<p id="JSONData">No Data!</p>

<script>
    var request = new XMLHttpRequest();

    //OnLoad() function
    window.onload = function () {
        loadJson();
    }

    function loadJson() {
        request.open("GET", "../db/apiReadRecords.php");
        request.onload = loadComplete;
        request.send();
    }

    function deleteItem($itemId) {
        var newRequest = new XMLHttpRequest();
        newRequest.open("POST", "../db/apiDeleteRecord.php");
        newRequest.onload = loadJson();
        newRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        newRequest.send('itemId=' + $itemId);
    }

    function loadComplete(event) {
        var myResponse = null;
        var myData = null;
        var myReturn = "<div class='container' style='display: table-row'></div>";

        console.log(request);
        console.log("ResponseText: " + request.responseText);

        myResponse = request.responseText;

        myData = JSON.parse(myResponse);

        console.log(myResponse);

        for (index in myData) {
            let currentItem = myData[index]
            myReturn +=
                "<div class='card'>" +
                "<img src=" + currentItem.jsonImageURL + " style='width:100%'>" +
                "<div class='container'>" +
                "<h4><b>" + currentItem.jsonName + "</b></h4>" +
                "<p>$" + currentItem.jsonPrice + "</p>" +
                "<button type='Button' onClick='deleteItem(" + currentItem.jsonId + ")'>Delete</button>" +
                "</div>" +
                "</div>";
        }
        console.log(myReturn);
        document.getElementById("JSONData").innerHTML = myReturn;
    }
</script>

<?php
include_once("../components/Footer.php");
?>