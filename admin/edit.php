<?php ob_start(); ?>
<?php
session_start();
/* Load factory class */
require_once("config.php");
$main = new WConfig();

if ((!isset($_SESSION['admin_id']))) {
    header('Location: login.php');
    exit;
}
/*connect DB*/
include 'condb.php';
$guest_id = $_POST['guest_id'];
$sql = "SELECT * FROM `guest` WHERE guest_id = '$guest_id'";
$result = mysqli_query($mysqli, $sql);
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <title><?php echo $main->title_eng; ?></title>
</head>

<body>

    <?php
    include 'header.php';
    ?>

    </header>
    </div>

    <p class="my-5"></p>
    <div class="container bg-light p-3">
        <form action="sql_insert.php" method="post">
            <?Php $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ?>
            <center>
                <h1>แก้ไขข้อมูลผู้ใช้ไอดีที่ : <?php echo $row["guest_id"]; ?> </h1>
            </center>
            <div class="row p-3">
                <div class="col-lg-4">
                    <label class="form-label">รหัสนักศึกษา</label>
                    <input type="text" name="stu_id" class="form-control" required value="<?php echo $row["stu_id"]; ?>">
                </div>

                <div class="col-lg-4">
                    <label class="form-label">รหัสผ่าน</label>
                    <input type="text" name="password" class="form-control" required value="<?php echo $row["password"]; ?>">
                </div>
                <div class="col-lg-4">
                    <label class="form-label">ห้องที่พัก</label>
                    <input type="text" name="g_room" class="form-control" required value="<?php echo $row["g_room"]; ?>">
                </div>


                <div class="row p-3">
                    <div class="col-lg-4">
                        <label class="form-label">คำนำหน้าชื่อ</label>
                        <select name="g_prefix" class="form-select" required>
                            <option value="<?php echo $row["g_prefix"]; ?>" selected=""><?php echo $row["g_prefix"]; ?></option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">ชื่อ</label>
                        <input type="text" name="g_name" class="form-control" required value="<?php echo $row["g_name"]; ?>">
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" name="g_sname" class="form-control" required value="<?php echo $row["g_sname"]; ?>">
                        </div>
                        <div class="row p-3">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">ยอดค้างชําระ</label>
                            <input type="text" id="g_overdue" name="g_overdue" class="form-control" value="<?php echo $row["g_overdue"]; ?>">
                            </div>
                            <input type="hidden" id="guest_id" name="img_slip" value="">
                        </div>
                    
                </div>
            </div>





            <div class="row p-3">
                <center>
                    <div class="col-lg-3">
                        <a href="index.php" class="btn btn-warning">กลับหน้าแรก</a>
                        <input type="submit" class="btn btn-success" value="บันทึก">
                        <!-- <input type="reset" class="btn btn-warning" value="กลับหน้าแรก"> -->
                    </div>
                </center>
            </div>
        </form>

    </div>

    <p class="my-5"></p>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted"><?php echo $main->footer; ?></span>
        </div>
    </footer>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>