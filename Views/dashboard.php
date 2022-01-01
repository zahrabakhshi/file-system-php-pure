<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

if ($_SESSION['email']) {
    if (!LoginController::checkLogin($_SESSION['email'])) {
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}
$access_ids = HomeController2::getRoleList($_SESSION['email']);

$orders = HomeController2::getOrders($_SESSION['email']);
if (count($orders) > 0) {
    $flag = true;
}else
    $flag = false;

?>
    <!doctype html>
    <html lang="fa" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>dashboard</title>

        <link rel="stylesheet" type="text/css"
              href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css"
              href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.rtl.min.css">
        <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/css/main.css">
        <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/css/dashboard.css">

    </head>
    <body>
    <div class="container vh-100">
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="rounded overflow-hidden w-75">
                <div class="customize-header px-5 py-3 d-flex justify-content-between">
                    <p class="h3 m-0">میز کار</p>
                    <a href="http://localhost:63342/filesale/index.php?route=signout"><small>خروج</small></a>
                </div>
                <div class="customize-body  d-flex p-3">
                    <div class='customize-last-orders w-75 bg-white p-3 rounded'>
                        <?php
                        if ($flag) {
                            foreach ($orders as $order) {
                                $order_name = $order['name'];
                                $date = date('y-m-d H:i:s', $order['creat_timestamp']);
                                echo "
                            <p class='border-bottom fw-normal h5 py-2'>آخرین سفارش ها</p>
                            <div class='customize-last-order d-flex justify-content-between border-bottom px-3 py-2'>
                            <p class='m-0'>$order_name</p>
                            <p class='m-0'>$date</p>
                        </div>";
                            }
                        } else {
                            echo 'سفارشی جهت نماییش وجود ندارد';
                        }
                        ?>
                    </div>
                    <div class="customize-separator"></div>

                    <div class="w-25">
                        <?php foreach ($access_ids as $id) {
                            if ($id == '1') { // certify
                                echo '<a class="btn w-100 bg-light my-1" href="http://localhost:63342/filesale/index.php?route=confirmation-page">تایید فایل ها</a>';
                            }
                            if ($id == '2') { // admin
                                echo '<a class="btn w-100 bg-light my-1" href="http://localhost:63342/filesale/index.php?route=general-setting">تنظیمات عمومی</a>';
                            }
                            if ($id == '3') { // user
                                echo '<a class="btn w-100 bg-light my-1" href="http://localhost:63342/filesale/index.php?route=user-upload-page"> آپلود فایل</a>';
                            }
                            if ($id != '1' && $id != '2' && $id != '3') { // guest
                                echo '<a class="btn w-100 bg-light my-1" href="http://localhost:63342/filesale/index.php?route=guest-upload-page">آپلود فایل</a>';
                            }
                        }
                        if ($flag == true)
                            echo "<a class='btn w-100 bg-light my-1' href='http://localhost:63342/filesale/index.php?route=files-page'>مشاهده و خرید فایل</a>"
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
    </html>
<?php
