<?php
$module = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$service = (isset($_GET['service']) && $_GET['service'] != '') ? $_GET['service'] : '';

$min = (isset($_GET['min']) && $_GET['min'] != '') ? $_GET['min'] : '';
$max = (isset($_GET['max']) && $_GET['max'] != '') ? $_GET['max'] : '';


// echo $module
?>
<link rel="stylesheet" type="text/css" href="modules/places/places.css">

<div id="heading" >
	<h1> 
	Place List
	</h1>
</div>
<div class="inner">
	<br/>
	<div class="row">
		<div class="col-6">
			<a class="button primary icon fa-map" style="width:100%;" onclick="viewResto()">Restaurants</a>
		</div>
		<div class="col-6">
			<a class="button primary icon fa-map" style="width:100%;" onclick="viewTours()" >Tourist Spots</a>
		</div>
	</div>

	<div class="highlights" id="placeLists">
	</div>
</div>

<div id="buttons">
</div>

<script src="modules/places/places.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k&callback=initMap" async defer></script> -->