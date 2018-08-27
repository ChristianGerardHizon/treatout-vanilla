<!DOCTYPE html>
<html>
<head>
<style>
  #myMap {
     height: 500px;
     width: 100%;
  }
</style>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k&sensor=false"> </script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>


<script type="text/javascript"> 


  var map;
  var marker;
  var myLatlng = new google.maps.LatLng(10.6476959,122.9564337);
  var geocoder = new google.maps.Geocoder();

function initialize() {

  var mapOptions = {
    zoom: 14,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

  marker = new google.maps.Marker({
    map: map,
    position: myLatlng,
    draggable: true
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


 downloadUrl('index.php', function(data) {

          var xml = data.responseXML;
          var markers = xml.documentElement.getElementsByTagName('marker');
          Array.prototype.forEach.call(markers, function(markerElem) {
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
              parseFloat(markerElem.getAttribute('lat')),
              parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
              map: map,
              position: point,
              label: icon.label
            });
            marker.addListener('click', function() {
              infoWindow.setContent(infowincontent);
              infoWindow.open(map, marker);
            });
          });
        });

</script>

</head>
<body>

<div id="myMap"></div>

<br> 

<center> Public transportations for <h3> <?php echo $_GET['name']; ?></h3></center>

<br>
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
<input name="latitude_start" type="text" id="latitude" placeholder="Latitude" required/><br>
<input name="longitude_start" type="text" id="longitude" placeholder="Longitude" required/><br>
<input name="fare_rate_min" type="number" step="0.01" id="min_rate" placeholder="Minimum fare rate" required/><br>
<input name="fare_rate_max" type="number" step="0.01" id="max_rate" placeholder="Maximum fare rate" required/><br>
<input name="description" type="text" id="max_rate" placeholder="Description"/><br>
<input type="submit" name="submit">
<input name="place_id" type="hidden" id="max_rate" placeholder="" value="<?php echo $_GET['place']; ?>" required/> <br>
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