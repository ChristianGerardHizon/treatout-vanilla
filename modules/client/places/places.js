console.log(SERVER_URL);

function getData(url) {
  axios.get(url).then(function(response) {
    const results = response.data;
    console.log(results);
    const container = document.getElementById("placeLists");
    results.map(function(place) {
      container.innerHTML += `<div  class="col span_1_of_5 card">
                     <div class="cardContent">
                         <h5>${place.name}</h5>
                         <p>${place.rating}</p>
                         <p>${place.address}</p>
                         <a href="index.php?mod=places&place=${
                           place.place_id
                         }">Visit</a>
                     </div>
                 </div>`;
    });
  });
}

// Temp Functions

function getGmapData(url) {
  axios.get(url).then(function(response) {
    const results = response.data.results
    console.log(results);
    const container = document.getElementById("placeLists");
    results.map(function(place) {
      container.innerHTML += `<div  class="col span_1_of_5 card">
                       <div class="cardContent">
                           <h5>${place.name}</h5>
                           <p>${place.rating}</p>
                           <p>${place.address}</p>
                           <a href="index.php?mod=places&place=${
                             place.place_id
                           }">Visit</a>
                       </div>
                   </div>`;
    });
    const buttons = document.getElementById("buttons");
    if (next_page_token)
      buttons.innerHTML = `<button onClick="getData('https://maps.googleapis.com/maps/api/place/textsearch/json?query=restaurants+in+Bacolod&key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k&pagetoken=${next_page_token}')"> Load More </button>`;
  });
}

function view(query, place) {
  // Clear place list
  document.getElementById("placeLists").innerHTML = "";
  // Get Data
  getGmapData(
    `${CORS_FIX}https://maps.googleapis.com/maps/api/place/textsearch/json?query=${query}+${place}&key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k`
  );
}

document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById("placeLists").innerHTML = "";
  // Get Data
  //   getData(`${SERVER_URL}/places`);
  view('Restaurant', 'bacolod')
});
