
<?php

session_start();

if (!(isset($_SESSION['username']))) {

header ("Location: login2.php");

}

?><html>

<head>
  <meta charset=utf-8 />
  <title>BuyersB-Where</title>
  <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
  

  <!-- Load Leaflet from CDN-->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/leaflet/0.7.3/leaflet.css" />

  <link rel="stylesheet" href="dist/leaflet.draw.css" />
  <link rel="stylesheet" href="dist/leaflet.groupedlayercontrol.min.css" />
  <link rel="stylesheet" href="src/L.Control.Sidebar.css" />
  <link rel="stylesheet" href="style2.css" />

  <script src="//cdn.jsdelivr.net/leaflet/0.7.3/leaflet.js"></script>

  <!-- Load Esri Leaflet from CDN -->
  <script src="src/esri-leaflet.js"></script>
  <script src="dist/leaflet.draw.js"></script>
  <script src="src/L.Control.Sidebar.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:500,400,300,700' rel='stylesheet' type='text/css'>
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

  <script src="//cdn.jsdelivr.net/leaflet.esri.renderers/2.0.0/esri-leaflet-renderers.js"></script>

  
  <!-- <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script> -->

  <script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>

  <style>

  </style>

</head>

<body>
  <marquee behaviour="scroll" direction="left">This is a test site for Buyers B-Where. All content is strictly confidential.</marquee>

  <div id="map"></div>

  <div class="logo">
    <img src="images/logo-125-new.png">
  </div>

  <input type="search" name="addressSearch" id="addressSearch" placeholder="Enter an address">

  <div class="loader-control"></div>
  <div id="sidebar">
    <div class="sidebar-container">
      <div id="property-image"></div>

      <div class="sidebar-header" id="sidebar-header"></div>

      
      <div class="property-type" id="property-type"></div>
      <div class="container" id="price">
        <div class="col-1">
          <div class="item-header">Zestimate</div>
          <div id="zillow-price"></div>
        </div>

        <div class="col-1">
          <div class="item-header">Assessed Price</div>
          <div id="assessed-price">$1,015,000</div>
        </div>

      </div>

      <div class="container">
        <div class="col-2">
          <!-- <div class="item-header">OVERALL HAZARD RISK SCORE&nbsp; <a href="risk_description.html" target="_blank"><img src="images/external_link.png" width="15px" /></a></div> -->
          <div class="totalRisk" style="display:none;">

         
            <div id="totalRiskGraph">
              <meter max= 5.0 min= 0.0 value=0.0 high=3.0 low=1.0 optimum=4.0 id="OverallRisk"></meter>
              <div style="float:left">Low</div>
              <div style="float:right">High</div>
            </div>
          </div>
        </div>
        <div class="col-2">
         

            <!-- _______________________DETAILED RISKS ________________________ -->
            <div class="item-header">HAZARD RISK ASSESSMENT&nbsp; <a href="risk_description.html" target="_blank"><img src="images/external_link.png" width="15px" /></a></div>
            <div class="risk" id="risk_elements">
            </div>

            <div class="item-header">RISK SCORE LEGEND</div>
            <div class="legend">
              <table width="100%">
                <tr >
                  <td width="16%"><div style="text-align:center;">No Risk</div></td>
                  <td width="16%"><div style="text-align:center;">Very Low</div></td>
                  <td width="16%"><div style="text-align:center;">Low</div></td>
                  <td width="16%"><div style="text-align:center;">Medium </div></td>
                  <td width="16%"><div style="text-align:center;">High</div></td>
                  <td width="16%"><div style="text-align:center;">Very High</div></td>
                </tr>
                <tr style="height:20px;">
                  <td style="border:1px solid #aaaaaa;"></td>
                  <td bgcolor="#6FA83F"></td>
                  <td bgcolor="#c1ef99"></td>
                  <td bgcolor="#EBE142"></td>
                  <td bgcolor="#F38C23"></td>
                  <td bgcolor="#B61620"></td>
                </tr>
                <tr>
                  <td style="text-align:center;">0</td>
                  <td style="text-align:center;">1</td>
                  <td style="text-align:center;">2</td>
                  <td style="text-align:center;">3</td>
                  <td style="text-align:center;">4</td>
                  <td style="text-align:center;">5</td>
                </tr>
              </table>
            </div>
              
        </div>

        <div class="container">

          <div class="col-1">
            <div class="item-header">FACTS</div>
            <p id = "homeFacts">
              Lot: 0.39 acres<br>
              Single Family<br>
              Built in 1898<br>
              8 shoppers saved this home<br>
              Last sold: Mar 2012<br>
              Price/sqft: 124<br>
              MLS #: 
            </p>
          </div>
          <div class="col-1">
            <div class="item-header">FEATURES</div>
            <p id = "homeFeatures">
              Flooring: Hardwood<br>
              Parking: 2 spaces<br>
              Dishwasher<br>
              Garbage Disposal<br>
              Cooling: Window Units<br>
            </p>
          </div>


          <div class="col-2">
            <div class="item-header">DESCRIPTION</div>
            <p id="homeDescription">1898 Victorian elegance & distinction with modern 
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
              Group.</p>
            </div>
          </div>


        </div>


      </div>

    </div>

    <script>
    var address;
    var risks;
    var geocoder = new google.maps.Geocoder;

    var map = L.map('map', {zoomControl: false, loadingControl: true}).setView([29.266961445446256,-94.83965992927551], 18);


    var ImageryLayer = L.esri.basemapLayer('Imagery')
    var StreetsLayer = L.esri.basemapLayer('Streets')
