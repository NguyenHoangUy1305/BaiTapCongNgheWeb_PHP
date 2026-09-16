<?php include("../inc/top.php"); ?>

<h4 class="text-info">Thêm mặt hàng mới</h4>
<form method="post" enctype="multipart/form-data" action="index.php">
    <input type="hidden" name="action" value="xulythem">
    
    <div class="mb-3 mt-3">
        <label for="optdanhmuc" class="form-label">Danh mục sản xuất</label>
        <select class="form-select" name="optdanhmuc">
            <?php foreach ($danhmuc as $d): ?>
                <option value="<?php echo $d["id"]; ?>"><?php echo $d["tendanhmuc"]; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="mb-3 mt-3">
        <label for="txttenmathang" class="form-label">Tên mặt hàng</label>
        <input class="form-control" type="text" name="txttenmathang" placeholder="Nhập tên" required>
    </div>
    
    <div class="row">
        <div class="col-md-4 mb-3 mt-3">
            <label for="txtgianhap" class="form-label">Giá gốc (nhập)</label>
            <input class="form-control" type="number" name="txtgianhap" value="0">
        </div>
        <div class="col-md-4 mb-3 mt-3">
            <label for="txtgiaban" class="form-label">Giá bán</label>
            <input class="form-control" type="number" name="txtgiaban" value="0">
        </div>
        <div class="col-md-4 mb-3 mt-3">
            <label for="txtsoluong" class="form-label">Số lượng tồn</label>
            <input class="form-control" type="number" name="txtsoluong" value="0">
        </div>
    </div>
    
    <div class="mb-3 mt-3">
        <label for="txtmota" class="form-label">Mô tả</label>
        <textarea id="txtmota" rows="5" class="form-control" name="txtmota" placeholder="Nhập mô tả"></textarea>
    </div>
    
    <div class="mb-3 mt-3">
        <label>Hình ảnh</label> 
        <input class="form-control" type="file" name="filehinhanh" required>
    </div>
    
    <div class="mb-3 mt-4">
        <input type="submit" value="Lưu" class="btn btn-success"> 
        <input type="reset" value="Hủy" class="btn btn-warning">
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