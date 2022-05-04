<html>
<?php
    
    function success(){
        echo "<script type='text/javascript'>alert('ส่งสลิปเรียบร้อยแล้ว');
        window.location.href = 'index.php';
        </script>";
    }
    if($place == 0){ 
        echo "<script type='text/javascript'>alert('กรุณาระบุสถานที่ด้วย');
                window.location.href = 'index.php';
        </script>";
    }
    elseif(strlen($phone_number){
        echo "<script type='text/javascript'>alert('login สำเร็จ');
                window.location.href = 'index.php';
        </script>";
    }
    success();

?>
</html>