// ImageryLayer.addTo(map);
ImageryLayer.addTo(map);
var FloodRisk, StormRisk, TRIRisk, totalRisk;
var addSearch, cityStateZip;
var bedRooms, bathRooms, finishedSqFt, Zestimate, zillowId, homeDescription;

var sidebar = L.control.sidebar('sidebar', {
  position: 'right'
});

map.addControl(sidebar);




map.on('load',function(e){
  console.log("loading")
});



        //   map.on('click', function(e) {
        //     alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        // });
var parcelLayer = L.esri.featureLayer({
            // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
            url: 'http://newcoastalatlas.tamug.edu/coastal/rest/services/grover/Parcelswithrisk04/FeatureServer/0',
            minZoom: 17,
            style: function(feature) {

              return {
                color: '#ffffff',
                weight: 1.5,
                opacity: 0.7,
                fillOpacity: 0.1
              }
            }
          }).addTo(map);

// var floodRisk = L.esri.featureLayer({
//             // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
//             url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/0',
//             // minZoom: 17,
//             style: function(feature) {
//               // console.log(feature)
//               if(feature.properties.ZONE === "A" || feature.properties.ZONE === "Zone AE"){
//                 return {
//                   // color: '#2E709F',
//                   simplifyFactor: 0.85,
//                   color: '#5C97B7',
//                   weight: 0,
//                   // opacity: 1,
//                   fillOpacity: 0.7
//                 }
//               } else if(feature.properties.ZONE === "X" || feature.properties.ZONE === "Zone X (in)" || feature.properties.ZONE === "Zone X (out)"){
//                 return {
//                   // color: '#2E709F',
//                   color: '#AED4FB',
//                   weight: 0,
//                   // opacity: 1,
//                   fillOpacity: 0.7
//                 }
//               } else {
//                 return {
//                   // color: '#2E709F',
//                   color: '#BFFFFF',
//                   weight: 0,
//                   // opacity: 1,
//                   fillOpacity: 0.7
//                 }
//               }
              
//             }
//           });


var earthquakeRisk = L.esri.featureLayer({
            // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
            url: 'http://newcoastalatlas.tamug.edu/coastal/rest/services/grover/Parcelswithrisk04/FeatureServer/1',
          });

// var hurricaneRisk = L.esri.featureLayer({
//             // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
//             url: 'http://newcoastalatlas.tamug.edu/coastal/rest/services/grover/Parcelswithrisk04/FeatureServer/4',
//           });

// var fireRisk = L.esri.featureLayer({
//             // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
//             url: 'http://newcoastalatlas.tamug.edu/coastal/rest/services/grover/Parcelswithrisk04/FeatureServer/5',
//           });

var erosionRates = L.esri.featureLayer({
            // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
            url: 'http://newcoastalatlas.tamug.edu/coastal/rest/services/grover/Parcelswithrisk04/FeatureServer/2',
          });

var subsidenceZones = L.esri.featureLayer({
            // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
            url: 'http://newcoastalatlas.tamug.edu/coastal/rest/services/grover/Parcelswithrisk04/FeatureServer/3',
          });

