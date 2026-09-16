<?php include("../inc/top.php"); ?>
<h4 class="text-info mb-4">Thêm người dùng mới</h4>
<form method="post" action="index.php" class="w-50">
    <input type="hidden" name="action" value="xulythem">
    <div class="mb-3">
        <label>Email</label>
        <input class="form-control" type="email" name="txtemail" required>
    </div>
    <div class="mb-3">
        <label>Mật khẩu</label>
        <input class="form-control" type="password" name="txtmatkhau" required>
    </div>
    <div class="mb-3">
        <label>Họ tên</label>
        <input class="form-control" type="text" name="txthoten" required>
    </div>
    <div class="mb-3">
        <label>Số điện thoại</label>
        <input class="form-control" type="number" name="txtdienthoai" required>
    </div>
    <div class="mb-3">
        <label>Quyền hạn</label>
        <select class="form-select" name="optloai">
            <option value="1">Quản trị viên</option>
            <option value="2" selected>Nhân viên</option>
            <option value="3">Khách hàng</option>
        </select>
    </div>
    <input type="submit" value="Thêm mới" class="btn btn-success">
</form>
<?php include("../inc/bottom.php"); ?>