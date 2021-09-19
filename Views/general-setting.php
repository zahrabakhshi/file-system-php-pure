<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

$general_setting = new GeneralSetting();
$is_there_settings = true;
if (!$general_setting->fetchSettings()) {
    $is_there_settings = false;
}

$file_type_allowed = $general_setting->file_type_allowed;
$file_max_size = $general_setting->file_max_size;
$max_guest_file_storage_time = $general_setting->max_guest_file_storage_time;

?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تنظیمات عمومی</title>

    <link rel="stylesheet" type="text/css"
          href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="http://localhost:63342/filesale/Views/bootstrap-5.1.0-dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:63342/filesale/Views/css/setting.css">
</head>
<body>
<div class="container vh-100">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="rounded overflow-hidden w-100">
            <div class="customize-header px-5 py-3 d-flex justify-content-between">
                <p class="h3 m-0">تنظیمات عمومی</p>
                <a href="http://localhost:63342/filesale/index.php?route=dashboard-page"><small>بازگشت</small></a>
            </div>
            <?php
            if (!$is_there_settings) {
                echo 'no setting';
            } else {
                ?>
                <div class="customize-body p-3">
                    <div class=" d-flex justify-content-around bg-white">

                        <div class="p-4  customize-setting-col">
                            <p class="text-center">فرمت هایی که وبسایت پشتیبانی میکند:</p>
                            <?php
                            foreach ($file_type_allowed as $file_type) {
                                ?>
                                <form method="post" action="http://localhost:63342/filesale/index.php?route=change_general_setting&type=file_type">
                                    <div class="input-group mb-2" dir="ltr">
                                        <button class="btn btn-sm btn-outline-success overflow-hidden text-black"
                                                value="edit" name="edit_delete_new"
                                                type="submit">ویرایش
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger w-25 overflow-hidden text-black"
                                                value="delete" name="edit_delete_new"
                                                type="submit">حذف
                                        </button>
                                        <input type="text" class="form-control m-0" name="new_file_type"
                                               value="<?php echo $file_type ?>">
                                        <input type="hidden" name="old_file_type"
                                               value="<?php echo $file_type ?>">
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                            <form action="http://localhost:63342/filesale/index.php?route=change_general_setting&type=file_type" method="post">
                                <div class="input-group mt-4" dir="ltr">
                                    <button class="btn btn-sm bg-success overflow-hidden text-light"
                                            value="new" name="edit_delete_new"
                                            type="submit">افزودن جدید
                                    </button>
                                    <input type="text" name="new_type" class="form-control">
                                </div>
                            </form>
                        </div>

                        <div class="customize-separator"></div>

                        <div class="d-flex flex-column justify-content-between ">

                            <form method="post" action="http://localhost:63342/filesale/index.php?route=change_general_setting&type=file_max_size">
                                <div class="p-4 customize-setting-col">
                                    <p class="text-center">بیشترین حجم مجاز برای آپلود فایل مهمان:</p>
                                    <div class="input-group">
                                        <span class="input-group-text">MB</span>
                                        <input type="number" class="form-control m-0" name="file_max_size"
                                               value="<?php echo $file_max_size ?>">
                                        <button class="btn btn-sm btn-outline-success overflow-hidden text-black"
                                                type="submit">ویرایش
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="customize-separator"></div>

                            <form method="post"
                                  action="http://localhost:63342/filesale/index.php?route=change_general_setting&type=max_guest_file_storage_time">
                                <div class=" p-4  customize-setting-col">
                                    <p class="text-center">زمان نگه داری فایل کاربران مهمان:</p>
                                    <div class="input-group">
                                        <input type="number" class="form-control " name="max_guest_file_storage_time"
                                               value="<?php echo $max_guest_file_storage_time ?>">
                                        <span class="input-group-text m-0">ساعت</span>
                                        <button class="btn btn-sm btn-outline-success overflow-hidden text-black"
                                                type="submit">ویرایش
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
