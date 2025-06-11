<?php

include "bootstrap/init.php";


if (isset($_GET['logout'])) {
    if ($_GET['logout'] == 1) {
        unset($_SESSION['login']);
        showMsg(true,'با موفقیت خارج شدید');
        header("Location: " . BASE_URL . "/adm.php");
        exit;
    } else {
        showMsg(false,'خروج ناموفق');
        header("Location: " . BASE_URL . "/adm.php");
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = login($_POST);
    if (!$login['status']) {
        showMsg($login['status'], $login['message']);
        header("Location: " . BASE_URL . "/adm.php");
        exit;
    }
}

if (!adminLoggedin()) {
    include "views/adm-auth-views.php";
} else {

    $params = $_GET ?? [];
    $locations = getlocation($params);
    include "views/adm-views.php";
}
