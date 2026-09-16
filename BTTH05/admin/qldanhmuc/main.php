<?php include("../inc/top.php"); ?>

<h4 class="text-info">Danh sách danh mục</h4> 
<table class="table table-hover">
    <tr>
        <th>ID danh mục</th>
        <th>Tên danh mục</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php foreach ($danhmuc as $d): 
        if ($d["id"] == $idsua): // Nếu đang chọn sửa danh mục này
    ?>
        <form method="post">
            <input type="hidden" name="txtid" value="<?php echo $d["id"]; ?>">
            <input type="hidden" name="action" value="capnhat">
            <tr>
                <td><?php echo $d["id"]; ?></td>
                <td><input type="text" class="form-control" name="txtten" value="<?php echo $d["tendanhmuc"]; ?>" required></td>
                <td><input type="submit" class="btn btn-warning" value="Lưu"></td>
                <td><a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $d["id"]; ?>">Xóa</a></td>
            </tr>
        </form>
    <?php else: // Nếu hiển thị bình thường ?>
        <tr>
            <td><?php echo $d["id"]; ?></td>
            <td><?php echo $d["tendanhmuc"]; ?></td>
            <td><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $d["id"]; ?>">Sửa</a></td>
            <td><a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $d["id"]; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a></td>
        </tr>
    <?php 
        endif; 
    endforeach; 
    ?>
</table>

<h4 class="text-info mt-5">Thêm mới</h4>
<form method="post">
    <div class="row">
        <input type="hidden" name="action" value="them">
        <div class="col-md-4">
            <input type="text" class="form-control" name="txtten" placeholder="Nhập tên danh mục" required>
        </div>
        <div class="col-md-2">
            <input type="submit" class="btn btn-info text-white" value="Lưu">
        </div>
    </div>
</form>

<?php include("../inc/bottom.php"); ?>