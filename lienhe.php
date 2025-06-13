<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="shortcut icon" href="asset/image/icon.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ | Bảo Vệ Động Vật</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="lienhe.css">
</head>
<body>
    <video class="background-video" autoplay muted loop playsinline>
        <source src="path-to-your-video.mp4" type="video/mp4">
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
                    <li><a href="lienhe.php#foot">Liên hệ</a></li>
                    <li><a href="congdong.php">Cộng đồng</a></li>
                    <li><a href="tintuc.php">Tin tức</a></li>
                    <li><a href="lienhe.php" class="active">Đội ngũ</a></li>
                    <li><a href="donate.php">Quyên góp</a></li>
                </ul>
            </nav>
            <div class="auth-link"> 
                <?php if (isset($_SESSION['fullname'])): ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['fullname']); ?> <i class="fas fa-user-circle"></i>
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

    <section id="team" class="hero">
        <h2>Đội Ngũ Của Chúng Tôi</h2>
        <p>Chúng tôi là nhóm 4 sinh viên VKU, đam mê bảo vệ động vật và xây dựng cộng đồng ý nghĩa.</p>

        <div class="team-grid">
            <div class="team-card">
                <img src="asset/image/avttruyen.jpg" alt="Bùi Trung Truyền">
                <h3>Bùi Trung Truyền</h3>
                <p>Trưởng Nhóm</p>
                <p>Email: truyenbt.24ce@vku.udn.vn</p>
                <div class="team-details">
                    <p>Truyền là người khởi xướng dự án, dẫn dắt nhóm với niềm đam mê bảo tồn động vật hoang dã và kỹ năng lãnh đạo xuất sắc.</p>
                </div>
                <button class="learn-more">Xem Chi Tiết</button>
            </div>
            <div class="team-card">
                <img src="asset/image/avtminh.jpg" alt="Phan Quang Minh">
                <h3>Phan Quang Minh</h3>
                <p>Thành Viên</p>
                <p>Email: minhpq.24ce@vku.udn.vn</p>
                <div class="team-details">
                    <p>Minh là người thiết kế và phát triển trang web, đảm bảo trải nghiệm mượt mà và giao diện thân thiện với người dùng.</p>
                </div>
                <button class="learn-more">Xem Chi Tiết</button>
            </div>
            <div class="team-card">
                <img src="asset/image/avtphuc.jpg" alt="Hồ Chí Phúc">
                <h3>Hồ Chí Phúc</h3>
                <p>Thành Viên</p>
                <p>Email: phuchc.24ceb@vku.udn.vn</p>
                <div class="team-details">
                    <p>Phúc phụ trách xây dựng nội dung và chiến dịch truyền thông, lan tỏa thông điệp bảo vệ động vật đến cộng đồng.</p>
                </div>
                <button class="learn-more">Xem Chi Tiết</button>
            </div>
            <div class="team-card">
                <img src="asset/image/avtTrung.jpg" alt="Hồ Đắc Trung">
                <h3>Hồ Đắc Trung</h3>
                <p>Thành Viên</p>
                <p>Email: trunghd.24ceb@vku.udn.vn</p>
                <div class="team-details">
                    <p>Trung thu thập và phân tích dữ liệu về các loài động vật, cung cấp thông tin khoa học cho các chiến dịch bảo tồn và các hoạt động khác.</p>
                </div>
                <button class="learn-more">Xem Chi Tiết</button>
            </div>
        </div>
    </section>

    <footer class="bg-success text-light py-3">
        <div class="container" id="foot">
            <div class="row text-center text-md-start align-items-start gy-3">
                <!-- Logo -->
                <div class="col-12 col-md-3">
                    <img src="asset/image/logoVip.png" alt="logo" class="img-fluid" style="max-height: 60px;">
                </div>
                <!-- Contact Info -->
                <div class="col-12 col-md-3">
                    <h6 class="fw-bold">Thông Tin Liên Lạc</h6>
                    <small><strong>Địa Chỉ:</strong> Ngũ Hành Sơn, TP Đà Nẵng</small><br>
                    <small><strong>SDT:</strong> +84 0384 405 026</small><br>
                    <small><strong>Hotline:</strong> 0978 331 441</small><br>
                    <small><strong>Email:</strong> WLA@gmail.com</small>
                </div>
                <!-- Newsletter -->
                <div class="col-12 col-md-3">
                    <h6 class="fw-bold">Đăng ký nhận Bản Tin</h6>
                    <form>
                        <input type="email" class="form-control form-control-sm mb-1" placeholder="Email" required>
                        <input type="text" class="form-control form-control-sm mb-1" placeholder="Tên" required>
                        <button type="submit" class="btn btn-success btn-sm w-100">Đăng Ký</button>
                    </form>
                </div>
                <!-- Social -->
                <div class="col-12 col-md-3">
                    <h6 class="fw-bold">Mạng Xã Hội</h6>
                    <div class="d-flex justify-content-center justify-content-md-start gap-3 fs-5">
                        <a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Toggle hamburger menu
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('nav-menu');
        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            hamburger.classList.toggle('active');
        });

        // Toggle submenu on mobile (only for nav menu)
        document.querySelectorAll('nav .dropdown > a').forEach(dropdown => {
            dropdown.addEventListener('click', (e) => {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    const submenu = dropdown.nextElementSibling;
                    submenu.classList.toggle('show');
                }
            });
        });

        // Animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.hero, #team, .team-card, footer').forEach(section => {
            observer.observe(section);
        });

        // Toggle team details
        document.querySelectorAll('.learn-more').forEach(button => {
            button.addEventListener('click', () => {
                const details = button.previousElementSibling;
                details.classList.toggle('show');
                button.textContent = details.classList.contains('show') ? 'Ẩn Chi Tiết' : 'Xem Chi Tiết';
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