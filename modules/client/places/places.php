<?php
$module = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
// echo $module
?>
<link rel="stylesheet" type="text/css" href="modules/client/places/places.css">

		<!-- Header -->
    <section id="main" class="wrapper nonframeworkstuff">
					<div class="inner">
							<div id="map"></div>
					</div>
			</section>

<button onclick="view('tourist+spot','bacolod')"> Tourist Spots </button>
<button onclick="view('restaurants','bacolod')"> Restaurants </button>

<div id="placeLists" class="section group">
	<!-- <div  class="col span_1_of_5 card">
	  <div class="cardContent">
      <h5>Sample title of the place</h5>
      <p>★★★★★</p>
      <p>This is a sample Address</p>
      <a href="#">Visit</a>
    </div>
  </div> -->
</div>

<div id="buttons">
</div>

<script src="modules/client/places/places.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k&callback=initMap" async defer></script> -->