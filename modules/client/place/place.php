<?php
$module = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$place = (isset($_GET['place']) && $_GET['place'] != '') ? $_GET['place'] : '';


$name = (isset($_GET['name']) && $_GET['name'] != '') ? $_GET['name'] : '';
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
                <li id="phoneNum"></li>
                <li> Price range: <?php $res = $places->show($place); foreach ($res as $value) {
                    echo $value->rate_min." - ".$value->rate_max;
                } ?>  </li>
                <li id="avail"></li>
            </ul>

            <a href="index.php?mod=terminal&place_id=<?php echo $place; ?>&name=<?php echo $name; ?>" class="button primary icon fa-map">Find terminal</a>
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

          <div class="inner">
            <div class="content">
            <h2> Tags</h2>

                <?php 

                    $tags = $places->getTags($_GET['place']); 

                    if(count($tags)) {

                        foreach ($tags as $value) {
                            echo "<li>$value->tag_name </li>";
                        }
                    }


                ?>
            
            <br/>
        </div>
    </div>
    </div>
</div>

<script src="modules/client/place/place.js"></script>
<!-- <div id="right-panel"></div>
<div id="map"></div> -->