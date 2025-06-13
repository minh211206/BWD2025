<?php
session_start();
require_once 'config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['amount'])) {
    try {
        $pdo = connectDB();
        
        $amount = (float)$_POST['amount'];
        $fullname = $_SESSION['fullname'] ?? 'Khách';
        $user_id = $_SESSION['user_id'] ?? null;
        
        // Validate số tiền
        if ($amount < 10000) {
            $error = "Số tiền quyên góp tối thiểu là 10,000 VND";
        } else {
            $stmt = $pdo->prepare("INSERT INTO donations 
                                  (user_id, amount, fullname, payment_method, transaction_status) 
                                  VALUES (:user_id, :amount, :fullname, 'QR Code', 'completed')");
            
            $stmt->execute([
                ':user_id' => $user_id,
                ':amount' => $amount,
                ':fullname' => $fullname
            ]);
            
            $success = "Cảm ơn bạn đã quyên góp " . number_format($amount, 0, ',', '.') . " VND!";
            
            // Reset form
            echo '<script>
                document.getElementById("custom-amount").value = "";
                document.querySelectorAll(".donate-amount").forEach(btn => btn.classList.remove("active"));
                document.getElementById("qr-code").style.display = "none";
            </script>';
        }
    } catch (PDOException $e) {
        $error = "Có lỗi xảy ra khi xử lý quyên góp. Vui lòng thử lại sau.";
        error_log("Database error: " . $e->getMessage());
    }
}
?>

<!-- Hiển thị bảng giao dịch -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ngày</th>
                <th>Số tiền</th>
                <th>Phương thức</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($transactions)): ?>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td><?= date('d/m/Y H:i', strtotime($transaction['transaction_date'])) ?></td>
                        <td><?= number_format($transaction['amount'], 0, ',', '.') ?> VND</td>
                        <td><?= htmlspecialchars($transaction['payment_method']) ?></td>
                        <td>
                            <span class="badge bg-<?= 
                                $transaction['transaction_status'] === 'completed' ? 'success' : 
                                ($transaction['transaction_status'] === 'pending' ? 'warning' : 'danger') 
                            ?>">
                                <?= htmlspecialchars($transaction['transaction_status']) ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">
                        <?= isset($error) ? $error : 'Chưa có giao dịch nào.' ?>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="shortcut icon" href="asset/image/icon.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quyên Góp - Bảo Vệ Động Vật</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="stylesdnt.css"><link rel="stylesheet" href="chung.css">
