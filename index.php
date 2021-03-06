
<?php

session_start();

if (!(isset($_SESSION['username']))) {

  header ("Location: login.php");

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
  <link type="text/css" rel="stylesheet" href="dist/leaflet.bookmarks.css">
  <link type="text/css" rel="stylesheet" href="dist/Control.Loading.css">
  <link rel="stylesheet" href="dist/easyPrint.css"/>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:500,400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
  
  <link rel="stylesheet" href="style.css" />

  <script src="//cdn.jsdelivr.net/leaflet/0.7.3/leaflet.js"></script>
  <script src="src/esri-leaflet.js"></script>
  <script src="dist/leaflet.draw.js"></script>
  <script src="src/L.Control.Sidebar.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="dist/leaflet.groupedlayercontrol.min.js"></script>
  <script src="dist/Control.Loading.js"></script> 
  <script src="dist/Leaflet.Bookmarks.min.js"></script>
  <script src="dist/jQuery.print.js"></script>
  <script src="dist/leaflet.easyPrint.js"></script>
  <script src="//cdn.jsdelivr.net/leaflet.esri.renderers/2.0.0/esri-leaflet-renderers.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ2WWx3aY0ZYv0rj7nGmODxc3DAW3BV2Y&signed_in=true&sensor=false&libraries=places"></script>
  <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>

  <script type="text/javascript">
  Hurricanes = 0;
  Floods = 0;
  Wildfire = 0;
  NPLSites = 0;
  RMPSites = 0;
  TSDFSites = 0;
  Ozone = 0;
  ParticulateMatter = 0;
  Earthquake = 0;
  Subsidence = 0;
  </script>
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
      <div class="mycontainer" id="price">
        <div class="mycol-1">
          <div class="item-header">Zestimate</div>
          <div id="zillow-price"></div>
        </div>

        <div class="mycol-1">
          <div class="item-header">Assessed Price</div>
          <div id="assessed-price">$1,015,000</div>
        </div>

      </div>

      <div class="mycontainer">
        <br>
        <div class="mycol-2">
          <div class="item-header">OVERALL HAZARD RISK SCORE&nbsp; <a href="risk_description.html" target="_blank"><img src="images/external_link.png" width="15px" /></a></div>
          <div class="totalRisk">

            <div class="legend">
              <table width="100%">
                <tr >
                  <td width="16%"><div style="text-align:center;"  id="risklevel_label_0">No Risk</div></td>
                  <td width="16%"><div style="text-align:center;"  id="risklevel_label_1">Very Low</div></td>
                  <td width="16%"><div style="text-align:center;"  id="risklevel_label_2">Low</div></td>
                  <td width="16%"><div style="text-align:center;"  id="risklevel_label_3">Medium </div></td>
                  <td width="16%"><div style="text-align:center;"  id="risklevel_label_4">High</div></td>
                  <td width="16%"><div style="text-align:center;"  id="risklevel_label_5">Very High</div></td>
                </tr>
                <tr style="height:20px;">
                  <td id="risklevel_0" style="border:1px solid #aaaaaa;"></td>
                  <td id="risklevel_1" bgcolor="#6FA83F" style="border:1px solid #aaaaaa;"></td>
                  <td id="risklevel_2" bgcolor="#c1ef99" style="border:1px solid #aaaaaa;"></td>
                  <td id="risklevel_3" bgcolor="#EBE142" style="border:1px solid #aaaaaa;"></td>
                  <td id="risklevel_4" bgcolor="#F38C23" style="border:1px solid #aaaaaa;"></td>
                  <td id="risklevel_5" bgcolor="#B61620" style="border:1px solid #aaaaaa;"></td>
                </tr>
                <tr>
                  <td style="text-align:center;" id="risklevel_val_0">0</td>
                  <td style="text-align:center;" id="risklevel_val_1">1</td>
                  <td style="text-align:center;" id="risklevel_val_2">2</td>
                  <td style="text-align:center;" id="risklevel_val_3">3</td>
                  <td style="text-align:center;" id="risklevel_val_4">4</td>
                  <td style="text-align:center;" id="risklevel_val_5">5</td>
                </tr>
              </table>
            </div>

          </div>
        </div>


        <!-- _______________________SPECIFIC RISKS ________________________ -->

        <div class="mycol-2">

          <div class="item-header">SPECIFIC HAZARD RISK ASSESSMENT&nbsp; 
            <a href="risk_description.html" target="_blank">
              <img src="images/external_link.png" width="15px" />
            </a>
          </div>

          <p>Select Hazard Risks using the dropdown below.</p>

          <div class="risk-selector">
            <select id="specific-risk-selector" multiple="multiple">
              <option value="hurricanes" selected="true">Hurricanes</option>
              <option value="hazardouswaste">Hazardous Waste</option>
              <option value="floods" selected="true">Floods</option>
              <option value="ozone">Ozone</option>
              <option value="wildfire" selected="true">Wildfire</option>
              <option value="particulatematter">Particulate Matter</option>
              <option value="contaminatedlands">Contaminated Lands</option>
              <option value="earthquake" selected="true">Earthquake</option>
              <option value="airpollution" selected="true">Air Pollution</option>
              <option value="subsidence">Subsidence</option>
            </select>

            <!-- Initialize the plugin: -->
            <script type="text/javascript">
            $(document).ready(function() {
              $('#specific-risk-selector').multiselect({
                onChange: function(element,checked){
                  if(checked === true)
                  {
                    console.log(element[0].value)
                    $("#" + element[0].value).show()
                  }
                  else if (checked === false)
                  {
                    console.log(element[0].value)
                    $("#" + element[0].value).hide()
                  }

                  OverallRisk = 0;
                  num = 0;
                  $('#specific-risk-selector option').each(function(){

                    if($(this).prop('selected'))
                    {
                      if($(this).val() == "hurricanes")
                      {
                        OverallRisk += Hurricanes;
                        num += 1;
                      }
                      if($(this).val() == "hazardouswaste")
                      {
                        OverallRisk += TSDFSites;
                        num += 1;
                      }
                      if($(this).val() == "floods")
                      {
                        OverallRisk += Floods;
                        num += 1;
                      }
                      if($(this).val() == "ozone")
                      {
                        OverallRisk += Ozone;
                        num += 1;
                      }
                      if($(this).val() == "wildfire")
                      {
                        OverallRisk += Wildfire;
                        num += 1;
                      }
                      if($(this).val() == "particulatematter")
                      {
                        OverallRisk += ParticulateMatter;
                        num += 1;
                      }
                      if($(this).val() == "contaminatedlands")
                      {
                        OverallRisk += NPLSites;
                        num += 1;
                      }
                      if($(this).val() == "earthquake")
                      {
                        OverallRisk += Earthquake;
                        num += 1;
                      }
                      if($(this).val() == "airpollution")
                      {
                        OverallRisk += RMPSites;
                        num += 1;
                      }
                      if($(this).val() == "subsidence")
                      {
                        OverallRisk += Subsidence;
                        num += 1;
                      }
                    }
                  });

OverallRisk = OverallRisk/num; 
drawOverallRisk(OverallRisk)
}
});
});



</script>
</div>


<div class="risk">
  <div class="row">
    <div class="col-md-5" id="hurricanes">
      <div class="radial" data-score="2" id="Hurricanes">
        <a href="#" class="mytooltip" title="Hurricane Risk">
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
            Hurricanes
          </div>  
        </a>
      </div>
    </div>
    <div class="col-md-5" id="floods">
      <div class="radial" data-score="0" id="Floods">
        <a href="#" class="mytooltip" title="Flooding Risk">
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
            Floods
          </div>
        </a>  
      </div>
    </div>
    <div class="col-md-5" id="wildfire">
      <div class="radial" data-score="0" id="Wildfire">
        <a href="#" class="mytooltip" title="Wildfire risk">
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
        </a>
      </div>  
    </div>
    <div class="col-md-5" id="contaminatedlands" style='display:none'>          
      <div class="radial" data-score="0" id="NPLSites">
        <a href="#" class="mytooltip" title="Proximity to National Priorities List Sites">
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
            Contaminated Lands
          </div>  
        </a>
      </div>
    </div>
    <div class="col-md-5" id="airpollution">
      <div class="radial" data-score="0" id="RMPSites">
        <a href="#" class="mytooltip" title="Proximity to Risk Management Plan Sites">
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
            Air Pollution
          </div>  
        </a>
      </div>  
    </div>  
    <div class="col-md-5" id="hazardouswaste" style='display:none'>
      <div class="radial" data-score="0" id="TSDFSites">
        <a href="#" class="mytooltip" title="Proximity to Hazardous Waste Treatment Storage and Disposal Facilities">
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
            Hazardous Waste
          </div>  
        </a>
      </div>
    </div>
    <div class="col-md-5" id="ozone" style='display:none'>
      <div class="radial" data-score="0" id="Ozone">
        <a href="#" class="mytooltip" title="Average Seasonal Ozone Conc. in 2011">
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
            Ozone
          </div>  
        </a>
      </div>
    </div>
    <div class="col-md-5" id="particulatematter" style='display:none'>
      <div class="radial" data-score="0" id="ParticulateMatter">
        <a href="#" class="mytooltip" title="Average Annual PM2.5 Conc. in 2011">
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
            Particulate Matter
          </div>  
        </a>
      </div>
    </div>
    <div class="col-md-5" id="earthquake">
      <div class="radial" data-score="0" id="Earthquake">
        <a href="#" class="mytooltip" title="Earthquake risk">
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
            Earthquake
          </div>  
        </a>
      </div>
    </div>
    <div class="col-md-5" id="subsidence" style='display:none'>
      <div class="radial" data-score="0" id="Subsidence">
        <a href="#" class="mytooltip" title="Subsidence risk">
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
            Subsidence
          </div>  
        </a>
      </div>
    </div>

  </div>
</div>
</div>
</div>

<div class="mycontainer">

  <div class="mycol-1">
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
  <div class="mycol-1">
    <div class="item-header">FEATURES</div>
    <p id = "homeFeatures">
      Flooring: Hardwood<br>
      Parking: 2 spaces<br>
      Dishwasher<br>
      Garbage Disposal<br>
      Cooling: Window Units<br>
    </p>
  </div>


  <div class="mycol-2">
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
// 
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




var earthquakeRisk = L.esri.featureLayer({
            // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/Tricountyatlas/Risk/MapServer/7',
            url: 'http://newcoastalatlas.tamug.edu/coastal/rest/services/grover/Parcelswithrisk04/FeatureServer/1',
            // url: 'https://newcoastalatlas.tamug.edu/coastal/rest/services/grover/HG_BB_RISK_Mar22/MapServer/1',
          });


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


            Hurricanes = e.layer.feature.properties.Index_HurricaneRisk;
            Floods = e.layer.feature.properties.Index_floodRisk;
            Wildfire = e.layer.feature.properties.Index_FireRisk;
            NPLSites = e.layer.feature.properties.Index_NPLsites;
            RMPSites = e.layer.feature.properties.Index_RMPsites;
            TSDFSites = e.layer.feature.properties.Index_TSDF;
            Ozone = e.layer.feature.properties.Index_oz;
            ParticulateMatter = e.layer.feature.properties.Index_PM25;
            Earthquake = e.layer.feature.properties.index_eqrisk;
            Subsidence = e.layer.feature.properties.index_subs;


            OverallRisk = 0;
            num = 0;
            $('#specific-risk-selector option').each(function(){

              if($(this).prop('selected'))
              {
                if($(this).val() == "hurricanes")
                {
                  OverallRisk += Hurricanes;
                  num += 1;
                }
                if($(this).val() == "hazardouswaste")
                {
                  OverallRisk += TSDFSites;
                  num += 1;
                }
                if($(this).val() == "floods")
                {
                  OverallRisk += Floods;
                  num += 1;
                }
                if($(this).val() == "ozone")
                {
                  OverallRisk += Ozone;
                  num += 1;
                }
                if($(this).val() == "wildfire")
                {
                  OverallRisk += Wildfire;
                  num += 1;
                }
                if($(this).val() == "particulatematter")
                {
                  OverallRisk += ParticulateMatter;
                  num += 1;
                }
                if($(this).val() == "contaminatedlands")
                {
                  OverallRisk += NPLSites;
                  num += 1;
                }
                if($(this).val() == "earthquake")
                {
                  OverallRisk += Earthquake;
                  num += 1;
                }
                if($(this).val() == "airpollution")
                {
                  OverallRisk += RMPSites;
                  num += 1;
                }
                if($(this).val() == "subsidence")
                {
                  OverallRisk += Subsidence;
                  num += 1;
                }
              }
            })

OverallRisk = OverallRisk/num;

console.log(e.latlng.lat + "," + e.latlng.lng)

GetCompleteAddress(e.latlng.lat,e.latlng.lng);

changeScore();


});


