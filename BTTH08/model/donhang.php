<?php
class DONHANG {
    // Thêm địa chỉ mới và trả về id
    public function themdiachi($nguoidung_id, $diachi) {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO diachi(nguoidung_id, diachi) VALUES(:nguoidung_id, :diachi)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':nguoidung_id', $nguoidung_id);
            $cmd->bindValue(':diachi', $diachi);
            $cmd->execute();
            return $db->lastInsertId();
        } catch(PDOException $e) {
            echo "<p>Lỗi truy vấn: " . $e->getMessage() . "</p>"; exit();
        }
    }

    // Thêm đơn hàng mới và trả về id
    public function themdonhang($nguoidung_id, $diachi_id, $tongtien) {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO donhang(nguoidung_id, diachi_id, tongtien) VALUES(:nguoidung_id, :diachi_id, :tongtien)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':nguoidung_id', $nguoidung_id);
            $cmd->bindValue(':diachi_id', $diachi_id);
            $cmd->bindValue(':tongtien', $tongtien);
            $cmd->execute();
            return $db->lastInsertId();
        } catch(PDOException $e) {
            echo "<p>Lỗi truy vấn: " . $e->getMessage() . "</p>"; exit();
        }
    }

    // Thêm chi tiết đơn hàng và tự động trừ số lượng tồn kho
    public function themchitietdonhang($donhang_id, $mathang_id, $dongia, $soluong, $thanhtien) {
        $db = DATABASE::connect();
        try {
            // Thêm vào bảng donhangct
            $sql = "INSERT INTO donhangct(donhang_id, mathang_id, dongia, soluong, thanhtien) 
                    VALUES(:donhang_id, :mathang_id, :dongia, :soluong, :thanhtien)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':donhang_id', $donhang_id);
            $cmd->bindValue(':mathang_id', $mathang_id);
            $cmd->bindValue(':dongia', $dongia);
            $cmd->bindValue(':soluong', $soluong);
            $cmd->bindValue(':thanhtien', $thanhtien);
            $cmd->execute();

            // Trừ số lượng tồn kho, tăng lượt mua trong bảng mathang
            $sql_update = "UPDATE mathang SET soluongton = soluongton - :soluong, luotmua = luotmua + :soluong WHERE id = :mathang_id";
            $cmd_update = $db->prepare($sql_update);
            $cmd_update->bindValue(':soluong', $soluong);
            $cmd_update->bindValue(':mathang_id', $mathang_id);
            $cmd_update->execute();

            return true;
        } catch(PDOException $e) {
            echo "<p>Lỗi truy vấn: " . $e->getMessage() . "</p>"; exit();
        }
    }

    public function laydanhsachdonhang() {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT d.*, nd.hoten, nd.email, dc.diachi,
                    COALESCE(SUM(dct.soluong), 0) AS tongsoluong
                    FROM donhang d
                    LEFT JOIN nguoidung nd ON nd.id = d.nguoidung_id
                    LEFT JOIN diachi dc ON dc.id = d.diachi_id
                    LEFT JOIN donhangct dct ON dct.donhang_id = d.id
                    GROUP BY d.id
                    ORDER BY d.id DESC";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch(PDOException $e) {
            echo "<p>Lỗi truy vấn: " . $e->getMessage() . "</p>"; exit();
        }
    }
}
?>