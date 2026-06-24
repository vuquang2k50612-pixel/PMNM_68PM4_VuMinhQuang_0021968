<!DOCTYPE html>
<html lang="vi">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body { background-color: #f8f9fa; }
</style>
<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { width: 80%; margin: auto; }
        .header { background: #007bff; color: white; padding: 10px; text-align: center; }
        .content { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>HỆ THỐNG QUẢN LÝ SINH VIÊN</h1>
        </div>
        <div class="content">
            <?php require_once __DIR__ . '/../' . $viewname . '.php'; ?>
        </div>
    </div>
</body>
</html>