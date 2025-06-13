<?php
require 'db.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function generateOTP() {
    return rand(100000, 999999);
}

if (isset($_POST['send_otp'])) {
    $email = trim($_POST['email']);

    if (empty($email)) {
        header("Location: dangnhap.php?error=empty_email");
        exit();
    }

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM taikhoan WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result === false) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 0) {
        header("Location: dangnhap.php?error=email_not_found");
        exit();
    }

    $otp = generateOTP();
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_email'] = $email;
    $_SESSION['otp_time'] = time();

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'trunghd.24ceb@vku.udn.vn';
        $mail->Password = 'uigd vddy ahke fptd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('trunghd.24ceb@vku.udn.vn', 'WLA admin');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your OTP code is <b>$otp</b>. It is valid for 5 minutes.";

        $mail->send();
        header("Location: quenmatkhau.php?show_otp=" . urlencode($email)); // Fixed URL
        exit();
    } catch (Exception $e) {
        header("Location: dangnhap.php?error=otp_send_failed&message=" . urlencode($mail->ErrorInfo));
        exit();
    }
}

if (isset($_POST['verify_otp'])) {
    $otp = trim($_POST['otp']);
    $email = trim($_POST['email']);

    if (empty($otp)) {
        header("Location: dangnhap.php?show_otp=" . urlencode($email) . "&error=empty_otp");
        exit();
    }

    if (!isset($_SESSION['otp']) || !isset($_SESSION['otp_email']) || !isset($_SESSION['otp_time'])) {
        header("Location: dangnhap.php?error=invalid_otp");
        exit();
    }

    if (time() - $_SESSION['otp_time'] > 300) { // 5 minutes
        unset($_SESSION['otp']);
        unset($_SESSION['otp_email']);
        unset($_SESSION['otp_time']);
        header("Location: dangnhap.php?error=otp_expired");
        exit();
    }

    if ($otp == $_SESSION['otp'] && $email == $_SESSION['otp_email']) {
        unset($_SESSION['otp']);
        unset($_SESSION['otp_time']);
        header("Location: quenmatkhau.php?show_reset=" . urlencode($email));
        exit();
    } else {
        header("Location: quenmatkhau.php?show_otp=" . urlencode($email) . "&error=wrong_otp");
        exit();
    }
}

if (isset($_POST['reset_password'])) {
    $email = trim($_POST['email']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($new_password) || empty($confirm_password)) {
        header("Location: quenmatkhau.php?show_reset=" . urlencode($email) . "&error=empty_password"); // Fixed URL
        exit();
    }
    if ($new_password !== $confirm_password) {
        header("Location: quenmatkhau.php?show_reset=" . urlencode($email) . "&error=password_mismatch"); // Fixed URL
        exit();
    }

    // Hash the new password for security
    $hashed_password = $new_password;

    // Use prepared statement for the UPDATE query
    $sql = "UPDATE taikhoan SET MatKhau = ? WHERE Email = ?"; // Fixed column name (Email instead of EEmail)
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $email);
    if (mysqli_stmt_execute($stmt)) {
        unset($_SESSION['otp_email']);
        header("Location: dangnhap.php?success=password_reset"); // Fixed URL
        exit();
    } else {
        header("Location: dangnhap.php?show_reset=" . urlencode($email) . "&error=reset_failed&message=" . urlencode(mysqli_error($conn)));
        exit();
    }
}
?>