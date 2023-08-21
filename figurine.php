    <?php

    include('Navbar.php');

    ?>

    <?php

    require_once "ShoppingCart.php";?>

    <html lang="ro">

    <head>

        <title>Creare cos cumparaturi </title>

        <link href="style.css" type="text/css" rel="stylesheet"/>

    </head>

    <body style="background-color:white">

    <div id="produse" style="font-size: 300%">Produse</div></div>

    <?php

    $shoppingCart = new ShoppingCart();

    $query = "SELECT * FROM produse";

    $product_array = $shoppingCart->getAllFigurine($query);


    if (! empty($product_array)) {

    foreach ($product_array as $key => $value) {

        ?>

        <form method="post" action="Cos.php?action=add&code=<?php

        echo $product_array[$key]["code"]; ?>">

            <div id="img" class="Product-images">
                <img src="<?php echo $product_array[$key]["image"]; ?>" width="500px" height="500px">
            </div>

            <div  >
                <strong><?php echo $product_array[$key]["name"]; ?></strong>
            </div>

            <div  >
                <strong><?php echo $product_array[$key]["code"]; ?></strong>
            </div>

            <div >
                <strong><?php echo $product_array[$key]["descriere"]; ?></strong>
            </div>

            <div  class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>

            <div >

                <input type="text" name="quantity" value="1" size="2" />

                <input type="submit" value="Add to cart"
                       class="btnAddAction" />

            </div>

        </form>

        </div>

        <?php
    }
    }

    ?>

    </div>

    </body>

    </html>
