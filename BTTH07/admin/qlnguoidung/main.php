<?php include("../inc/top.php"); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-info m-0">Quản lý người dùng</h4> 
    <a href="index.php?action=them" class="btn btn-info text-white">Thêm người dùng</a>
</div>

<table class="table table-hover align-middle text-center">
    <tr class="table-light">
        <th>Email</th>
        <th>Họ tên</th>
        <th>Số điện thoại</th>
        <th>Loại quyền</th>
        <th>Trạng thái</th>
    </tr>
    <?php foreach ($nguoidung as $n): ?>
    <tr>
        <td><?php echo $n["email"]; ?></td>
        <td><?php echo $n["hoten"]; ?></td>
        <td><?php echo $n["sodienthoai"]; ?></td>
        <td>
            <?php 
                if($n["loai"]==1) echo "<span class='badge bg-danger'>Quản trị</span>"; 
                elseif($n["loai"]==2) echo "<span class='badge bg-warning'>Nhân viên</span>"; 
                else echo "<span class='badge bg-secondary'>Khách hàng</span>"; 
            ?>
            <br>
            <?php if($n["loai"] != 3 && $n["id"] != $_SESSION["nguoidung"]["id"]): ?>
                <?php if($n["loai"]==1): ?>
                    <a href="?action=doiquyen&email=<?php echo $n["email"]; ?>&loai=2" class="small text-decoration-none">Hạ quyền</a>
                <?php else: ?>
                    <a href="?action=doiquyen&email=<?php echo $n["email"]; ?>&loai=1" class="small text-decoration-none">Nâng cấp</a>
                <?php endif; ?>
            <?php endif; ?>
        </td>
        <td>
            <?php if($n["trangthai"]==1) echo "<span class='text-success'>Kích hoạt</span>"; else echo "<span class='text-danger'>Khóa</span>"; ?>
            <br>
            <!-- Chỉ cho phép khóa Nhân viên và Khách hàng, không tự khóa chính mình -->
            <?php if($n["loai"] != 1 && $n["id"] != $_SESSION["nguoidung"]["id"]): ?>
                <?php if($n["trangthai"]==1): ?>
                    <a href="?action=khoa&id=<?php echo $n["id"]; ?>&trangthai=0" class="btn btn-sm btn-outline-danger mt-1">Khóa</a>
                <?php else: ?>
                    <a href="?action=khoa&id=<?php echo $n["id"]; ?>&trangthai=1" class="btn btn-sm btn-outline-success mt-1">Mở</a>
                <?php endif; ?>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include("../inc/bottom.php"); ?>