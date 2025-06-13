<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="shortcut icon" href="asset/image/icon.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảo Vệ Động Vật</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <video autoplay muted loop class="background-video">
        <source src="https://cdn.pixabay.com/video/2025/03/16/265271_large.mp4" type="video/mp4">
    </video>
    <header class="container-fluid px-0">
        <div class="top-bar">
            <div class="logo-container">
                <img src="asset/image/logoVip.png" alt="Logo" class="logo-img">
                <div class="logo-text">
                    <div class="logo">WLA</div>
                    <div class="slogan">Yêu động vật là yêu bản thân</div>
                </div>
            </div>

            <nav id="nav-menu">
                <ul>
                    <li class="dropdown">
                        <a href="index.php" class="active">Trang chủ</a>
                        <ul>
                            <li><a href="listanimal.php">Danh sách động vật</a></li>
                            <li><a href="page2.php">Chó mèo Việt Nam</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php#foot">Liên hệ</a></li>
                    <li><a href="congdong.php">Cộng đồng</a></li>
                    <li><a href="tintuc.php">Tin tức</a></li>
                    <li><a href="lienhe.php">Đội ngũ</a></li>
                    <li><a href="donate.php">Quyên góp</a></li>
                </ul>
            </nav>

            <div class="menu-toggle" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="auth-link">
                <?php if (isset($_SESSION['fullname'])): ?>
                    <div class="dropdown">
                        <img src="asset/image/user.png" alt="User Icon" class="user-icon" style="height: 20px; width: 20px;">
                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['fullname']); ?> <i class="uil uil-user-circle"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="logout.php">Đăng Xuất</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <img src="asset/image/user.png" alt="User Icon" style="height: 20px; width: 20px;">
                    <a class="menu-login" href="dangnhap.php" style="text-decoration: none; color: black"><i class="uil uil-signin"></i>Đăng Nhập</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="typing-box">
                        <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&weight=700&size=40&pause=1000&color=42C300¢er=true&width=1000&height=250&lines=Xin+ch%C3%A0o%2C+ch%C3%A0o+m%E1%BB%ABng+%C4%91%E1%BA%BFn+v%E1%BB%9Bi+WLA;%C4%90%C3%A2y+l%C3%A0+trang+web+b%E1%BA%A3o+v%E1%BB%87+%C4%91%E1%BB%99ng+v%E1%BA%ADt+Vi%E1%BB%87t+Nam" alt="Typing SVG" />
                    </div>
                    <p class="textContent">Tham gia hành trình bảo tồn các loài động vật quý hiếm và xây dựng một thế giới tốt đẹp hơn.</p>
                    <a href="donate.php" class="cta-button">Quyên Góp Ngay</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="blog" class="animate-on-scroll">
            <h2>Tin Tức Mới Nhất</h2>
            <div class="bao-iframe" id="news-container">
                <!-- Tin tức từ news.json -->
            </div>
            <h3>Tin Tức Động Vật Hoang Dã Từ BaoTinTuc</h3>
            <div class="bao-iframe animate-on-scroll">
                <iframe src="https://baotintuc.vn/long-form/emagazine/dong-vat-hoang-da-ben-bo-vuc-tuyet-chung-20211210222110940.htm" title="Tin tức động vật hoang dã từ VnExpress" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <p class="source-note">Nguồn: <a href="https://baotintuc.vn/long-form/emagazine/dong-vat-hoang-da-ben-bo-vuc-tuyet-chung-20211210222110940.htm">bao tin tuc</a></p>
        </section>
        <section id="statistics" class="animate-on-scroll">
            <h2>Số Liệu Thống Kê</h2>
            <div class="statistics-list">
                <div class="stat-item animate-on-scroll">
                    <h3 class="stat-number" data-final="150000+">0</h3>
                    <p>Số lượng động vật hoang dã bị đe dọa tại Việt Nam, bao gồm hổ, voi và tê giác, do săn bắn và mất môi trường sống</p>
                </div>
                <div class="stat-item animate-on-scroll">
                    <h3 class="stat-number" data-final="30%">0%</h3>
                    <p>Tỷ lệ các loài động vật hoang dã được bảo tồn thành công qua các chương trình tại các khu bảo tồn quốc gia.</p>
                </div>
                <div class="stat-item animate-on-scroll">
                    <h3 class="stat-number" data-final="5000+">0+</h3>
                    <p>Số lượng động vật hoang dã được cứu hộ mỗi năm bởi các tổ chức bảo vệ động vật tại Việt Nam.</p>
                </div>
                <div class="stat-item animate-on-scroll">
                    <h3 class="stat-number" data-final="50%">0%</h3>
                    <p>Tỷ lệ động vật hoang dã bị đe dọa bởi bệnh truyền nhiễm và mất môi trường sống do săn bắn và ô nhiễm.</p>
                </div>
            </div>
            <a href="donate.php" class="cta-button animate-on-scroll">Hỗ trợ ngay</a>
        </section>
        <section id="wildlife-trade-crisis" class="animate-on-scroll">
            <h2>Thực Trạng Nạn Săn Bắn Động Vật Hoang Dã</h2>
            <p>Hàng ngày, hàng ngàn loài động vật hoang dã đang bị đe dọa bởi nạn săn bắn và buôn bán trái phép. Nhấp vào liên kết dưới đây để xem video trên YouTube về vấn đề này.</p>
            <div class="video-wrapper" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://www.youtube.com/embed/Cs0O0YC8vh0?rel=0" title="Thực trạng nạn săn bắn động vật hoang dã" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </section>
        <section id="mission" class="animate-on-scroll">
            <h2>Sứ Mệnh Của Chúng Tôi</h2>
            <p>Chúng tôi là nhóm 4 sinh viên VKU với tình yêu thương động vật đã xây nên trang web này để có thể góp ích cho xã hội và chúng tôi mang đến các thông tin và hoạt động cần thiết cho việc bảo vệ động vật.</p>
            <img src="asset/image/elephant-7192207_1280.jpg" alt="" class="animate-on-scroll" style="width: 100%; height: auto; display: block; margin: 20px auto; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
            <a href="lienhe.php" class="cta-button animate-on-scroll">Chi tiết liên hệ</a>
        </section>
        <section id="featured-animals" class="animate-on-scroll">
            <h2>Động Vật Cần Giúp Đỡ</h2>
            <div class="animal-grid">
                <article class="animal-card animate-on-scroll">
                    <img src="asset/image/botot.jpg" alt="bo tot">
                    <h3>Bò tót</h3>
                    <p>Loài bò tót đang bị đe dọa bởi mất môi trường sống và săn bắn. Hãy giúp chúng tôi bảo vệ chúng!</p>
                    <div class="animal-details">
                        <p>Bò tót (Bos gaurus) là loài bò lớn nhất thế giới, sống chủ yếu ở các khu rừng nhiệt đới và đồng cỏ tại Đông Nam Á, trong đó có Việt Nam. Chúng có thể nặng tới 1.500 kg và cao 2,2 m. Hiện nay, bò tót đang bị đe dọa nghiêm trọng do nạn săn bắn và phá rừng, khiến số lượng giảm mạnh. Theo Sách Đỏ Việt Nam, bò tót được xếp vào nhóm nguy cấp, cần được bảo vệ khẩn cấp.</p>
                    </div>
                    <a href="#" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
                <article class="animal-card animate-on-scroll">
                    <img src="asset/image/saola.webp" alt="sao la">
                    <h3>Sao la</h3>
                    <p>Sao la (Pseudoryx) - một trong những loài thú hiếm nhất thế giới,</p>
                    <div class="animal-details">
                        <p>sống ở vùng núi rừng hẻo lánh dãy Trường Sơn tại Việt Nam và Lào. Kích thước cỡ lớn, thân dài tới 1,5m, trọng lượng 80 - 120kg. Mặt có những vạch trắng hoặc đen nhạt, phần lưng vạch trắng phân cách với chân màu đen nhạt. Bộ lông mềm mượt có xoáy ở giữa mũi và. Sừng thẳng, nhẵn bóng. Loài này gặp nguy cơ cao, chỉ còn khoảng 50 - 60 cá thể được nuôi dưỡng tại các vườn quốc gia. Việc phát hiện sao la lần đầu tiên năm 1992 là sự kiện quan trọng về động vật trên thế giới. Loài thú này đang đối mặt với sự mất mát môi trường sống và bị săn bắt trộm.</p>
                    </div>
                    <a href="#" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
                <article class="animal-card animate-on-scroll">
                    <img src="asset/image/tiger.jpg" alt="Hổ">
                    <h3>Hổ</h3>
                    <p>Kích cỡ lớn nhất trong Họ có thể nặng 200 - 250kg. Mền lông vàng hoặc vàng sáng, phần mang trắng. Mặt và mong thân có nhiều sọc đen.</p>
                    <div class="animal-details">
                        <p>Nhiều chuyên viên cho rằng đã biến mất, không còn ghi nhận mới trong tự nhiên. Việc xuất hiện một con hổ ở Việt Nam trở nên hiếm hoi, và nguy cơ cao.</p>
                    </div>
                    <a href="#" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
                <article class="animal-card animate-on-scroll">
                    <img src="asset/image/voocmuihech.jpg" alt="Voocmuihe">
                    <h3>Voọc mũi hếch</h3>
                    <p>Voọc mũi hếch, một loài động vật biệt chỉ tồn tại ở một số tỉnh miền núi phía Bắc Việt Nam, đang đối mặt với nguy cơ do săn bắt quá mức và phá rừng.</p>
                    <div class="animal-details">
                        <p>Có khoảng 80 cá thể được phát hiện bởi nhóm FFI (Tổ chức Bảo tồn động thực vật quốc tế), và ước tính còn khoảng 110 cá thể đang sinh sống ở Việt Nam. Voọc mũi hếch có bộ lông màu nâu đen, lông trắng quanh mặt và đỉnh đầu, tạo nên vẻ độc đáo. Đuôi dài và xù. Voọc mũi hếch là một trong những linh trưởng quý hiếm nhất trên thế giới, chỉ còn khoảng 200 cá thể trên toàn cầu, với tỉnh Hà Giang đóng góp khoảng 180 cá thể. Dự án bảo tồn voọc mũi hếch đã được triển khai để ngăn chặn nguy cơ của loài này.</p>
                    </div>
                    <a href="listanimal.html" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
            </div>
            <a href="listanimal.php" class="cta-button animate-on-scroll" id="view-more">Xem Thêm</a>
        </section>
        <section id="community" class="animate-on-scroll">
            <h2>Cộng Đồng Bảo Vệ Động Vật</h2>
            <p>Tham gia cộng đồng của chúng tôi để cùng nhau lan tỏa tình yêu thương động vật thông qua các chiến dịch tình nguyện, sự kiện gây quỹ, và những câu chuyện truyền cảm hứng.</p>
            <div class="community-grid">
                <article class="community-card animate-on-scroll">
                    <img src="asset/image/rungcucphuong.webp" alt="Chiến dịch tình nguyện">
                    <h3>Chiến Dịch Tình Nguyện Tại Vườn Quốc Gia</h3>
                    <p>Hơn 200 tình nguyện viên đã tham gia dọn dẹp và bảo vệ môi trường sống cho động vật tại Vườn Quốc Gia Cúc Phương.</p>
                    <a href="congdong.html" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
                <article class="community-card animate-on-scroll">
                    <img src="asset/image/baovesaola.jpg" alt="Sự kiện gây quỹ">
                    <h3>Sự Kiện Gây Quỹ Bảo Tồn Sao La</h3>
                    <p>Sự kiện chạy bộ gây quỹ tại Hà Nội đã thu hút hơn 500 người tham gia, quyên góp được 300 triệu đồng cho bảo tồn sao la.</p>
                    <a href="congdong.html" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
                <article class="community-card animate-on-scroll">
                    <img src="asset/image/cuuhovooc.jpg" alt="Câu chuyện thành công">
                    <h3>Câu Chuyện Thành Công: Cứu Hộ Voọc</h3>
                    <p>Một chú voọc mũi hếch bị thương đã được cứu hộ, chữa trị và thả về tự nhiên nhờ sự hỗ trợ của cộng đồng.</p>
                    <a href="congdong.html" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
                <article class="community-card animate-on-scroll">
                    <img src="asset/image/hoithao.jpg" alt="Hội thảo giáo dục">
                    <h3>Hội Thảo Giáo Dục Về Bảo Vệ Động Vật</h3>
                    <p>Hội thảo tại TP.HCM đã thu hút hơn 300 học sinh, nâng cao nhận thức về bảo vệ động vật hoang dã.</p>
                    <a href="congdong.html" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
            </div>
            <a href="congdong.php" class="cta-button animate-on-scroll page-transition-link">Tham Gia Cộng Đồng</a>
        </section>
        
        <section id="location" class="animate-on-scroll">
            <h2>Đây là vị trí của chúng tôi</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8815610201147!2d108.21995737521293!3d16.071556639231287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421828b9fc1271%3A0xb1437f774b80b6cd!2zU8ahbiBWaeG7h3QgxJDhu5NuZyBRdeG7kWMgU-G7kSAxIMSQw7RuZyBUaOG7pyBT4buRIDF!5e0!3m2!1svi!2s!4v1715870975923!5m2!1svi!2s" width="100%" height="450" style="border:0; border-radius:12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <a href="#" class="cta-button">Quay lại đầu trang</a>
        </section>
    </main>
    
