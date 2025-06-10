<?php

include "../bootstrap/init.php";


if(!isAjaxRequest()){
    diePage('Request Invalid');
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    insertLocation($_POST);
}