<?php
include 'library/config.php';
include 'classes/users.php';

$user = new User();

$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Treatout </title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
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
        <?php
          switch($module){
            case '':
                require_once 'modules/client/home/home.php';
            case 'about-us':
                require_once 'modules/client/about-us/about-us.php';
                break;
            case 'contact-us':
                require_once 'modules/client/contact-us/contact-us.php';
                break;
            case 'places':
                require_once 'modules/client/places/places.php';
                break;
            default: 
                 require_once 'modules/client/home/home.php';
        }
        ?>

        <!-- Body  -->
        <section>
        
        </section>
    </body>
</html>
