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
    <div style="text-align: center; margin-bottom: 20px;">
    <a href="/PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien/create" 
       style="padding: 10px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
        + Thêm Mới Sinh Viên
    </a>
</div>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Sinh Viên</th>
                <th>Họ và Tên</th>
                <th>Lớp</th>
                <th>Sửa</th> </tr>
        </thead>
        <tbody>
            <?php if (!empty($dataSinhVien)): ?>
                <?php $stt = 1; foreach($dataSinhVien as $sv): ?>
                    <tr>
                        <td><?= $stt++ ?></td>
                        <td><?= htmlspecialchars($sv['mssv']) ?></td>
                        <td><?= htmlspecialchars($sv['name']) ?></td>
                        <td><?= htmlspecialchars($sv['class']) ?></td>
                        
                        <td>
                            <a href="/PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien/edit?id=<?= htmlspecialchars($sv['mssv']) ?>" 
                               style="background-color: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-weight: bold;">Sửa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có dữ liệu sinh viên</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div style="margin-top: 20px; text-align: center;">
        <?php if (isset($totalPages) && $totalPages > 1): ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" 
                   style="padding: 8px 12px; margin: 0 5px; text-decoration: none; border: 1px solid #007bff; border-radius: 4px;
                   <?= ($i == $page) ? 'background-color: #007bff; color: white;' : 'background-color: white; color: #007bff;' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        <?php endif; ?>
    </div>

</body>
</html>