    <html lang="ro">

    <head>

        <title>Toy Store</title>

        <link rel="stylesheet" href="navbar.css">

    </head>

    <style>

        .dropbtn {

    background-color: peru;

    color: white;

    padding: 16px;

        font: ;font-size: 16px;

    border: none;

            cursor: pointer;

    }


    .dropdown {

    position: relative;

    display: inline-block;

    }


        .dropdown-content {

            display: none;

            position: absolute;

            background-color: #f9f9f9;

    min-width: 160px;

            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

    z-index: 1;

    }


        .dropdown-content a {

    color: black;

    padding: 12px 16px;

            text-decoration: none;

    display: block;

    }

    .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {

            display: block;

    }

    </style>

    <body>


    <nav id="topnav">

        <a id="logo"  class="nav-link" href="#">ToyStore</a>

    <a class="nav-link" href="Home.php">Home</a>

        <a class="nav-link" href="Magazin.php">Products</a>

    <div class="dropdown">

        <button class="dropbtn">Categories</button>

        <div class="dropdown-content">

            <a href="papusi.php">Papusi</a>

            <a href="lego.php">Lego</a>

            <a href="masinute.php">Masinute</a>

            <a href="jucariiplus.php">Jucarii plus</a>

            <a href="Figurine">Figurine</a>

        </div>

    </div>

    <a class="nav-link" href="Index.html">Login</a>

    <a class="nav-link" href="Logout.php">Logout</a>


        <a id="about" class="nav-link" href="Cos.php">Cos</a>

    </nav>

    </body>

    </html>

