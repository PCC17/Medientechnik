<?php
    $whiteList = array("home.php", "contact.php");
?>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>blueIt</title>
    <meta name="author" content="Paul Camerloher">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <img src="Images/header.png" width="100%">
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class=?include ('containerOpenStyle.php')?>
        <nav class="navbar navbar-default navbar-static-top" style="background: cornflowerblue;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php?action=home.php" class="navLink">Home</a></li>
                        <li><a href="index.php?action=about.php" class="navLink">About</a></li>
                        <li><a href="index.php?action=port.php" class="navLink">Portfolio</a></li>
                        <li><a href="index.php?action=contact.php" class="navLink">Kontakt</a></li>
                        <li><a href="index.php?action=profil.php" class="navLink">Mein Konto</a></li>
                    </ul>
        </nav>

            <?php
                if(!isset($_GET["action"]) || !in_array($_GET["action"], $whiteList)) {
                    include ("home.php");
                } else {
                    include ($_GET["action"]);
                }
            ?>

</div>
</body>
</html>