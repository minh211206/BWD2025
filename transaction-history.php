<?php
session_start();
require_once 'config.php';

try {
    $pdo = connectDB();
    
    // Lấy lịch sử giao dịch từ database
    if (isset($_SESSION['user_id'])) {
        // Nếu user đã đăng nhập, lấy lịch sử của riêng họ
        $stmt = $pdo->prepare("SELECT * FROM donations WHERE user_id = :user_id ORDER BY transaction_date DESC");
        $stmt->execute([':user_id' => $_SESSION['user_id']]);
    } else {
        // Nếu là khách, lấy tất cả giao dịch
        $stmt = $pdo->query("SELECT * FROM donations ORDER BY transaction_date DESC LIMIT 10");
    }
    
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // DEBUG: Hiển thị dữ liệu raw để kiểm tra
    // echo "<pre>";
    // print_r($transactions);
    // echo "</pre>";
    
} catch (PDOException $e) {
    $error = "Không thể tải lịch sử giao dịch. Vui lòng thử lại sau.";
    error_log("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Giao Dịch - Bảo Vệ Động Vật</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="transaction-history.css">
    <link rel="stylesheet" href="chung.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="asset/image/icon.jpg" type="image/x-icon">
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
                    <li><a href="donate.php">Quyên góp</a></li>
                    <li><a href="transaction-history.php" class="active">Lịch sử giao dịch</a></li>
                </ul>
            </nav>
            <div class="auth-link"> 
                <?php if (isset($_SESSION['fullname'])): ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['fullname']); ?> 
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

    <main>
        <section id="transaction-history" class="transaction-section">
            <h2>Lịch Sử Giao Dịch</h2>
            <table class="transaction-history">
                <thead>
                    <tr>
                        <th>Ngày</th>
                        <th>Số Tiền (VND)</th>
                        <th>Người quyên góp</th>
                        <th>Phương thức</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody id="transaction-table-body">
                    <?php if (!empty($transactions)): ?>
                        <?php foreach ($transactions as $transaction): ?>
                            <tr>
                                <td><?= date('H:i:s d/m/Y', strtotime($transaction['transaction_date'])) ?></td>
                                <td><?= number_format($transaction['amount'], 0, ',', '.') ?></td>
                                <td><?= htmlspecialchars($transaction['fullname'] ?? 'Khách') ?></td>
                                <td><?= htmlspecialchars($transaction['payment_method'] ?? 'QR Code') ?></td>
                                <td>
                                    <span class="badge bg-<?= $transaction['transaction_status'] === 'completed' ? 'success' : 'warning' ?>">
                                        <?= $transaction['transaction_status'] === 'completed' ? 'Thành công' : 'Đang xử lý' ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">
                                <?= isset($error) ? $error : 'Chưa có giao dịch nào.' ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <div class="footer-container-custom">
            <div class="footer-logo">
                <img src="asset/image/logoVip.png" alt="Logo WLA">
            </div>
            <div class="footer-info">
                <h4>Thông Tin Liên Lạc</h4>
                <p><strong>Địa Chỉ:</strong> Ngũ Hành Sơn, TP Đà Nẵng</p>
                <p><strong>SDT:</strong> +84 0384 405 026</p>
                <p><strong>Hotline:</strong> 0978 331 441</p>
                <p><strong>Email:</strong> WLA@gmail.com</p>
            </div>
            <div class="footer-newsletter">
                <h4>Đăng ký nhận Bản Tin</h4>
                <form>
                    <input type="email" placeholder="Email" required>
                    <input type="text" placeholder="Tên" required>
                    <button type="submit">Đăng Ký</button>
                </form>
            </div>
            <div class="footer-social">
                <h4>Mạng Xã Hội</h4>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Dropdown menu
        document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                var menu = this.parentElement.querySelector('.dropdown-menu');
                menu.classList.toggle('show');
            });
        });
        
        document.addEventListener('click', function() {
            document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
                menu.classList.remove('show');
            });
        });

        // Hamburger menu
        document.getElementById('hamburger').addEventListener('click', function() {
            document.getElementById('nav-menu').classList.toggle('active');
        });

        // Hiệu ứng cho badge trạng thái
        document.querySelectorAll('.badge').forEach(badge => {
            badge.addEventListener('mouseover', function() {
                this.style.transform = 'scale(1.1)';
                this.style.transition = 'transform 0.3s';
            });
            
            badge.addEventListener('mouseout', function() {
                this.style.transform = 'scale(1)';
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