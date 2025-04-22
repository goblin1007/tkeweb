<?php
$loginError = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($username === 'admin' && $password === '123456') {
        header("Location: giaodien.php");
        exit();
    } else {
        $loginError = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Đăng nhập - Trường Đại Học Thương Mại</title>
    <link rel="stylesheet" href="css/login.css">
    
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <div>
                <div class="login-header">
                    <img src="https://upload.wikimedia.org/wikipedia/vi/2/2a/Logo_%C4%90%E1%BA%A1i_h%E1%BB%8dc_Th%C6%B0%C6%A1ng_m%E1%BA%A1i.jpg" alt="Logo trường" class="logo">
                    <h1>TRƯỜNG ĐẠI HỌC THƯƠNG MẠI</h1>
                    <div class="subtitle">Hệ thống Quản lý</div>
                </div>

                <?php if (!empty($loginError)): ?>
                    <div class="error"><?= $loginError ?></div>
                <?php endif; ?>

                <form method="POST" class="login-form">
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <div class="input-group">
                            <span class="icon">👤</span>
                            <input type="text" name="username" placeholder="Nhập tên đăng nhập" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <div class="input-group">
                            <span class="icon">🔒</span>
                            <input type="password" name="password" placeholder="Nhập mật khẩu" required>
                            <span class="toggle-password" onclick="togglePassword(this)">👁</span>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember">
                            <input type="checkbox"> Ghi nhớ đăng nhập
                        </label>
                        <a href="#" class="forgot">Quên mật khẩu?</a>
                    </div>

                    <button type="submit" class="login-button">Đăng nhập</button>
                </form>
            </div>

            <div class="login-footer">
                <?= date("Y-m-d H:i:s") ?> (UTC)<br>
                &copy; 2025 Trường Đại học Thương mại. All rights reserved.
            </div>
        </div>
    </div>

    <script>
        function togglePassword(el) {
            const input = el.previousElementSibling;
            if (input.type === "password") {
                input.type = "text";
                el.textContent = "🙈";
            } else {
                input.type = "password";
                el.textContent = "👁";
            }
        }
    </script>
</body>
</html>
