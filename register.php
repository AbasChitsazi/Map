<?php
include "bootstrap/init.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    registerUser($_POST);
}

include BASE_PATH."/views/register-views.php";