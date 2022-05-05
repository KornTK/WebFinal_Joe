<?php ob_start();?>
<?php
session_start();
require_once( "config.php" );
$main = new WConfig();
 
include 'condb.php';
 
//print_r($_POST);
$guest_id = $_POST['guest_id'];
 
$sql = "DELETE FROM guest WHERE guest_id = $guest_id;";
 
$result = mysqli_query($mysqli, $sql);
 
if ($result){
    header('Location: index.php');
}
else {
    //
}
 
?>
