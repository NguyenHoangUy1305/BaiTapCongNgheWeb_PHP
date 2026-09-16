<?php include("../inc/top.php"); ?>
<div class="row">
    <div class="col-12 col-md-8 m-auto">
        <div class="card p-4">
            <h4 class="text-info text-center mb-4">HỒ SƠ NGƯỜI DÙNG</h4>
            <form method="post" enctype="multipart/form-data" action="index.php">
                <input type="hidden" name="txtid" value="<?php echo $_SESSION["nguoidung"]["id"]; ?>">
                <input type="hidden" name="txthinhanh" value="<?php echo $_SESSION["nguoidung"]["hinhanh"]; ?>">
                <input type="hidden" name="action" value="xlhoso">
                
                <div class="text-center mb-4">
                    <?php $avt = ($_SESSION["nguoidung"]["hinhanh"] == NULL) ? "../../images/users/user.png" : "../../images/users/" . $_SESSION["nguoidung"]["hinhanh"]; ?>
                    <img class="img-thumbnail rounded-circle" src="<?php echo $avt; ?>" width="120px" height="120px" style="object-fit:cover;">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="txtemail" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input class="form-control" type="number" name="txtdienthoai" value="<?php echo $_SESSION["nguoidung"]["sodienthoai"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Họ tên</label>
                    <input class="form-control" type="text" name="txthoten" value="<?php echo $_SESSION["nguoidung"]["hoten"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Đổi hình đại diện</label>
                    <input class="form-control" type="file" name="fhinh">
                </div>
                <div class="text-center">
                    <input class="btn btn-primary" type="submit" value="Cập nhật">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>