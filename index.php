<html>

<head>
  <meta charset=utf-8 />
  <title>Galveston</title>
  <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
  

  <!-- Load Leaflet from CDN-->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/leaflet/0.7.3/leaflet.css" />

  <link rel="stylesheet" href="dist/leaflet.draw.css" />
  <link rel="stylesheet" href="dist/leaflet.groupedlayercontrol.min.css" />
  <link rel="stylesheet" href="src/L.Control.Sidebar.css" />
  <link rel="stylesheet" href="style.css" />

  <script src="//cdn.jsdelivr.net/leaflet/0.7.3/leaflet.js"></script>

  <!-- Load Esri Leaflet from CDN -->
  <script src="src/esri-leaflet.js"></script>
  <script src="dist/leaflet.draw.js"></script>
  <script src="src/L.Control.Sidebar.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ2WWx3aY0ZYv0rj7nGmODxc3DAW3BV2Y&signed_in=true&sensor=false&libraries=places"></script>
  <script src="dist/leaflet.groupedlayercontrol.min.js"></script>
  <script src="dist/Control.Loading.js"></script>

  <script src="dist/Leaflet.Bookmarks.min.js"></script>
  <link type="text/css" rel="stylesheet" href="dist/leaflet.bookmarks.css">
  <link type="text/css" rel="stylesheet" href="dist/Control.Loading.css">
  <link rel="stylesheet" href="dist/easyPrint.css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="dist/jQuery.print.js"></script>
  <script src="dist/leaflet.easyPrint.js"></script>

  <style>

  </style>

</head>

<body>

  <div id="map"></div>

  <input type="search" name="addressSearch" id="addressSearch" placeholder="Enter an address">

  <div class="loader-control"></div>
  <div id="sidebar">
    <div class="sidebar-container">
      <div id="property-image"></div>

      <div class="sidebar-header" id="sidebar-header"></div>

      
      <div class="property-type">
        3 beds -  2 bath -  2305 sqft
      </div>
      <?php   
        echo "php";
      ?>
      <div class="container" id="price">
        <div class="col-1">
          <div class="item-header">Zillow Price</div>
          <div id="zillow-price">$1,285,000</div>
        </div>

        <div class="col-1">
          <div class="item-header">Assessed Price</div>
          <div id="assessed-price">$1,015,000</div>
        </div>

      </div>

      <div class="container">
        <div class="col-2">
          <div class="item-header">RISK SCORE</div>
          <div class="totalRisk">

            <div id="totalRiskValue">Average</div>
            <div id="totalRiskGraph">
              <meter max= 1.0 min= 0.0 value=0.50 high=.70 low=.30 optimum=0.5></meter>
              <div style="float:left">Low</div>
              <div style="float:right">High</div>
            </div>
          </div>
        </div>
        <div class="col-2">
          <div class="item-header">INDIVIDUAL RISKS</div>
          <div class="risk">
            <div class="col-1">
              <div class="radial" data-score="0" id="flood">
                <div class="circle">
                  <div class="mask full">
                    <div class="fill"></div>
                  </div>
                  <div class="mask half">
                    <div class="fill"></div>
                    <div class="fill fix"></div>
                  </div>
                </div>
                <div class="inset">
                  <span class='bigger'>3</span> 
                  <span class='little'>/ 5</span>
                </div>
                <div class="tag">
                  Flood
                </div>  
              </div>
              <div class="radial" data-score="0" id="storm">
                <div class="circle">
                  <div class="mask full">
                    <div class="fill"></div>
                  </div>
                  <div class="mask half">
                    <div class="fill"></div>
                    <div class="fill fix"></div>
                  </div>
                </div>
                <div class="inset">
                  <span class='bigger'>1</span> 
                  <span class='little'>/ 5</span>
                </div>
                <div class="tag">
                  Storm
                </div>  
              </div>
              <div class="radial" data-score="0" id="tri">
                <div class="circle">
                  <div class="mask full">
                    <div class="fill"></div>
                  </div>
                  <div class="mask half">
                    <div class="fill"></div>
                    <div class="fill fix"></div>
                  </div>
                </div>
                <div class="inset">
                  <span class='bigger'>2</span> 
                  <span class='little'>/ 5</span>
                </div>
                <div class="tag">
                  TRI
                </div>  
              </div>
            </div>

            <div class="col-1">
              <div class="radial" data-score="0" id="hurricane">
                <div class="circle">
                  <div class="mask full">
                    <div class="fill"></div>
                  </div>
                  <div class="mask half">
                    <div class="fill"></div>
                    <div class="fill fix"></div>
                  </div>
                </div>
                <div class="inset">
                  <span class='bigger'>3</span> 
                  <span class='little'>/ 5</span>
                </div>
                <div class="tag">
                  Hurricane
                </div>  
              </div>
              <div class="radial" data-score="0" id="earthquake">
                <div class="circle">
                  <div class="mask full">
                    <div class="fill"></div>
                  </div>
                  <div class="mask half">
                    <div class="fill"></div>
                    <div class="fill fix"></div>
                  </div>
                </div>
                <div class="inset">
                  <span class='bigger'>1</span> 
                  <span class='little'>/ 5</span>
                </div>
                <div class="tag">
                  Earthquake
                </div>  
              </div>
              <div class="radial" data-score="0" id="wildfire">
                <div class="circle">
                  <div class="mask full">
                    <div class="fill"></div>
                  </div>
                  <div class="mask half">
                    <div class="fill"></div>
                    <div class="fill fix"></div>
                  </div>
                </div>
                <div class="inset">
                  <span class='bigger'>2</span> 
                  <span class='little'>/ 5</span>
                </div>
                <div class="tag">
                  Wildfire
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">

        <div class="col-1">
          <div class="item-header">FACTS</div>
          Lot: 0.39 acres<br>
          Single Family<br>
          Built in 1898<br>
          8 shoppers saved this home<br>
          Last sold: Mar 2012<br>
          Price/sqft: 124<br>
          MLS #: 20153309
        </div>
        <div class="col-1">
          <div class="item-header">FEATURES</div>
          Flooring: Hardwood<br>
          Parking: 2 spaces<br>
          Dishwasher<br>
          Garbage Disposal<br>
          Cooling: Window Units<br>
        </div>

        
        <div class="col-2">
          <div class="item-header">DESCRIPTION</div>
          1898 Victorian elegance & distinction with modern 
          day kitchen, bathrooms, fixtures, plumbing and 
          electrical this has the ambience of the old with 
          the new. Soaring coffered ceilings, wainscoting, 
          crown molding, transoms, & more. It is flooded 
          with sunshine through the tall windows throughout 
          & lots of nook & crannies for storage. Pamper 
          yourself in either luxury bathrooms. Kitchen is set 
          up for impromptu meals at island seating or could 
          entertain with buffet service. No historic homeowners 
          association but neighborhood has formed a Watch 
          Group.
        </div>
      </div>


    </div>


  </div>

