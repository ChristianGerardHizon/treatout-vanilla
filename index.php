<?php   
include 'library/config.php';
include 'classes/users.php';

$user = new User();

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
    </head>

    <body>
        <!-- Header -->
        <section>
            <a href="">Treatout</a>
            <ul>
                <li> <a href="">Home </a></li>
                <li> <a href="index.php?mod=about-us">About Us</a></li>
                <li> <a href="index.php?mod=contact-us">Contact Us</a> </li>
                <li> <a href="index.php?mod=places">Places</a> </li>
            </ul>
        </section>    
        <!-- Body  -->
        <section id="mainContainer">
        <?php
            switch($module){
                case '':
                    require_once 'modules/client/home/home.php';
                    break;
                case 'about-us':
                    require_once 'modules/client/about-us/about-us.php';
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
    </body>
</html>
