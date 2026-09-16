<?php include("../inc/top.php"); ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-info m-0">Danh sách mặt hàng</h4> 
    <a href="index.php?action=them" class="btn btn-info text-white">Thêm mặt hàng mới</a>
</div>

<table class="table table-hover align-middle">
    <tr class="table-light">
        <th>Tên mặt hàng</th>
        <th>Giá bán</th>
        <th>Số lượng</th>
        <th>Hình ảnh</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php foreach ($mathang as $m): ?>
        <tr>
            <!-- Giới hạn độ dài tên tránh bị tràn -->
            <td style="max-width: 250px;" class="text-truncate" title="<?php echo $m["tenmathang"]; ?>">
                <?php echo $m["tenmathang"]; ?>
            </td>
            <td class="text-danger fw-bold"><?php echo number_format($m["giaban"], 0, ',', '.'); ?>đ</td>
            <td><?php echo $m["soluongton"]; ?></td>
            <td>
                <!-- Đường dẫn ảnh lùi ra 2 cấp (../../) để về thư mục gốc rồi trỏ vào hình -->
                <img src="../../<?php echo $m["hinhanh"]; ?>" width="60" class="img-thumbnail" alt="<?php echo $m["tenmathang"]; ?>">
            </td>
            <td><a class="btn btn-warning btn-sm" href="index.php?action=sua&id=<?php echo $m["id"]; ?>">Sửa</a></td>
            <td><a class="btn btn-danger btn-sm" href="index.php?action=xoa&id=<?php echo $m["id"]; ?>">Xóa</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include("../inc/bottom.php"); ?>