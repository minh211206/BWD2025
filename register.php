<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']); // Lưu mật khẩu dạng plain text

    $stmt = $conn->prepare("INSERT INTO taikhoan (HoVaTen, Email, MatKhau) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Lỗi prepare SQL: " . $conn->error);
    }

    $stmt->bind_param("sss", $fullname, $email, $password);

    if ($stmt->execute()) {
        echo "✅ Đăng ký thành công!";
        header("Location: dangnhap.php");
        exit();
    } else {
        echo "❌ Lỗi khi đăng ký: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>