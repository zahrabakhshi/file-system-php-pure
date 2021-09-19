<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>

    <link rel="stylesheet" type="text/css" href="bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.1.0-dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
<div class="container vh-100">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="customize-body rounded overflow-hidden">
            <div class="customize-header px-5 py-3">
                <p class="display-6 m-0 text-center">ثبت نام</p>
            </div>
            <form action="../index.php?route=do_signup" method="post">
                <div class="p-5">
                    <div class="mb-4">
                        <input class="form-control" type="email" name="email" placeholder="ایمیل">
                    </div>
                    <div class="mb-4">
                        <input class="form-control" type="text" name="phone-number" placeholder="شماره موبایل">
                    </div>
                    <div class="mb-4">
                        <input class="form-control" type="password" name="password" placeholder="رمز عبور">
                    </div>
                    <div class="mb-4">
                        <input class="form-control" type="password" name="re-password" placeholder="تکرار رمز عبور">
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center mb-0 mt-1">
                        <div class="w-100 h-100 pb-3">
                            <input class="btn customize-button w-100" type="submit" name="submit" value="ثبت نام">
                        </div>
                        <div>
                            <p class="m-0"><small> عضو هستید؟ <a class=" text-decoration-none" href="login.php">وارد شوید</a></small></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
<?php
