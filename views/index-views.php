<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_TITLE ?></title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/styles.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

</head>

<body>
    <div class="main">
        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟">
            <div class="clear"></div>
            <div class="search-results">
                <div class="result-item" data-lat='111' data-lng='222'>
                    <span class="loc-type">رستوران</span>
                    <span class="loc-title">رستوران و قوه خانه سنتی سون لرن</span>
                </div>
                <div class="result-item" data-lat='111' data-lng='222'>
                    <span class="loc-type">دانشگاه</span>
                    <span class="loc-title">دانشگاه شریف</span>
                </div>
            </div>
            <?php if (userloggedin()): ?>
                <a href="?logout=true"><button style="cursor: pointer;" class="exit">خروج (<?= $_SESSION['loginuser'][0]['name'] ?>)</button></a>
            <?php endif; ?>
            <?php if (adminLoggedin()): ?>
                <button style="cursor: pointer;" class="exit">ادمین(<?= $_SESSION['loginadmin']['show_name'] ?>)</button>
            <?php endif; ?>
        </div>
        <div class="mapContainer">
            <div id="map">
                <div id="map" style="width: 600px; height: 400px;"></div>
                <?php if (userloggedin() || adminLoggedin()): ?>
            </div>
            <img src="<?= BASE_URL ?>/assets/img/current.png" class="currentLoc">
        </div>
    <?php endif; ?>
    </div>
    </div>
    </div>
    <div class="modal-overlay" style="display: none;">
        <div class="modal">
            <span class="close"><img width="24" height="24" src="https://img.icons8.com/color/48/delete-sign--v1.png" alt="delete-sign--v1" /></span>
            <h3 class="modal-title">ثبت لوکیشن</h3>
            <div class="modal-content">
                <form id='addLocationForm' action="<?= BASE_URL . '/process/addLocation.php' ?>" method="post">
                    <div class="field-row">
                        <div class="field-title">مختصات</div>
                        <div class="field-content">
                            <input type="text" name='lat' id="lat-display" readonly style="width: 45%;text-align: center;">
                            <input type="text" name='lng' id="lng-display" readonly style="width: 45%;text-align: center;">
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">نام مکان</div>
                        <div class="field-content">
                            <input type="text" name="title" id='l-title' placeholder="مثلا: میدان آزادی" required>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">نوع</div>
                        <div class="field-content">
                            <select name="type" id="l-type">
                                <option value="0" selected>انتخاب کنید</option>
                                <?php foreach (locationTypes as $key => $value): ?>
                                    <option style="font-family: sahel!important;" value="<?= $key ?>"><?= $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="field-row">

                        <div class="field-content">
                            <input type="submit" value=" ثبت ">
                        </div>
                    </div>
                    <div class="ajax-result"></div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/script.js<?= "?v=" . rand(10000, 50000) ?>"></script>
    <?php if (!empty($location)): ?>
        <script>
            const coords = [<?= $location['lat'] ?>, <?= $location['lng'] ?>];
            L.marker(coords).addTo(map).bindPopup("<?= $location['title'] ?>").openPopup();;
            map.flyTo(coords, 13, {
                animate: true,
                duration: 1.5 // مدت زمان انیمیشن به ثانیه
            });
        </script>
    <?php endif ?>
    <?php if (userloggedin() || adminLoggedin()): ?>
        <script>
            map.on('locationfound', function(e) {
                L.marker(e.latlng).addTo(map).bindPopup("You Are Here").openPopup();
            })

            function locate() {

                map.locate({
                    setView: true,
                    maxZoom: 14
                });
            }
            $(document).ready(function() {
                $('img.currentLoc').click(function() {
                    locate();
                })
            });
        </script>
    <?php endif; ?>
</body>

</html>