<?php
session_start();
include 'db.php';

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');

// Xử lý đăng bài
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['postContent'])) {
    header('Content-Type: application/json');
    if (!isset($_SESSION['user_id'])) {
        error_log("Session user_id not set. Session data: " . print_r($_SESSION, true));
        die(json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để đăng bài!']));
    }

    $user_id = $_SESSION['user_id'];
    $content = $conn->real_escape_string($_POST['postContent']);
    $image = null;

    if (!empty($_FILES['postImage']['name'])) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024; // 5MB
        $image_type = $_FILES['postImage']['type'];
        $image_size = $_FILES['postImage']['size'];
        $image_name = $_FILES['postImage']['name'];
        $extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $unique_name = uniqid('img_') . '.' . $extension;
        $image_path = 'asset/image/' . $unique_name;

        if (!in_array($image_type, $allowed_types)) {
            die(json_encode(['success' => false, 'message' => 'Chỉ chấp nhận file JPEG, PNG hoặc GIF!']));
        }
        if ($image_size > $max_size) {
            die(json_encode(['success' => false, 'message' => 'Kích thước file không được vượt quá 5MB!']));
        }
        if (!is_writable('asset/image/')) {
            error_log("Directory asset/image/ not writable");
            die(json_encode(['success' => false, 'message' => 'Thư mục asset/image/ không có quyền ghi!']));
        }
        if (!move_uploaded_file($_FILES['postImage']['tmp_name'], $image_path)) {
            error_log("Upload error: " . $_FILES['postImage']['error']);
            die(json_encode(['success' => false, 'message' => 'Lỗi khi upload ảnh: ' . $_FILES['postImage']['error']]));
        }
        $image = $image_path;
    }

    $check_user = $conn->query("SELECT id FROM taikhoan WHERE id = $user_id");
    if ($check_user->num_rows == 0) {
        error_log("Invalid user_id: $user_id");
        die(json_encode(['success' => false, 'message' => 'ID người dùng không hợp lệ!']));
    }

    $stmt = $conn->prepare("INSERT INTO posts (user_id, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $content, $image);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Đăng bài thành công!']);
    } else {
        error_log("SQL Error: " . $stmt->error);
        echo json_encode(['success' => false, 'message' => 'Lỗi khi đăng bài: ' . $stmt->error]);
    }
    $stmt->close();
    $conn->close();
    exit();
}

// Xử lý thích bài viết
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'like') {
    header('Content-Type: application/json');
    if (!isset($_SESSION['user_id'])) {
        die(json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để thích bài!']));
    }
    $user_id = $_SESSION['user_id'];
    $post_id = (int)$_POST['post_id'];

    $check_like = $conn->prepare("SELECT id FROM likes WHERE post_id = ? AND user_id = ?");
    $check_like->bind_param("ii", $post_id, $user_id);
    $check_like->execute();
    $result_check = $check_like->get_result();

    if ($result_check->num_rows > 0) {
        $stmt = $conn->prepare("DELETE FROM likes WHERE post_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $post_id, $user_id);
        $action = 'unlike';
    } else {
        $stmt = $conn->prepare("INSERT INTO likes (post_id, user_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $post_id, $user_id);
        $action = 'like';
    }

    if ($stmt->execute()) {
        $count_likes = $conn->prepare("SELECT COUNT(*) as like_count FROM likes WHERE post_id = ?");
        $count_likes->bind_param("i", $post_id);
        $count_likes->execute();
        $likes_result = $count_likes->get_result();
        $like_count = $likes_result->fetch_assoc()['like_count'];

        echo json_encode(['success' => true, 'action' => $action, 'like_count' => $like_count]);
    } else {
        error_log("SQL Error: " . $stmt->error);
        echo json_encode(['success' => false, 'message' => 'Lỗi khi xử lý thích bài!']);
    }
    $stmt->close();
    $check_like->close();
    $conn->close();
    exit();
}

// Xử lý xóa bài viết
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    header('Content-Type: application/json');
    if (!isset($_SESSION['user_id'])) {
        die(json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để xóa bài!']));
    }
    $user_id = $_SESSION['user_id'];
    $post_id = (int)$_POST['post_id'];

    $check_post = $conn->prepare("SELECT user_id FROM posts WHERE id = ?");
    $check_post->bind_param("i", $post_id);
    $check_post->execute();
    $post_result = $check_post->get_result();
    if ($post_result->num_rows === 0 || $post_result->fetch_assoc()['user_id'] !== $user_id) {
        die(json_encode(['success' => false, 'message' => 'Bạn không có quyền xóa bài này!']));
    }

    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $post_id);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Xóa bài thành công!']);
    } else {
        error_log("SQL Error: " . $stmt->error);
        echo json_encode(['success' => false, 'message' => 'Lỗi khi xóa bài!']);
    }
    $stmt->close();
    $check_post->close();
    $conn->close();
    exit();
}

// Xử lý gửi bình luận
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'comment') {
    header('Content-Type: application/json');
    if (!isset($_SESSION['user_id'])) {
        die(json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để bình luận!']));
    }
    $user_id = $_SESSION['user_id'];
    $post_id = (int)$_POST['post_id'];
    $content = $conn->real_escape_string($_POST['commentContent']);

    $stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $post_id, $user_id, $content);
    if ($stmt->execute()) {
        $comment_id = $stmt->insert_id;
        $result = $conn->query("SELECT c.*, t.HoVaTen FROM comments c LEFT JOIN taikhoan t ON c.user_id = t.id WHERE c.id = $comment_id");
        $comment = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'message' => 'Bình luận thành công!',
            'comment' => [
                'id' => $comment['id'],
                'content' => htmlspecialchars($comment['content']),
                'username' => htmlspecialchars($comment['HoVaTen'] ?? 'Người Dùng'),
                'created_at' => date('d/m/Y H:i', strtotime($comment['created_at']))
            ]
        ]);
    } else {
        error_log("SQL Error: " . $stmt->error);
        echo json_encode(['success' => false, 'message' => 'Lỗi khi bình luận!']);
    }
    $stmt->close();
    $conn->close();
    exit();
}

