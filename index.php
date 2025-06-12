<?php

include "bootstrap/init.php";
if (isset($_GET['logout'])) {
    if (!userloggedin()) {
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
    if (!adminLoggedin()) {
        header("Location: " . BASE_URL);
        exit;
    }
    $location = getloc($_GET['loc']);

}

include BASE_PATH . "/views/index-views.php";
