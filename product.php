<?php
session_start();

$page_title = 'Browse Music';

include ('includes/header.php');

require ('DBConnect.php');

$q = "SELECT `entity_product`.`name`, `entity_product`.`price`, `entity_product`.`stock`, `entity_product`.`description`, `entity_product`.`image`, `entity_product`.`artist`, `xref_album_product`.`id_product` FROM `test`.`entity_album` `entity_album`, `test`.`enum_media` `enum_media`, `test`.`enum_artist` `enum_artist`, `test`.`xref_album_product` `xref_album_product`, `test`.`entity_product` `entity_product` WHERE `entity_album`.`id_media` = `enum_media`.`id_type` AND `entity_album`.`id_artist` = `enum_artist`.`id_artist` AND `xref_album_product`.`id_product` = `entity_product`.`id_product` AND `xref_album_product`.`id_album` = `entity_album`.`id_album`";

$id = $_GET['id'];
//echo "the id is $id <br>";

if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {

    $q = "SELECT `entity_product`.`name`, `entity_product`.`price`, `entity_product`.`stock`, `entity_product`.`description`, `entity_product`.`image`, `entity_product`.`artist`, `xref_album_product`.`id_product` FROM `test`.`entity_album` `entity_album`, `test`.`enum_media` `enum_media`, `test`.`enum_artist` `enum_artist`, `test`.`xref_album_product` `xref_album_product`, `test`.`entity_product` `entity_product` WHERE `entity_album`.`id_media` = `enum_media`.`id_type` AND `entity_album`.`id_artist` = `enum_artist`.`id_artist` AND `xref_album_product`.`id_product` = `entity_product`.`id_product` AND `xref_album_product`.`id_album` = `entity_album`.`id_album` AND `xref_album_product`.`id_product` = $id";
    //echo "this is running <br>";
}

if (!$q) {
    exit('Product does not exist!');
}


$result = mysqli_query($conn, $q);

$product = mysqli_fetch_array($result, MYSQLI_ASSOC);

//   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//       echo $row['name'];
//       echo "<br>";
//       echo '<img class="img" width="100" height="100" src="' . $row['image'] . '">';
//       echo "<br>";

//   }

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="styles/product.css" />


</head>

<body>
    <?php
    if (isset($_COOKIE['user'])) {
        // echo "cart cookie is set!<br>";
        // echo "user session is set!<br>";
        // echo "the contents of the cookie are: ";
        // var_dump($_COOKIE['cart']);
    } else {
        //echo "failed getting cookies";
    }
    ?>

    <div class="duplicate-msg" display="none">
    </div>

    <div class="product-content-wrapper">

        <!-- <img src="<?= $product['image'] ?>" class="product-img" width="400" height="400"> -->
        <div class="product-container">
            <img src="<?= $product['image'] ?>" id="product-img" width="450" height="450">
            


            <!--possibly change the method to method='get'? IFF it won't create errors-->
            <!-- <form class="add-to-cart" action="index.php?page=cart&id=<?= $product['id_product'] ?>&quantity="
                method="post">  -->

            <div class="product-info">
                <div class="product-name"><h1 id="name"> <?= $product['name'] ?></h1></div>
                <div class="artist"><h2>By <?= $product['artist'] ?></h2></div>
                    <div class="price">
                    &dollar; <?= $product['price'] ?>
                </div>
                <input type="number" name="quantity" value="1" min="1" max="<?= $product['stock'] ?>"
                    placeholder="Quantity" required>
                <input type="hidden" class="product_id" value="<?= $product['id_product'] ?>">

                <input type="hidden" class="price" value="<?= $product['price'] ?>">
                <!-- <input type="submit" id="submit" value="Add to Cart"> -->

                <script>
                    let productName = document.getElementById("name");
                    productName = productName.innerText;

                    let productImg = document.getElementById("product-img");
                    // Get the value of the src attribute
                    productImg = productImg.getAttribute("src");
                </script>
                <div class="description">
                    <?= $product['description'] ?>
                </div>
                <input class="toCart"
                    onclick="addToCart(<?= $product['id_product'] ?>,productImg, productName,document.getElementsByName('quantity')[0].value, <?= $product['price'] ?>)"
                    type="submit" id="add-to-cart" value="Add to Cart">
                    
            </div>

            <!-- </form> -->


            


        </div>

    </div>

    <script src="cart_functions.js"></script>
</body>

</html>

<!-- <?php
if (isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true); // Assuming the cart cookie contains JSON data
    $cart[$product['id_product']] = "2"; // Add or update the quantity for the product
} else {
    echo "cookie not set";
}
?> -->