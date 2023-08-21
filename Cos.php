
    <?php

    require_once "ShoppingCart.php";

    session_start();

    // Dacă utilizatorul nu este conectat redirecționează la pagina de autentificare ...

    if (!isset($_SESSION['loggedin'])) {

    header('Location: index.html');

    exit;

    }

    // pt membrii inregistrati

    $client_id=$_SESSION['loggedin'];

    $shoppingCart = new ShoppingCart();


    if (! empty($_GET["action"])) {

    switch ($_GET["action"]) {

        case "add":

            if (! empty($_POST["quantity"])) {

                $productResult = $shoppingCart->getProductByCode($_GET["code"]);

                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $client_id);


                if (! empty($cartResult)) {

                    // Modificare cantitate in cos

                    $newQuantity = $cartResult[0]["quantity"] +

                        $_POST["quantity"];

                    $shoppingCart->updateCartQuantity($newQuantity,

                        $cartResult[0]["id"]);

                } else {

                    // Adaugare in tabelul cos

                    $shoppingCart->addToCart($productResult[0]["id"],

                        $_POST["quantity"], $client_id);
                }

            }
            break;

            case "remove":

                // Sterg o sg inregistrare

                $shoppingCart->deleteCartItem($_GET["id"]);

            break;

            case "empty":

                // Sterg cosul

            $shoppingCart->emptyCart($client_id);

            break;

    }

    }

    ?>

    <html lang="ro">

    <head>

    <title>Creare cos permament in PHP</title>

    </head>

    <style>

        .cart-image{

        width: 80px;

            height: 80px;

            border-radius: 100%;

        border: #E0E0E0 1px solid;

        padding: 2px;

            vertical-align: middle;

        margin-right: 20px;
    }

    .btnCart{

        margin-right: 40px;

        text-decoration: none;
    }

    </style>

    <body style="background-color:peru">

    <div id="shopping-cart">

    <div class="txt-heading">Cos cumparaturi<a href="Cos.php?action=empty"><img src="Product-images/empty-cart1.png" title="Empty Cart" align="right" height="40px" width="40px"></a>
    </div>

        <hr>

        <?php

    $cartItem = $shoppingCart->getClientCartItem($client_id);

    if (! empty($cartItem)) {

        $item_total = 0;

        ?>

        <table  cellpadding="30" cellspacing="1">

            <tbody>

            <tr>
                <th style="text-align:left;">Name</th>

                <th style="text-align:left;">Code</th>

                <th style="text-align:right;" width="20%">Quantity</th>

                <th style="text-align:right;" width="20%">Price</th>

                <th style="text-align:right;" width="20%">Remove</th>
            </tr>

            <?php

            foreach ($cartItem as $item) {

                ?>

                <tr>
                    <td><img src="<?php echo $item["image"]; ?>" class="cart-image" /><?php echo $item["name"]; ?></td>

                    <td><?php echo $item["code"]; ?></td>

                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>

                    <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>

                    <td
                            style="text-align: right;"><a

                                href="Cos.php?action=remove&id=<?php echo

                                $item["cos_id"]; ?>"

                                class="btnRemoveAction"><img src="Product-images/icon-delete.png"
                                                             alt="icon-delete" height="40" width="40" title="Remove Item" /></a></td>

                </tr>


                <?php

                $item_total += ($item["price"] * $item["quantity"]);
            }

            ?>

            <tr>

                <td colspan="3"

                    align=right><strong>Total:</strong></td>

                <td align=right><?php echo "$".$item_total; ?></td>

                <td></td>

            </tr>

            </tbody>

        </table>

        <?php
    }
    ?>

    </div>


    <div  class="btnCart" align="right">

        <a href="Magazin.php" style="color: black; text-decoration: none">Alegeti alt produs</a></div>

    <div class="btnCart" align="right">

        <a href="Logout.php" style="color: black; text-decoration:none">Abandonati sesiunea de cumparare</a></div>

    </body>

    </html>