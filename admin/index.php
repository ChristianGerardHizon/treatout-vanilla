<?php

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



</head>
<body>

    <!-- Header -->
    <header id="header">
        <a class="logo" href="../index.php">Treatout</a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
        <li> <a href="index.php">Dashboard</a></li>
        <li> <a href="index.php?mod=places">Places</a></li>
        <li> <a href="index.php?mod=accounts">User Accounts</a> </li>
        </ul>
    </nav>


    <div>
    
    <?php
        switch($module){
            case '':
                require_once 'modules/dashboard/dashboard.php';
                break;
            case 'places':
                if($place != '' ){
                    require_once 'modules/place/place.php';
                }else {
                    require_once 'modules/places/places.php';
                }
                break;
            case 'accounts':
                require_once 'modules/accounts/accounts.php';
                break;
            case 'route':
            require_once 'modules/place/route/route.php';
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