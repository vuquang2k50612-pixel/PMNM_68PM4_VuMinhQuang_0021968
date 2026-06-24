<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="card shadow-lg" style="width: 400px; border-radius: 10px;">
        <div class="card-header bg-primary text-white text-center py-3">
            <h4 class="mb-0">ĐĂNG NHẬP HỆ THỐNG</h4>
        </div>
        <div class="card-body p-4">
            <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                <div class="alert alert-danger text-center">Sai tên đăng nhập hoặc mật khẩu!</div>
            <?php endif; ?>

            <form action="/PMNM_68PM4_VUMINHQUANG_0021968/public/auth/login" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Tài khoản</label>
                    <input type="text" name="username" id="username" class="form-control" required placeholder="Nhập tài khoản...">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Nhập mật khẩu...">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 fw-bold">ĐĂNG NHẬP</button>
            </form>
        </div>
    </div>

</body>
</html>