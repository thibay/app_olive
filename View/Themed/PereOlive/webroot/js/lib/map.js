//MAP       
var speedworks_pos = new google.maps.LatLng(50.444285,4.649721);          
var styles =[
  {
    "featureType": "road",
    "stylers": [
      { "hue": "#f0cf1a" },
      { "saturation": -17 },
      { "weight": 1 }
    ]
  },{
    "featureType": "administrative",
    "stylers": [
      { "visibility": "on" },
      { "saturation": 1 }
    ]
  },{
    "featureType": "water",
    "stylers": [
      { "saturation": -100 },
      { "visibility": "on" }
    ]
  },{
    "featureType": "road",
    "stylers": [
      { "visibility": "on" }
    ]
  },{
    "featureType": "poi",
    "stylers": [
      { "saturation": -100 },
      { "visibility": "on" }
    ]
  },{
    "featureType": "landscape",
    "stylers": [
      { "visibility": "on" },
      { "saturation": -100 }
    ]
  }
];

var map;
function initialize() {
var mapOptions = {
  zoom: 14,
  center: speedworks_pos,
  scaleControl: false,
  scrollwheel: false,
  mapTypeId: google.maps.MapTypeId.ROADMAP,          
};        
map = new google.maps.Map(document.getElementById('map_canvas'),
    mapOptions);
map.setOptions({styles: styles});

//console.log(map);

var marker = new google.maps.Marker({
    position: speedworks_pos,
    animation: google.maps.Animation.DROP,
    icon: {
    path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
    scale: 7,    
    strokeWeight: 1,
    strokeColor: '#f0cf1a',
    fillColor:'#f0cf1a',                
    fillOpacity: 1,
    strokeOpacity: 1
  },
    title:'7Marie'
});


// To add the marker to the map, call setMap();
marker.setMap(map);        
//        google.maps.event.addListener(marker, 'click', function() { infowindow.open(map,marker); });

}      
google.maps.event.addDomListener(window, 'load', initialize);  
//initialize();