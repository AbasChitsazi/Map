<?php


function diePage($message)
{
    die("<p style='
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 10px 20px;
    border-radius: 3px;
    display: inline-block;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 0;
    '>
    $message
    </p>");
}

function isAjaxRequest()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}
function sanitizeInput($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');

    return $data;
}
function dd($input)
{
    echo '<pre style="background: #1e1e1e; color: #dcdcdc; padding: 10px; border-radius: 5px; font-family: Consolas, Monaco, monospace; font-size: 14px; line-height: 1.5; z-index: 1000; position: fixed; direction: ltr; text-align: start; left: 0; /* ← این خط اضافه شده */ top: 0;  /* ← اگر می‌خوای از بالا هم بچسبه */ "><p style="color:green;margin:0 0 1px 0;"><strong>DEBUG:</strong></p>';
    print_r($input);
    echo '</pre>';
}
function showMsg($status, $message, $info = null)
{
    return $_SESSION['msg'] = [
        'status' => $status,
        'message' => $message,
        'info' => $info
    ];
}

function jsonresponse($status, $message) {
    header('Content-Type: application/json');
    echo json_encode(['status' => $status, 'message' => $message], JSON_UNESCAPED_UNICODE);
    exit();
}