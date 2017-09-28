function initialise() {
	var mapCanvas = document.getElementById('map-canvas');
	
	// Center
	var center = new google.maps.LatLng( 32.178000, 34.906730);

	// Map Options		
	var mapOptions = {
		zoom: 19,
		center: center,
		scrollwheel: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: [
				{ "stylers": [{ "saturation": -100 }] },
			{elementType: 'labels', stylers: [{ visibility: 'off' }]},
			   {
              featureType: 'all',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            }

			
			
		]
	};
	
	// Create the Map
	map = new google.maps.Map(mapCanvas, mapOptions);

	
	var marker2 = new Marker({
		map: map,
		position: new google.maps.LatLng(-27.46617, 153.01865),
		icon: {
			path: ROUTE,
			fillColor: '#1998F7',
			fillOpacity: 1,
			strokeColor: '',
			strokeWeight: 0
		},
		map_icon_label: '<span class="map-icon map-icon-transit-station"></span>'
	});
	
	var marker3 = new Marker({
		map: map,
		position: new google.maps.LatLng(-27.46870, 153.02335),
		icon: {
			path: MAP_PIN,
			fillColor: '#6331AE',
			fillOpacity: 1,
			strokeColor: '',
			strokeWeight: 0
		},
		map_icon_label: '<span class="map-icon map-icon-city-hall"></span>'
	});
	
	var marker4 = new Marker({
		map: map,
		position: new google.maps.LatLng(-27.46900, 153.02009),
		icon: {
			path: SQUARE_ROUNDED,
			fillColor: '#6331AE',
			fillOpacity: 1,
			strokeColor: '',
			strokeWeight: 0
		},
		map_icon_label: '<span class="map-icon map-icon-courthouse"></span>'
	});
	
	var marker5 = new Marker({
		map: map,
		position: new google.maps.LatLng(-27.46904, 153.02754),
		icon: {
			path: SQUARE,
			fillColor: '#00CCBB',
			fillOpacity: 1,
			strokeColor: '',
			strokeWeight: 0
		},
		map_icon_label: '<span class="map-icon map-icon-grocery-or-supermarket"></span>'
	});
	
	var marker6 = new Marker({
		map: map,
		position: new google.maps.LatLng(-27.47167, 153.02580),
		icon: {
			path: SHIELD,
			fillColor: '#6331AE',
			fillOpacity: 1,
			strokeColor: '',
			strokeWeight: 0
		},
		map_icon_label: '<span class="map-icon map-icon-police"></span>'
	});
};

google.maps.event.addDomListener(window, 'load', initialise);