    <?php

    session_start();

    if (!isset($_SESSION['loggedin'])) {

        header('Location: index.html');

    exit;

    }

    ?>

    <?php

    include('Navbar.php');

    ?>

    <!DOCTYPE html>

        <html lang="ro">

    <head>

        <title>Toy Store</title>

    <link href="home.css" rel="stylesheet">

    </head>

    <body>

    <h1>Bine ati revenit <?=$_SESSION['nume']?>!</h1>

    </body>

    </html>