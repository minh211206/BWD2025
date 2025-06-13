<?php
$host = "localhost";
$username = "root";
$password = ""; // Mật khẩu mặc định 
$dbname = "nguoidung"; // Tên cơ sở dữ liệu

$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
