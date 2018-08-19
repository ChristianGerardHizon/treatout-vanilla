<?php   
include 'library/config.php';
include 'classes/transportation.php';
include 'classes/places.php';

$places = new Places($connection);
$transportation = new Transportation($connection);

$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';
$place = (isset($_GET['place']) && $_GET['place'] != '') ? $_GET['place'] : '';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Treatout </title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="index.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="index.js"></script>
    </head>

    <body>
		<!-- Header -->
        <header id="header">
            <a class="logo" href="index.php">Treatout</a>
            <nav>
                <a href="#menu">Menu</a>
            </nav>
        </header>

		<!-- Nav -->
        <nav id="menu">
            <ul class="links">
            <li> <a href="index.php">Home </a></li>
            <li> <a href="index.php?mod=about-us">About Us</a></li>
            <li> <a href="index.php?mod=contact-us">Contact Us</a> </li>
            <li> <a href="index.php?mod=places&service=tourist+spot">Tourist Spots</a> </li>
            <li> <a href="index.php?mod=places&service=restaurant">Restaurant</a> </li>
            <li> <a href="./admin">Admin</a> </li>
            </ul>
        </nav>
        <!-- Body  -->
        <section id="mainContainer">
        <?php
            switch($module){
                case '':
                    require_once 'modules/client/home/home.php';
                    break;
                case 'search':
                    require_once 'modules/client/search/search.php';
                    break;
                case 'about-us':
                    require_once 'modules/client/about-us/about-us.php';
                    break;
                case 'directions':
                    require_once 'modules/client/directions/directions.php';
                    break;
                case 'contact-us':
                    require_once 'modules/client/contact-us/contact-us.php';
                    break;
                case 'places':
                    if($place != '' ){
                        require_once 'modules/client/place/place.php';
                    }else {
                        require_once 'modules/client/places/places.php';
                    }
                    break;
                default: 
                        require_once 'modules/client/home/home.php';
                        break;
            }
        ?>
        </section>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
