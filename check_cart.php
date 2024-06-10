<?php
session_start();
include ('includes/header.php');
//echo "you are in the cart page<br>";
$user = $_COOKIE['user'];
//echo "Welcome, " . $user . "!";
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Special+Elite&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="checkoutStyle.css">


</head>

<body>
    <div class="show-cart">
        <h1><?= $_SESSION['user'] ?>'s Music:</h1>
        <div class="labels">
            <div class="product-title">Product</div>
            <div class="product-quantity">Quantity</div>
            <div class="product-price">Price</div>
            <div class="product-total">Total</div>
        </div>
        <div class="items">

        </div>
        <div class="cart-total">

        </div>



    </div>
    <script>
        let cart = JSON.parse(localStorage.getItem('inCart'));

        let listOfItems = document.querySelector(".items");
        let totalPriceContainer = document.querySelector('.cart-total');
        let calcTotal = 0;


        cart.forEach(product => {
            // Iterate through each key-value pair in the product object

            let productDiv = document.createElement("div");
            productDiv.classList.add("product-container");
            product.forEach(item => {
                // Create a new <p> element for the key
                let totalP = parseFloat(item.price) * parseInt(item.quantity);
                tot = totalP.toFixed(2);

                let pId = document.createElement("p");
                pId.classList.add("product-name");


                let pQuant = document.createElement("p");
                pQuant.classList.add("product-quantity");

                let pPrice = document.createElement("p");
                pPrice.classList.add("product-price");


                let total = document.createElement("p");

                total.classList.add("product-total");
                // Set the inner text of the <p> element to the key
                pId.innerText = item.name;
                pPrice.innerText = "$" + item.price;
                pQuant.innerText = item.quantity;
                total.innerText = "$" + totalP;
                calcTotal += totalP;


                console.log("total is " + tot);
                // Append the <p> element to the .items container
                productDiv.appendChild(pId);
                productDiv.appendChild(pQuant);
                productDiv.appendChild(pPrice);
                productDiv.appendChild(total);



            });
            listOfItems.appendChild(productDiv);
            // Append an <hr> element after each product
            let hr = document.createElement("hr");
            listOfItems.appendChild(hr);
            console.log(calcTotal);
        });
        totalPriceContainer.innerText = "Total in Cart: " + calcTotal;

        /* THIS WORKS TOO
        cart.forEach(product => {
            let stringProduct = JSON.stringify(product);
            let li = document.createElement("p");
            li.innerText = stringProduct;
            listOfItems.appendChild(li);
            let hr = document.createElement("hr");
            listOfItems.appendChild(hr);

            // Create and append the <hr> element after each product <li>
            
            //THE ONE BELOW WORKS
            // let stringProduct = JSON.stringify(product);
            // let li = document.createElement("li");
            // li.innerText = stringProduct;
            // listOfItems.appendChild(li)
        }); */
    </script>


</body>

</html>