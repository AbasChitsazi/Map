const defaultLocation = [35.722, 51.328];
const defaultZoom = 15

const map = L.map('map').setView(defaultLocation, defaultZoom);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 18,
	attribution: 'Personal Map Project'
}).addTo(map);

map.on('dblclick', function(e) {
	L.marker(e.latlng).addTo(map);
    $('#lat-display').val(e.latlng.lat);
	$('#lng-display').val(e.latlng.lng);
    $('.modal-overlay').fadeIn();
});
