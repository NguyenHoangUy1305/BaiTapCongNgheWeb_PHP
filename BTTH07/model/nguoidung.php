<?php
class NGUOIDUNG{
    public function kiemtranguoidunghople($email, $matkhau) {
        $db = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":matkhau", md5($matkhau));
            $cmd->execute();
            $valid = ($cmd->rowCount() == 1);
            $cmd->closeCursor();
            return $valid;
        } catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laythongtinnguoidung($email) {
        $db = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung WHERE email=:email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->execute();
            $ketqua = $cmd->fetch();
            $cmd->closeCursor();
            return $ketqua;
        } catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laydanhsachnguoidung(){
        $db = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        } catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function themnguoidung($email, $matkhau, $sodt, $hoten, $loai) {
        $db = DATABASE::connect();
        try{
            $sql = "INSERT INTO nguoidung (email, matkhau, sodienthoai, hoten, loai, trangthai) 
                    VALUES(:email, :matkhau, :sodt, :hoten, :loai, 1)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':email', $email);
            $cmd->bindValue(':matkhau', md5($matkhau));
            $cmd->bindValue(':sodt', $sodt);
            $cmd->bindValue(':hoten', $hoten);
            $cmd->bindValue(':loai', $loai);
            $cmd->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function capnhatnguoidung($id, $email, $sodt, $hoten, $hinhanh) {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set hoten=:hoten, email=:email, sodienthoai=:sodt, hinhanh=:hinhanh where id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':email', $email);
            $cmd->bindValue(':sodt', $sodt);
            $cmd->bindValue(':hoten', $hoten);
            $cmd->bindValue(':hinhanh', $hinhanh);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function doimatkhau($email, $matkhau) {
        $db = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung set matkhau=:matkhau where email=:email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':email', $email);
            $cmd->bindValue(':matkhau', md5($matkhau));
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function doiloainguoidung($email, $loai) {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set loai=:loai where email=:email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':email', $email);
            $cmd->bindValue(':loai', $loai);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function doitrangthai($id, $trangthai) {
        $db = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung set trangthai=:trangthai where id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':trangthai', $trangthai);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
?>