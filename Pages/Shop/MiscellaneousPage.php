<?php
include_once("../../components/Header.php");
include_once("../../components/ShopLinks.php");
session_start();
$_SESSION['userId'] = 3;
?>

<div id="ItemsList" class='container' style='display: table-row'>No Items!</div>

<script>
    var itemsRequest = new XMLHttpRequest();
    var userRequest = new XMLHttpRequest();
    var user = {};

    window.onload = function () {
        const userId = <?php echo $_SESSION['userId'] ?>;
        loadUser(userId);
        loadJson();
    }

    function loadUser($userId) {
        userRequest.open("POST", "../../db/apiGetUser.php");
        userRequest.onload = userLoaded;
        userRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        userRequest.send('userId=' + $userId);
    }

    function userLoaded(event) {
        user = userRequest.responseText !== "" ? JSON.parse(userRequest.responseText)[0] : {};
    }

    function loadJson() {
        itemsRequest.open("GET", "../../db/apiReadRecords.php");
        itemsRequest.onload = loadComplete;
        itemsRequest.send();
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

        myResponse = itemsRequest.responseText;
        myData = JSON.parse(myResponse);

        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
        });

        let itemsInRow = 0;

        for (let index = 0; index < myData.length; index++) {
            let currentItem = myData[index];
            if (currentItem.jsonCategory == "Miscellaneous") {
                itemsInRow++;
                myReturn +=
                    "<td class='card'>" +
                    "<img src=" + currentItem.jsonImageURL + " style='width:100%'>" +
                    "<div class='container'>" +
                    "<h4><b>" + currentItem.jsonName + "</b></h4>" +
                    "<p>" + formatter.format(currentItem.jsonPrice) + "</p>";
                if (user.admin) {
                    myReturn += "<button type='Button' onClick='deleteItem(" + currentItem.jsonId + ")'>Delete</button>";
                }

                myReturn += "</div>" +
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