</div>

    <footer class="bg-success text-light py-3" >
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
        // Toggle user dropdown on mobile
        document.querySelectorAll('.auth-link .dropdown-toggle').forEach(dropdown => {
            dropdown.addEventListener('click', (e) => {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    const parentDropdown = dropdown.closest('.dropdown');
                    parentDropdown.classList.toggle('active');
                }
            });
        });

        // Cuộn mượt đến section khi nhấn nút scroll-link
        document.querySelectorAll('.scroll-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('data-target');
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Toggle nội dung chi tiết cho "Tìm Hiểu Thêm"
        document.querySelectorAll('.learn-more').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const card = button.closest('.animal-card, .community-card');
                const details = card.querySelector('.animal-details');
                if (details) {
                    details.classList.toggle('show');
                    button.textContent = details.classList.contains('show') ? 'Ẩn Thông Tin' : 'Tìm Hiểu Thêm';
                } else {
                    window.location.href = button.getAttribute('href');
                }
            });
        });

        // Hiệu ứng cuộn với Intersection Observer
        const animateElements = document.querySelectorAll('.animate-on-scroll');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        animateElements.forEach(element => observer.observe(element));

        function animateCounter(element, start = 0, end, duration = 4000, suffix = '') {
            const startTime = performance.now();
            function update(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const currentValue = Math.floor(start + (end - start) * progress);
                element.textContent = currentValue.toLocaleString() + suffix;
                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    element.textContent = end.toLocaleString() + suffix;
                }
            }
            requestAnimationFrame(update);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const numberElements = document.querySelectorAll('.stat-number');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        const rawText = element.getAttribute('data-final').trim();
                        const hasPlus = rawText.endsWith('+');
                        const hasPercent = rawText.endsWith('%');
                        let numeric = parseInt(rawText.replace(/[^\d]/g, ''), 10);
                        let suffix = hasPlus ? '+' : (hasPercent ? '%' : '');
                        if (!isNaN(numeric)) {
                            element.textContent = '0' + suffix;
                            animateCounter(element, 0, numeric, 2000, suffix);
                            observer.unobserve(element);
                        }
                    }
                });
            }, { threshold: 0.5 });
            numberElements.forEach(el => observer.observe(el));
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