<?php
$module = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$place = (isset($_GET['place']) && $_GET['place'] != '') ? $_GET['place'] : '';

// echo $module
?>
<link rel="stylesheet" type="text/css" href="modules/client/place/place.css">

<section id="main" class="wrapper">
    <div class="inner">
            <div class="content">
            <h1><b id="title"></b></h1>
            <h2><b id="rating"></b></h2>

            <ul class="alt">
                <li id="description"></li>
                <li id="phoneNum">Sagittis adipiscing lorem eleifend.</li>
                <li id="avail">Felis enim feugiat viverra.</li>
            </ul>

            <a href="index.php?mod=directions&place=<?php echo $place ?>" class="button primary icon fa-map">Get Directions</a>
            </div>
        </div>
        <div class="inner">
            <div class="content">
            <h2>Gallery</h2>
            <span id="imageReference"></span>
            <br/>
            </div>
        </div>
<div class="inner">
            <div class="content">
            <h2> Reviews</h2>

            <!-- Reviews -->
            <span id="reviews">
            </span>
            <br/>
        </div>
    </div>
</div>

<script src="modules/client/place/place.js"></script>
<!-- <div id="right-panel"></div>
<div id="map"></div> -->