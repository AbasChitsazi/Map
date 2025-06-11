<?php

include "../bootstrap/init.php";


if(!isAjaxRequest()){
    diePage('Request Invalid');
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!isset($_SESSION['loginadmin']) && !isset($_SESSION['loginuser']) ){
        jsonresponse(false,"کاربر محترم برای ثبت موقعیت ابتدا وارد شوید <br> <a style='text-decoration:none' href='https://map.local/login.php'>صفحه ورود</a>  ");
        return;
    }else{
        insertLocation($_POST);
    }
}