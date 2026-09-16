<?php include("../inc/top.php"); ?>

<h4 class="text-info">Cập nhật mặt hàng</h4>
<form method="post" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="action" value="xulysua">
    <input type="hidden" name="txtid" value="<?php echo $m["id"]; ?>">
    
    <div class="my-3">
        <label>Danh mục sản xuất</label>
        <select class="form-select" name="optdanhmuc">
            <?php foreach ($danhmuc as $dm): ?>  
                <option value="<?php echo $dm["id"]; ?>" <?php if ($dm["id"] == $m["danhmuc_id"]) echo "selected"; ?>>
                    <?php echo $dm["tendanhmuc"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="my-3">
        <label>Tên mặt hàng</label>
        <input class="form-control" type="text" name="txttenhang" required value="<?php echo $m["tenmathang"]; ?>">
    </div>
    
    <div class="my-3">
        <label>Mô tả</label>
        <textarea class="form-control" name="txtmota" id="txtmota"><?php echo $m["mota"]; ?></textarea>
    </div>
    
    <div class="row">
        <div class="col-md-4 my-3">
            <label>Giá gốc</label>
            <input class="form-control" type="number" name="txtgiagoc" value="<?php echo $m["giagoc"]; ?>" required>
        </div>
        <div class="col-md-4 my-3">
            <label>Giá bán</label>
            <input class="form-control" type="number" name="txtgiaban" value="<?php echo $m["giaban"]; ?>" required>
        </div>
        <div class="col-md-4 my-3">
            <label>Số lượng tồn</label>
            <input class="form-control" type="number" name="txtsoluongton" value="<?php echo $m["soluongton"]; ?>" required>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 my-3">
            <label>Lượt xem</label>
            <input class="form-control" type="number" name="txtluotxem" value="<?php echo $m["luotxem"]; ?>" required>
        </div>
        <div class="col-md-6 my-3">
            <label>Lượt mua</label>
            <input class="form-control" type="number" name="txtluotmua" value="<?php echo $m["luotmua"]; ?>" required>
        </div>
    </div>
    
    <div class="my-3 border p-3 bg-light">
        <label class="form-label fw-bold">Hình ảnh</label><br>
        <input type="hidden" name="txthinhcu" value="<?php echo $m["hinhanh"]; ?>">
        <div class="mb-2">
            <img src="../../<?php echo $m["hinhanh"]; ?>" width="100" class="img-thumbnail">
            <span class="text-muted ms-2">(Hình ảnh hiện tại)</span>
        </div>
        <input type="file" class="form-control" name="filehinhanh">
        <small class="text-danger">* Chỉ chọn file nếu bạn muốn thay đổi ảnh khác</small>
    </div>
    
    <div class="my-3">
        <input class="btn btn-primary" type="submit" value="Lưu">
        <input class="btn btn-warning" type="reset" value="Hủy">
        <a href="index.php" class="btn btn-secondary">Trở về</a>
    </div>
</form>

<!-- Tích hợp CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#txtmota'))
        .catch(error => {
            console.error(error);
        });
</script>

<?php include("../inc/bottom.php"); ?>