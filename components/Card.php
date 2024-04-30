<?php
use UI\Controls\Button;

function WriteCard($imgURL, $name, $price)
{
    echo "<div class='card'>
            <img src=$imgURL style='width:100%'>
                <div class='container'>
                    <h4><b>$name</b></h4>
                    <p>$price</p>
                    <button type='Button'>Delete</button>
                </div>
          </div>";
    return 1;
}
?>