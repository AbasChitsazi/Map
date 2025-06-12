<?php

include "bootstrap/init.php";
if (isset($_GET['logout'])) {
    if (!isset($_SESSION['loginuser'])) {
        header("Location: " . BASE_URL);
        exit;
    }
    if ($_GET['logout'] == true) {
        unset($_SESSION['loginuser']);
        header("Location: " . BASE_URL);
        exit;
    }
}

if (isset($_GET['loc']) && is_numeric($_GET['loc'])) {
    if (!isset($_SESSION['loginadmin'])) {
        header("Location: " . BASE_URL);
        exit;
    }
    $location = getloc($_GET['loc']);
    // dd($location);
}

include BASE_PATH . "/views/index-views.php";
