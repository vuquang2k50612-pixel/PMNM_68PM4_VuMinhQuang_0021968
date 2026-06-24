<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">THÊM MỚI SINH VIÊN</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Mã Sinh Viên (MSSV):</label>
                        <input type="text" name="mssv" class="form-control" required placeholder="Ví dụ: 0021968">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Họ và Tên:</label>
                        <input type="text" name="name" class="form-control" required placeholder="Nhập họ và tên...">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Lớp (Tên Lớp cũ):</label>
                        <input type="text" name="class" class="form-control" required placeholder="Ví dụ: 68PM4">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Mã Lớp Học (Database):</label>
                        <select name="malop" class="form-select" required>
                            <option value="">-- Chọn Mã Lớp --</option>
                            <?php foreach ($dataLopHoc ?? [] as $lop): ?>
                                <option value="<?= htmlspecialchars($lop['malop']) ?>">
                                    <?= htmlspecialchars($lop['tenlop']) ?> (<?= htmlspecialchars($lop['malop']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success fw-bold px-4">Lưu Sinh Viên</button>
                    <a href="/PMNM_68PM4_VUMINHQUANG_0021968/public/sinhvien" class="btn btn-secondary ms-2">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>