console.log('Places Loaded')

function getData() {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
           if (xmlhttp.status == 200) {
               const results = JSON.parse(xmlhttp.responseText).results
            //    console.log( results )
                const container = document.getElementById("placeLists")
               results.map( function( place ){
                   console.log( place )
                   container.innerHTML += 
                   `<div  class="col span_1_of_5 card">
                        <div class="cardContent">
                            <h5>${place.name}</h5>
                            <p>${place.rating}</p>
                            <p>${place.formatted_address}</p>
                            <a href="index.php?mod=places&place=${place.id}">Visit</a>
                        </div>
                    </div>`
               })    
           }
           else if (xmlhttp.status == 400) {
              alert('There was an error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }
        }
    };

    xmlhttp.open("GET", "https://maps.googleapis.com/maps/api/place/textsearch/json?query=restaurants+in+Bacolod&key=AIzaSyDWJ95wDORvWwB6B8kNzSNDfVSOeQc8W7k", true);
    xmlhttp.send();
}

document.addEventListener("DOMContentLoaded", function(event) { 
    getData()
});

function initMap() {

}