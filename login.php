<?php
include 'bootstrap/init.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    loginUser($_POST);
}

include BASE_PATH.'/views/login-views.php';