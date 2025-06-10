const defaultLocation = [35.722, 51.328];
const defaultZoom = 15

const map = L.map('map').setView(defaultLocation, defaultZoom);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 18,
	attribution: 'Personal Map Project'
}).addTo(map);

//get lat lng in modal
map.on('dblclick', function (e) {
	L.marker(e.latlng).addTo(map);
	$('#lat-display').val(e.latlng.lat);
	$('#lng-display').val(e.latlng.lng);
	$('.modal-overlay').fadeIn();
});


// jquery 
$(document).ready(function () {
	// clode modal
	$('.close').click(function () {
		$('.modal-overlay').fadeOut();
	});
	// handle form
	$('form#addLocationForm').submit(function (e) {
		e.preventDefault();
		// ajax request
		var form = $(this);
		var result = form.find('.ajax-result');
		$.ajax({
			url: form.attr('action'),
			method: "POST",
			data: form.serialize(),
			dataType: 'json',
			success: function (response) {
				result.html(response.message);
			}
		});
	});
});