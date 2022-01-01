<?php
include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');
//
//if($_SESSION['email']){
//    if(!LoginController::checkLogin($_SESSION['email'])){
//        header("Location: login.php");
//    }
//}else{
//    header("Location: login.php");
//}
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>

    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/css/main.css">

</head>
<body>
<div class="container vh-100">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class=" rounded overflow-hidden w-50">
            <div class="customize-header px-5 py-3 d-flex justify-content-between">
                <p class="h3 m-0">صفحه آپلود فایل</p>
                <a href="http://localhost:63342/filesale/index.php?route=dashboard-page"><small>بازگشت</small></a>
            </div>
            <div class="customize-body d-flex p-5 justify-content-center">
                <form action="../index.php?route=do_user_upload" method="post" enctype="multipart/form-data">
                    <p class="fw-normal text-center">فایل را انتخاب کنید</p>
                    <input class="form-control mb-4" type="file" name="user-file">
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="ارسال" class="btn customize-button w-50">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
