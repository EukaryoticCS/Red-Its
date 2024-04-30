<?php
include_once("../components/Header.php");
include("../components/Card.php");

?>

<form>
    <label for="id">Item ID:</label>
    <input type="text" id="id" placeholder="e.g., 1" />
    <label for="imageURL">Image URL:</label>
    <input type="text" id="imageURL" placeholder="e.g., '..\\Images\\Apple.png'" />
    <label for="name">Name:</label>
    <input type="text" id="name" placeholder="e.g., 'Apple'" />
    <label for="price">Price:</label>
    <input type="text" id="price" placeholder="e.g., 4.50" />
    <button type="button" onclick="updateItem()">Submit</button>
</form>

<script>
    var request = new XMLHttpRequest();

    function updateItem() {
        $itemId = document.getElementById('id').value;
        $itemImageURL = document.getElementById('imageURL').value;
        $itemName = document.getElementById('name').value;
        $itemPrice = document.getElementById('price').value;

        request.onload = () => { window.location = './ReadPage.php' }; //LET'S FUCKING GOOOOOOO
        request.open("POST", "../db/apiUpdateRecord.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send('itemId=' + $itemId + '&itemImageURL=' + $itemImageURL + "&itemName=" + $itemName + "&itemPrice=" + $itemPrice);
    }
</script>

<?php
include_once("../components/Footer.php");
?>