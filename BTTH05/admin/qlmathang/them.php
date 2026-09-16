<?php include("../inc/top.php"); ?>

<h4 class="text-info mb-4">Thêm mặt hàng mới</h4>
<form method="post" enctype="multipart/form-data" action="index.php">
    <input type="hidden" name="action" value="xulythem">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Tên mặt hàng</label>
            <input type="text" class="form-control" name="txttenmathang" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Danh mục</label>
            <select class="form-select" name="optdanhmuc">
                <?php foreach($danhmuc as $d): ?>
                    <option value="<?php echo $d['id']; ?>"><?php echo $d['tendanhmuc']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Giá gốc</label>
            <input type="number" class="form-control" name="txtgiagoc" value="0" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Giá bán</label>
            <input type="number" class="form-control" name="txtgiaban" value="0" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Số lượng tồn</label>
            <input type="number" class="form-control" name="txtsoluongton" value="0" required>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Hình ảnh</label>
        <input type="file" class="form-control" name="filehinhanh" required>
    </div>
    <div class="mb-4">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control" name="txtmota" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-info text-white">Lưu mặt hàng</button>
    <a href="index.php" class="btn btn-secondary">Hủy bỏ</a>
</form>

<?php include("../inc/bottom.php"); ?>