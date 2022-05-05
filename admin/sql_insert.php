<?php ob_start();?>
<?php
session_start();
require_once( "config.php" );
$main = new WConfig();
 
include 'condb.php';
 

 
// $sql = "INSERT INTO `guest`(`guest_id`, `stu_id`, `password`,
//  `g_prefix`, `g_name`, `g_sname`, `g_overdue`, `g_room`, `img_slip`) 
//  VALUES ('','".$_POST['stu_id']."','".$_POST['password']."','".$_POST['g_prefix']."',
//  '".$_POST['g_name']."','".$_POST['g_sname']."','".$_POST['g_overdue']."',
//  '".$_POST['g_room']."','')";

 $sql = "UPDATE `guest` SET `guest_id`='".$_POST['guest_id']."',
 `stu_id`='".$_POST['stu_id']."',`password`='".$_POST['password']."',
 `g_prefix`='".$_POST['g_prefix']."',`g_name`='".$_POST['g_name']."',
 `g_sname`='".$_POST['g_sname']."',`g_overdue`='".$_POST['g_overdue']."',
 `g_room`='".$_POST['g_room']."' WHERE `guest_id`= '".$_POST['guest_id']."'";

$result = mysqli_query($mysqli, $sql);
 
if ($result){
    header('Location: index.php');
}
else {
    //
}
 
?>
