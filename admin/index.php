<?php
session_start();

include '../library/config.php';
include '../classes/places.php';
include '../classes/transportation.php';
include '../classes/user.php';


$transportation = new Transportation($connection);
$user = new User($connection);  



$places = new Places($connection);

$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';
$sub = (isset($_GET['sub']) && $_GET['sub'] != '') ? $_GET['sub'] : '';
$place = (isset($_GET['place']) && $_GET['place'] != '') ? $_GET['place'] : '';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="index.js"></script>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
</head>
<body>

    <!-- Header -->
    <header id="header">
        <a class="logo" href="../index.php">Treatout</a>

        <?php 

            if(isset($_SESSION['login']) && $_SESSION['is_admin'] == 1) {
             echo "   <nav>
                    <a href='#menu'>Menu</a>
                </nav>";

            }

        ?>
    </header>

     <?php
            if(isset($_SESSION['login']) && $_SESSION['is_admin'] == 1) {

        echo 
            "<nav id='menu'>
                <ul class='links'>
                    <li> <a href='index.php'>Dashboard</a></li>
                        <li> <a href='index.php?mod=account'>User Accounts</a> </li>
                        <li> <a href='index.php?mod=places&service=tourist+spot'>Tourist Spots</a> </li>
                        <li> <a href='index.php?mod=places&service=restaurant'>Restaurants</a> </li>
                        <li> <a href='index.php?mod=transportation'>Transportations</a> </li>
                        <li> <a href='logout.php'>Logout</a> </li>
                </ul>
            </nav>";
        }

    ?>


    <div>
    
    <?php
        switch($module){
            case '':

                require_once 'modules/dashboard/dashboard.php';

            break;

            case 'places':

                if ($place != '' ) {

                    require_once 'modules/place/place.php';

                } else {

                    require_once 'modules/places/places.php';
                }

            break;

            case 'account':

                require_once 'modules/accounts/accounts.php';

            break;


            case 'login':

                require_once 'loginform.php';

            break;


            case 'transportation':

                require_once 'modules/transportation/index.php';

            break;

            case 'terminal':

                require_once 'modules/terminals/index.php';

            break;

            default: 

                require_once 'modules/dashboard/dashboard.php';

            break;
        }
        ?>
    
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/breakpoints.min.js"></script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>