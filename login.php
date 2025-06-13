<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Chuẩn bị truy vấn kiểm tra email
    $stmt = $conn->prepare("SELECT * FROM taikhoan WHERE Email = ?");
    if (!$stmt) {
        die("Lỗi prepare SQL: " . $conn->error); // Xuất lỗi SQL cụ thể
    }

    // Gắn tham số và thực thi
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Lấy kết quả
    $result = $stmt->get_result();

    // Kiểm tra tài khoản tồn tại
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // So sánh mật khẩu nhập và mật khẩu trong DB (đã mã hoá)
        if ($password === $row['MatKhau']) {
            session_start();
            $_SESSION['email'] = $row['Email']; // Lưu email vào session
            $_SESSION['fullname'] = $row['HoVaTen']; // Lưu họ tên vào session
            $_SESSION['id'] = $row['ID']; // Lưu ID vào session
            echo "✅ Đăng nhập thành công!";
            // Có thể lưu session ở đây nếu cần
            header("Location: index.php"); // Chuyển hướng đến trang chào mừng
        } else {
          header("Location: dangnhap.php?error=wrongpass");
            // echo "❌ Mật khẩu không đúng!";
        }
    } else {
       header("Location: dangnhap.php?error=notfound");
        // echo "❌ Tài khoản không tồn tại hoặc mật khẩu không đúng!";
        // Có thể hiển thị thông báo lỗi ở đây
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>
