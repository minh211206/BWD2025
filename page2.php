<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <link rel="shortcut icon" href="asset/image/icon.jpg" type="image/x-icon">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảo Vệ Chó Mèo - WLA</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
 
   
    <link rel="stylesheet" href="chung.css">
     <link rel="stylesheet" href="page2.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome cho icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

    <video autoplay muted loop class="background-video">
        <source src="https://cdn.pixabay.com/video/2024/03/01/202576-918431455_large.mp4" type="video/mp4">
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
                    <li><a href="index.php">Liên hệ</a></li>
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
                   
                    
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="protected-animals" class="animate-on-scroll">
            <h2>Thực trạng hiện nay</h2>
            <div class="bao-iframe animate-on-scroll">
                <iframe
                    src="https://www.vietnamplus.vn/bi-kich-cho-so-phan-nhung-thu-cung-nuoi-theo-phong-trao-post1023764.vnp"
                    allowfullscreen></iframe>
            </div>
            <div class="animal-grid">
                <article class="animal-card animate-on-scroll">
                    <img src="asset/image/thitchomamtom.jpeg" alt="Mèo Việt Nam">
                    <h3>Tiêu thụ thịt chó mèo</h3>
                    <p>Với quy mô buôn bán “tàn nhẫn” này, khoảng 6 triệu cá thể chó, mèo đã bị giết thịt mỗi năm nhưng
                        những vụ bắt giữ, xử phạt không nhiều.</p>
                    <div class="animal-details">
                        <p>Buôn bán và vận chuyển chó, mèo trên tuyến đường dài, không được tiêm chủng, không có giấy
                            phép đang là mối đe dọa cho sức khỏe cộng đồng nhưng dường như chưa được quan tâm đúng mức.

                            Hành vi buôn bán, vận chuyển chó mèo không rõ nguồn gốc, trong điều kiện tồi tệ, các con vật
                            bị đối xử thiếu nhân đạo, bị lôi ra từ lồng nhốt bằng kẹp sắt một cách tàn nhẫn, bị đánh
                            chết bằng gậy, giật điện... trước khi bán cho những người chuyên cung cấp cho các nhà hàng
                            cũng đang là những hình ảnh phản cảm đối với khách du lịch.</p>
                    </div>
                    <a href="#" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
                <article class="animal-card animate-on-scroll">
                    <img src="asset/image/tharong.jpg" alt="Chó Phú Quốc">
                    <h3>chó mèo thả rông</h3>
                    <p>Hiểm họa chó, mèo thả rong tại các khu dân cư</p>
                    <div class="animal-details">
                        <p>Thời gian qua tại TP.HCM đã có không ít những ca nhập viện vị chó, mèo cắn. Trong đó loài vật
                            gây thương tích cho người chủ yếu là chó chiếm 74,8%, tiếp đến là mèo 20,5%... Tại các khu
                            dân cư tình trạng chó thả rông không rọ mõm, quấy phá, phóng uế bừa bãi, đe dọa người dân
                            xung quanh.</p>
                    </div>
                    <a href="#" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
                <article class="animal-card animate-on-scroll">
                    <img src="asset/image/meohoang.jpg" alt="Mèo Hoang">
                    <h3>Mèo Hoang Thành Phố</h3>
                    <p>Mèo hoang tại các đô thị lớn đang cần sự hỗ trợ để có cuộc sống an toàn và khỏe mạnh.</p>
                    <div class="animal-details">
                        <p>Mèo hoang tại các thành phố như Hà Nội, Đà Nẵng, và TP.HCM thường sống trong điều kiện khắc
                            nghiệt, tìm thức ăn ở bãi rác hoặc khu chợ. Chúng dễ mắc các bệnh như ghẻ, viêm đường hô
                            hấp, và thường không được triệt sản, dẫn đến gia tăng số lượng mèo hoang. Các nhóm tình
                            nguyện viên đang nỗ lực cung cấp thức ăn, chăm sóc y tế và tìm nhà nuôi cho chúng. Hỗ trợ
                            các chương trình triệt sản và nhận nuôi là cách hiệu quả để bảo vệ mèo hoang.</p>
                    </div>
                    <a href="#" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
                <article class="animal-card animate-on-scroll">
                    <img src="asset/image/baohanhchomeo.jpg" alt="Chó Lài">
                    <h3>Bạo hành chó mèo</h3>
                    <p> Theo quy định của pháp luật, chó mèo là vật nuôi và trong quy định về đối xử nhân đạo với vật
                        nuôi thì không được đánh đập, hành hạ vật nuôi. </p>
                    <div class="animal-details">
                        <p>Cộng đồng mạng tiếp tục kêu gọi cơ quan chức năng cần có biện pháp xử lý triệt để các hành vi
                            kinh doanh dịch vụ du lịch chụp ảnh với động vật, đặc biệt là những hoạt động không đảm bảo
                            an toàn và gây tổn hại cho động vật. Họ cũng yêu cầu bảo vệ những chú chó và ngăn chặn tình
                            trạng ngược đãi động vật trong tương lai..</p>
                    </div>
                    <a href="#" class="learn-more">Tìm Hiểu Thêm</a>
                </article>
            </div>

            <a href="donate.php" class="cta-button animate-on-scroll">Hỗ trợ ngay</a>
        </section>
        <section>
            <section id="statistics" class="animate-on-scroll">
                <h2>Số Liệu Thống Kê</h2>
                <div class="statistics-list">
                    <div class="stat-item animate-on-scroll">
                        <h3 class="stat-number" data-final="100000+">0</h3>
                        <p>Số lượng chó và mèo hoang ước tính tại các thành phố lớn như Hà Nội và TP.HCM.</p>
                    </div>
                    <div class="stat-item animate-on-scroll">
                        <h3 class="stat-number" data-final="20%">0%</h3>
                        <p>Tỷ lệ chó và mèo hoang được triệt sản tại Việt Nam, thấp hơn nhiều so với các nước phát
                            triển.
                        </p>
                    </div>
                    <div class="stat-item animate-on-scroll">
                        <h3 class="stat-number" data-final="5000+">0+</h3>
                        <p>Số lượng chó và mèo được nhận nuôi thông qua các tổ chức cứu hộ mỗi năm.</p>
                    </div>
                    <div class="stat-item animate-on-scroll">
                        <h3 class="stat-number" data-final="70%">0%</h3>
                        <p>Tỷ lệ chó và mèo hoang mắc các bệnh truyền nhiễm do thiếu chăm sóc y tế.</p>
                    </div>
                </div>

                <a href="tintuc.php" class="cta-button animate-on-scroll">xem thêm tin tức</a>

            </section>
        </section>
        </section>

        <section id="protected-animals" class="animate-on-scroll">
            <div class="crisis-content">
                <h2 class="section-title">Chúng ta có thể làm gì ?</h2>
                <div class="crisis-text">

                    <div class="news-grid">
                        <article class="news-card animate-on-scroll">
                            <img src="asset/image/nhannuoi.jpg" alt="Chiến dịch triệt sản">
                            <h3>Nhận nuôi</h3>
                            <p>Bạn có thể nhận nuôi những bé cún bé meo bị bỏ rơi hoặc được chúng tôi giải cứu hằng
                                tháng </p>
                            <a href="#" class="learn-more">Đọc Thêm</a>
                        </article>
                        <article class="news-card animate-on-scroll">
                            <img src="asset/image/ungho.jpg" alt="Cứu hộ mèo hoang">
                            <h3>Ủng hộ</h3>
                            <p>Bạn có thể ủng hộ chúng tôi để có chi phí duy trì cộng đồng và thực hiện những hành động
                                ý nghĩa</p>
                            <a href="#" class="learn-more">Đọc Thêm</a>
                        </article>
                        <article class="news-card animate-on-scroll">
                            <img src="asset/image/tinhnguyen.jpg" alt="Bảo tồn chó Phú Quốc">
                            <h3>Tình Nguyện</h3>
                            <p>Người góp của , người góp công nếu bạn muốn tham gia những hoạt động thực tế hãy đăng kí
                                với chúng tôi</p>
                            <a href="#" class="learn-more">Đọc Thêm</a>
                        </article>
                        <article class="news-card animate-on-scroll">
                            <img src="asset/image/ketnoi.jpg" alt="Chống buôn bán chó mèo">
                            <h3>Kết nối</h3>
                            <p>Bạn có thể giúp mọi người kết nối với nhau cũng giúp ích cho cộng đồng</p>
                            <a href="#" class="learn-more">Đọc Thêm</a>
                        </article>

        </section>

        <section id="news" class="animate-on-scroll">
            <h2>các chiến dịch đã và đang thực hiện </h2>
            <div class="bao-iframe" id="news-container">
                <!-- Tin tức từ news.json -->
            </div>
            <h3>các chiến dịch </h3>

            <div class="news-grid">
                <article class="news-card animate-on-scroll">
                    <img src="asset/image/chiendichtrietsan.jpg" alt="Chiến dịch triệt sản">
                    <h3>Chiến Dịch Triệt Sản Miễn Phí tại TP.HCM</h3>
                    <p>Một tổ chức phi lợi nhuận đã tổ chức chiến dịch triệt sản miễn phí cho hơn 500 chó và mèo hoang
                        tại TP.HCM, nhằm kiểm soát dân số và giảm tình trạng bỏ rơi.</p>
                    <a href="#" class="learn-more">Đang diễn ra</a>
                </article>
                <article class="news-card animate-on-scroll">
                    <img src="asset/image/cuuhochomeo.jpg" alt="Cứu hộ mèo hoang">
                    <h3>Cứu Hộ 50 Mèo Hoang tại Hà Nội</h3>
                    <p>Nhóm tình nguyện viên tại Hà Nội đã giải cứu 50 mèo hoang khỏi một khu chợ, cung cấp chăm sóc y
                        tế và tìm nhà nuôi mới cho chúng.</p>
                    <a href="#" class="learn-more">Đã diễn ra</a>
                </article>
                <article class="news-card animate-on-scroll">
                    <img src="asset/image/baotonchophuquoc.jpg" alt="Bảo tồn chó Phú Quốc">
                    <h3>Chương Trình Bảo Tồn Chó Phú Quốc</h3>
                    <p>Một dự án bảo tồn chó Phú Quốc thuần chủng đã được khởi động, với mục tiêu nhân giống có kiểm
                        soát và nâng cao nhận thức cộng đồng.</p>
                    <a href="#" class="learn-more">Đang diễn ra</a>
                </article>
                <article class="news-card animate-on-scroll">
                    <img src="asset/image/chongbuoncho.webp" alt="Chống buôn bán chó mèo">
                    <h3>Chống Nạn Buôn Bán Chó Mèo Trái Phép</h3>
                    <p>Các cơ quan chức năng đã triệt phá một đường dây buôn bán chó mèo trái phép, cứu sống hàng trăm
                        cá thể bị nhốt trong điều kiện tồi tệ.</p>
                    <a href="#" class="learn-more">Đã diễn ra</a>
                </article>
            </div>
           <a href="donate.php" class="cta-button animate-on-scroll">Hỗ trợ ngay</a>
        </section>

        <section id="statistics" class="animate-on-scroll">
            <h2>Số Liệu Thống Kê</h2>
            </div>
            <ul class="issue-list">
              <img src="asset/image/dothi1.jpg" alt="dothi">
            </ul>
            <p>Hàng nghìn cá thể đang sống trong điều kiện khắc nghiệt tại các đô thị lớn, cần sự hỗ trợ khẩn
                cấp từ cộng đồng.</p>
            </div>

            <div class="video-wrapper animate-on-scroll">
                <a href="https://youtu.be/ya304U3mozw?si=fiSdzvOMtIEEgJVc" target="_blank" class="video-link"
                    aria-label="Xem video về thực trạng chó và mèo hoang trên YouTube">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ya304U3mozw?si=-FRfM9x0k9zNjfId" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="video-link-content">
                        <svg viewBox="0 0 24 24" width="24" height="24" class="video-icon">
                            <path fill="currentColor"
                                d="M10,16.5V7.5L16,12M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                        </svg>
                        Xem video trên YouTube
                    </div>
                </a>
            </div>

            <div class="action-buttons">

                <a href="lienhe.php" class="cta-button secondary-button animate-on-scroll">
                    Liên Hệ Tình Nguyện
                </a>
            </div>
            </div>
           

        </section>

    </main>



    <footer class="bg-success text-light py-3 visble ">
  <div class="container">
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

    <script src="page2.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.querySelector('.dropdown-toggle');
        const dropdown = document.querySelector('.dropdown');
        if(dropdownToggle && dropdown) {
            dropdownToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                console.log('Dropdown toggle clicked!'); // Thêm dòng này
                dropdown.classList.toggle('active');
                console.log('Dropdown active class:', dropdown.classList.contains('active')); // Thêm dòng này
            });
            // Tạm thời bỏ qua trình lắng nghe sự kiện click trên document để đơn giản hóa
        }
    });
    
</script>
<script>
  window.addEventListener('DOMContentLoaded', function () {
    const footer = document.querySelector('footer');
    if (footer) footer.classList.add('visible');
  });
  // ...existing code...
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
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="WLA Chatbot"
  agent-id="bb75293d-8026-442b-a90e-0215f674e49d"
  language-code="en"
></df-messenger>

</body>

</html>