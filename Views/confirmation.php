<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

$file_table = new FileController();
$file_table->getFilesTable();

?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تایید فایل</title>

    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/css/main.css">
</head>
<body>
<div class="container vh-100">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class=" rounded overflow-hidden w-100">
            <div class="customize-header px-5 py-3">
                <p class="h3 m-0">تایید فایل های آپلود شده</p>
            </div>
            <div class="customize-body d-flex p-5 justify-content-center">
                <form class="w-100" action="http://localhost:63342/filesale/index.php?route=do-confirm" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered bg-light">
                        <thead>
                        <tr>
                            <th class="text-center">ردیف</th>
                            <th class="text-center">کاربر</th>
                            <th class="text-center">نام و پسوند فایل</th>
                            <th class="text-center">آدرس فایل</th>
                            <th class="text-center">وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $counter = 0;
                        foreach ($file_table->getFilesTable() as $row) {

                            $status = $row['status'];
                            if ($status == 0) {
                                $class = 'text-center fw-bold';
                                $checked = '';
                                $value = false;
                            }else{
                                $class = 'text-center fw-normal';
                                $checked = 'checked';
                                $value = true;
                            }

                            $counter++;
                            $user = $row['user_name'];
                            $file_name = $row['file_name'];
                            $file_address = "uploads/";
                            $file_id = $row['id'];

                            echo '<tr>';
                            echo "    <td class=$class >$counter</td>";
                            echo "    <td class=$class >$user</td>";
                            echo "    <td class=$class >$file_name</td>";
                            echo "    <td class=$class >$file_address</td>";
                            echo "    <td class=$class >
                                        <div class='form-check d-flex justify-content-center'>
                                        <input type='hidden' name='check[$file_id]' value='0'>
                                            <input class='form-check-input' name='check[$file_id]' type='checkbox' value='1' $checked>
                                         </div>
                                      </td>";
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table><br>
                    <div class="d-flex justify-content-center">
                        <button class="btn customize-button w-25" type="submit" value="ثبت تغییرات">ثبت تغییرات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>