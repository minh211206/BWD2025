<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General container styling */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #e6f3e6; /* Light green background */
            font-family: Arial, sans-serif;
        }

        /* Form styling */
        form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 128, 0, 0.2); /* Green shadow */
            width: 100%;
            max-width: 400px;
            display: none;
            flex-direction: column;
            gap: 15px;
        }

        /* Active form display */
        form.active {
            display: flex;
        }

        /* Title styling */
        .forgot-title {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            color: #006400; /* Dark green */
            margin-bottom: 20px;
        }

        /* Form header */
        h1 {
            font-size: 24px;
            color: #006400; /* Dark green */
            text-align: center;
            margin-bottom: 10px;
        }

        /* Instruction text */
        span {
            color: #228b22; /* Forest green */
            font-size: 14px;
            text-align: center;
        }

        /* Input fields */
        input[type="email"],
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #90ee90; /* Light green border */
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #006400; /* Dark green on focus */
        }

        /* Error messages */
        #otp-error,
        #reset-error {
            color: #d32f2f; /* Keep red for errors to stand out */
            font-size: 14px;
            text-align: center;
        }

        /* Buttons */
        button {
            background-color: #228b22; /* Forest green */
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #006400; /* Darker green on hover */
        }

        /* Links */
        a {
            color: #228b22; /* Forest green */
            text-decoration: none;
            font-size: 14px;
            text-align: center;
        }

        a:hover {
            text-decoration: underline;
            color: #006400; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <div class="form-container forgot-password-container">
        <!-- Form: Gửi OTP -->
        <form id="emailForm" action="send_otp.php" method="POST" class="active">
            <div class="forgot-title">
                <span>Quên</span>
                <span>Mật khẩu</span>
            </div>     
            <span>Nhập email đã đăng ký của bạn</span>
            <input type="email" name="email" placeholder="Email" required />
            <input type="hidden" name="send_otp" value="1" />
            <button type="submit">Gửi OTP</button>
            <a href="#" id="backToSignInFromEmail">Quay lại Đăng nhập</a>
        </form>

        <!-- Form: Nhập OTP -->
        <form id="otpForm" action="send_otp.php" method="POST">
            <h1>Xác minh OTP</h1>
            <span>Nhập mã OTP được gửi đến email của bạn</span>
            <input type="text" name="otp" placeholder="OTP" required maxlength="6" />
            <p id="otp-error" style="display: none;">Mã OTP sai! Vui lòng thử lại.</p>
            <input type="hidden" name="email" id="otpEmail" />
            <input type="hidden" name="verify_otp" value="1" />
            <button type="submit">Xác minh OTP</button>
            <a href="#" id="backToEmailFromOtp">Quay lại</a>
        </form>

        <!-- Form: Đặt lại mật khẩu -->
        <form id="newPasswordForm" action="send_otp.php" method="POST">
            <h1>Đặt lại Mật khẩu</h1>
            <span>Nhập mật khẩu mới của bạn</span>
            <input type="password" name="new_password" placeholder="Mật khẩu mới" required />
            <input type="password" name="confirm_password" placeholder="Xác nhận Mật khẩu" required />
            <p id="reset-error" style="display: none;">Mật khẩu không khớp!</p>
            <button type="submit">Đặt lại Mật khẩu</button>
            <input type="hidden" name="email" id="resetEmail" />
            <input type="hidden" name="reset_password" value="1" />
            <a href="#" id="backToSignInFromNewPassword">Quay lại Đăng nhập</a>
        </form>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Lấy các form
    const emailForm = document.getElementById('emailForm');
    const otpForm = document.getElementById('otpForm');
    const newPasswordForm = document.getElementById('newPasswordForm');

    // Lấy các input ẩn để truyền email giữa các bước
    const otpEmail = document.getElementById('otpEmail');
    const resetEmail = document.getElementById('resetEmail');

    // Chuyển sang form OTP sau khi gửi email (AJAX giả lập, thực tế sẽ reload trang)
    emailForm.addEventListener('submit', function(e) {
        // e.preventDefault(); // Bỏ comment nếu muốn test chuyển form mà không gửi lên server
        otpEmail.value = emailForm.email.value;
        emailForm.classList.remove('active');
        otpForm.classList.add('active');
    });

    // Chuyển sang form đổi mật khẩu sau khi xác minh OTP (AJAX giả lập, thực tế sẽ reload trang)
    otpForm.addEventListener('submit', function(e) {
        // e.preventDefault(); // Bỏ comment nếu muốn test chuyển form mà không gửi lên server
        resetEmail.value = otpEmail.value;
        otpForm.classList.remove('active');
        newPasswordForm.classList.add('active');
    });

    // Sau khi đổi mật khẩu, chuyển về trang đăng nhập
    newPasswordForm.addEventListener('submit', function(e) {
        // e.preventDefault(); // Bỏ comment nếu muốn test chuyển form mà không gửi lên server
        window.location.href = 'dangnhap.php';
    });

    // Nút quay lại đăng nhập từ form email
    document.getElementById('backToSignInFromEmail').onclick = function(e) {
        e.preventDefault();
        window.location.href = 'dangnhap.php';
    };

    // Nút quay lại từ OTP về nhập email
    document.getElementById('backToEmailFromOtp').onclick = function(e) {
        e.preventDefault();
        otpForm.classList.remove('active');
        emailForm.classList.add('active');
    };

    // Nút quay lại đăng nhập từ form đổi mật khẩu
    document.getElementById('backToSignInFromNewPassword').onclick = function(e) {
        e.preventDefault();
        window.location.href = 'dangnhap.php';
    };

    // Hiển thị form phù hợp khi load lại trang theo tham số URL (dùng cho xử lý PHP redirect)
    const params = new URLSearchParams(window.location.search);
    if (params.has('show_otp')) {
        emailForm.classList.remove('active');
        otpForm.classList.add('active');
        otpEmail.value = params.get('show_otp');
    }
    if (params.has('show_reset')) {
        emailForm.classList.remove('active');
        otpForm.classList.remove('active');
        newPasswordForm.classList.add('active');
        resetEmail.value = params.get('show_reset');
    }
    });
</script>
</body>
</html>