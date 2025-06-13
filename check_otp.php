<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['otp'])) {
    if ($_POST['otp'] == $_SESSION['otp']) {
        echo "Xác minh thành công! Bạn có thể đặt lại mật khẩu.";
        // Hiển thị form đổi mật khẩu ở đây
    } else {
        echo "Mã OTP không đúng. <a href='verify_otp.php'>Thử lại</a>";
    }
} else {
    header("Location: send_otp.php");
    exit();
}
?>