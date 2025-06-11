<?php


function adminLoggedin()
{
    return isset($_SESSION['loginadmin']) ? true : false;
}

function loginadmin($params)
{
    global $Admin_Config;
    if (
        array_key_exists($params['username'], $Admin_Config) &&
        password_verify($params['password'], $Admin_Config[$params['username']]['pass'])
    ) {
        if (isset($_SESSION['loginuser'])) {
            unset($_SESSION['loginuser']);
        }
        $_SESSION['loginadmin'] = $Admin_Config[$params['username']];
        $_SESSION['msg'] = [
            'status' => true,
            'message' => " خوش آمدید " . $Admin_Config[$params['username']]['show_name']
        ];
        header('Location: ' . BASE_URL . '/adm.php');
        exit;
    }
    return showMsg(false, 'نام کاربری یا کلمه عبور صحیح نمی باشد.');
}


function loginUser($params)
{
    $getUserExist = getUserExist($params['user-email']);
    if (!$getUserExist) {
        return $_SESSION['msg'] = [
            'status' => false,
            'message' => 'شما در سایت عضو نیستید ابتدا در سایت عضو شوید.'
        ];
    }
    $userData = getUserData($params['user-email']);
    if ($params['user-username'] === $userData[0]['name']  && $params['user-email'] === $userData[0]['email']) {
        if (isset($_SESSION['loginadmin'])) {
            unset($_SESSION['loginadmin']);
        }
        $_SESSION['loginuser'] = $userData;
        return $_SESSION['msg'] = [
            'status' => true,
            'message' => 'شما با موفقیت وارد شدید به صفحه اصلی بروید  '."<a href='https://map.local/'>صفحه اصلی</a>"
        ];
    } else {
        return $_SESSION['msg'] = [
            'status' => false,
            'message' => 'نام کاربری یا ایمیل صحیح نمیباشد.'
        ];
    }
}

function registerUser($params)
{
    global $pdo;
    $getUserExist = getUserExist($params['user-email']);
    if ($getUserExist) {
        return $_SESSION['msg'] = [
            'status' => false,
            'message' => 'شما قبلا ثبت نام کردید لطفا وارد شوید.'
        ];
    }
    $validemail = validateEmail($params['user-email']);
    if (!$validemail) {
        return $_SESSION['msg'] = [
            'status' => false,
            'message' => 'لطفا از ایمیل معتبر استفاده کنید'
        ];
    }
    $validusername = sanitizeInput($params['user-username']);
    $sql = "INSERT INTO users (name,email) VALUES(?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$validusername, $validemail]);
    return $_SESSION['msg'] = [
        'status' => true,
        'message' => 'حساب شما ساخته شد لطفا وارد شوید.',
        'data' => $stmt->rowCount()
    ];
}

function getUserExist($email)
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetchColumn() > 0;
}
function getUserData($email)
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function validateEmail($email)
{
    $valid_email  = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $valid_email;
}
