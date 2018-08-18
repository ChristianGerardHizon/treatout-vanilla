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

document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById("placeLists").innerHTML = "";
  // Get Data
  getData(`${SERVER_URL}/places`);
});
