<!doctype html>
<?php session_start(); ?>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/products.css">
        <link rel="stylesheet" type="text/css" href="css/registration.css">
        <link rel="stylesheet" type="text/css" href="css/admin_panel.css">
        <script src="js/main.js"></script>
        <title>YourBike</title>
    </head>

    <body class="bg-light">

        <div id="header">
            <?php include_once("header.php"); ?>
        </div>

        <div class="container-fluid bg-light" id="main">
            <?php
            include_once("main.php"); ?>
        </div>

            <?php include_once("footer.php"); ?>
    </body>
</html>