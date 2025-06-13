<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="shortcut icon" href="asset/image/icon.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức | Bảo Vệ Động Vật</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="chung.css">
    <link rel="stylesheet" href="tintuc.css">
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
                    <li><a href="index.php">Liên hệ</a></li>
                    <li><a href="congdong.php">Cộng đồng</a></li>
                    <li><a href="tintuc.php"class="active">Tin tức</a></li>
                    <li><a href="lienhe.php">Đội ngũ</a></li>
                    <li><a href="donate.php">Quyên góp</a></li>
                </ul>
            </nav>

           <div class="auth-link"> 
                <?php if (isset($_SESSION['fullname'])): ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fas fa-user-circle">&nbsp&nbsp&nbsp</i>  <?php echo htmlspecialchars($_SESSION['fullname']); ?> 
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
 <section id="tin1" class="visible">
            <h2>Tin Tức Mới Nhất</h2>
            <div class="bao-iframe" id="news-container">
                <!-- Tin tức từ news.json -->
            </div>
            <h3>Tin Tức Động Vật Hoang Dã Từ BaoTinTuc</h3>
            <div class="bao-iframe animate-on-scroll">
                <iframe
                    src="https://baotintuc.vn/long-form/emagazine/dong-vat-hoang-da-ben-bo-vuc-tuyet-chung-20211210222110940.htm"
                    title="Tin tức động vật hoang dã từ VnExpress" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <p class="source-note">Nguồn:
                   <a href="https://baotintuc.vn/long-form/emagazine/dong-vat-hoang-da-ben-bo-vuc-tuyet-chung-20211210222110940.htm">bao tin tuc</a></p>
        </section>
        <section id="wildlife-trade-crisis" class="animate-on-scroll visible">
    <h2>Thực Trạng Nạn Săn Bắn Động Vật Hoang Dã</h2>
    <p>Hàng ngày, hàng ngàn loài động vật hoang dã đang bị đe dọa bởi nạn săn bắn và buôn bán trái phép. Nhấp vào liên kết dưới đây để xem video trên YouTube về vấn đề này.</p>
    <div class="video-wrapper" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
      <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
         src="https://www.youtube.com/embed/Cs0O0YC8vh0?rel=0"
         title="Thực trạng nạn săn bắn động vật hoang dã"
         frameborder="0"
         allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
         allowfullscreen>
      </iframe>
    </div>
<section id="tin-moi-nhat" class="visible">
    <h2>Tin Tức Mới Nhất</h2>
    
    <div class="news-row">
        <!-- Tin tức 1 -->
        <div class="news-column animate-on-scroll">
            <div class="bao-iframe">
                <iframe src="https://tuoitre.vn/dong-vat-hoang-da.html" 
                        title="Tin tức động vật 1" frameborder="0"
                        allowfullscreen></iframe>
            </div>
            <p class="source-note">Nguồn: <a href="https://tuoitre.vn/dong-vat-hoang-da.html">bao tuoi tre</a></p>
        </div>
        
        <!-- Tin tức 2 -->
        <div class="news-column animate-on-scroll">
            <div class="bao-iframe">
                <iframe src="https://baotintuc.vn/infographics/lam-gi-de-bao-ve-dong-vat-hoang-da-20240303063409982.htm" 
                        title="Tin tức động vật 2" frameborder="0"
                        allowfullscreen></iframe>
            </div>
            <p class="source-note">Nguồn: <a href="https://baotintuc.vn/infographics/lam-gi-de-bao-ve-dong-vat-hoang-da-20240303063409982.htm">baotintuc</a></p>
        </div>
        
        <!-- Tin tức 3 -->
        <div class="news-column animate-on-scroll">
            <div class="bao-iframe">
                <iframe src="https://thanhnien.vn/tin-moi-nhat-3.htm" 
                        title="Tin tức động vật 3" frameborder="0"
                        allowfullscreen></iframe>
            </div>
            <p class="source-note">Nguồn: <a href="https://thanhnien.vn/tin-moi-nhat-3.htm">Thanh Niên</a></p>
        </div>
    </div>
</section>
                </section> <!-- Đóng section tin-moi-nhat -->
</main>
<footer class="bg-success text-light pt-4 pb-2 mt-5">
  <div class="container">
    <div class="row gy-4">
      <div class="col-md-4">
        <h5>Thông Tin Liên Lạc</h5>
        <p><strong>Địa Chỉ:</strong> Ngũ Hành Sơn, TP Đà Nẵng</p>
        <p><strong>Điện Thoại:</strong> +84 0384 405 026</p>
        <p><strong>Hotline:</strong> 0978 331 441</p>
        <p><strong>Email:</strong> WLA@gmail.com</p>
      </div>
      <div class="col-md-4">
        <h5>Đăng Ký Nhận Bản Tin</h5>
        <form class="d-flex flex-column gap-2">
          <input type="email" class="form-control" placeholder="Email" required>
          <input type="text" class="form-control" placeholder="Tên" required>
          <button type="submit" class="btn btn-warning text-success fw-bold">Đăng Ký</button>
        </form>
      </div>
      <div class="col-md-4">
        <h5>Mạng Xã Hội</h5>
        <div class="d-flex gap-3 fs-4">
          <a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-light"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
    <hr class="border-light my-3">
    <div class="text-center small">
      &copy; 2025 WLA. Bảo vệ động vật hoang dã vì tương lai xanh.
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

        // Toggle submenu on mobile
        document.querySelectorAll('.dropdown > a').forEach(dropdown => {
            dropdown.addEventListener('click', (e) => {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    const submenu = dropdown.nextElementSibling;
                    submenu.classList.toggle('show');
                }
            });
        });
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
    </script>
    <script>
    window.addEventListener('scroll', function() {
        var tin1 = document.getElementById('tin1');
        var rect = tin1.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
            tin1.classList.add('visible');
        }
    });
</script>
<script>
window.addEventListener('scroll', function() {
    var wildlife = document.getElementById('wildlife-trade-crisis');
    var rect = wildlife.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) {
        wildlife.classList.add('visible');
    }
});
</script>
<script>
document.querySelectorAll('.read-more-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        var moreText = btn.parentElement.querySelector('.more-text');
        if (moreText.style.display === 'none' || moreText.style.display === '') {
            moreText.style.display = 'block';
            btn.textContent = 'Thu gọn';
        } else {
            moreText.style.display = 'none';
            btn.textContent = 'Đọc thêm';
        }
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