</div>

<script>
var address;

var geocoder = new google.maps.Geocoder;

var map = L.map('map', {zoomControl: false, loadingControl: true}).setView([29.203171878671903,-94.94085967540741], 18);


var ImageryLayer = L.esri.basemapLayer('Imagery')
var StreetsLayer = L.esri.basemapLayer('Streets')
// ImageryLayer.addTo(map);
ImageryLayer.addTo(map);
var FloodRisk, StormRisk, TRIRisk, totalRisk;

var sidebar = L.control.sidebar('sidebar', {
  position: 'right'
});

map.addControl(sidebar);




map.on('load',function(e){
  console.log("loading")
});

// map.on('zoomend', function() {
//   if(map.getZoom() > 16 && map.hasLayer(StreetsLayer))
//   {
//    map.removeLayer(StreetsLayer)
//    map.addLayer(ImageryLayer)
//  } 

//  if(map.getZoom() < 17 && map.hasLayer(ImageryLayer))
//  {
//    map.removeLayer(ImageryLayer)
//    map.addLayer(StreetsLayer)
//  }


// });

        //   map.on('click', function(e) {
        //     alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        // });
var parcelLayer = L.esri.featureLayer({
            // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
            url: 'http://newcoastalatlas.tamug.edu/coastal/rest/services/grover/Parcels_wRisk/MapServer/0',
            minZoom: 17,
            style: function(feature) {

              return {
                color: '#c0c0c0',
                weight: 1,
                opacity: 1
              }
            }
          }).addTo(map);

var floodRisk = L.esri.featureLayer({
            // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
            url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/0',
            // minZoom: 17,
            style: function(feature) {
              // console.log(feature)
              if(feature.properties.ZONE === "A" || feature.properties.ZONE === "Zone AE"){
                return {
                  // color: '#2E709F',
                  simplifyFactor: 0.85,
                  color: '#5C97B7',
                  weight: 0,
                  // opacity: 1,
                  fillOpacity: 0.7
                }
              } else if(feature.properties.ZONE === "X" || feature.properties.ZONE === "Zone X (in)" || feature.properties.ZONE === "Zone X (out)"){
                return {
                  // color: '#2E709F',
                  color: '#AED4FB',
                  weight: 0,
                  // opacity: 1,
                  fillOpacity: 0.7
                }
              } else {
                return {
                  // color: '#2E709F',
                  color: '#BFFFFF',
                  weight: 0,
                  // opacity: 1,
                  fillOpacity: 0.7
                }
              }
              
            }
          });
