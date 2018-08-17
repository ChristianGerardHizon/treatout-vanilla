console.log(`Loaded Place`);

let place = {};
const apiKey = `AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k`
var googledirectionsDisplay;
var googledirectionsService;

function getAllUrlParams() {
  const search = new URLSearchParams(window.location.search);
  return search.get("place");
}

function docid( name ){
  return document.getElementById(name)
}

function formatImages() {
  place.photos.map( image => {
    let imageUri = `https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=${image.photo_reference}&key=${apiKey}`
    docid('imageReference').innerHTML += `<img src='${imageUri}' >`
  })
}

function formatReviews(){
  place.reviews.map( review => {
    console.log( review )
    docid('reviews').innerHTML += 
    `
    <span>
      <h3>${review.author_name}</h3>
      <span>${review.relative_time_description}</span>
      <span>${review.rating}</span>
      <p>${review.text}</p>
    </span>
    <br/>
    `
  })
}

function setDetails() {
  docid('title').innerHTML = place.name;
  docid('description').innerHTML = place.adr_address
  docid('phoneNum').innerHTML = place.international_phone_number
  docid('avail').innerHTML = (place.opening_hours.open_now) ? 'OPEN' : 'CLOSED'
  formatImages()
  formatReviews()
}

function initMap() {
  console.log(`Initializing map`);
  googledirectionsDisplay = new google.maps.DirectionsRenderer();
  googledirectionsService = new google.maps.DirectionsService();
  var map = new google.maps.Map(document.getElementById("map"));
  googledirectionsDisplay.setMap(map);
  googledirectionsDisplay.setPanel(document.getElementById("right-panel"));

  calculateAndDisplayRoute(googledirectionsService, googledirectionsDisplay);
}
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function showPosition(position) {
      // console.log(`Current Postion`, position);
      coords = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      calculateAndDisplayRoute(
        googledirectionsService,
        googledirectionsDisplay,
        coords
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

  if (place && userPostion) {
    // console.log(`Current Place`, place);
    var start = userPostion;
    var end = place.geometry.location;
    // console.log(`Start`, start, `| END`, end);
    try {
      directionsService.route(
        {
          origin: start,
          destination: end,
          travelMode: "DRIVING"
        },
        function(response, status) {
          if (status === "OK") {
            // console.log(`Response`, response);
            directionsDisplay.setDirections(response);
          } else {
            window.alert("Directions request failed due to " + status);
          }
        }
      );
    } catch (e) {
      console.error(e);
    }
  }else{
    console.error('Missing Parameters')
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
        // getLocation();
        // initMap()
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
