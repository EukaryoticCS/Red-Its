<?php
include_once("../../components/Header.php");
include_once("../../components/ShopLinks.php");
?>

<div id="ItemsList" class='container' style='display: table-row'>No Items!</div>

<script>
    var request = new XMLHttpRequest();

    window.onload = function () {
        loadJson();
    }

    function loadJson() {
        request.open("GET", "../../db/apiReadRecords.php");
        request.onload = loadComplete;
        request.send();
    }

    function deleteItem($itemId) {
        var newRequest = new XMLHttpRequest();
        newRequest.open("POST", "../../db/apiDeleteRecord.php");
        newRequest.onload = loadJson();
        newRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        newRequest.send('itemId=' + $itemId);
    }

    function loadComplete(event) {
        var myResponse = null;
        var myData = null;
        var myReturn = "<table> " +
            "<tr class='container' style = 'display: table-row'>";


        myResponse = request.responseText;
        myData = JSON.parse(myResponse);

        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
        });

        let itemsInRow = 0;

        for (let index = 0; index < myData.length; index++) {
            let currentItem = myData[index];
            if (currentItem.jsonCategory == "Clothing") {
                itemsInRow++;
                myReturn +=
                    "<td class='card'>" +
                    "<img src=" + currentItem.jsonImageURL + " style='width:100%'>" +
                    "<div class='container'>" +
                    "<h4><b>" + currentItem.jsonName + "</b></h4>" +
                    "<p>" + formatter.format(currentItem.jsonPrice) + "</p>" +
                    "<button type='Button' onClick='deleteItem(" + currentItem.jsonId + ")'>Delete</button>" +
                    "</div>" +
                    "</td>";
                if (itemsInRow % 4 === 0) {
                    myReturn += "</tr><tr>";
                }
            }

        }

        myReturn += "</tr>" +
            "</table >";

        document.getElementById("ItemsList").innerHTML = myReturn;
    }
</script>

<?php
include_once("../../components/Footer.php");
?>