<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>صفحه لاگین</title>
    <style>
        @font-face {
            font-family: sahel;
            font-style: normal;
            font-weight: 300;
            src: url('../assets/fonts/Sahel-Light.woff') format('woff');
        }

        @font-face {
            font-family: sahel;
            font-style: normal;
            font-weight: 400;
            src: url('../assets/fonts/Sahel.woff') format('woff');
        }

        @font-face {
            font-family: sahel;
            font-style: normal;
            font-weight: 500;
            src: url('../assets/fonts/Sahel-Bold.woff') format('woff');
        }

        @font-face {
            font-family: sahel;
            font-style: normal;
            font-weight: 700;
            src: url('../assets/fonts/Sahel-Black.woff') format('woff');
        }

        * {
            font-family: 'sahel';
        }

        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #2196f3, #e3f2fd);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            direction: rtl;
        }

        .login-box {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2196f3;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .login-box button {
            width: 107%;
            background-color: #2196f3;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 34px;
            transition: background 0.3s ease;
        }

        .login-box button:hover {
            background-color: #1976d2;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>ورود به حساب</h2>
        <form action="<?= BASE_URL ?>/login.php" method="post">
            <input type="text" name="user-username" placeholder="نام کاربری">
            <input type="text" name="user-email" placeholder="ایمیل">
            <button type="submit">ورود</button>
        </form>
        <?php if (isset($_SESSION['msg'])): ?>
            <?php if ($_SESSION['msg']['status']): ?>
                <p style="margin-right: 60px;color:green"><?= $_SESSION['msg']['message'] ?></p>
            <?php else: ?>
                <p style="margin-right: 60px;color:red"><?= $_SESSION['msg']['message'] ?></p>
            <?php endif; ?>
            <?php unset($_SESSION['msg']);  ?>
        <?php endif; ?>
        <p><a style="color:black;text-decoration: none;margin-right:50px;margin-top: 55px;" href="<?= BASE_URL ?>/register.php">حساب کاربری ندارید ؟ ساخت حساب</a></p>

    </div>

</body>

</html>