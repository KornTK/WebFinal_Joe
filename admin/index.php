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
    $search = isset($_GET['search']) ? $_GET['search'] : '';


    $sql = "SELECT * FROM `guest` WHERE g_room LIKE '%$search%'
";
    $result = mysqli_query($mysqli, $sql);
    ?>

    <div class="container">
        <div class="row">
            <marquee direction="left">จ่ายภายในวันที่ 1 พฤษภาคม 2565 หากจ่ายช้า! ปรับวันละ 100 บาท</marquee> :
            <div class="col-12">
                <center>
                   
                    <form method="get" id="form" enctype="multipart/form-data" action="">
                        <label for="exampleInputEmail1">ระบบค้นหา จากเลขห้อง</label>
                        <div class="row" style="width: 30%;">

                            <input type="text" class="form-control" id="search" name="search" placeholder="ป้อนเลขห้องที่ต้องการค้นหา">
                            

                            <button type="submit" class="btn btn-primary" >ค้นหา <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                    <br>
                    <?php

if ($search != "") {
    echo "<h2>กําลังแสดงข้อมูลของห้อง :" . $search . "</h2>";
    echo '<a href="index.php" class="nav-link active" aria-current="page">แสดงทั้งหมด</a>';
    $showmsg = "กําลังแสดงข้อมูลของห้อง :" . $search;
} else {
    $showmsg = "";
} ?>
                </center>
                <table class="table  table-striped table-hover table-bordered">
                    <tr>
                        <th width='10%'>รหัสผู้พัก</th>
                        <th width='10%'>รหัสนักศึกษา</th>
                        <th width='10%'>คำนำหน้า</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ค้างชำระ</th>
                        <th>ห้อง</th>
                        <th>อัปเดต</th>
                        <th>สลิป</th>
                        <th>ลบ</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td align='right'><?php echo $row["guest_id"]; ?></td>
                            <td><?php echo $row["stu_id"]; ?></td>
                            <td><?php echo $row["g_prefix"]; ?></td>
                            <td><?php echo $row["g_name"]; ?></td>
                            <td><?php echo $row["g_sname"]; ?></td>
                            <td><?php echo $row["g_overdue"]; ?></td>
                            <td><?php echo $row["g_room"]; ?></td>
                            </td>

                            <td>
                                <form action="edit.php" method="post">
                                    <input type="hidden" id="guest_id" name="guest_id" value="<?php echo $row["guest_id"]; ?>">
                                    <button type="submit" class="btn btn-info"> อัปเดต</button>
                                </form>
                            </td>
                            </td>
                            <td>
                                <?php
                                if ($row["img_slip"] != null) {
                                    echo '<form action="../img/slip/' . $row["img_slip"] . '" method="post">
                                    <input type="hidden" id="guest_id" name="guest_id" value="' . $row["guest_id"] . '">
                                    <button type="submit" class="btn btn-primary"> ดูสลิปแบบเต็มหน้าจอ</button>
                                    </form';
                                } else {
                                    echo 'ผู้ใช้รายนี้ยังไม่ได้อัพโหลดสลิป';
                                };
                                ?>



                            </td>
                            <td>
                                <form action="del-guest.php" method="post">
                                    <input type="hidden" id="guest_id" name="guest_id" value="<?php echo $row["guest_id"]; ?>">
                                    <button type="submit" class="btn btn-danger"> ลบ</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <center>
                    <form action="remove_all_slip.php" method="post">
                        <input type="hidden" id="guest_id" name="guest_id" value="<?php echo $row["guest_id"]; ?>">
                        <button type="submit" onClick='return confirmSubmit()' class="btn btn-danger"> ลบรูปสลิปทั้งหมด</button>
                    </form>
                </center>
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
    <script LANGUAGE="JavaScript">
        function confirmSubmit() {
            var agree = confirm("คุณแน่ใจใช่ไหม ว่าต้องการลบสลิปทั้งหมด?");
            if (agree)
                return true;
            else
                return false;
        }
    </script>
</body>

</html>