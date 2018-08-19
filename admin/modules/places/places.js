console.log(SERVER_URL);

function findGetParameter(parameterName) {
  var result = null,
      tmp = [];
  location.search
      .substr(1)
      .split("&")
      .forEach(function (item) {
        tmp = item.split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
      });
  return result;
}

let service = 'restaurants'
const query = `${findGetParameter('query')}`

let next_page = null

document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById("placeLists").innerHTML = "";
  view(`${service}+in`, 'Bacolod', next_page )

});

// Bottom Listener
window.onscroll = function(ev) {
  if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    if(next_page){
      console.log('loading next page')
      view(service, 'Bacolod', next_page )
    }
    next_page = null
  }
};

// Temp Functions

function formatRating( count ){
  if(count >= 5) return '★★★★★'
  if(count >= 4) return '★★★★☆'
  if(count >= 3) return '★★★☆☆'
  if(count >= 2) return '★★☆☆☆'
  if(count >= 1) return '★☆☆☆☆'
  if(count >= 0) return '☆☆☆☆☆'
}

function getGmapData(url) {
  axios.get(url).then(function(response) {
    const results = response.data.results;
    const next_page_token = response.data.next_page_token
    console.log(response);
    const container = document.getElementById("placeLists");
    results.map(function(place) {
      container.innerHTML += 
      `<section>
        <div class="content card" onclick="goToPage('index.php?mod=places&place=${place.place_id}')">
          <header>
            <h3>${place.name}</h3>
          </header>
          <h2>${formatRating(place.rating)}</h2>
          <p>${place.formatted_address}</p>
        </div>
      </section>`
    });
    const buttons = document.getElementById("buttons");
    if (next_page_token) {
      next_page = next_page_token
    }else{
      next_page = null
    }
  });
}

function goToPage( str ) {
  location = str 
}

function view(query, place, nextpage ) {
  if( nextpage ) return getGmapData(`${CORS_FIX}https://maps.googleapis.com/maps/api/place/textsearch/json?query=${query}+${place}&key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k&pagetoken=${next_page}`);
  getGmapData(`${CORS_FIX}https://maps.googleapis.com/maps/api/place/textsearch/json?query=${query}+${place}&key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k`);
}

function viewResto() {
  service = "restaurants"
  document.getElementById("placeLists").innerHTML = "";
  view(`${service}+in`, 'Bacolod', next_page )
}

function viewTours() {
  service = "tourist+spot"
  document.getElementById("placeLists").innerHTML = "";
  view(`${service}+in`, 'Bacolod', next_page )
}