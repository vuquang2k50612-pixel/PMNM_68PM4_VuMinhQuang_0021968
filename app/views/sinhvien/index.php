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
    <form method="GET" action="/PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien" style="text-align: center; margin-bottom: 20px;">
        <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Nhập MSSV hoặc Họ tên...">
        <select name="malop">
            <option value="">-- Tất cả lớp --</option>
            <?php foreach ($dataLopHoc ?? [] as $lop): ?>
                <option value="<?= htmlspecialchars($lop['malop']) ?>" <?= (isset($_GET['malop']) && $_GET['malop'] == $lop['malop']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($lop['tenlop']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" style="padding: 5px 10px;">Tìm kiếm / Lọc</button>
        <select name="pageSize" onchange="this.form.submit()">
            <option value="5" <?= (isset($_GET['pageSize']) && $_GET['pageSize'] == 5) ? 'selected' : '' ?>>5 dòng/trang</option>
            <option value="10" <?= (isset($_GET['pageSize']) && $_GET['pageSize'] == 10) ? 'selected' : '' ?>>10 dòng/trang</option>
            <option value="20" <?= (isset($_GET['pageSize']) && $_GET['pageSize'] == 20) ? 'selected' : '' ?>>20 dòng/trang</option>
        </select>
    </form>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="/PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien/create" 
           style="padding: 10px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
            + Thêm Mới Sinh Viên
        </a>
    </div>

    <table class="table table-hover table-bordered table-striped shadow-sm bg-white">
        <thead>
        <tr>
            <th>STT</th>
            <?php 
                $nextDir = (isset($_GET['dir']) && $_GET['dir'] == 'ASC') ? 'DESC' : 'ASC';
                $curSearch = htmlspecialchars($_GET['search'] ?? '');
                $curLop = htmlspecialchars($_GET['malop'] ?? '');
            ?>
            <th>
                <a href="?search=<?= $curSearch ?>&malop=<?= $curLop ?>&sort=mssv&dir=<?= $nextDir ?>" style="color: white; text-decoration: none;">
                    Mã Sinh Viên ↕
                </a>
            </th>
            <th>
                <a href="?search=<?= $curSearch ?>&malop=<?= $curLop ?>&sort=name&dir=<?= $nextDir ?>" style="color: white; text-decoration: none;">
                    Họ và Tên ↕
                </a>
            </th>
            <th>Lớp</th>
            <th>Mã Lớp</th>
            <th>Hành động</th> 
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
                        <td><?= htmlspecialchars($sv['malop'] ?? '') ?></td>
                        
                        <td>
                            <a href="/PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien/edit?id=<?= htmlspecialchars($sv['mssv']) ?>" 
                               style="background-color: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-weight: bold;">Sửa</a>
                            
                            <a href="/PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien/delete?id=<?= htmlspecialchars($sv['mssv']) ?>" 
                               onclick="return confirm('Cậu có chắc chắn muốn xóa sinh viên này không?');"
                               style="background-color: #dc3545; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-weight: bold; margin-left: 5px;">Xóa</a>
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