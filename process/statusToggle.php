<?php

include "../bootstrap/init.php";


if(!isAjaxRequest()){
    diePage('Request Invalid');
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!isset($_SESSION['loginadmin'])){
        jsonresponse(false,"دسترسی غیر مجاز");
        exit;
    }else{
        if(empty($_POST['loc']) || !is_numeric($_POST['loc'])){
            jsonresponse(false,'خطایی در ثبت اطلاعات رخ داده!');
            exit;
        }
        echo statusToggle($_POST['loc']);
        exit;
    }
}