var stormRisk = L.esri.featureLayer({
            // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
            url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/13',
            // minZoom: 17,
            where: "NAME = 'GALVESTON'",
            style: function(feature) {
              return {
                color: '#BE2A38',
                weight: 1,
                opacity: 1,
                fillOpacity: 0.5
              }
            }
          });
var windRisk = L.esri.featureLayer({
            // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
            url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
            // minZoom: 17,
            where: "NAME = 'GALVESTON'",
            style: function(feature) {
              return {
                color: '#75812A',
                weight: 1,
                opacity: 1,
                fillOpacity: 0.7
              }
            }
          });

var groupedOverlays = {
  "Risk Layers": {
    "Flood Risk": floodRisk,
    "Storm Risk": stormRisk,
    "Wind Risk": windRisk
  }
};

var basemaps = {
  Streets: L.esri.basemapLayer('Streets'),
  Imagery: L.esri.basemapLayer('Imagery'),

};

    // Use the custom grouped layer control, not "L.control.layers"
    L.control.groupedLayers(basemaps,groupedOverlays).addTo(map);

    var bookmarkcontrol = new L.Control.Bookmarks().addTo(map);
    map.addControl( L.control.zoom({position: 'topright'}) )
    

    var oldId = 0;
    var selId = 1;
    parcelLayer.on('mouseover', function(e) {
      if (oldId != selId) {
        parcelLayer.resetStyle(oldId);
      }
      oldId = e.layer.feature.id;

            // document.getElementById('info-pane').innerHTML = 'AREA: ' + e.layer.feature.properties.NAME + ' ' + e.layer.feature.properties.RISK_AREA;
            e.layer.bringToFront();
            parcelLayer.setFeatureStyle(e.layer.feature.id, {
              color: '#16A085',
              weight: 1,
              opacity: 1,
              position: 'bottomright'
            });
          });

    parcelLayer.on('click', function(e) {
      sidebar.show();
      parcelLayer.resetStyle(selId);
      selId = e.layer.feature.id;

      parcelLayer.setFeatureStyle(e.layer.feature.id, {
        color: '#F39C12',
        weight: 1
      });
            // console.log(e)

            document.getElementById("property-image").innerHTML = "<img src='https://maps.googleapis.com/maps/api/streetview?size=600x400&location=" + e.latlng.lat + "," + e.latlng.lng + "&pitch=-0.76&key=AIzaSyBZ2WWx3aY0ZYv0rj7nGmODxc3DAW3BV2Y' width='100%'>"
            
            // var header = document.getElementById("sidebar-header");
            // header.innerHTML = e.layer.feature.properties.ADDRESS + "<div class='sidebar-subheader'>" + e.layer.feature.properties.CITY + ', ' + e.layer.feature.properties.ST + ',' + e.layer.feature.properties.ZIP; + "</div>";

            // console.log(e.layer.feature)
            FloodRisk = e.layer.feature.properties.FloodRisk;
            StormRisk = e.layer.feature.properties.StormRisk;
            TRIRisk = e.layer.feature.properties.TRIRisk;
            // totalRisk = (FloodRisk + StormRisk + TRIRisk) / 3;

            console.log(e.latlng.lat + "," + e.latlng.lng)

            GetCompleteAddress(e.latlng.lat,e.latlng.lng);

            changeScore();


          });



        // var searchControl = L.esri.Geocoding.Controls.geosearch().addTo(map);
        var results = L.layerGroup().addTo(map);

        // searchControl.on('results', function(data) {
        //     results.clearLayers();
        //     for (var i = data.results.length - 1; i >= 0; i--) {
        //         results.addLayer(L.marker(data.results[i].latlng));
        //     }
        // });




