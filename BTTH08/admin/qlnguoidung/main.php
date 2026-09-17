<?php include("../inc/top.php"); ?>

<div class="container-fluid p-0">
    <!-- Tiêu đề và nút Thêm -->
    <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
        <h3 class="text-info m-0">Quản lý người dùng</h3>
        <a href="index.php?action=them" class="btn btn-info text-white">Thêm người dùng</a>
    </div>

    <!-- Thông báo lỗi nếu có -->
    <?php if(isset($tb)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Thông báo!</strong> <?php echo $tb; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <!-- Bảng danh sách người dùng -->
    <div class="table-responsive bg-white rounded shadow-sm p-3">
        <table class="table table-hover align-middle text-center mb-0">
            <thead>
                <tr class="table-light text-secondary">
                    <th class="py-3"><a href="index.php?sort=email" class="text-decoration-none text-dark fw-bold">Email</a></th>
                    <th class="py-3"><a href="index.php?sort=hoten" class="text-decoration-none text-dark fw-bold">Họ tên</a></th>
                    <th class="py-3"><a href="index.php?sort=sodienthoai" class="text-decoration-none text-dark fw-bold">Số điện thoại</a></th>
                    <th class="py-3"><a href="index.php?sort=loai" class="text-decoration-none text-dark fw-bold">Loại quyền</a></th>
                    <th class="py-3">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nguoidung as $nd): ?>
                <tr>
                    <td class="text-secondary"><?php echo $nd["email"]; ?></td>
                    <td class="text-secondary"><?php echo $nd["hoten"]; ?></td>
                    <td class="text-secondary"><?php echo $nd["sodienthoai"]; ?></td>
                    
                    <!-- CỘT LOẠI QUYỀN -->
                    <td>
                        <?php if($nd["loai"] == 1): ?>
                            <span class="badge bg-danger px-2 py-1">Quản trị</span>
                        <?php elseif($nd["loai"] == 2): ?>
                            <span class="badge bg-warning text-white px-2 py-1 mb-1">Nhân viên</span><br>
                            <!-- Chỉ hiện nút nâng cấp nếu không phải tài khoản đang đăng nhập -->
                            <?php if($nd["id"] != $_SESSION["nguoidung"]["id"]): ?>
                                <a href="?action=doiquyen&email=<?php echo $nd["email"]; ?>&loai=1" class="small text-decoration-none">Nâng cấp</a>
                            <?php endif; ?>
                        <?php else: ?>
                            <span class="badge bg-secondary px-2 py-1">Khách hàng</span>
                        <?php endif; ?>
                    </td>
                    
                    <!-- CỘT TRẠNG THÁI (Gộp chữ trạng thái và nút bấm) -->
                    <td>
                        <?php if($nd["trangthai"] == 1): ?>
                            <div class="text-success mb-1" style="color: #20c997 !important;">Kích hoạt</div>
                            
                            <!-- Ẩn nút khóa đối với Quản trị viên (loại 1) và tài khoản đang đăng nhập -->
                            <?php if($nd["loai"] != 1 && $nd["id"] != $_SESSION["nguoidung"]["id"]): ?>
                                <a href="?action=khoa&trangthai=0&mand=<?php echo $nd["id"]; ?>" class="btn btn-sm btn-outline-danger" style="font-size: 0.8rem; padding: 2px 15px;">Khóa</a>
                            <?php endif; ?>
                            
                        <?php else: ?>
                            <div class="text-danger mb-1">Khóa</div>
                            
                            <!-- Hiện nút Mở khóa nếu tài khoản đang bị khóa -->
                            <?php if($nd["loai"] != 1 && $nd["id"] != $_SESSION["nguoidung"]["id"]): ?>
                                <a href="?action=khoa&trangthai=1&mand=<?php echo $nd["id"]; ?>" class="btn btn-sm btn-outline-success" style="font-size: 0.8rem; padding: 2px 10px;">Kích hoạt</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../inc/bottom.php"); ?>