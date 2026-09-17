<?php include("../inc/top.php"); ?>

<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
        <h3 class="text-info m-0">Quản lý khách hàng</h3>
    </div>

    <div class="table-responsive bg-white rounded shadow-sm p-3">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="table-light text-secondary">
                    <th>#</th>
                    <th>Email</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($khachhang) && count($khachhang) > 0): ?>
                    <?php foreach($khachhang as $index => $kh): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td class="text-secondary"><?php echo $kh["email"]; ?></td>
                        <td class="text-secondary"><?php echo $kh["hoten"]; ?></td>
                        <td class="text-secondary"><?php echo $kh["sodienthoai"]; ?></td>
                        <td>
                            <?php if($kh["trangthai"] == 1): ?>
                                <span class="badge bg-success">Kích hoạt</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Khóa</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Chưa có khách hàng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../inc/bottom.php"); ?>
