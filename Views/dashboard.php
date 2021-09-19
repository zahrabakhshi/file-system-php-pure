<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

$home_controller = new HomeController2();
$home_controller->setPanelList($_SESSION['email']);

?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>

    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/css/dashboard.css">

</head>
<body>
<div class="container vh-100">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="rounded overflow-hidden w-100">
            <div class="customize-header px-5 py-3 d-flex justify-content-between">
                <p class="h3 m-0">میز کار</p>
                <a href="http://localhost:63342/filesale/index.php?route=signout"><small>خروج</small></a>
            </div>
            <div class="customize-body  d-flex p-3">
                <div class="customize-last-orders h-100 w-75 bg-white p-3">
                    <p class="border-bottom fw-normal h5 py-2">آخرین سفارش ها</p>
                    <div class="customize-last-order d-flex justify-content-between border-bottom px-3 py-2">
                        <p class="m-0">نام آخرین سفارش</p>
                        <p class="m-0">توضیحات سفارش</p>
                        <p class="m-0">تاریخ</p>
                    </div>
                    <div class="customize-last-order d-flex justify-content-between border-bottom px-3 py-2">
                        <p class="m-0">نام آخرین سفارش</p>
                        <p class="m-0">توضیحات سفارش</p>
                        <p class="m-0">تاریخ</p>
                    </div>
                    <div class="customize-last-order d-flex justify-content-between border-bottom px-3 py-2">
                        <p class="m-0">نام آخرین سفارش</p>
                        <p class="m-0">توضیحات سفارش</p>
                        <p class="m-0">تاریخ</p>
                    </div>
                    <div class="customize-last-order d-flex justify-content-between border-bottom px-3 py-2">
                        <p class="m-0">نام آخرین سفارش</p>
                        <p class="m-0">توضیحات سفارش</p>
                        <p class="m-0">تاریخ</p>
                    </div>
                    <div class="customize-last-order d-flex justify-content-between border-bottom px-3 py-2">
                        <p class="m-0">نام آخرین سفارش</p>
                        <p class="m-0">توضیحات سفارش</p>
                        <p class="m-0">تاریخ</p>
                    </div>
                </div>
                <div class="customize-separator"></div>
                <div class="customize-account-info  w-25 p-4 bg-white d-flex flex-column justify-content-start">
                    <div>
                        <p class="border-bottom fw-normal h5 text-center py-2">اعتبار حساب</p>
                        <p class="display-6 text-center mb-5">۲۰,۰۰۰ تومان</p>
                    </div>
                    <button class="btn btn-outline-success">افزایش اعتبار</button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php
