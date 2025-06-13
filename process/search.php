<?php

include "../bootstrap/init.php";


if (!isAjaxRequest()) {
    diePage('Request Invalid');
}
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $keyword = $_POST['keyword'];
    $locations = getlocation(['keyword' => $keyword],true);
}

if (empty($locations)) {
    echo "نتیجه ای یافت نشد";
    return;
}
foreach ($locations as $loc) {
    echo "
        <a href='".BASE_URL."?loc=$loc->id'><div class='result-item' data-lat='$loc->lat' data-lng='$loc->lng' data-id='$loc->id'>
            <span style='background:".locationTypes[$loc->type]['color']."!important;' class='loc-type'>".locationTypes[$loc->type]['title']."</span>
            <span class='loc-title'>$loc->title</span>
        </div><a>";
}
