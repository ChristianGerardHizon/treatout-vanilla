console.log(`Loaded Place`);

let place = {};
var googledirectionsDisplay;
var googledirectionsService;

function getAllUrlParams() {
  const search = new URLSearchParams(window.location.search);
  return search.get("place");
}

function setDetails() {
  document.getElementById("title").innerHTML = place.name;
  document.getElementById("description").innerHTML = place.adr_address;
}

function initMap() {
  console.log(`initializing map`);
  googledirectionsDisplay = new google.maps.DirectionsRenderer();
  googledirectionsService = new google.maps.DirectionsService();
  var map = new google.maps.Map(document.getElementById("map"));
  googledirectionsDisplay.setMap(map);
  googledirectionsDisplay.setPanel(document.getElementById("right-panel"));

  // var control = document.getElementById('floating-panel');
  // control.style.display = 'block';
  // map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
  calculateAndDisplayRoute(googledirectionsService, googledirectionsDisplay);
}
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function showPosition(position) {
      console.log(`Current Postion`, position);
      coords = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      calculateAndDisplayRoute(
        googledirectionsService,
        googledirectionsDisplay,
        coordsZ
      );
    });
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

function calculateAndDisplayRoute(
  directionsService,
  directionsDisplay,
  userPostion = null
) {

  if (place.geometry.location && userPostion) {
    console.log(`Current Place`, place);
    var start = userPostion;
    var end = place.geometry.location;
    console.log(`Start`, start, `| END`, end);
    try {
      directionsService.route(
        {
          origin: start,
          destination: end,
          travelMode: "DRIVING"
        },
        function(response, status) {
          if (status === "OK") {
            console.log(`Response`, response);
            directionsDisplay.setDirections(response);
          } else {
            window.alert("Directions request failed due to " + status);
          }
        }
      );
    } catch (e) {
      console.log(e);
    }
  }
}

function getData(url) {
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
      // XMLHttpRequest.DONE == 4
      if (xmlhttp.status == 200) {
        const response = JSON.parse(xmlhttp.responseText).result;
        console.log(`Req`, response);
        place = response;
        setDetails();
        getLocation();
      } else if (xmlhttp.status == 400) {
        alert("There was an error 400");
      } else {
        alert("something else other than 200 was returned");
      }
    }
  };

  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}

document.addEventListener("DOMContentLoaded", function(event) {
  getData(
    `https://maps.googleapis.com/maps/api/place/details/json?placeid=${getAllUrlParams()}&key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k`
  );
});
