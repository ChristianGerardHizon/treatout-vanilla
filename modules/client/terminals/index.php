<!DOCTYPE html>
<html>
<head>
<style>
  #myMap {
     height: 600px;
     width: 100%;
  }
</style>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k&sensor=false"> </script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>


<script type="text/javascript"> 


  var myLatlng = new google.maps.LatLng(10.6840,122.9563);


function initialize() {

  var mapOptions = {
    zoom: 12,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

  marker = new google.maps.Marker({
    map: map,
    //position: myLatlng,
    draggable: true
  });

  var infoWindow = new google.maps.InfoWindow;


  var 

  downloadUrl("modules/client/terminals/map_data.php?placeid=<?php echo $_GET['place_id']; ?>", function(data){
          var xml = data.responseXML;

          var markers = xml.documentElement.getElementsByTagName('marker');
          Array.prototype.forEach.call(markers, function(markerElem) {
            var transportation = markerElem.getAttribute('transportation');
            var minfare = markerElem.getAttribute('minfare');
            var maxfare = markerElem.getAttribute('maxfare');
            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
              parseFloat(markerElem.getAttribute('lat')),
              parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = transportation
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = "Estimated fare rate: Php " + minfare + " - " + maxfare
            infowincontent.appendChild(text);

            var image = 'https://static.thenounproject.com/png/331565-200.png';
            var terminalMarker = new google.maps.Marker({
              map: map,
              position: point,
              label: 'T',
              draggable: false
            });
            terminalMarker.addListener('click', function() {
              infoWindow.setContent(infowincontent);
              infoWindow.open(map, terminalMarker);
            });
          });
  })


      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', uri, true);
        request.send(null);
      }

       function doNothing() {}

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

</head>
<body>

<div id="myMap"></div>

<br> 

<center> Public transportations for <h3> <?php echo $_GET['name']; ?></h3></center>

</body>
</html>

