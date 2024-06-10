<?php
session_start();
include ('includes/header.php');

// echo $_COOKIE['cart'];
// var_dump($_COOKIE['cart']);

//    require_once ('DBConnect.php');
require_once ('inventory.php');

?>





<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>

<head>
    <title>Music Alley</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shopStyles.css">
    <script src="cart_functions.js"></script>

</head>

<body>
    <?php
    if (isset($_COOKIE['user']) || $_SESSION['user']) {
    
        // echo "The name of the session is " . $_SESSION['user'] . "<br>";
        //echo "Good to go!";
        //echo $_SESSION['user'];
    } else {
        //echo "failed getting cookies<br>";
        
    }

    ?>

    <div class="msg-container">
        <div class="welcome-msg">
            <h1>Welcome, <?= $_SESSION['user'] ?>!</h1><img class="note" src="imgs/note.png" style="height:70px; width: 70px;">
        </div>
</div>

    </div>

    <section>
        <div class="category">
            <h1>CD</h1>
            <hr>
        </div>
        <div class="container">
            <?php $itms = 0;
            foreach ($result_cd as $product):
                $itms++; ?>

                <div class="product-container">
                    <a href="index.php?page=product&id=<?= $product['id_product'] ?>" class="product">
                        <!-- <p>The product id is <?= $product['id_product'] ?></p> -->
                        <img height=210 width=210 src="<?= $product['image'] ?>">
                        <div class="product-name">
                            <h3><?= $product['name'] ?> </h3>
                        </div>
                        <div class="artist"> By <?= $product['artist'] ?></div>
                        <div class="price">
                            &dollar;<?= $product['price'] ?>
                        </div>
                    </a>
                </div>
                <?php if ($itms == 4)
                    echo "<br>"; ?>

            <?php endforeach; ?>
        </div>



        <div class="category">
            <h1>Vinyl</h1>
            <hr>
        </div>
        <div class="container">
            <?php $itms = 0;
            foreach ($result_v as $product):
                $itms++; ?>

                <div class="product-container">
                    <a href="index.php?page=product&id=<?= $product['id_product'] ?>" class="product">

                        <img height=340 width=340 src="<?= $product['image'] ?>">
                        <div class="product-name">
                            <h3><?= $product['name'] ?></h3>
                        </div>
                        <div class="artist"> By <?= $product['artist'] ?></div>
                        <div class="price">
                            &dollar;<?= $product['price'] ?>
                        </div>
                    </a>
                </div>

                <?php if ($itms == 4)
                    echo "<br>"; ?>
            <?php endforeach; ?>
        </div>



    </section>



    <!--        <script type="text/javascript"> 
            //var item1 = new Item("Strawberry","Food", 42, 3.99);
            var item1 = {"Product": "Strawberry", "Category":"Food", 
                         "Stock":"42", "Price": "3.99"};
            var inventory = [];
            inventory[0] = item1;
            
            for (var items = 0; items < inventory.length; items++) {
                document.write("The "+items+" Object</br>");
                 
                var product = inventory[items];
                for (var property in product) {
                    document.write(property+" = "+product[property]+"</br>");
                    
                }
            }
            
        </script>-->
</body>

</html>