<? ob_start(); ?>
<?php
session_start();

unset($_SESSION['stu_id']);
session_destroy();

if (!isset($_SESSION['stu_id'])) {
    header('Location:' . 'login.php');
    exit;
    //echo 'logout';
} else {
    echo 'logout ไม่สำเร็จ';
}

?>