var groupedOverlays = {
  "Risk Layers": {
    "Earthquake Risk" : earthquakeRisk,
    // "Hurricane Risk" : hurricaneRisk,
    // "Fire Risk" : fireRisk,
    "Erosion Rates" : erosionRates,
    "Subsidence Zones" : subsidenceZones
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
      if (oldId == selId)
        return;

            // document.getElementById('info-pane').innerHTML = 'AREA: ' + e.layer.feature.properties.NAME + ' ' + e.layer.feature.properties.RISK_AREA;
            e.layer.bringToFront();
            parcelLayer.setFeatureStyle(e.layer.feature.id, {
              color: '#16A085',
              weight: 1,
              opacity: 1
            });
          });

    parcelLayer.on('click', function(e) {
      sidebar.show();
      parcelLayer.resetStyle(selId);
      selId = e.layer.feature.id;

      parcelLayer.setFeatureStyle(e.layer.feature.id, {
        color: '#EEAC34',
        weight: 1,
        fillOpacity: 0.6
      });
            // console.log(e)

            document.getElementById("property-image").innerHTML = "<img src='https://maps.googleapis.com/maps/api/streetview?size=600x400&location=" + e.latlng.lat + "," + e.latlng.lng + "&pitch=-0.76&key=AIzaSyBZ2WWx3aY0ZYv0rj7nGmODxc3DAW3BV2Y' width='100%'>"
            
            // console.log(e.layer.feature)
            AssessedPrice = e.layer.feature.properties.VAL10TOT;
            if(!AssessedPrice)
            {
              AssessedPrice = "Data not available"
            }
            else
            {
              document.getElementById("assessed-price").innerHTML = "$" + AssessedPrice.toFixed(0).replace(/(\d)(?=(\d{3})+$)/g, "$1,");
            }


            Hurricanes = Math.round(e.layer.feature.properties.Index_HurricaneRisk);
            Floods = Math.round(e.layer.feature.properties.Index_floodRisk);
            Wildfire = Math.round(e.layer.feature.properties.Index_FireRisk);
            // Traffic = e.layer.feature.properties.Index_trafficproxvol;
            NPLSites = Math.round(e.layer.feature.properties.Index_NPLsites);
            RMPSites = Math.round(e.layer.feature.properties.Index_RMPsites);
            TSDFSites = Math.round(e.layer.feature.properties.Index_TSDF);
            Ozone = Math.round(e.layer.feature.properties.Index_oz);
            ParticulateMatter = Math.round(e.layer.feature.properties.Index_PM25);
            // Earthquake = e.layer.feature.properties.index_eqrisk;
            Subsidence = Math.round(e.layer.feature.properties.index_subs);
            OverallRisk = (Hurricanes + Floods + Wildfire + NPLSites + RMPSites + TSDFSites + Ozone + ParticulateMatter + Subsidence) / 9;

            risks = [{"label":"Hurricanes", "value":Hurricanes, "description":"Hurricane Risk"}, 
            {"label":"Floods", "value":Floods, "description":"Flooding Risk"}, 
            {"label":"Wildfire", "value":Wildfire, "description":"Wildfire risk"},
            {"label":"Contam. Lands", "value":NPLSites, "description":"Proximity to National Priorities List Sites"}, 
            {"label":"Air Pollution", "value":RMPSites, "description":"Proximity to Risk Management Plan Sites"}, 
            {"label":"Haz. Waste", "value":TSDFSites, "description":"Proximity to Hazardous Waste Treatment Storage and Disposal Facilities"},
            {"label":"Ozone", "value":Ozone, "description":"Average Seasonal Ozone Conc. in 2011"}, 
            {"label":"Particulate Matter", "value":ParticulateMatter, "description":"Average Annual PM2.5 Conc. in 2011"}, 
            {"label":"Subsidence", "value":Subsidence, "description":"Subsidence risk"}];

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
                  addSearch = results[0].address_components[0].long_name + " " + results[0].address_components[1].long_name;
                  console.log(addSearch);
                  cityStateZip = results[0].address_components[2].long_name + "," + results[0].address_components[4].short_name + " " + results[0].address_components[6].long_name;
                  console.log(cityStateZip);
                  $.ajax({
                    url: 'zillow.php',
                    type: 'get',
                    dataType: 'json',
                    data: {
                      'address': addSearch,
                      'citystate': cityStateZip
                    },
                    success: function(response){
                      console.log(response);
                      bedRooms = response[0].response.results.result.bedrooms;
                      bathRooms = response[0].response.results.result.bathrooms;
                      finishedSqFt = response[0].response.results.result.finishedSqFt;
                      Zestimate = response[0].response.results.result.zestimate.amount;
                      homeDescription = "Data not available"
                      editedFacts = "Data not available"
                      if(response[1].hasOwnProperty('response'))
                      {
                        if(response[1].response.hasOwnProperty('homeDescription'))
                          homeDescription = response[1].response.homeDescription;
                        if(response[1].response.hasOwnProperty('editedFacts'))
                          homeFacts = response[1].response.editedFacts;
                      }
                      if(bedRooms) {
                        document.getElementById("property-type").innerHTML = bedRooms + " beds - " + bathRooms + " baths - " + finishedSqFt + " sqft";
                      }
                      else {
                        document.getElementById("property-type").innerHTML = bathRooms + " baths - " + finishedSqFt + " sqft";
                      }
                      document.getElementById("zillow-price").innerHTML = "$" + parseInt(Zestimate).toFixed(0).replace(/(\d)(?=(\d{3})+$)/g, "$1,");
                      document.getElementById("homeDescription").innerHTML = homeDescription;
                    },
                    error: function (xhr,status,error){
                      document.getElementById("zillow-price").innerHTML = "Data not available"
                      document.getElementById("homeDescription").innerHTML = "Data not available";
                      document.getElementById("property-type").innerHTML = "_ beds - " + "_ baths - " + "_ sqft";
                    }
                  });

} else {
  window.alert('No results found');
}
} else {
  window.alert('Geocoder failed due to: ' + status);
}
});

}
function changeScore() {


  document.getElementById("OverallRisk").value = OverallRisk;
  
  drawRisks();
}      
function drawRisks() {
  // $('.radial').each(function() {
  //   var transform_styles = ['-webkit-transform', '-ms-transform', 'transform'];
  //   $(this).find('span').fadeTo('slow', 1);
  //   var score = $(this).data('score');
  //   var deg = (((100 / 5) * score) / 100) * 180;
  //   var rotation = deg;
  //   var fill_rotation = rotation;
  //   var fix_rotation = rotation * 2;
  //   for(i in transform_styles) {
  //     $(this).find('.circle .fill, .circle .mask.full').css(transform_styles[i], 'rotate(' + fill_rotation + 'deg)');
  //     $(this).find('.circle .fill.fix').css(transform_styles[i], 'rotate(' + fix_rotation + 'deg)');
  //   }
  // });



var width = 390,
  height = 410,
  radius = Math.min(width, height) / (2.5),
  innerRadius = 0.3 * radius,
  color = d3.scale.category20c(),
  mycolors = [ "#6FA83F", "#c1ef99", "#EBE142", "#F38C23", "#B61620"]
  overallRisk = 0;

  
  document.getElementById("risk_elements").innerHTML = "";
  var pie = d3.layout.pie()
    .startAngle(-90 * Math.PI/180)
    .endAngle(-90 * Math.PI/180 + 2*Math.PI)
    .padAngle(.02)
    .sort(null)
    .value(function(d) { return 36; });

  var tip = d3.tip()
    .attr('class', 'd3-tip')
    .style('z-index','9999')
    .style('background-color','rgba(0,0,0,0.5)')
    .style('color','white')
    .style('padding',"5px")
    .offset([0, 0])
    .html(function(d) {
      return "<span >" + d.data.description + "</span>" + "<br><span>Risk Score: " + d.data.value + "</span>";
    });

  var arc = d3.svg.arc()
    .innerRadius(innerRadius)
    .outerRadius(function (d) {
      console.log(d);
      // OverallRisk = OverallRisk + d.data.value;
      return (radius - innerRadius) * (d.data.value * 0.20) + innerRadius;
    });

  var outlineArc = d3.svg.arc()
    .innerRadius(innerRadius)
    .outerRadius(radius);

  var svg = d3.select(".risk").append("svg")
    .attr("width", width)
    .attr("height", height)
    .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

  svg.call(tip);

  var arcs = svg.selectAll(".slice")
      .data(pie(risks))
      .enter()
      .append("g")
      .attr("class","slice");

  arcs.append("path")
    .attr("fill", function(d, i) { return mycolors[d.data.value-1]; })
    .attr("stroke", "gray")
    .attr("stroke-width", "0.5")
    .attr("d", arc)
    .on('mouseover', tip.show)
    .on('mouseout', tip.hide);

  var outerPath = svg.selectAll(".outlineArc")
    .data(pie(risks))
    .enter().append("path")
    .attr("fill", "none")
    .attr("stroke", "gray")
    .attr("stroke-width", "0.5")
    .attr("class", "outlineArc")
    .attr("d", outlineArc)
    .each(function(d,i) {
      //Search pattern for everything between the start and the first capital L
      var firstArcSection = /(^.+?)L/;  

      //Grab everything up to the first Line statement
      var newArc = firstArcSection.exec( d3.select(this).attr("d") )[1];
      //Replace all the comma's so that IE can handle it
      newArc = newArc.replace(/,/g , " ");
      
      //If the end angle lies beyond a quarter of a circle (90 degrees or pi/2) 
      //flip the end and start position
      if (d.endAngle > 90 * Math.PI/180) {
        var startLoc  = /M(.*?)A/,    //Everything between the first capital M and first capital A
          middleLoc   = /A(.*?)0 0 1/,  //Everything between the first capital A and 0 0 1
          endLoc    = /0 0 1 (.*?)$/; //Everything between the first 0 0 1 and the end of the string (denoted by $)
        //Flip the direction of the arc by switching the start en end point (and sweep flag)
        //of those elements that are below the horizontal line
        var newStart = endLoc.exec( newArc )[1];
        var newEnd = startLoc.exec( newArc )[1];
        var middleSec = middleLoc.exec( newArc )[1];
        
        //Build up the new arc notation, set the sweep-flag to 0
        newArc = "M" + newStart + "A" + middleSec + "0 0 0 " + newEnd;
      }//if
      
      //Create a new invisible arc that the text can flow along
      svg.append("path")
        .attr("class", "hiddenDonutArcs")
        .attr("id", "outlineArc"+i)
        .attr("d", newArc)
        .style("fill", "none");
    });

  svg.selectAll(".donutText")
    .data(pie(risks))
    .enter().append("text")
    .attr("class", "donutText")
    //Move the labels below the arcs for those slices with an end angle greater than 90 degrees
    .attr("dy", function(d,i) { return (d.endAngle > 90 * Math.PI/180 ? 18 : -11); })
    .append("textPath")
    .attr("font-size","12px")
    .attr("startOffset","50%")
    .style("text-anchor","middle")
    .on('mouseover', tip.show)
    .on('mouseout', tip.hide)
    .style('cursor','pointer')
    .attr("xlink:href",function(d,i){return "#outlineArc"+i;})
    .text(function(d){return d.data.label;});

    var overallRiskLabel;
if(OverallRisk === 0) {
overallRiskLabel = "No Risk";
}
else if( OverallRisk > 0 && OverallRisk <= 1) {
overallRiskLabel = "Very Low";
}
else if( OverallRisk > 1 && OverallRisk <= 2) {
overallRiskLabel = "Low";
}
else if( OverallRisk > 2 && OverallRisk <= 3) {
overallRiskLabel = "Medium";
}
else if( OverallRisk > 3 && OverallRisk <= 4) {
overallRiskLabel = "High";
}
else if( OverallRisk > 4 && OverallRisk <= 5) {
overallRiskLabel = "Very High";
}
svg.append("text")
.attr("class", "overallRisk")
.attr("dy", ".35em")
.attr("x", "0")
.attr("text-align", "center")
.attr("font-weight","bold")
.attr("font-size","14px")
.attr("text-anchor", "middle")
.text(overallRiskLabel);

svg.append("path")
  .attr("id", "wavy") //very important to give the path element a unique ID to reference later
  .attr("d", "M -34,2 A 8,8 0 0,1 35,2") //Notation for an SVG path, from bl.ocks.org/mbostock/2565344
  .style("fill", "none")
  .style("stroke", "none");

//Create an SVG text element and append a textPath element
svg.append("text")
   .append("textPath") //append a textPath to the text element
  .attr("xlink:href", "#wavy") //place the ID of the path here
  .style("text-anchor","middle") //place the text halfway on the arc
  .attr("startOffset", "50%")   
  .attr("text-align", "center")
  // .attr("font-weight","bold")
  .attr("font-size","11px")
  .text("Overall Hazards Risk");

// svg.append("path")
//   .attr("id", "wavy2") //very important to give the path element a unique ID to reference later
//   .attr("d", "M 30,0 A 8,8 0 0,1 -30,0") //Notation for an SVG path, from bl.ocks.org/mbostock/2565344
//   .style("fill", "none")
//   .style("stroke", "#aaaaaa");

// //Create an SVG text element and append a textPath element
// svg.append("text")
//    .append("textPath") //append a textPath to the text element
//   .attr("xlink:href", "#wavy2") //place the ID of the path here
//   .style("text-anchor","middle") //place the text halfway on the arc
//   .attr("startOffset", "50%")   
//   .attr("text-align", "center")
//   // .attr("font-weight","bold")
//   .attr("font-size","12px")
//   .text("Overall");

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
<script>
        // $(document).ready(function() {
        //     $('.tooltip').tooltipster({
        //       animation: 'fade',
        //       maxWidth: 300,
        //       offsetX: 30
        //     });
        // });
    </script>

</body>

</html>