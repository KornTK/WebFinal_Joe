<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'hr2';

/*
$mysqli= mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Error: " . mysqli_error($mysqli));
mysqli_set_charset($mysqli,"utf8");
*/

?>

<?php
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
}

?>