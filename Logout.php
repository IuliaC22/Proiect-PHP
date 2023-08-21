    <?php

    require_once 'ShoppingCart.php';

    session_start();

    $client_id=$_SESSION['loggedin'];

    $shoppingCart = new ShoppingCart();

    $shoppingCart->emptyCart($client_id);

    session_destroy();

    // Redirectare pagina principala produse:

    header('Location: Magazin.php');

    ?>
