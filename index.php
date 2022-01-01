<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '/home/zahra/PhpstormProjects/filesale/Services/functions/autoLoader.php';
spl_autoload_register('autoLoader');

session_start();

if (!isset($_GET['route'])) {
    require_once '/home/zahra/PhpstormProjects/filesale/index.php?route="dashboard-page"';
} else {
    switch ($_GET['route']) {
        case 'login-page':
            $login = new LoginController();
            $login->renderLoginPage();
            break;

        case 'do-login':

            $login = new LoginController();
            if (!$login->doLogin($_POST['email'], $_POST['password'])) {
                echo $login->getLogginErrors();
            }
            break;
        case 'do_signup':
            $sign_up_controller = new SignupController(
                $_POST['email'],
                $_POST['name'],
                $_POST['phone-number'],
                $_POST['password'],
                $_POST['re-password']
            );
            $sign_up_controller->doSignup();
            $sign_up_controller->doLogin();

            break;
        case 'signup-page':
            SignupController::renderSignupPage();
            break;
        case 'confirmation-page':
            FileController::renderConfirmationPage();
            break;
        case 'general-setting':
            GeneralSettingController::renderGeneralSettingView();
            break;
        case 'dashboard-page':
            $ch = LoginController::checkLogin($_SESSION['email']);
            $home_controller = new HomeController2();
            $home_controller->renderHomePage();
            break;

        case 'signout':
            $sign_out = new SignOut();
            break;

        case 'do_guest_upload':
            $file_up = new UploadController($_FILES['guest-file']);
            $file_up->doUploadFile();
            break;
        case 'do_user_upload':
            $ch = LoginController::checkLogin($_SESSION['email']);
            $file_up = new UploadController($_FILES['user-file']);
            $file_up->doUploadFile($_SESSION['email']);
            break;
        case 'general_setting_page':
            $ch = LoginController::checkLogin($_SESSION['email']);
            $general_setting = new GeneralSettingController();
            $general_setting->renderGeneralSettingView();
            break;

        case 'change_general_setting':
            $ch = LoginController::checkLogin($_SESSION['email']);
            $general_setting = new GeneralSettingController();

            if ($_GET['type'] == 'file_max_size') {

                $max_size = $_POST['file_max_size'];
                $general_setting->editMaxUploadSize($max_size);

            } elseif ($_GET['type'] == 'file_type') {

                if (isset($_POST['edit_delete_new'])) {

                    if ($_POST['edit_delete_new'] == 'edit') {
                        $general_setting->editFileType($_POST['old_file_type'], $_POST['new_file_type']);

                    } elseif ($_POST['edit_delete_new'] == 'delete') {
                        $general_setting->deleteFileType($_POST['new_file_type']);

                    } elseif ($_POST['edit_delete_new'] = 'add_new') {
                        $general_setting->addFileType($_POST['new_type']);
                    }
                }

            } elseif ($_GET['type'] == 'max_guest_file_storage_time') {
                $max_time = $_POST['max_guest_file_storage_time'];
                $general_setting->editGustFileStorageTime($max_time);
            }
            break;
        case 'do-confirm':
            $ch = LoginController::checkLogin($_SESSION['email']);
            if (isset($_POST['check'])) {
                $changed_files_by_id = $_POST['check'];
                $file_controller = new FileController();
                $file_controller->confirmFiles($changed_files_by_id);
                $file_controller->renderConfirmationPage();
            }
            break;
        case 'user-upload-page':
            UploadController::renderUserUploadPage();
            break;


    }
}


//use Pecee\SimpleRouter\SimpleRouter;
//require_once  '/home/zahra/PhpstormProjects/filesale/vendor/autoload.php';
///* Load external routes file */
//require_once '/home/zahra/PhpstormProjects/filesale/library/routes.php';
///**
// * The default namespace for route-callbacks, so we don't have to specify it each time.
// * Can be overwritten by using the namespace config option on your routes.
// */
//SimpleRouter::setDefaultNamespace('\Controllers');
////echo 'ggg';
//// Start the routing
//SimpleRouter::start();