var drawnItems = new L.FeatureGroup();
map.addLayer(drawnItems);

        // Initialise the draw control and pass it the FeatureGroup of editable layers
        var drawControl = new L.Control.Draw({
          draw: {

          },
          edit: {
            featureGroup: drawnItems,
              // edit: false,
              // delete: false
            },
            position: 'topright' 
          });
        map.addControl(drawControl);

        map.on('draw:created', function(e) {
          var type = e.layerType,
          layer = e.layer;

          if (type === 'marker') {
            layer.bindPopup('A popup!');
          }

          console.log(e)
          parcelLayer.query()["within"](e.layer).ids(function(error, ids){
            // console.log(ids)
            
            for (var i = ids.length - 1; i >= 0; i--) {
              parcelLayer.setFeatureStyle(ids[i], { color: '#F39C12', weight: 1 });
            };
          });


          drawnItems.addLayer(layer);
        });

        map.on('draw:deleted', function(e) {

          console.log(e);
          layer = e.layers._layers[Object.keys(e.layers._layers)[0]];
            // previousIds = ids;
            parcelLayer.query()["within"](layer).ids(function(error, ids){
                 // console.log(ids)
                 for (var i = ids.length - 1; i >= 0; i--) {
                  parcelLayer.setFeatureStyle(ids[i], { color: '#c0c0c0', weight: 1 });
                };
              });

          });

        L.easyPrint({position:"topright"}).addTo(map)


        function GetCompleteAddress(lat,lng)
        {



          var latlng = new google.maps.LatLng(lat,lng);

          geocoder.geocode({'latLng': latlng}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                  // console.log(results[0])
                  var popup = L.popup().setLatLng([lat,lng]).setContent(results[0].formatted_address).openOn(map);
                  
                  var header = document.getElementById("sidebar-header");
                  header.innerHTML = results[0].address_components[0].long_name + " " + results[0].address_components[1].long_name + "<div class='sidebar-subheader'>" + results[0].address_components[2].long_name + ", " + results[0].address_components[4].short_name + " " + results[0].address_components[6].long_name+ "</div>";

                } else {
                  window.alert('No results found');
                }
              } else {
                window.alert('Geocoder failed due to: ' + status);
              }
            });

        }
        function changeScore() {
          $('#flood').data("score",FloodRisk);
          if( FloodRisk == 1) {
            $('#flood').find(".inset").css("background-color","#27AE61");
          }
          else if( FloodRisk == 2) {
            $('#flood').find(".inset").css("background-color","#F1C50E");
          }
          else if( FloodRisk == 3) {
            $('#flood').find(".inset").css("background-color","#E77E22");
          }
          else if( FloodRisk == 4) {
            $('#flood').find(".inset").css("background-color","#E84C3D");
          }
          else if( FloodRisk == 5) {
            $('#flood').find(".inset").css("background-color","#961F21");
          }
          $("#flood").find(".bigger").html(FloodRisk);
          
          $('#storm').data("score",StormRisk);
          if( StormRisk == 1) {
            $('#storm').find(".inset").css("background-color","#27AE61");
          }
          else if( StormRisk == 2) {
            $('#storm').find(".inset").css("background-color","#F1C50E");
          }
          else if( StormRisk == 3) {
            $('#storm').find(".inset").css("background-color","#E77E22");
          }
          else if( StormRisk == 4) {
            $('#storm').find(".inset").css("background-color","#E84C3D");
          }
          else if( StormRisk == 5) {
            $('#storm').find(".inset").css("background-color","#961F21");
          }
          $("#storm").find(".bigger").html(StormRisk);
          
          $('#tri').data("score",TRIRisk);
          if( TRIRisk == 1) {
            $('#tri').find(".inset").css("background-color","#27AE61");
          }
          else if( TRIRisk == 2) {
            $('#tri').find(".inset").css("background-color","#F1C50E");
          }
          else if( TRIRisk == 3) {
            $('#tri').find(".inset").css("background-color","#E77E22");
          }
          else if( TRIRisk == 4) {
            $('#tri').find(".inset").css("background-color","#E84C3D");
          }
          else if( TRIRisk == 5) {
            $('#tri').find(".inset").css("background-color","#961F21");
          }
          $("#tri").find(".bigger").html(TRIRisk);
          $("#totalRiskValue").html(totalRisk);
          drawRisks();
        }      
        function drawRisks() {
          $('.radial').each(function() {
            var transform_styles = ['-webkit-transform', '-ms-transform', 'transform'];
            $(this).find('span').fadeTo('slow', 1);
            var score = $(this).data('score');
            var deg = (((100 / 5) * score) / 100) * 180;
            var rotation = deg;
            var fill_rotation = rotation;
            var fix_rotation = rotation * 2;
            for(i in transform_styles) {
              $(this).find('.circle .fill, .circle .mask.full').css(transform_styles[i], 'rotate(' + fill_rotation + 'deg)');
              $(this).find('.circle .fill.fix').css(transform_styles[i], 'rotate(' + fix_rotation + 'deg)');
            }
          });
        }

        </script>
        <!--         <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script> -->
        <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function() {
          var places = new google.maps.places.Autocomplete(document.getElementById('addressSearch'));
          google.maps.event.addListener(places, 'place_changed', function() {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var mesg = "Address: " + address;
            mesg += "\nLatitude: " + latitude;
            mesg += "\nLongitude: " + longitude;
                // alert(mesg);
                map.setView([latitude, longitude], 17);
                results.clearLayers();
                results.addLayer(L.marker([latitude,longitude]));
              });
        });


        </script>

        <div class="leaflet-control-attribution leaflet-control"><a href="http://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> | Buyers Beware </div>
      </body>

      </html>