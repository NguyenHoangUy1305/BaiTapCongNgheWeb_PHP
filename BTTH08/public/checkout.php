<?php include("inc/top.php"); ?>

<div class="row my-4">
    <div class="col-md-6">
        <h3 class="text-info mb-4">Vui lòng nhập đầy đủ thông tin</h3>
        <h5 class="text-secondary border-bottom pb-2">Thông tin khách hàng</h5>
        
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="luudonhang">
            
            <div class="mb-3">
                <label class="form-label text-muted">Email</label>
                <input type="email" class="form-control bg-light" name="txtemail" value="<?php if(isset($_SESSION['nguoidung'])) echo $_SESSION['nguoidung']['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted">Họ tên</label>
                <input type="text" class="form-control bg-light" name="txthoten" value="<?php if(isset($_SESSION['nguoidung'])) echo $_SESSION['nguoidung']['hoten']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted">Số điện thoại</label>
                <input type="number" class="form-control bg-light" name="txtsodienthoai" value="<?php if(isset($_SESSION['nguoidung'])) echo $_SESSION['nguoidung']['sodienthoai']; ?>" required>
            </div>
            <div class="mb-4">
                <label class="form-label text-muted">Địa chỉ giao hàng</label>
                <textarea class="form-control" name="txtdiachi" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4">Hoàn tất đơn hàng</button>
        </form>
    </div>
    
    <div class="col-md-6 ps-md-5">
        <h5 class="text-info border-bottom pb-2 mt-4 mt-md-0">Thông tin đơn hàng</h5>
        <div class="table-responsive bg-light p-3 rounded">
            <table class="table table-borderless align-middle">
                <tr class="border-bottom">
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>SL</th>
                    <th class="text-end">Thành tiền</th>
                </tr>
                <?php foreach ($giohang as $id => $mh): ?>
                <tr>
                    <td>
                        <img src="../<?php echo $mh["hinhanh"]; ?>" width="40" class="me-2 img-thumbnail">
                        <small><?php echo $mh["tenmathang"]; ?></small>
                    </td>
                    <td><?php echo number_format($mh["giaban"], 0, ',', '.'); ?>đ</td>
                    <td><?php echo $mh["soluong"]; ?></td>
                    <td class="text-end fw-bold"><?php echo number_format($mh["thanhtien"], 0, ',', '.'); ?>đ</td>
                </tr>
                <?php endforeach; ?>
                <tr class="border-top">
                    <td colspan="3" class="text-end fw-bold fs-5 pt-3">Tổng tiền:</td>
                    <td class="text-end text-danger fw-bold fs-5 pt-3"><?php echo number_format(tinhtiengiohang(), 0, ',', '.'); ?>đ</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include("inc/bottom.php"); ?>