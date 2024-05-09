<?php
include_once("../components/Header.php");
include("../components/Card.php");

?>

<form>
    <label for="imageURL">Image URL:</label>
    <input type="text" id="imageURL" placeholder="e.g., '..\\Images\\Apple.png'" />
    <input type="text" id="name" placeholder="e.g., 'Apple'" />
    <input type="text" id="price" placeholder="e.g., 4.50" />
    <select id="category">
        <option value="Food">Food</option>
        <option value="Clothing">Clothing</option>
        <option value="Stickers">Stickers</option>
        <option value="Miscellaneous">Miscellaneous</option>
     </select>

    <button type="button" onclick="createItem()">Submit</button>
</form>

<script>
    var request = new XMLHttpRequest();

    function createItem() {
        $itemImageURL = document.getElementById('imageURL').value;
        $itemName = document.getElementById('name').value;
        $itemPrice = document.getElementById('price').value;
        $category = document.getElementById('category').value;
        console.log($category);

        request.onload = () => { window.location = './Shop/ShopPage.php' }; //LET'S FUCKING GOOOOOOO
        request.open("POST", "../db/apiCreateRecord.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send('itemImageURL=' + $itemImageURL + "&itemName=" + $itemName + "&itemPrice=" + $itemPrice + "&category=" + $category);
    }
</script>


<?php
include_once("../components/Footer.php");
?>