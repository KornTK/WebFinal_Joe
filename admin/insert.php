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
            <div class="row p-3">
                <div class="col-lg-4">
                    <label class="form-label">คำนำหน้าชื่อ</label>
                    <select name="g_prefix" class="form-select" required>
                        <option value="" disabled="" selected="">คำนำหน้าชื่อ</option>
                        <option value="นาย">นาย</option>
                        <option value="นาง">นาง</option>
                        <option value="นางสาว">นางสาว</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label class="form-label">ชื่อ</label>
                    <input type="text" name="g_name" class="form-control" required>
                </div>
                <div class="col-lg-4">
                    <label class="form-label">นามสกุล</label>
                    <input type="text" name="g_sname" class="form-control" required>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-lg-4">
                    <label class="form-lable">ค้างชำระ</label>
                    <input type="int" name="g_overdue" class="form-control" required>

                </div>
                <div class="col-lg-4">
                    <label class="form-label">ห้อง</label>
                    <input type="text" name="g_room" class="form-control" required>
                </div>

                <?php
                $sql = "SELECT * FROM `area`";
                $result_pos = mysqli_query($mysqli, $sql);
                ?>
            </div>

            

            <div class="row p-3">

                <div class="col-lg-1">
                    <input type="submit" class="btn btn-success" value="บันทึก">
                </div>
                <div class="col-lg-1">
                    <input type="reset" class="btn btn-warning" value="ล้างค่า">
                </div>
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