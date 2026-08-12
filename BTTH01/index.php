<?php
// 1. KẾT NỐI CƠ SỞ DỮ LIỆU
$conn = mysqli_connect("localhost", "root", "", "qlsv");
if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}
// Set charset để hiển thị tiếng Việt không bị lỗi
mysqli_set_charset($conn, "utf8");

// --- XỬ LÝ XÓA SINH VIÊN ---
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    mysqli_query($conn, "DELETE FROM sinhvien WHERE id = $id");
    header("Location: index.php"); // Load lại trang sau khi xóa
    exit;
}

// --- XỬ LÝ THÊM HOẶC SỬA SINH VIÊN ---
if (isset($_POST['save_student'])) {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $mssv = mysqli_real_escape_string($conn, $_POST['mssv']);
    $hoten = mysqli_real_escape_string($conn, $_POST['hoten']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $lopid = (int)$_POST['lopid'];

    if ($id > 0) {
        // Cập nhật sinh viên (Sửa)
        $sql_update = "UPDATE sinhvien SET mssv='$mssv', hoten='$hoten', email='$email', lopid=$lopid WHERE id=$id";
        mysqli_query($conn, $sql_update);
    } else {
        // Thêm sinh viên mới
        $sql_insert = "INSERT INTO sinhvien (mssv, hoten, email, lopid) VALUES ('$mssv', '$hoten', '$email', $lopid)";
        mysqli_query($conn, $sql_insert);
    }
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Quản lý sinh viên</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      body {
          font-family: Arial, sans-serif;
      }
      .main-container {
          margin-top: 40px;
          border: 1px solid #4a90e2; /* Viền xanh bao quanh giống ảnh */
          padding: 20px;
          margin-bottom: 40px;
      }
      h3 {
          font-weight: 300; /* Chữ mỏng giống ảnh */
          margin-top: 0;
          margin-bottom: 20px;
          text-transform: uppercase;
          color: #333;
      }
      /* CSS cho ô hiển thị Lớp */
      .class-box {
          display: block;
          border: 1px solid #eaeaea;
          padding: 12px 15px;
          margin-bottom: 15px;
          color: #777;
          text-decoration: none;
          font-weight: normal;
      }
      .class-box:hover, .class-box.active {
          text-decoration: none;
          border-color: #ccc;
          color: #333;
          background-color: #f9f9f9;
      }
      /* CSS cho bảng danh sách */
      .table > thead > tr > th {
          border-bottom: 1px solid #ddd;
          color: #333;
      }
      .table > tbody > tr > td {
          vertical-align: middle;
          color: #555;
      }
      /* CSS cho cột Thao tác */
      .action-links a {
          color: #337ab7;
          text-decoration: none;
      }
      .action-links a:hover {
          text-decoration: underline;
      }
      .action-divider {
          color: #999;
          margin: 0 5px;
      }
      .add-btn-wrapper {
          text-align: right;
          margin-top: 15px;
      }
  </style>
</head>
<body>
<div class="container">
    <div class="main-container row">
        
        <!-- CỘT TRÁI: DANH SÁCH LỚP -->
        <div class="col-md-3">
            <h3>LỚP</h3>
            <?php
            $sql_lop = "SELECT * FROM lop";
            $lop_result = mysqli_query($conn, $sql_lop);
            if (mysqli_num_rows($lop_result) > 0) {
                while ($l = mysqli_fetch_assoc($lop_result)) {
                    $active = (isset($_GET['lopid']) && $_GET['lopid'] == $l['id']) ? 'active' : '';
                    echo "<a class='class-box $active' href='?lopid=" . $l["id"] . "'>" . $l["lop"] . "</a>";
                }
            }
            ?>
        </div>

        <!-- CỘT PHẢI: HIỂN THỊ DANH SÁCH HOẶC FORM -->
        <div class="col-md-9">
            <?php
            // Hiển thị Form Thêm/Sửa
            if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                $sv_edit = null;
                if ($_GET['action'] == 'edit' && isset($_GET['id'])) {
                    $id_edit = (int)$_GET['id'];
                    $result_edit = mysqli_query($conn, "SELECT * FROM sinhvien WHERE id = $id_edit");
                    $sv_edit = mysqli_fetch_assoc($result_edit);
                }
            ?>
                <h3><?php echo $sv_edit ? "SỬA THÔNG TIN SINH VIÊN" : "THÊM MỚI SINH VIÊN"; ?></h3>
                <form method="POST" action="index.php">
                    <input type="hidden" name="id" value="<?php echo $sv_edit ? $sv_edit['id'] : ''; ?>">
                    <div class="form-group">
                        <label>MSSV:</label>
                        <input type="text" class="form-control" name="mssv" value="<?php echo $sv_edit ? $sv_edit['mssv'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Họ tên:</label>
                        <input type="text" class="form-control" name="hoten" value="<?php echo $sv_edit ? $sv_edit['hoten'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $sv_edit ? $sv_edit['email'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Lớp:</label>
                        <select class="form-control" name="lopid" required>
                            <option value="">-- Chọn lớp học --</option>
                            <?php
                            mysqli_data_seek($lop_result, 0); 
                            while ($l = mysqli_fetch_assoc($lop_result)) {
                                $selected = ($sv_edit && $sv_edit['lopid'] == $l['id']) ? "selected" : "";
                                echo "<option value='".$l['id']."' $selected>".$l['lop']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="save_student" class="btn btn-primary">Lưu dữ liệu</button>
                    <a href="index.php" class="btn btn-default">Hủy</a>
                </form>

            <?php
            } else {
                // Hiển thị Danh sách (Giao diện chính như hình ảnh)
            ?>
                <h3>DANH SÁCH SINH VIÊN</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>MSSV</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $where = "1=1";
                        if (isset($_GET['lopid']) && is_numeric($_GET['lopid'])) {
                            $where .= " AND sinhvien.lopid = " . (int)$_GET['lopid'];
                        }

                        $sql_sv = "SELECT sinhvien.*, lop.lop as ten_lop 
                                   FROM sinhvien 
                                   LEFT JOIN lop ON sinhvien.lopid = lop.id 
                                   WHERE $where 
                                   ORDER BY sinhvien.mssv ASC";
                        
                        $sinhvien_result = mysqli_query($conn, $sql_sv);

                        if (mysqli_num_rows($sinhvien_result) > 0) {
                            while ($sv = mysqli_fetch_assoc($sinhvien_result)) {
                                echo "<tr>";
                                echo "<td>". $sv["mssv"] ."</td>";
                                echo "<td>". $sv["hoten"] . "</td>";
                                echo "<td>". $sv["email"] . "</td>";
                                echo "<td class='text-center action-links'>
                                        <a href=\"?action=edit&id=" . $sv["id"] . "\">Sửa</a> 
                                        <span class='action-divider'>|</span> 
                                        <a href=\"?action=delete&id=" . $sv["id"] . "\" onclick=\"return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');\">Xóa</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>Không tìm thấy dữ liệu.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Nút thêm sinh viên nằm dưới cùng góc phải -->
                <div class="add-btn-wrapper">
                    <a href="?action=add" class="btn btn-primary">
                        <span style="font-weight: bold;">+</span> Thêm sinh viên
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>