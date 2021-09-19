<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];
    $file = new File();
    $file_data = $file->getFileDataById($id);

    $file_name = $file_data['name'];

    $file_confirmation = $file_data['status'] ? 'تایید شده' : 'تایید نشده';

    $download_count = $file_data['download_count'];

    $file_size = filesize('../Services/uploads/' . $file_name);

    $file_extension = pathinfo('../Services/uploads/' . $file_name, PATHINFO_EXTENSION);

    $file_size_string = '';

    if (pow(10, 3) > $file_size && $file_size > 0) {

        $file_size_string = $file_size . 'B';

    } elseif (pow(10, 3) < $file_size && $file_size < pow(10, 6)) {


        $file_size_string = round(($file_size / pow(10, 3)), 2) . 'MB';

    } elseif (pow(10, 9) < $file_size && $file_size < pow(10, 6)) {

        $file_size_string = round(($file_size / pow(10, 6)), 3) . 'GB';

    }
}else{
    die('get must set');
}


?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>صفحه فایل</title>

    <link rel="stylesheet" type="text/css"
          href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/css/main.css">
</head>
<body>
<div class="container vh-100">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="rounded overflow-hidden w-50">
            <div class="d-flex customize-header">
                <a href="#" >
                    <svg class="h-100" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                         width="50" height="50"
                         viewBox="0 0 226 226"
                         style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                           stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                           font-family="none"  font-size="none"
                           style="mix-blend-mode: normal">
                            <path d="M0,226v-226h226v226z" fill="#142c44"></path>
                            <g id="original-icon" fill="#f1c40f">
                                <path d="M89.12875,37.43125l-6.4975,6.4975l69.07125,69.07125l-69.07125,69.07125l6.4975,6.4975l72.32,-72.32l3.1075,-3.24875l-3.1075,-3.24875z"></path>
                            </g>
                        </g>
                    </svg>
                </a>
                <div class="px-3 py-3 d-flex justify-content-between w-100">
                    <p class="h3 m-0">اطلاعات فایل</p>
                    <a href="http://local   host:63342/filesale/index.php?route=signout"><small>خروج</small></a>
                </div>
            </div>
            <div class="customize-body d-flex p-3">
                <div class="bg-white w-100 p-3">
                        <p class="border-bottom border-warning pb-2"><span class=" h6 fw-bold"> نام فایل: </span><a
                                    href="http://localhost:63342/filesale/Services/uploads/<?php echo $file_name ?>"><?php echo $file_name ?></a>
                        </p>
                        <p class="border-bottom border-warning pb-2"><span class=" h6 fw-bold">حجم فایل: </span><?php echo $file_size_string ?></p>
                        <p class="border-bottom border-warning pb-2"><span class=" h6 fw-bold">تعداد دانلود: </span>تعداد دانلود: <?php echo $download_count ?></p>
                        <p class="border-bottom border-warning pb-2"><span class=" h6 fw-bold">فرمت فایل: </span>فرمت فایل: <?php echo $file_extension ?></p>
                        <p class="border-bottom border-warning pb-2"><span class=" h6 fw-bold">وضعیت فایل: </span><?php echo $file_confirmation ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
