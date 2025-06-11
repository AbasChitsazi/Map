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
	$('#l-title').val('');
	$('.modal-overlay').fadeIn();
});


$(document).ready(function () {

	let canSendRequest = true;

	// close modal
	$('.close').click(function () {
		$('.modal-overlay').fadeOut();
	});

	// handle form
	$('form#addLocationForm').submit(function (e) {
		e.preventDefault();
		let msg = $('.ajax-result');
		if (!canSendRequest) {
			msg.stop(true, true).hide().html("<p class='error-msg'>لطفا از ارسال درخواست های مکرر خودداری فرمایید</p>").fadeIn();
			return;
		}
		canSendRequest = false;

		// ajax request
		var form = $(this);
		var result = form.find('.ajax-result');
		$.ajax({
			url: form.attr('action'),
			method: "POST",
			data: form.serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status) {
					result.stop(true, true).hide().html("<p class='success-msg'>" + response.message + "</p>").fadeIn();
					setTimeout(() => {
						canSendRequest = true;
					}, 10000);
				} else {
					result.stop(true, true).hide().html("<p class='error-msg'>" + response.message + "</p>").fadeIn();
					setTimeout(() => {
						canSendRequest = true;
					}, 1000);
				}
				setTimeout(() => {
					result.fadeOut();
				}, 3000);
			},
			error: function () {
				result.stop(true, true).hide().html("<p class='error-msg'>خطا در ارسال درخواست</p>").fadeIn();
				setTimeout(() => {
					canSendRequest = true;
				}, 1000);
				setTimeout(() => {
					result.fadeOut();
				}, 3000);
			},
		});
	});
});
