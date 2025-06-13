<?php
session_start();
require 'db.php';

$login_error = '';
$signup_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign-in'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, HoVaTen, MatKhau FROM taikhoan WHERE Email = ?");
    if (!$stmt) {
        die("Lỗi prepare SQL: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Kiểm tra mật khẩu dạng plain text
        if ($password === $user['MatKhau']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['HoVaTen'];
            header("Location: index.php");
            exit();
        } else {
            $login_error = "Mật khẩu không đúng!";
        }
    } else {
        $login_error = "Tài khoản không tồn tại!";
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign-up'])) {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']); // Lưu mật khẩu dạng plain text

    $stmt = $conn->prepare("INSERT INTO taikhoan (HoVaTen, Email, MatKhau) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Lỗi prepare SQL: " . $conn->error);
    }
    $stmt->bind_param("sss", $fullname, $email, $password);

    if ($stmt->execute()) {
        header("Location: dangnhap.php");
        exit();
    } else {
        $signup_error = "Lỗi khi đăng ký: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập / Đăng Ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="dangnhap.css">
</head>
<body>
    <div class="background-image"></div>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="dangnhap.php" method="POST">
                <h1>Tạo tài khoản</h1>
                <span>hoặc sử dụng email để đăng ký</span>
                <input type="text" name="fullname" placeholder="Họ và tên" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Mật khẩu" required />
                <?php if ($signup_error): ?>
                    <div class="login-error"><?php echo htmlspecialchars($signup_error); ?></div>
                <?php endif; ?>
                <button type="submit" name="sign-up">Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="dangnhap.php" method="POST">
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                </div>
                <span>hoặc sử dụng tài khoản của bạn</span>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Mật khẩu" required />
                <?php if ($login_error): ?>
                    <div class="login-error"><?php echo htmlspecialchars($login_error); ?></div>
                <?php endif; ?>
                <a href="quenmatkhau.php">Quên mật khẩu?</a>
                <button type="submit" name="sign-in">Đăng nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng trở lại!</h1>
                    <p>Để tiếp tục kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Xin chào, bạn mới!</h1>
                    <p>Hãy nhập thông tin cá nhân và bắt đầu hành trình với chúng tôi</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>
</html>