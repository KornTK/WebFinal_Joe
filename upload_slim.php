<?php ob_start(); ?>
<?php
session_start();


//เช็คว่าเคย login ไหม 
if ((!isset($_SESSION['stu_id']))) {
    header('Location: login.php');
    exit;
}
/*connect DB*/
include 'condb.php';

$guest_id = $_POST['guest_id'];

$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

//form , to
move_uploaded_file($_FILES["file"]["tmp_name"], "img/slip/" . $guest_id . "." . $extension);






$namefile = $guest_id . "." . $extension;

if (pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) != null) {
    $query = "UPDATE guest 
SET 
img_slip = '$namefile'
WHERE guest_id = '$guest_id'";
$update = mysqli_query($mysqli, $query);

} else {
    $query = "";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัพโหลดสลิปเรียบร้อยแล้ว</title>
    <link href="admin/assets/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!-- header menu-->

    <?php
    include 'header.php';
    ?>

    <!-- end menu -->


    <!-- Query DB -->


    <div class="container">
        <div class="row">
            <marquee direction="left">จ่ายภายในวันที่ 1 พฤษภาคม 2565 หากจ่ายช้า! ปรับวันละ 100 บาท</marquee> :
            <div class="col-12">
                <center>
                    <br>
                    <h2>อัพโหลดสลิปเรียบร้อยแล้ว ! <br>อยู่ในระหว่างการตรวจสอบข้อมูล</h2>
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="guest_id" id="guest_id" value="<?php echo $row["guest_id"]; ?>">
                        <div class="col">
                            <br>
                            <button type="submit" class="btn btn-primary">กลับหน้าแรก</button>

                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>

    <!-- end Query DB -->

    <footer class="footer mt-auto py-3 bg-light">

    </footer>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>