// Xử lý xóa bình luận
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_comment') {
    header('Content-Type: application/json');
    if (!isset($_SESSION['user_id'])) {
        die(json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để xóa bình luận!']));
    }
    $user_id = $_SESSION['user_id'];
    $comment_id = (int)$_POST['comment_id'];

    $check_comment = $conn->prepare("SELECT user_id FROM comments WHERE id = ?");
    $check_comment->bind_param("i", $comment_id);
    $check_comment->execute();
    $comment_result = $check_comment->get_result();
    if ($comment_result->num_rows === 0 || $comment_result->fetch_assoc()['user_id'] !== $user_id) {
        die(json_encode(['success' => false, 'message' => 'Bạn không có quyền xóa bình luận này!']));
    }

    $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
    $stmt->bind_param("i", $comment_id);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Xóa bình luận thành công!']);
    } else {
        error_log("SQL Error: " . $stmt->error);
        echo json_encode(['success' => false, 'message' => 'Lỗi khi xóa bình luận!']);
    }
    $stmt->close();
    $check_comment->close();
    $conn->close();
    exit();
}

// Hiển thị bài viết và bình luận
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$result = $conn->query("
    SELECT p.*, t.HoVaTen,
        (SELECT COUNT(*) FROM likes WHERE post_id = p.id) as like_count,
        (SELECT COUNT(*) FROM likes WHERE post_id = p.id AND user_id = $user_id) as user_liked
    FROM posts p
    LEFT JOIN taikhoan t ON p.user_id = t.id
    ORDER BY p.created_at DESC
");
if (!$result) {
    error_log("SQL Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="shortcut icon" href="asset/image/icon.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cộng Đồng - Bảo Vệ Động Vật</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="congdong.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
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
                        <a href="index.php">Trang chủ</a>
                        <ul>
                            <li><a href="listanimal.php">Danh sách động vật</a></li>
                            <li><a href="page2.php">Chó mèo Việt Nam</a></li>
                        </ul>
                    </li>
                    <li><a href="congdong.php#foot">Liên hệ</a></li>
                    <li><a href="congdong.php" class="active">Cộng đồng</a></li>
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
                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['fullname']); ?> <i class="uil uil-user-circle"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="logout.php">Đăng Xuất</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a class="menu-login" href="dangnhap.php" style="text-decoration: none; color: black"><i class="uil uil-signin"></i>Đăng Nhập</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <div class="content-wrapper">
        <div class="container">
            
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Tìm kiếm bài viết...">
                <button>🔍</button>
            </div>
            <main>
                <section class="post-form">
                    <h2>Chia Sẻ Từ Cộng Đồng</h2>
                    <div class="membership-required" style="display: <?php echo isset($_SESSION['user_id']) ? 'none' : 'block'; ?>;">
                        <p>Bạn cần đăng ký làm thành viên để đăng bài.</p>
                        <p>Vui lòng đăng ký ở form bên cạnh.</p>
                    </div>
                    <div class="welcome-message"><?php echo isset($_SESSION['fullname']) ? "Xin chào, " . htmlspecialchars($_SESSION['fullname']) . "!" : ""; ?></div>
                    <form id="createPostForm" method="POST" enctype="multipart/form-data">
                        <textarea name="postContent" id="postContent" placeholder="Bạn đang nghĩ gì về việc bảo vệ động vật?" required></textarea>
                        <div class="file-input-wrapper">
                            <label for="postImage" class="file-label"><span>Chọn Ảnh</span><small>(Không bắt buộc)</small></label>
                            <input type="file" name="postImage" id="postImage" accept="image/*">
                        </div>
                        <button type="submit">Đăng Bài</button>
                    </form>
                </section>
                <section class="posts" id="postsContainer">
                    <h2>Bài Viết Cộng Đồng</h2>
                    <?php
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='post' data-post-id='{$row['id']}'>";
                            echo "<div class='post-header'>";
                            echo "<div class='avatar'>" . htmlspecialchars(substr($row['HoVaTen'] ?? 'U', 0, 1)) . "</div>";
                            echo "<div class='post-info'>";
                            echo "<h3>" . htmlspecialchars($row['HoVaTen'] ?? 'Người Dùng') . "</h3>";
                            echo "<div class='post-meta'>";
                            echo "<span class='timestamp'>" . date('d/m/Y H:i', strtotime($row['created_at'])) . "</span>";
                            echo "<span class='like-count'>{$row['like_count']} lượt thích</span>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<p>" . htmlspecialchars($row['content']) . "</p>";
                            if ($row['image']) {
                                echo "<img src='" . htmlspecialchars($row['image']) . "' alt='Hình ảnh bài viết'>";
                            }
                            echo "<div class='post-actions'>";
                            $liked_class = $row['user_liked'] > 0 ? 'liked' : '';
                            echo "<button class='like-post-btn $liked_class' data-post-id='{$row['id']}'><i class='fa fa-heart'></i> <span>" . ($row['user_liked'] > 0 ? 'Bỏ thích' : 'Thích') . "</span></button>";
                            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['user_id']) {
                                echo "<button class='delete-post-btn' data-post-id='{$row['id']}'>Xóa bài</button>";
                            }
                            echo "</div>";

                            // Hiển thị bình luận
                            echo "<div class='comments'>";
                            echo "<h4>Bình luận</h4>";
                            $comment_result = $conn->query("
                                SELECT c.*, t.HoVaTen
                                FROM comments c
                                LEFT JOIN taikhoan t ON c.user_id = t.id
                                WHERE c.post_id = {$row['id']}
                                ORDER BY c.created_at DESC
                            ");
                            if ($comment_result && $comment_result->num_rows > 0) {
                                while ($comment = $comment_result->fetch_assoc()) {
                                    echo "<div class='comment' data-comment-id='{$comment['id']}'>";
                                    echo "<p><strong>" . htmlspecialchars($comment['HoVaTen'] ?? 'Người Dùng') . "</strong>: " . htmlspecialchars($comment['content']) . "</p>";
                                    echo "<small>" . date('d/m/Y H:i', strtotime($comment['created_at'])) . "</small>";
                                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment['user_id']) {
                                        echo "<button class='delete-comment-btn' data-comment-id='{$comment['id']}'>Xóa</button>";
                                    }
                                    echo "</div>";
                                }
                            } else {
                                echo "<p>Chưa có bình luận nào.</p>";
                            }

                            // Form bình luận
                            if (isset($_SESSION['user_id'])) {
                                echo "<form class='comment-form' data-post-id='{$row['id']}'>";
                                echo "<textarea name='commentContent' placeholder='Viết bình luận...' required></textarea>";
                                echo "<button type='submit'>Gửi</button>";
                                echo "</form>";
                            } else {
                                echo "<p class='membership-required'>Vui lòng đăng nhập để bình luận!</p>";
                            }
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>Không thể tải bài viết. Vui lòng thử lại sau.</p>";
                    }
                    $conn->close();
                    ?>
                </section>
            </main>
        </div>
    </div>
    <footer class="footer bg-success text-light py-3" id="foot">
        <div class="container">
            <div class="row text-center text-md-start align-items-start gy-3">
                <div class="col-12 col-md-3">
                    <img src="asset/image/logoVip.png" alt="logo" class="img-fluid" style="max-height: 60px;">
                </div>
                <div class="col-12 col-md-3">
                    <h6 class="fw-bold">Thông Tin Liên Lạc</h6>
                    <small><strong>Địa Chỉ:</strong> Ngũ Hành Sơn, TP Đà Nẵng</small><br>
                    <small><strong>SDT:</strong> +84 0384 405 026</small><br>
                    <small><strong>Hotline:</strong> 0978 331 441</small><br>
                    <small><strong>Email:</strong> WLA@gmail.com</small>
                </div>
                <div class="col-12 col-md-3">
                    <h6 class="fw-bold">Đăng ký nhận Bản Tin</h6>
                    <form>
                        <input type="email" class="form-control form-control-sm mb-1" placeholder="Email" required>
                        <input type="text" class="form-control form-control-sm mb-1" placeholder="Tên" required>
                        <button type="submit" class="btn btn-success btn-sm w-100">Đăng Ký</button>
                    </form>
                </div>
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
    <script src="congdong.js"></script>
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="WLA Chatbot"
  agent-id="bb75293d-8026-442b-a90e-0215f674e49d"
  language-code="en"
></df-messenger>
</body>
</html>