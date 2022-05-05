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

$stu_id = $_SESSION['stu_id'];
$sql = "SELECT * FROM `guest` WHERE `stu_id` = '$stu_id'";
$result = mysqli_query($mysqli, $sql);
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <link href="admin/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>ระบบอัพโหลดสลิปการจ่ายนํ้า ค่าไฟ</title>
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
                <?php $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ?>
                <center>
                    <h2>ยินดีต้อนรับคุณ : <?php echo $row["g_name"].$row["g_sname"];; ?></h2>
                    <h2>ห้อง : <?php echo $row["g_room"]; ?> </h2>
                    <p>คุณมียอดค้างชําระ :<strong style="color: red;"><?php echo $row["g_overdue"]; ?> บาท</strong></p>
                    <br>
                    <br>
                    <p>หากชําระแล้ว กรุณาอัพโหลดสลิปการโอนเงิน</p>
                    <form action="upload_slim.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="guest_id" id="guest_id" value="<?php echo $row["guest_id"]; ?>">
                        <div class="col">
                            <label for="formFile" class="form-label">สลิปโอนเงิน</label>
                            <input class="form-control" type="file" name="file" style="width: 50%;">
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                            <br>
                            <button type="submit" class="btn btn-primary">ส่งสลิป</button>

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