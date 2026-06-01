<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Sinh Viên</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { text-align: center; color: #333; }
        table { width: 80%; margin: 0 auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>

    <h2>DANH SÁCH SINH VIÊN</h2>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Sinh Viên</th>
                <th>Họ và Tên</th>
                <th>Lớp</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dataSinhVien)): ?>
                <?php $stt = 1; foreach($dataSinhVien as $sv): ?>
                    <tr>
                        <td><?= $stt++ ?></td>
                        <td><?= htmlspecialchars($sv['mssv']) ?></td>
                        <td><?= htmlspecialchars($sv['name']) ?></td>
                        <td><?= htmlspecialchars($sv['class']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Không có dữ liệu sinh viên nào trong CSDL.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>