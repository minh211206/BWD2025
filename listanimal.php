<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="shortcut icon" href="asset/image/icon.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách động vật</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="listanimal.css">
    </head>

<body>
    <video autoplay muted loop class="background-video">
        <source src="https://cdn.pixabay.com/video/2025/03/16/265271_large.mp4" type="video/mp4">
    </video>

    <header>
        <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
            <div class="container-fluid">
                <a class="navbar-brand logo-container" href="index.html">
                    <img src="asset/image/logoVip.png" alt="logo" class="logo-img">
                    <div class="logo-text">
                        <span class="logo">WLA</span>
                        <p class="slogan">Yêu động vật là yêu bản thân</p>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link"href="listanimal.php">Danh sách động vật</a></li>
                        <li class="nav-item"><a class="nav-link" href="page2.php">Chó & Mèo</a></li>
                        <li class="nav-item"><a class="nav-link" href="congdong.php">Cộng đồng</a></li>
                        <li class="nav-item"><a class="nav-link" href="tintuc.php">Tin tức</a></li>
                        <li class="nav-item"><a class="nav-link" href="lienhe.php">Đội ngũ</a></li>
                        <li class="nav-item"><a class="nav-link" href="donate.php">Giúp đỡ</a></li>
                    </ul>

                    <div class="d-flex align-items-center navbar-right-items">
                        <div class="search-wrapper me-lg-3">
                            <div class="search-bar-container">
                                <input type="text" id="animal-search" placeholder="Tìm kiếm..." autocomplete="off">
                                <button type="button">Tìm</button>
                            </div>
                             </div>
                        <div class="menu-toggle" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="auth-link">
                <?php if (isset($_SESSION['fullname'])): ?>
                    <div class="dropdown">
                        <img src="asset/image/user.png" class="user-icon" style="height: 20px; width: 20px;">
                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
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
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section id="protected-animals">
            <h2>Danh Sách Động Vật</h2>
            <div class="animal-grid">
                <article class="animal-card p-3">
                    <img src="asset/image/huouvang.jpg" alt="Hươu vàng" class="img-fluid mb-3">
                    <h3>Hươu vàng</h3>
                    <p>Loài Hươu vàng sinh sống trong rừng thưa ven các sình lầy, sông suối.</p>

                    <div class="collapse" id="more1">
                        <div class="card card-body">
                            Hươu vàng sinh sống chủ yếu ở các khu rừng rậm nhiệt đới ở Tây Nguyên, Việt Nam. Chúng có bộ
                            lông vàng óng đặc trưng, sừng nhỏ và nhọn. Là loài ăn cỏ hiền lành, hươu vàng đóng vai trò
                            quan trọng trong hệ sinh thái rừng, giúp phát tán hạt giống. Tuy nhiên, do nạn săn bắt trái
                            phép và mất môi trường sống, số lượng của chúng giảm sút nghiêm trọng và có nguy cơ tuyệt
                            chủng trong tự nhiên.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more1">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/voi.jpg" alt="Voi" class="img-fluid mb-3">
                    <h3>Voi</h3>
                    <p>Voi Việt Nam, quần thể voi gắn bó với đời sống, lịch sử và văn hóa.</p>

                    <div class="collapse" id="more2">
                        <div class="card card-body">
                            Voi Việt Nam thuộc nhóm voi châu Á (Elephas maximus), là biểu tượng của sự mạnh mẽ, thông
                            minh. Voi có trí nhớ tuyệt vời, sống theo bầy đàn và có quan hệ xã hội phức tạp. Chúng giúp
                            duy trì sự cân bằng sinh thái rừng, tuy nhiên hiện nay quần thể voi Việt Nam đã giảm mạnh do
                            nạn săn trộm ngà và xung đột với con người. Các chương trình bảo tồn voi và nâng cao nhận
                            thức cộng đồng là hết sức cần thiết.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more2">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/voovdautrang.jpg" alt="Voọc đầu trắng" class="img-fluid mb-3">
                    <h3>Voọc đầu trắng</h3>
                    <p>Trên toàn cầu chỉ còn khoảng 60 cá thể Voọc đầu trắng sinh sống.</p>

                    <div class="collapse" id="more3">
                        <div class="card card-body">
                            Voọc đầu trắng (Trachypithecus poliocephalus) hiện chỉ còn tồn tại trên đảo Cát Bà (Hải
                            Phòng). Chúng có bộ lông đen tuyền, đầu trắng rất dễ nhận biết. Là loài ăn lá chuyên biệt,
                            voọc đầu trắng đóng vai trò thiết yếu trong việc phân tán hạt cây. Tuy nhiên, với số lượng
                            chỉ còn khoảng 60 cá thể, loài này đang đối mặt nguy cơ tuyệt chủng do phá rừng và săn bắt.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more3">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/ruada.jpg" alt="Rùa da" class="img-fluid mb-3">
                    <h3>Rùa da</h3>
                    <p>Là loài rùa lớn nhất và là bò sát lớn thứ tư thế giới.</p>

                    <div class="collapse" id="more4">
                        <div class="card card-body">
                            Rùa da (Dermochelys coriacea) là loài rùa biển lớn nhất thế giới, có thể đạt tới chiều dài 2
                            mét và nặng gần 700 kg. Rùa da sống chủ yếu ở các vùng biển Việt Nam, đặc biệt là miền
                            Trung. Loài rùa này có khả năng di cư xa và lặn sâu hơn 1.000 mét. Hiện nay, chúng bị đe dọa
                            bởi ô nhiễm nhựa, khai thác cát và sự xáo trộn bãi đẻ trứng do con người gây ra.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more4">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/coquangcanhxanh.jpg" alt="Cò quăm cánh xanh" class="img-fluid mb-3">
                    <h3>Cò quăm cánh xanh</h3>
                    <p>Loài chim quý hiếm sống chủ yếu ở vùng đất ngập nước Việt Nam.</p>

                    <div class="collapse" id="more5">
                        <div class="card card-body">
                            Cò quăm cánh xanh (Pseudibis davisoni) là loài chim quý hiếm đặc hữu vùng đất ngập nước Đông
                            Dương. Chúng có bộ lông màu xanh ánh kim rất đặc trưng. Cò quăm cánh xanh sinh sống chủ yếu
                            tại Tây Nguyên và các tỉnh phía Nam Việt Nam. Mối đe dọa chính của loài này là mất đi các
                            vùng đất ngập nước do chuyển đổi mục đích sử dụng đất, săn bắt và ô nhiễm.

                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more5">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/tegiac.png" alt="Tê giác" class="img-fluid mb-3">
                    <h3>Tê giác</h3>
                    <p>Tê giác một sừng Việt Nam, phân bố ở khu vực Đông Dương.</p>

                    <div class="collapse" id="more6">
                        <div class="card card-body">
                            Tê giác một sừng Việt Nam (Rhinoceros sondaicus annamiticus) là phân loài cực kỳ quý hiếm,
                            từng phân bố tại các khu rừng dọc dãy Trường Sơn. Tuy nhiên, do nạn săn trộm để lấy sừng và
                            phá hủy môi trường sống, cá thể cuối cùng đã bị xác nhận chết vào năm 2010, đánh dấu sự
                            tuyệt chủng của chúng tại Việt Nam. Đây là bài học đau lòng về việc bảo vệ động vật hoang
                            dã.

                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more6">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/ruahoguom.jpg" alt="Rùa hồ Gươm" class="img-fluid mb-3">
                    <h3>Rùa hồ Gươm</h3>
                    <p>Loài rùa quý hiếm đặc hữu của Hồ Gươm, Hà Nội.</p>

                    <div class="collapse" id="more7">
                        <div class="card card-body">
                            Rùa hồ Gươm (Rafetus swinhoei), còn gọi là Cụ Rùa, là loài rùa nước ngọt khổng lồ cực kỳ quý
                            hiếm, đặc hữu tại Hồ Gươm, Hà Nội. Đây là biểu tượng văn hóa - tâm linh gắn liền với truyền
                            thuyết vua Lê Lợi. Loài này hiện chỉ còn 3 cá thể trên toàn thế giới, khiến việc bảo tồn gen
                            và sinh sản trong điều kiện nuôi nhốt trở thành ưu tiên hàng đầu.

                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more7">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/voocmongtrang.jpg" alt="Voọc mông trắng" class="img-fluid mb-3">
                    <h3>Voọc mông trắng</h3>
                    <p>Loài linh trưởng đặc hữu của Việt Nam với số lượng cực kỳ nguy cấp.</p>

                    <div class="collapse" id="more8">
                        <div class="card card-body">
                            Voọc mông trắng (Trachypithecus delacouri) là loài linh trưởng đặc hữu của Việt Nam, sinh
                            sống ở các khu vực núi đá vôi tại Ninh Bình, Thanh Hoá, Nghệ An, Hà Tĩnh. Chúng có bộ lông
                            đen tuyền, phần mông trắng như đang "mặc quần". Với số lượng chỉ còn khoảng 250 cá thể, loài
                            này đang đối mặt với nguy cơ tuyệt chủng cao do khai thác đá và săn bắt.

                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more8">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/vdmt.jpg" alt="Vượn đen má trắng" class="img-fluid mb-3">
                    <h3>Vượn đen má trắng</h3>
                    <p>Loài linh trưởng nguy cấp, đặc trưng tại các khu bảo tồn Việt Nam.</p>

                    <div class="collapse" id="more9">
                        <div class="card card-body">
                            Vượn đen má trắng (Nomascus leucogenys) là loài linh trưởng nguy cấp có bộ lông đen, hai má
                            trắng đặc trưng, sinh sống ở các khu bảo tồn miền Bắc và Trung Việt Nam. Chúng sống theo
                            từng gia đình nhỏ, gắn kết cao, phát ra những tiếng hót vang đặc biệt vào buổi sáng. Sự phân
                            mảnh rừng và săn bắt đã khiến loài này bị đe dọa nghiêm trọng.

                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more9">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/socbay.jpg" alt="Sóc bay Đông Dương" class="img-fluid mb-3">
                    <h3>Sóc bay Đông Dương</h3>
                    <p>Loài sóc nhỏ có khả năng bay lượn, sống ở nhiều nước Đông Nam Á.</p>

                    <div class="collapse" id="more10">
                        <div class="card card-body">
                            Sóc bay Đông Dương (Hylopetes phayrei) là loài sóc nhỏ có khả năng bay lượn nhờ màng da nối
                            giữa các chi. Chúng sống chủ yếu trong các khu rừng rậm Đông Nam Á. Với khả năng bay lượn
                            linh hoạt, sóc bay giúp phân tán hạt và kiểm soát côn trùng trong rừng. Tuy nhiên, chặt phá
                            rừng và săn bắt làm thú cảnh khiến số lượng của chúng ngày càng suy giảm.

                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more10">
                        Đọc thêm
                    </button>
                </article>
                <article class="animal-card p-3">
                    <img src="asset/image/niecnau.jpg" alt="Niệc nâu" class="img-fluid mb-3">
                    <h3>Niệc nâu</h3>
                    <p>Là loài chim sở hữu bộ lông màu nâu với chiếc mũ sừng nằm phía trên
                        mỏ.</p>

                    <div class="collapse" id="more11">
                        <div class="card card-body">
                            Chim trống có lông rực rỡ và sáng màu hơn với phần lông mặt màu trắng và các phần dưới màu
                            nâu cam nhạt. Chim mái có bộ lông tối màu hơn, chủ yếu là màu nâu và phần lông trên mặt có
                            màu đen. Cả chim trống và mái đều có chiếc mỏ màu nhạt với chiếc mũ nhỏ phía trên và có một
                            mảng da mà xám xanh xung quanh mắt (chim mái có mảng da này nhỏ hơn và tối màu hơn con
                            trống).

                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more11">
                        Đọc thêm
                    </button>
                </article>
                <article class="animal-card p-3">
                    <img src="asset/image/meoca.jpg" alt="mèo cá" class="img-fluid mb-3">
                    <h3>Mèo cá</h3>
                    <p>Đặc tính nhận dạng Mèo cá là một loài mèo hoang cỡ vừa. </p>

                    <div class="collapse" id="more12">
                        <div class="card card-body">
                            Trong thập kỷ qua, quần thể loài này ở phần lớn khu vực phân bố châu Á đã giảm sút nghiêm
                            trọng. Giống như loài mèo báo có quan hệ gần, loài mèo cá sống dọc các sông, suối và đầm
                            lầy. Chúng bơi giỏi và biết bắt các loại động vật nhỏ dưới nước.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more12">
                        Đọc thêm
                    </button>
                </article>
                <article class="animal-card p-3">
                    <img src="asset/image/cothia.jpeg" alt="Cò thìa" class="img-fluid mb-3">
                    <h3>Cò thìa</h3>
                    <p>Cò thìa là loài chim nước quý hiếm, nổi bật với chiếc mỏ dẹt hình thìa.</p>

                    <div class="collapse" id="more13">
                        <div class="card card-body">
                            Cò thìa (Platalea minor) sinh sống tại các khu vực đất ngập nước, bãi triều và đầm lầy ven biển. Đây là loài chim di cư quý hiếm, hiện đang bị đe dọa tuyệt chủng do mất môi trường sống và ô nhiễm nước. Chúng nổi bật với chiếc mỏ dài, dẹt hình thìa dùng để quét và bắt con mồi dưới nước. Việt Nam là một trong số ít quốc gia có vùng cư trú của cò thìa trong mùa đông, đặc biệt tại các khu vực như Vườn Quốc gia Xuân Thủy. Việc bảo vệ sinh cảnh ngập nước là yếu tố then chốt để bảo tồn loài này.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more13">
                        Đọc thêm
                    </button>
                </article>

                </article>
                <article class="animal-card p-3">
                    <img src="asset/image/caygam.jpeg" alt="Cầy gấm" class="img-fluid mb-3">
                    <h3>Cầy gấm</h3>
                    <p>Cầy gấm là một trong những loài thú ăn thịt nhỏ hiếm gặp nhất ở Việt Nam.</p>

                    <div class="collapse" id="more14">
                        <div class="card card-body">
                            Cầy gấm (Chrotogale owstoni) là loài thú thuộc họ Cầy, sống chủ yếu ở rừng rậm miền Trung và miền Bắc Việt Nam. Chúng có bộ lông màu nâu xám với các đốm trắng như hoa văn gấm, từ đó có tên gọi đặc trưng. Cầy gấm hoạt động chủ yếu vào ban đêm, ăn côn trùng, chuột và các loài động vật nhỏ. Đây là loài quý hiếm và ít được biết đến, hiện đang bị đe dọa nghiêm trọng do mất môi trường sống và săn bắt trái phép. Cầy gấm được liệt vào danh sách động vật nguy cấp cần được bảo vệ.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more14">
                        Đọc thêm
                    </button>
                </article>

                </article>
                <article class="animal-card p-3">
                    <img src="asset/image/cocde.jpeg" alt="Cốc đế" class="img-fluid mb-3">
                    <h3>Cốc đế</h3>
                    <p>Cốc đế là loài chim săn mồi ban đêm với tiếng kêu vang vọng giữa rừng sâu.</p>

                    <div class="collapse" id="more15">
                        <div class="card card-body">
                            Cốc đế (Lyncornis macrotis) là loài chim hoạt động về đêm, phân bố tại các khu rừng rậm nhiệt đới ở Đông Nam Á, trong đó có Việt Nam. Chúng có kích thước lớn hơn so với các loài cùng họ, với đôi tai lông dài như “đế vương” và bộ lông nâu xám giúp ngụy trang hoàn hảo trong rừng. Cốc đế thường săn côn trùng bay vào ban đêm bằng cách bay là là mặt đất. Loài này hiếm gặp do tập tính kín đáo, và đang bị đe dọa bởi mất rừng và ánh sáng nhân tạo phá vỡ môi trường sống tự nhiên.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more15">
                        Đọc thêm
                    </button>
                </article>
                
                <article class="animal-card p-3">
                    <img src="asset/image/galoitia.jpeg" alt="Gà lôi tía" class="img-fluid mb-3">
                    <h3>Gà lôi tía</h3>
                    <p>Là loài chim quý của Việt Nam, nổi bật với bộ lông óng ánh tuyệt đẹp.</p>

                    <div class="collapse" id="more16">
                        <div class="card card-body">
                            Gà lôi tía (Lophura imperialis) là loài chim thuộc họ Trĩ, được xem là một trong những loài chim đẹp nhất Việt Nam. Con trống có bộ lông màu xanh tím óng ánh, đuôi dài và mào đỏ đặc trưng, trong khi con mái có màu nâu giản dị hơn. Chúng sống trong rừng thường xanh ở độ cao trung bình, hoạt động chủ yếu dưới mặt đất. Gà lôi tía rất nhút nhát, hiếm khi xuất hiện và từng được cho là tuyệt chủng cho đến khi phát hiện lại vào năm 1990. Hiện loài này đang đối mặt với nguy cơ tuyệt chủng do mất rừng và bẫy bắt.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more16">
                        Đọc thêm
                    </button>
                </article>

                  <article class="animal-card p-3">
                    <img src="asset/image/Khuoungucdom.jpeg" alt="Khướu ngực đốm" class="img-fluid mb-3">
                    <h3>Khướu ngực đốm</h3>
                    <p>Khướu ngực đốm là loài chim hót hay, sống trong rừng sâu với bộ lông nâu và ngực có đốm trắng đặc trưng.</p>

                    <div class="collapse" id="more17">
                        <div class="card card-body">
                              Khướu ngực đốm (Garrulax merulinus) là loài chim nhỏ thuộc họ Khướu, thường sinh sống trong các khu rừng rậm nhiệt đới và cận nhiệt đới ở Việt Nam. Loài này có giọng hót vang, phong phú và được ưa chuộng trong giới chơi chim. Đặc điểm nổi bật là ngực có các vệt đốm trắng xen kẽ trên nền nâu xám, giúp chúng dễ lẫn vào môi trường tự nhiên. Dù chưa nằm trong nhóm cực kỳ nguy cấp, nhưng việc săn bắt làm cảnh và mất sinh cảnh đang khiến số lượng khướu ngực đốm ngày càng giảm sút.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more17">
                        Đọc thêm
                    </button>
                </article>
                </article>

                  <article class="animal-card p-3">
                    <img src="asset/image/Mongbemoden.jpg" alt="Mòng bể mỏ đen" class="img-fluid mb-3">
                    <h3>Mòng bể mỏ đen</h3>
                    <p>Mòng bể mỏ đen là loài chim hiếm gặp, sống trong các khu rừng ngập nước với bộ lông đen bóng và mỏ dài.</p>

                    <div class="collapse" id="more18">
                        <div class="card card-body">
                              Mòng bể mỏ đen (Pseudochelidon sirintarae) là loài chim nhỏ thuộc họ Bể, thường sinh sống trong các khu rừng ngập nước và ven sông ở Việt Nam. Loài này có bộ lông đen bóng, mỏ dài và thon, giúp chúng dễ dàng bắt cá. Mòng bể mỏ đen rất nhút nhát, thường ẩn mình trong các tán cây rậm rạp. Hiện nay, loài này đang bị đe dọa do mất môi trường sống và ô nhiễm nguồn nước.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more18">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/Morongxom.jpg" alt="Mỏ rộng xồm" class="img-fluid mb-3">
                    <h3>Mỏ rộng xồm</h3>
                    <p>Mỏ rộng xồm là loài chim hiếm với bộ lông nâu sẫm và chiếc mỏ to, thường sống ẩn mình trong rừng sâu.</p>

                    <div class="collapse" id="more19">
                        <div class="card card-body">
                                 Mỏ rộng xồm (Batrachostomus stellatus) là loài chim thuộc họ Mỏ rộng, phân bố chủ yếu ở các cánh rừng nhiệt đới rậm rạp tại Việt Nam và một số nước Đông Nam Á. Chúng nổi bật với chiếc mỏ rộng, dẹt và lông xù quanh mặt giống ria mép – đặc điểm tạo nên tên gọi “xồm”. Loài chim này có màu lông nâu sẫm xen kẽ đốm trắng, giúp ngụy trang cực kỳ tốt trên cành cây khô. Mỏ rộng xồm chủ yếu hoạt động về đêm, săn bắt côn trùng bằng cách đậu im lặng và bất ngờ lao ra tóm mồi. Đây là loài rất khó quan sát ngoài tự nhiên và đang bị đe dọa bởi mất rừng nguyên sinh.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more19">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/ruadauto.jpg" alt="Rùa đầu to" class="img-fluid mb-3">
                    <h3>Rùa đầu to</h3>
                    <p>Rùa đầu to là loài rùa hiếm gặp, sống trong các khu rừng ngập nước với kích thước lớn và mai cứng.</p>

                    <div class="collapse" id="more20">
                        <div class="card card-body">
                              Rùa đầu to (Platysternon megacephalum) là loài rùa nhỏ thuộc họ Rùa, thường sinh sống trong các khu rừng ngập nước và ven sông ở Việt Nam. Loài này có kích thước lớn, mai cứng và hình dạng đặc trưng, giúp chúng dễ dàng di chuyển trong môi trường nước. Rùa đầu to rất nhút nhát, thường ẩn mình trong các tán cây rậm rạp. Hiện nay, loài này đang bị đe dọa do mất môi trường sống và ô nhiễm nguồn nước.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more20">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/Ranlucmuihech.jpg" alt="Rắn lục mũi hếch" class="img-fluid mb-3">
                    <h3>Rắn lục mũi hếch</h3>
                    <p>Là loài rắn hiếm gặp, sống trong các khu rừng nhiệt đới với màu sắc sặc sỡ và hình dáng đặc trưng.</p>

                    <div class="collapse" id="more21">
                        <div class="card card-body">
                              Rắn lục mũi hếch (Pseudoxenodon macrops) là loài rắn nhỏ thuộc họ Rắn, thường sinh sống trong các khu rừng nhiệt đới và cận nhiệt đới ở Việt Nam. Loài này có màu sắc sặc sỡ, với các vệt màu xanh lá cây và vàng trên cơ thể, giúp chúng dễ dàng ngụy trang trong môi trường sống. Rắn lục mũi hếch rất nhút nhát, thường ẩn mình trong các tán cây rậm rạp. Hiện nay, loài này đang bị đe dọa do mất môi trường sống và săn bắt trái phép.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more21">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/ranlucnui.jpg" alt="Rắn lục núi" class="img-fluid mb-3">
                    <h3>Rắn lục núi</h3>
                    <p>Rắn lục núi là loài rắn độc sống ở vùng núi cao, có màu xanh đặc trưng và khả năng ngụy trang tuyệt vời.</p>

                    <div class="collapse" id="more22">
                        <div class="card card-body">
                               Rắn lục núi (Trimeresurus sp.) là tên gọi chung cho một nhóm rắn lục sống chủ yếu ở các vùng núi cao, rừng rậm của Việt Nam. Chúng có thân hình mảnh, dài, màu xanh lá cây tươi và đôi mắt vàng đặc trưng. Là loài có nọc độc, rắn lục núi thường hoạt động vào ban đêm, săn mồi như ếch nhái, thằn lằn và côn trùng. Chúng có khả năng ngụy trang tốt trên tán lá cây và thường không tấn công nếu không bị kích động. Dù là loài bản địa quý hiếm, rắn lục núi đang bị đe dọa bởi phá rừng và khai thác quá mức cho mục đích thương mại.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more22">
                        Đọc thêm
                    </button>
                </article>

                 <article class="animal-card p-3">
                    <img src="asset/image/Ranlucđaubac.jpg" alt="Rắn lục đầu bạc" class="img-fluid mb-3">
                    <h3>Rắn lục đầu bạc</h3>
                    <p>Rắn lục đầu bạc là loài rắn quý hiếm với phần đầu màu bạc đặc trưng và nọc độc mạnh.</p>

                    <div class="collapse" id="more23">
                        <div class="card card-body">
                               Rắn lục đầu bạc (Trimeresurus albhead) là loài rắn lục hiếm, được phát hiện tại các khu rừng núi cao ở miền Trung và Tây Bắc Việt Nam. Đặc điểm nổi bật nhất của loài này là phần đầu có ánh bạc hoặc trắng xám, tạo nên sự khác biệt rõ rệt so với các loài rắn lục khác. Rắn lục đầu bạc có nọc độc khá mạnh, nhưng chủ yếu dùng để săn mồi như chuột, chim nhỏ và bò sát. Là loài khó gặp, ít được biết đến, rắn lục đầu bạc đang đứng trước nguy cơ tuyệt chủng do môi trường sống bị thu hẹp và săn bắt bất hợp pháp.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more23">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/SocdenCondao.jpg" alt="Sóc đen Côn Đảo" class="img-fluid mb-3">
                    <h3>Sóc đen Côn Đảo</h3>
                    <p>Sóc đen Côn Đảo hay sóc mun là loài thú nhỏ quý hiếm, đặc hữu của quần đảo Côn Đảo.</p>

                    <div class="collapse" id="more24">
                        <div class="card card-body">
                              Sóc đen Côn Đảo (Callosciurus concolor condorensis) là phân loài sóc đặc hữu chỉ được tìm thấy ở Côn Đảo, Việt Nam. Chúng có bộ lông màu đen tuyền óng ánh, thân hình nhỏ nhắn, nhanh nhẹn, sống chủ yếu trong các khu rừng nguyên sinh trên đảo. Sóc đen thường ăn quả rừng, hạt và côn trùng nhỏ, góp phần phát tán hạt giống và duy trì hệ sinh thái. Loài này đang bị đe dọa bởi mất rừng, du lịch không kiểm soát và thay đổi môi trường sống. Việc bảo tồn rừng đặc dụng Côn Đảo là rất cần thiết để đảm bảo sự sống còn của loài sóc quý hiếm này.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more24">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/socdo.jpg" alt="Sóc đỏ" class="img-fluid mb-3">
                    <h3>Sóc đỏ</h3>
                    <p>Sóc đỏ là loài thú nhỏ nhanh nhẹn, dễ nhận biết bởi bộ lông màu đỏ cam rực rỡ.</p>

                    <div class="collapse" id="more25">
                        <div class="card card-body">
                                Sóc đỏ (Callosciurus erythraeus) là loài gặm nhấm phổ biến ở các khu rừng và vùng bán đô thị của Việt Nam. Chúng có bộ lông màu đỏ tươi nổi bật, đặc biệt là phần đuôi dài và dày rất đẹp. Sóc đỏ sống trên cây, hoạt động ban ngày, và ăn các loại quả, hạt, chồi cây. Chúng đóng vai trò quan trọng trong việc phát tán hạt giống và duy trì hệ sinh thái rừng. Mặc dù là loài phổ biến, nhưng nạn phá rừng và săn bắt làm cảnh có thể khiến số lượng sóc đỏ giảm nếu không được bảo vệ đúng cách.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more25">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/sahung.jpg" alt="Sả hung" class="img-fluid mb-3">
                    <h3>Sả hung</h3>
                    <p>Sả hung là loài chim nổi bật với bộ lông màu nâu đỏ và tiếng kêu vang giữa rừng sâu.</p>

                    <div class="collapse" id="more26">
                        <div class="card card-body">
                              Sả hung (Halcyon smyrnensis) là loài chim thuộc họ Sả, phân bố rộng rãi ở Đông Nam Á, trong đó có Việt Nam. Loài này có bộ lông màu nâu đỏ đặc trưng ở đầu và bụng, cánh xanh lam và mỏ đỏ to khỏe. Sả hung thường sống gần sông suối, hồ và vùng đất ngập nước, nơi chúng săn cá, côn trùng và ếch nhái bằng cách lao từ cành cây xuống. Là loài dễ nhận biết và có tiếng kêu đặc biệt, sả hung góp phần giữ cân bằng sinh thái ở các hệ sinh thái nước ngọt. Tuy không bị đe dọa nghiêm trọng, nhưng ô nhiễm môi trường và phá rừng vẫn ảnh hưởng đến số lượng loài.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more26">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/vachoa.jpg" alt="Vạc hoa" class="img-fluid mb-3">
                    <h3>Vạc hoa</h3>
                    <p>Vạc hoa là loài chim nước có bộ lông đặc sắc, sống ở vùng đất ngập nước và rừng ngập mặn.</p>

                    <div class="collapse" id="more27">
                        <div class="card card-body">
                             Vạc hoa (Ixobrychus sinensis) là loài chim thuộc họ Diệc, có kích thước nhỏ và thường sống ẩn mình trong các bụi cây rậm ven hồ, ao, đầm lầy và rừng ngập mặn. Loài này nổi bật với bộ lông màu nâu pha vàng kem, xen kẽ các sọc hoa đặc trưng ở cổ và lưng. Vạc hoa có tập tính lặng lẽ, thường đứng bất động hàng giờ để rình mồi như cá nhỏ, côn trùng và ếch nhái. Chúng sinh sản ở các khu vực rậm rạp gần nước, làm tổ bằng cỏ. Mặc dù chưa thuộc nhóm cực kỳ nguy cấp, nhưng mất sinh cảnh và ô nhiễm nước đang ảnh hưởng lớn đến quần thể vạc hoa tại Việt Nam.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more27">
                        Đọc thêm
                    </button>
                </article>

                <article class="animal-card p-3">
                    <img src="asset/image/trido.jpg" alt="Trĩ đỏ" class="img-fluid mb-3">
                    <h3>Trĩ đỏ</h3>
                    <p>Trĩ đỏ là loài chim rừng có bộ lông sặc sỡ, sống ẩn mình trong các khu rừng nhiệt đới của Việt Nam.</p>

                    <div class="collapse" id="more28">
                        <div class="card card-body">
                            Trĩ đỏ (Lophura edwardsi) là loài chim quý hiếm thuộc họ Trĩ, phân bố chủ yếu tại các khu rừng thường xanh ở miền Trung Việt Nam. Con trống có bộ lông đỏ sẫm pha ánh tím rất bắt mắt, đuôi dài và mào xanh than nổi bật, trong khi con mái có màu nâu tối giản dị hơn. Trĩ đỏ sống trong các tán rừng rậm rạp, chủ yếu ăn hạt, côn trùng và mầm cây. Đây là loài cực kỳ nhút nhát và ưa sống ẩn mình. Do săn bắt, phá rừng và mất sinh cảnh, trĩ đỏ hiện đang bị đe dọa nghiêm trọng và được xếp vào nhóm cực kỳ nguy cấp. Nhiều chương trình bảo tồn đang được triển khai để phục hồi quần thể loài này trong tự nhiên.
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#more28">
                        Đọc thêm
                    </button>
                </article>
            </div>
        </section>
    </main>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cập nhật văn bản nút sau khi vùng nội dung đã hiển thị hoặc ẩn đi
            document.querySelectorAll('.collapse:not(.navbar-collapse)').forEach(collapseEl => {
                collapseEl.addEventListener('shown.bs.collapse', () => {
                    const button = document.querySelector(`[data-bs-target="#${collapseEl.id}"]`);
                    if (button) button.textContent = 'Thu gọn';
                });

                collapseEl.addEventListener('hidden.bs.collapse', () => {
                    const button = document.querySelector(`[data-bs-target="#${collapseEl.id}"]`);
                    if (button) button.textContent = 'Đọc thêm';
                });
            });

            // Hiệu ứng xuất hiện khi cuộn đến
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('#protected-animals, .animal-card, footer').forEach(element => {
                observer.observe(element);
            });

            // --- SCRIPT TÌM KIẾM VÀ GỢI Ý ---
            const searchInput = document.getElementById('animal-search');
            const animalCards = document.querySelectorAll('.animal-card');
            const searchWrapper = document.querySelector('.search-wrapper');

            const animalNames = Array.from(animalCards).map(card => card.querySelector('h3').textContent);

            function filterAnimals() {
                let searchTerm = searchInput.value.toLowerCase().trim();
                animalCards.forEach(card => {
                    let animalName = card.querySelector('h3').textContent.toLowerCase();
                    if (animalName.startsWith(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', function() {
                const inputText = this.value.toLowerCase().trim();
                filterAnimals();
                suggestionsBox.innerHTML = '';
                if (inputText.length > 0) {
                    const suggestions = animalNames.filter(name => name.toLowerCase().startsWith(inputText));
                    if (suggestions.length > 0) {
                        suggestions.forEach(suggestion => {
                            const suggestionItem = document.createElement('div');
                            suggestionItem.classList.add('suggestion-item');
                            suggestionItem.textContent = suggestion;
                            suggestionItem.addEventListener('click', () => {
                                searchInput.value = suggestion;
                                suggestionsBox.style.display = 'none'; // Keep this to hide after selection
                                filterAnimals();
                            });
                            suggestionsBox.appendChild(suggestionItem);
                        });
                        suggestionsBox.style.display = 'block'; // Ensure suggestions are visible
                    } else {
                        suggestionsBox.style.display = 'none';
                    }
                } else {
                    suggestionsBox.style.display = 'none';
                }
            });

            document.addEventListener('click', function(event) {
                if (!searchWrapper.contains(event.target)) {
                    suggestionsBox.style.display = 'none';
                }
            });
        });
    </script>

    <script>
  if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
  }

  window.addEventListener('load', function () {
    window.scrollTo({
      top: 0,
      behavior: 'smooth' // mượt mà
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