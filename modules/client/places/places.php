<?php
$module = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
// echo $module
?>
<link rel="stylesheet" type="text/css" href="modules/client/places/places.css">

			<div id="heading" >
				<h1> Tourist Attractions</h1>
			</div>


				<div class="inner">
          <div class="highlights" id="placeLists">

          </div>
				</div>

<div id="buttons">
</div>

<script src="modules/client/places/places.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k&callback=initMap" async defer></script> -->