</head>
<body>
    <video autoplay muted loop class="background-video">
        <source src="https://cdn.pixabay.com/video/2021/06/03/76330-559113165_large.mp4" type="video/mp4">
    </video>
 <header>
        <div class="top-bar">
            <div class="logo-container">
                <img src="asset/image/logoVip.png" alt="Logo" class="logo-img">
                <div class="logo-text">
                    <div class="logo">WLA</div>
                    <div class="slogan">Yêu động vật là yêu bản thân</div>
                </div>
            </div>

            <div class="menu-toggle" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav id="nav-menu">
                <ul>
                    <li class="dropdown">
                        <a href="index.php">Trang chủ</a>
                        <ul>
                            <li><a href="listanimal.php">Danh sách động vật</a></li>
                            <li><a href="page2.php">Chó mèo Việt Nam</a></li>
                        </ul>
                    </li>
                    <li><a href="lienhe.php">Liên hệ</a></li>
                    <li><a href="congdong.php">Cộng đồng</a></li>
                    <li><a href="tintuc.php">Tin tức</a></li>
                    <li><a href="lienhe.php">Đội ngũ</a></li>
                    <li><a href="donate.php" class="active">Quyên góp</a></li>
                    <li><a href="transaction-history.php">Lịch sử giao dịch</a></li>
                </ul>
            </nav>
            <div class="auth-link"> 
                <?php if (isset($_SESSION['fullname'])): ?>
                    <div class="dropdown">
                      <a  class="dropdown-toggle text-decoration-none fs-5 py-2 px-3  class="dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style = "color: black;"  >
                         <i class="fas fa-user-circle"></i> &nbsp&nbsp&nbsp  <?php echo htmlspecialchars($_SESSION['fullname']); ?> 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="logout.php">Đăng Xuất</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a class="menu-login" href="dangnhap.php" style="text-decoration: none; color: black"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="container my-5">
        <section id="donate" class="donate-section">
            <h2 class="text-center mb-4">Quyên Góp Ngay Hôm Nay</h2>
            <p class="text-center mb-5">Nhập số tiền bạn muốn quyên góp và quét mã QR để chuyển khoản.</p>
            <div class="donate-form">
                <h3 class="text-center mb-3">Nhập Số Tiền</h3>
                <div class="donate-options d-flex flex-wrap justify-content-center gap-3 mb-4">
                    <button class="donate-amount btn btn-outline-secondary" data-amount="50000">50,000 VND</button>
                    <button class="donate-amount btn btn-outline-secondary" data-amount="100000">100,000 VND</button>
                    <button class="donate-amount btn btn-outline-secondary" data-amount="200000">200,000 VND</button>
                    <button class="donate-amount btn btn-outline-secondary" data-amount="500000">500,000 VND</button>
                </div>
                <label for="custom-amount" class="form-label">Hoặc nhập số tiền tùy chỉnh:</label>
                <input type="number" id="custom-amount" class="form-control mb-3" placeholder="VD: 100000" min="10000">
                <button id="show-qr" class="cta-button btn btn-primary w-100">Quyên Góp Ngay</button>
                <div id="qr-code" class="qr-code mt-4" style="display: none;">
                    <img id="qr-image" src="asset/image/tudo.jpg" alt="Mã QR Quyên Góp" class="img-fluid rounded">
                    <p class="mt-3">Quét mã QR để chuyển khoản qua ứng dụng ngân hàng.</p>
                    <button id="confirm-donation" class="cta-button btn btn-success w-100">Xác Nhận Quyên Góp</button>
                </div>
            </div>
        </section>
    </main>
    <footer class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 text-center text-md-start">
                    <img src="asset/image/logoVip.png" alt="Logo WLA" class="img-fluid mb-3" style="max-width: 90px;">
                </div>
                <div class="col-md-3 footer-contact">
                    <h4>Thông Tin Liên Lạc</h4>
                    <p><strong>Địa Chỉ:</strong> Ngũ Hành Sơn, TP Đà Nẵng</p>
                    <p><strong>SDT:</strong> +84 0384 405 026</p>
                    <p><strong>Hotline:</strong> 0978 331 441</p>
                    <p><strong>Email:</strong> WLA@gmail.com</p>
                </div>
                <div class="col-md-3 footer-newsletter">
                    <h4>Đăng ký nhận Bản Tin</h4>
                    <form>
                        <input type="email" class="form-control mb-2" placeholder="Email" required>
                        <input type="text" class="form-control mb-2" placeholder="Tên" required>
                        <button type="submit" class="btn btn-warning w-100">Đăng Ký</button>
                    </form>
                </div>
                <div class="col-md-3 footer-social">
                    <h4>Mạng Xã Hội</h4>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom mt-4">
                <p class="footer-copyright">© 2025 WLA. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script>
    const qrCodes = {
        '50000': 'asset/image/50k.jpg',
        '100000': 'asset/image/100k.jpg',
        '200000': 'asset/image/200k.jpg',
        '500000': 'asset/image/500k.jpg',
        'default': 'asset/image/tudo.jpg'
    };

    // Xử lý khi click nút "Quyên Góp Ngay"
    document.getElementById('show-qr').addEventListener('click', () => {
        const customAmount = document.getElementById('custom-amount').value;
        const selectedAmount = document.querySelector('.donate-amount.active')?.dataset.amount || customAmount;
        const amount = selectedAmount || customAmount;

        if (!amount || amount < 10000) {
            alert('Vui lòng nhập số tiền tối thiểu 10,000 VND.');
            return;
        }

        const qrImage = document.getElementById('qr-image');
        qrImage.src = qrCodes[selectedAmount] || qrCodes['default'];
        document.getElementById('qr-code').style.display = 'block';
    });

    // Xử lý khi click nút "Xác Nhận Quyên Góp"
    document.getElementById('confirm-donation').addEventListener('click', () => {
        const customAmount = document.getElementById('custom-amount').value;
        const selectedAmount = document.querySelector('.donate-amount.active')?.dataset.amount || customAmount;
        const amount = selectedAmount || customAmount;

        if (!amount || amount < 10000) {
            alert('Vui lòng chọn hoặc nhập số tiền tối thiểu 10,000 VND.');
            return;
        }

        // Tạo form ẩn để submit dữ liệu
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '';
        
        const amountInput = document.createElement('input');
        amountInput.type = 'hidden';
        amountInput.name = 'amount';
        amountInput.value = amount;
        
        form.appendChild(amountInput);
        document.body.appendChild(form);
        form.submit();
    });

    // Xử lý khi click các nút số tiền mặc định
    document.querySelectorAll('.donate-amount').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.donate-amount').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            document.getElementById('custom-amount').value = '';
        });
    });
</script>
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="WLA Chatbot"
  agent-id="bb75293d-8026-442b-a90e-0215f674e49d"
  language-code="en"
></df-messenger>
</body>
</html>