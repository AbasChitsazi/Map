<?php

include "bootstrap/init.php";

if(isset($_GET['logout'])){
    if($_GET['logout'] == true){
        unset($_SESSION['loginuser']);
        header("Location: ".BASE_URL);
        exit;
    }
}

include BASE_PATH."/views/index-views.php";