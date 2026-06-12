<h2>SỬA THÔNG TIN SINH VIÊN</h2>

<?php if (!$sv): ?>
    <p style="color: red;">Không tìm thấy sinh viên này!</p>
    <a href="/PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien">Quay lại danh sách</a>
<?php else: ?>

<form action="" method="POST">
    <div>
        <label>Mã Sinh Viên (MSSV):</label><br>
        <input type="text" name="mssv" value="<?= htmlspecialchars($sv['mssv']) ?>" readonly style="background-color: #e9ecef;">
    </div>
    <br>
    <div>
        <label>Họ và Tên:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($sv['name']) ?>" required>
    </div>
    <br>
    <div>
        <label>Lớp:</label><br>
        <input type="text" name="class" value="<?= htmlspecialchars($sv['class']) ?>" required>
    </div>
    <br>
    <button type="submit" style="background-color: #ffc107; padding: 10px; font-weight: bold;">Cập Nhật</button>
    <a href="/PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien" style="margin-left: 10px; color: red; text-decoration: none;">❌ Hủy bỏ</a>
</form>

<?php endif; ?>