<?php


function adminLoggedin()
{
    return isset($_SESSION['login']) ? true : false;
}

function login($params)
{
    global $Admin_Config;
    if (
        array_key_exists($params['username'],$Admin_Config) &&
        password_verify($params['password'],$Admin_Config[$params['username']]['pass'])
    ) {
        $_SESSION['login'] = true;
        $_SESSION['msg'] = [
            'status' => true,
            'message' => " خوش آمدید ".$Admin_Config[$params['username']]['show_name']
        ];
        header('Location: '.BASE_URL.'/adm.php');
        exit;
    }
    return showMsg(false,'نام کاربری یا کلمه عبور صحیح نمی باشد.');
}
