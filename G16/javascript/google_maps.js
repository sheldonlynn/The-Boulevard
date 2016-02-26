function initialize() {
	var mapProp = {
	center:new google.maps.LatLng(49.2660307, -123.2467108),
	zoom: 15,
	mapTypeId: google.maps.MapTypeId.ROADMAP
	};
var map=new google.maps.Map(document.getElementById('map_canvas'), mapProp);

var marker = new google.maps.Marker({
position: {lat: 49.2660307, lng: -123.2467108},
map: map,
title: 'Hello'
});

}
google.maps.event.addDomListener(window, 'load', initialize);
