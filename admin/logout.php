<? ob_start(); ?>
<?php
session_start();
/* Load factory class */
require_once("config.php");
$main = new WConfig();

unset($_SESSION['admin_id']);
session_destroy();

if (!isset($_SESSION['admin_id'])) {
    header('Location:' . $main->siteurl . 'admin/login.php');
    exit;
    //echo 'logout';
} else {
    echo 'logout ไม่สำเร็จ';
}

?>
