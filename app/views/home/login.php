<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập MVC</title>
</head>
<body>
    
    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <h3 style="color: red;">Thông báo lỗi: Sai tên đăng nhập hoặc mật khẩu!</h3>
    <?php endif; ?>

    <form action="" method="POST">
        <br>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <br>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <br>
        <div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Ghi nhớ đăng nhập</label>
        </div>
        <br>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>

</body>
</html>