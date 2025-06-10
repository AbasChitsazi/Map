<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="assets/css/map.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <script src="assets/js/leaflet.js"></script>
</head>

<body>
    <div class="main">
        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟">
        </div>
        <div class="mapContainer">
        <div id="map">
                <div id="map" style="width: 600px; height: 400px;"></div>       
            </div>
        </div>
    </div>
<script>

	const map = L.map('map').setView([35.722, 51.328], 13);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 18,
		attribution: 'Personal Map Project'
	}).addTo(map);

    document.getElementById('map').style.setProperty('height',window.innerHeight + 'px');

</script>
</body>

</html>