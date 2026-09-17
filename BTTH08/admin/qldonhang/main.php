<?php include("../inc/top.php"); ?>

<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
        <h3 class="text-info m-0">Quản lý đơn hàng</h3>
    </div>

    <div class="table-responsive bg-white rounded shadow-sm p-3">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="table-light text-secondary">
                    <th>#</th>
                    <th>Khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($donhang) && count($donhang) > 0): ?>
                    <?php foreach($donhang as $index => $dh): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td>
                            <div class="fw-semibold"><?php echo $dh["hoten"] ?? "Khách hàng"; ?></div>
                            <div class="small text-muted"><?php echo $dh["email"] ?? ""; ?></div>
                        </td>
                        <td class="text-secondary"><?php echo $dh["diachi"] ?? "Chưa cập nhật"; ?></td>
                        <td class="text-secondary"><?php echo date("d/m/Y", strtotime($dh["ngay"])); ?></td>
                        <td class="text-secondary"><?php echo $dh["tongsoluong"] ?? 0; ?></td>
                        <td class="fw-semibold text-danger"><?php echo number_format($dh["tongtien"] ?? 0, 0, ",", "."); ?>₫</td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Chưa có đơn hàng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../inc/bottom.php"); ?>
