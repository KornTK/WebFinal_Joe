<?php ob_start(); ?>
<?php
session_start();

include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <center>
            <img src="assets/images/logo.svg" alt="logo" class="logo" style="height: 100px;">
         
        
            <br>
          <h2><strong>ระบบอัพโหลดสลิปการจ่ายนํ้า ค่าไฟ</strong></h2>
        </div>
        </center>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">กรุณาเข้าสู่ระบบ</h1>
            <form action="" method="post">
              <!-- check login -->
            <?php
            if (isset($_POST['stu_id']) && isset($_POST['password'])) {

                $userId = $_POST['stu_id'];
                $password = $_POST['password'];
                $sql = "SELECT *
            FROM guest
            WHERE stu_id =  '$userId' and password =  '$password'
             ";
                $result = mysqli_query($mysqli, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['stu_id'] = $row['stu_id'];
                    header('Location: index.php');

                } else {
                    echo "<script type='text/javascript'>alert('login ไม่สำเร็จ กรุณาตรวจสอบชื่อผู้ใช้และรหัสผ่าน');
                        window.location.href = 'index.php';
                    </script>";
                }
            }

            ?>

            <!-- end check login -->
              <div class="form-group">
                <label for="email">รหัสประจําตัวนักศึกกษา</label>
                <input type="text" name="stu_id" id="stu_id" class="form-control" placeholder="โปรดกรอกรหัสนักศึกษา">
              </div>
              <div class="form-group mb-4">
                <label for="password">รหัสผ่าน</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="โปรดกรอกรหัสผ่าน">
              </div>
              <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="เข้าสู่ระบบ">
            </form>
            
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/images/login.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