var results = L.layerGroup().addTo(map);


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


  function update(id,data){

    $(id).data("score",data);
      // console.log(id)
      if(data == 0.0)
      {
        $(id).find(".inset").css("background-color","#FFFFFF");
      }
      else if( data <= 1) {
        $(id).find(".inset").css("background-color","#6FA83F");
      }
      else if( data <= 2) {
        $(id).find(".inset").css("background-color","#c1ef99");
      }
      else if( data <= 3) {
        $(id).find(".inset").css("background-color","#EBE142");
      }
      else if( data <= 4) {
        $(id).find(".inset").css("background-color","#F38C23");
      }
      else if( data <= 5) {
        $(id).find(".inset").css("background-color","#B61620");
      }
      $(id).find(".bigger").html(data);
    }

    update("#Hurricanes",Hurricanes.toFixed(1));
    update("#Floods",Floods.toFixed(1));
    update("#Wildfire",Wildfire.toFixed(1));
    update("#NPLSites",NPLSites.toFixed(1));
    update("#RMPSites",RMPSites.toFixed(1));
    update("#TSDFSites",TSDFSites.toFixed(1));
    update("#Ozone",Ozone.toFixed(1));
    update("#ParticulateMatter",ParticulateMatter.toFixed(1));
    update("#Earthquake",Earthquake.toFixed(1));
    update("#Subsidence",Subsidence.toFixed(1));


    drawOverallRisk(OverallRisk)

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

  function drawOverallRisk(risk_value){
    risk_value = Math.round(risk_value);
    risk_colors = ["#ffffff" , "#6FA83F", "#c1ef99", "#EBE142", "#F38C23", "#B61620"];


    for(i = 0; i <= risk_value ; i++)
    {
      $("#risklevel_" + i).css('background-color',risk_colors[i]);
      $("#risklevel_val_" + i).css('font-weight',300);
      $("#risklevel_label_" + i).css('font-weight',300);
      $("#risklevel_val_" + i).css('font-size','11px');
      $("#risklevel_label_" + i).css('font-size','11px');

    }

    for(i = risk_value+1 ; i <= 6 ; i++)
    {
      $("#risklevel_" + i).css('background-color',"#f0f0f0"); 
      $("#risklevel_val_" + i).css('font-weight',300);
      $("#risklevel_label_" + i).css('font-weight',300);
      $("#risklevel_val_" + i).css('font-size','11px');
      $("#risklevel_label_" + i).css('font-size','11px');
    }

    $("#risklevel_val_" + risk_value).css('font-weight',600);
    $("#risklevel_label_" + risk_value).css('font-weight',600);
    $("#risklevel_val_" + risk_value).css('font-size','16px');
    $("#risklevel_label_" + risk_value).css('font-size','12px');

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
  $(document).ready(function() {
    $('.mytooltip').tooltipster({
      animation: 'fade',
      maxWidth: 300,
      offsetX: 30
    });
  });
  </script>

</body>

</html>