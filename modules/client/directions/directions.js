var place
var googledirectionsDisplay;
var googledirectionsService;

function getAllUrlParams() {
    const search = new URLSearchParams(window.location.search);
    return search.get("place");
  }
  
  function docid(name) {
    return document.getElementById(name);
  }
  
  function formatImages() {
    place.photos.map(image => {
      let imageUri = `https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=${
        image.photo_reference
      }&key=${apiKey}`;
      docid("imageReference").innerHTML += `<img src='${imageUri}'>`;
    });
  }

function initMap() {
    console.log(`Initializing map`);
    googledirectionsDisplay = new google.maps.DirectionsRenderer();
    googledirectionsService = new google.maps.DirectionsService();
    var map = new google.maps.Map(document.getElementById("map"));
    googledirectionsDisplay.setMap(map);
    googledirectionsDisplay.setPanel(document.getElementById("right-panel"));
  
    // calculateAndDisplayRoute(googledirectionsService, googledirectionsDisplay, );
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
    } else {
      console.error("Missing Parameters");
    }
  }
  
  function getData(uri) {
    console.log(uri);
    const params = {
      headers: {
        "Content-type": "application/json"
      },
      dataType: "text",
      crossdomain: true
    };
    axios
      .get(uri, params)
      .then(function(response) {
        place = response.data.result;
        console.log(place);
        getLocation()
    })
      .catch(e => console.error(e.message));
  }
  
  document.addEventListener("DOMContentLoaded", function(event) {
    getData(
      `${CORS_FIX}https://maps.googleapis.com/maps/api/place/details/json?placeid=${getAllUrlParams()}&key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k`
    );
  });
  