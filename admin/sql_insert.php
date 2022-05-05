<?php ob_start();?>
<?php
session_start();
require_once( "config.php" );
$main = new WConfig();
 
include 'condb.php';
 
//print_r($_POST);
// $g_prefix = $_POST['g_prefix'];
 
// $sql = "INSERT INTO `guest` (`guest_id`, `g_prefix`, `g_name`, `g_sname`, `g_overdue`, `g_room`) VALUES (NULL,
// '$g_prefix',
// '".$_POST['g_name']."',
// '".$_POST['g_sname']."',
// '".$_POST['g_overdue']."',
// '".$_POST['g_room']."');";
 
$sql = "INSERT INTO `guest`(`guest_id`, `stu_id`, `password`,
 `g_prefix`, `g_name`, `g_sname`, `g_overdue`, `g_room`, `img_slip`) 
 VALUES ('','".$_POST['stu_id']."','".$_POST['password']."','".$_POST['g_prefix']."',
 '".$_POST['g_name']."','".$_POST['g_sname']."','".$_POST['g_overdue']."',
 '".$_POST['g_room']."','')";

$result = mysqli_query($mysqli, $sql);
 
if ($result){
    header('Location: index.php');
}
else {
    //
}
 
?>
