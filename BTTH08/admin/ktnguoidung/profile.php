<?php include("../inc/top.php"); ?>

<!-- Form cập nhật thông tin ng dùng-->
  <div class="row" >
    <div class="col-12 col-md-10 m-auto">
      <div class="card p-5">
        <div class="card-header">          
          <h4 class="text-info text-center">HỒ SƠ NGƯỜI DÙNG</h4> 
        </div>
        <div class="card-body">
          <?php $nguoidungHienTai = $_SESSION["nguoidung"] ?? []; ?>
          <form method="post" enctype="multipart/form-data" action="../ktnguoidung/index.php">
          	<input type="hidden" name="txtid" value="<?php echo $nguoidungHienTai["id"] ?? 0; ?>" >
          	<input type="hidden" name="txthinhanh" value="<?php echo $nguoidungHienTai["hinhanh"] ?? ''; ?>" >
            <input type="hidden" name="action" value="xlhoso" >
            <div class="text-center">
              <?php $avatar = !empty($nguoidungHienTai["hinhanh"]) ? "../../images/users/" . $nguoidungHienTai["hinhanh"] : "../../images/users/user.png"; ?>
              <img class="img-thumbnail" src="<?php echo $avatar; ?>" alt="<?php echo $nguoidungHienTai["hoten"] ?? 'Người dùng'; ?>" width="100px">
            </div>
            <input type="hidden" name="txtid" value="<?php echo $nguoidungHienTai["id"] ?? 0; ?>">
            <div class="my-3">    
            <label class="form-label">Email</label>    
            <input class="form-control" type="email" name="txtemail" placeholder="Email" value="<?php echo $nguoidungHienTai["email"] ?? ''; ?>" required>
            </div>
            <div class="my-3">    
            <label class="form-label">Số điện thoại</label>    
            <input class="form-control" type="number" name="txtdienthoai" placeholder="Số điện thoại" value="<?php echo $nguoidungHienTai["sodienthoai"] ?? ''; ?>" required>
            </div>            
            <div class="my-3">
            <label class="form-label">Họ tên</label>
            <input class="form-control" type="text" name="txthoten" placeholder="Họ tên" value="<?php echo $nguoidungHienTai["hoten"] ?? ''; ?>" required></div>
            <div class="my-3">
              <label class="form-label">Đổi hình đại diện</label>
              <input class="form-control" type="file" name="fhinh">
            </div>
            <div class="my-3 text-center">            
            <input class="btn btn-primary"  type="submit" value="Cập nhật">
            <input class="btn btn-warning"  type="reset" value="Không">
        	</div>
          </form>
        </div>
        
      </div>
    </div>
  </div>


<?php include("../inc/bottom.php"); ?>