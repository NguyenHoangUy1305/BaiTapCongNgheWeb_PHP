<?php include("../inc/top.php"); ?>
<div class="row">
    <div class="col-12 col-md-6 m-auto">
        <div class="card p-4">
            <h4 class="text-info text-center mb-4">ĐỔI MẬT KHẨU</h4>
            <?php if(isset($thongbao)) echo "<div class='alert alert-info'>$thongbao</div>"; ?>
            <form method="post" action="index.php">
                <input type="hidden" name="action" value="xldoimatkhau">
                <div class="mb-3">
                    <label class="form-label">Mật khẩu cũ</label>
                    <input class="form-control" type="password" name="txtmatkhaucu" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu mới</label>
                    <input class="form-control" type="password" name="txtmatkhaumoi" required>
                </div>
                <div class="text-center">
                    <input class="btn btn-primary" type="submit" value="Lưu thay đổi">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>