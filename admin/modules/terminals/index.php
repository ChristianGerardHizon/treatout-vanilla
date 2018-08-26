<!DOCTYPE html>
<html>
<head>
  <title>Map</title>
  <style>
#myMap {
   height: 500px;
   width: 100%;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k&sensor=false">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script type="text/javascript"> 
var map;
var marker;
var myLatlng = new google.maps.LatLng(10.6476959,122.9564337);
var geocoder = new google.maps.Geocoder();
function initialize(){
var mapOptions = {
zoom: 14,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: true,
}); 
geocoder.geocode({'latLng': myLatlng }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#latitude,#longitude').show();
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});
google.maps.event.addListener(marker, 'dragend', function() {
geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});
});
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

</head>
<body>
<div id="myMap"></div>

<form method="POST" id="terminal_form">

<select name="trans_id" id="trans_id" required>
<?php
include 'function.php';
  foreach($data as $value){
    if($value)
  ?>
    <option value="<?php echo $value->trans_id;?>">
    <?php echo $value->name;?>
    </option>
  <?php
  }
?>

</select>
<br>
<input name="place_id" type="text" id="max_rate" placeholder="" value="1" required/> <br>
<input name="latitude_start" type="text" id="latitude" placeholder="Latitude" required/><br>
<input name="longitude_start" type="text" id="longitude" placeholder="Longitude" required/><br>
<input name="fare_rate_min" type="number" step="0.01" id="min_rate" placeholder="Minimum fare rate" required/><br>
<input name="fare_rate_max" type="number" step="0.01" id="max_rate" placeholder="Maximum fare rate" required/><br>
<input name="description" type="text" id="max_rate" placeholder="Description"/><br>
<input type="submit" name="submit">

</form>

</body>
</html>

<script type="text/javascript">
  
  $(document).on('submit', '#terminal_form', function(event) {
    event.preventDefault();
      $.ajax({
        url:"modules/terminals/insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data)
        }
      });
  });
</script>