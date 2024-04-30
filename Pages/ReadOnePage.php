<?php
include_once("../components/Header.php");
include("../components/Card.php");

?>
<form>
    <label for="search">Search:</label>
    <input type="text" id="search" placeholder="Enter ID..." />
    <button type="button" onclick="loadJson()">Submit</button>
</form>

<p id="JSONData">No Data!</p>

<script>
    var request = new XMLHttpRequest();

    function loadJson() {
        $itemId = document.getElementById('search').value;
        request.open("POST", "../db/apiReadOneRecord.php");
        request.onload = loadComplete;
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send('itemId=' + $itemId);
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

        myReturn += "<div class='card'>" +
            "<img src=" + myData[0].jsonImageURL + " style='width:100%'>" +
            "<div class='container'>" +
            "<h4><b>" + myData[0].jsonName + "</b></h4>" +
            "<p>$" + myData[0].jsonPrice + "</p>" +
            "<button type='Button' onClick='deleteItem(" + currentItem.jsonId + ")'>Delete</button>" +
            "</div>" +
            "</div>";
        console.log(myReturn);
        document.getElementById("JSONData").innerHTML = myReturn;
    }
</script>

<?php
include_once("../components/Footer.php");
?>