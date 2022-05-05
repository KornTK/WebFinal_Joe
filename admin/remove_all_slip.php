<?php ob_start();?>
<?php
session_start();
require_once( "config.php" );
$main = new WConfig();
 
include 'condb.php';
 

$sql = "UPDATE `guest` SET `img_slip` = NULL;";

$result = mysqli_query($mysqli, $sql);
 
if ($result){
    header('Location: index.php');
}
else {
    //
}
 
?>
