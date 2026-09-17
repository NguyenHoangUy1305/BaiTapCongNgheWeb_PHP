<?php include("inc/top.php"); ?>

<?php if (demhangtronggio() == 0): ?>
    <div class="text-center my-5">
        <h3 class="text-info">Giỏ hàng rỗng!</h3>
        <p>Vui lòng chọn sản phẩm để thêm vào giỏ hàng...</p>
        <a href="index.php" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
    </div>
<?php else: ?>
    <h3 class="text-info mb-4">Giỏ hàng của bạn:</h3>
    <form action="index.php" method="post">
        <div class="table-responsive shadow-sm bg-white rounded p-3 mb-4">
            <table class="table table-hover align-middle">
                <tr class="table-light">
                    <th>Hình ảnh</th>
                    <th>Tên hàng</th>
                    <th>Đơn giá</th>
                    <th width="100px">Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php foreach ($giohang as $id => $mh): ?>
                <tr>
                    <td><img width="50" src="../<?php echo $mh["hinhanh"]; ?>" class="img-thumbnail"></td>
                    <td><?php echo $mh["tenmathang"]; ?></td>
                    <td><?php echo number_format($mh["giaban"], 0, ',', '.'); ?>đ</td>
                    <td>
                        <input type="number" class="form-control" name="mh[<?php echo $id; ?>]" value="<?php echo $mh["soluong"]; ?>" min="0">
                    </td>
                    <td class="text-danger fw-bold"><?php echo number_format($mh["thanhtien"], 0, ',', '.'); ?>đ</td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"></td>
                    <td class="fw-bold fs-5 text-end">Tổng tiền:</td>
                    <td class="text-danger fw-bold fs-5"><?php echo number_format(tinhtiengiohang(), 0, ',', '.'); ?>đ</td>
                </tr>
            </table>
        </div>
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="index.php?action=xoagiohang" class="text-danger text-decoration-none fw-bold" onclick="return confirm('Bạn chắc chắn muốn xóa toàn bộ giỏ hàng?');">Xóa tất cả</a>
                <span class="text-muted d-block small">(Lưu ý: Để xóa một mặt hàng, hãy nhập số lượng = 0 và bấm Cập nhật)</span>
            </div>
            <div class="col-md-6 text-end">
                <input type="hidden" name="action" value="capnhatgio">
                <input type="submit" class="btn btn-warning px-4 me-2" value="Cập nhật">
                <a href="index.php?action=thanhtoan" class="btn btn-success px-5">Thanh toán</a>
            </div>
        </div>
    </form>
<?php endif; ?>

<?php include("inc/bottom.php"); ?>