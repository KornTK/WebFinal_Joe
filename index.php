<?php ob_start(); ?>
<?php
session_start();
/* Load factory class */
require_once("config.php");
$main = new WConfig();

//เช็คว่าเคย login ไหม 
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

    <!-- header menu-->

    <?php
    include 'header.php';
    ?>

    <!-- end menu -->


    <!-- Query DB -->

    <?php
    $sql = "SELECT * FROM `guest`
";
    $result = mysqli_query($mysqli, $sql);
    ?>

    <div class="container">
        <div class="row">
            <marquee direction="left">จ่ายภายในวันที่ 1 พฤษภาคม 2565 หากจ่ายช้า! ปรับวันละ 100 บาท</marquee> :
            <div class="col-12">
                <table class="table  table-striped table-hover table-bordered">
                    <tr>
                        <th width='10%'>รหัสผู้พัก</th>
                        <th width='10%'>คำนำหน้า</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ค้างชำระ</th>
                        <th>ห้อง</th>
                        <th>ลบ/อัปเดต</th>
						<th>อัปเดต</th>
                        <th>สลิป</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td align='right'><?php echo $row["guest_id"]; ?></td>
                            <td><?php echo $row["g_prefix"]; ?></td>
                            <td><?php echo $row["g_name"]; ?></td>
                            <td><?php echo $row["g_sname"]; ?></td>
                            <td><?php echo $row["g_overdue"]; ?></td>
                            <td><?php echo $row["g_room"]; ?></td>
                            </td>
							<td>
                            <form action="del-guest.php" method="post">
                            <input type="hidden" id="guest_id" name="guest_id" value="<?php echo $row["guest_id"]; ?>">
                            <button type="submit" class="btn btn-danger"> ลบ</button>
                            </form>
							<td>
                            <form action="up-guest.php" method="post">
                            <input type="hidden" id="guest_id" name="guest_id" value="<?php echo $row["guest_id"]; ?>">
                            <button type="submit" class="btn btn-danger"> อัปเดต</button>
                            </form>
							</td>
                            </td>
                            <td>
                            <form action="index1.php" method="post">
                            <input type="hidden" id="guest_id" name="guest_id" value="<?php echo $row["guest_id"]; ?>">
                            <button type="submit" class="btn btn-danger"> สลิป</button>
                            </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <!-- end Query DB -->

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted"><?php echo $main->footer; ?></span>
        </div>
    </footer>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>