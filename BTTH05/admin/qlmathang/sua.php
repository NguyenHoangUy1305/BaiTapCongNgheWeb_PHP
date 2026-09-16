<?php include("../inc/top.php"); ?>

<h4 class="text-info mb-4">Cập nhật mặt hàng</h4>
<form method="post" enctype="multipart/form-data" action="index.php">
    <input type="hidden" name="action" value="xulysua">
    <input type="hidden" name="txtid" value="<?php echo $mhct['id']; ?>">
    <input type="hidden" name="hinhanh_cu" value="<?php echo $mhct['hinhanh']; ?>">
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Tên mặt hàng</label>
            <input type="text" class="form-control" name="txttenmathang" value="<?php echo $mhct['tenmathang']; ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Danh mục</label>
            <select class="form-select" name="optdanhmuc">
                <?php foreach($danhmuc as $d): ?>
                    <option value="<?php echo $d['id']; ?>" <?php if($d['id'] == $mhct['danhmuc_id']) echo 'selected'; ?>>
                        <?php echo $d['tendanhmuc']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Giá gốc</label>
            <input type="number" class="form-control" name="txtgiagoc" value="<?php echo $mhct['giagoc']; ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Giá bán</label>
            <input type="number" class="form-control" name="txtgiaban" value="<?php echo $mhct['giaban']; ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Số lượng tồn</label>
            <input type="number" class="form-control" name="txtsoluongton" value="<?php echo $mhct['soluongton']; ?>" required>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Hình ảnh mới (Để trống nếu không muốn đổi ảnh)</label>
        <input type="file" class="form-control" name="filehinhanh">
        <div class="mt-2">
            <img src="../../<?php echo $mhct['hinhanh']; ?>" width="100" class="img-thumbnail">
        </div>
    </div>
    <div class="mb-4">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control" name="txtmota" rows="4"><?php echo $mhct['mota']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-warning">Lưu thay đổi</button>
    <a href="index.php" class="btn btn-secondary">Hủy bỏ</a>
</form>

<?php include("../inc/bottom.php"); ?>