<?php
// Thông tin kết nối database
define('DB_HOST', 'localhost');
define('DB_NAME', 'wla_donation');
define('DB_USER', 'root'); // Thay bằng username của bạn
define('DB_PASS', ''); // Thay bằng password của bạn

// Hàm kết nối database
function connectDB() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        die("Lỗi kết nối database: " . $e->getMessage());
    }
}

// Test kết nối
try {
    $pdo = connectDB();
    echo "Kết nối database thành công!";
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
?>