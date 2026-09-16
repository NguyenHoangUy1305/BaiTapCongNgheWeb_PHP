<?php include("inc/top.php"); ?>

<!-- Bắt đầu gom nhóm sản phẩm theo từng danh mục -->
<?php 
foreach($danhmuc as $d): 
    // Lấy các mặt hàng thuộc danh mục hiện tại
    $mathang_theodm = $mh->laymathangtheodanhmuc($d["id"]);
    
    // Chỉ hiển thị danh mục nếu có sản phẩm
    if(count($mathang_theodm) > 0):
?>
    <!-- Tiêu đề danh mục -->
    <div class="d-flex justify-content-between align-items-center mt-5 mb-4 border-bottom pb-2">
        <h3 class="text-info m-0"><?php echo $d["tendanhmuc"]; ?></h3>
        <a href="?action=group&id=<?php echo $d["id"]; ?>" class="text-decoration-none text-danger">Xem tất cả <i class="bi bi-chevron-double-right"></i></a>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php 
        $dem = 0;
        foreach($mathang_theodm as $m): 
            // Yêu cầu 1: Mỗi danh mục chỉ hiển thị 4 mặt hàng
            if($dem >= 4) break; 
            $dem++;
        ?>
            <div class="col mb-5">
                <div class="card h-100 shadow-sm border-0">
                    <!-- Yêu cầu 1: Chỉ hiển thị nhãn Giảm giá nếu giá bán khác giá gốc (nhỏ hơn) -->
                    <?php if(isset($m["giagoc"]) && $m["giagoc"] > $m["giaban"]): ?>
                        <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
                    <?php endif; ?>
                    
                    <!-- Hình ảnh sản phẩm (đã chuẩn hóa đường dẫn) -->
                    <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                        <img class="card-img-top" src="../<?php echo $m["hinhanh"]; ?>" alt="<?php echo $m["tenmathang"]; ?>" style="height: 200px; object-fit: contain; padding: 10px;" />
                    </a>
                    
                    <!-- Thông tin chi tiết -->
                    <div class="card-body p-4 pb-2 text-center d-flex flex-column">
                        <h6 class="fw-bolder">
                            <a class="text-decoration-none text-info" href="?action=detail&id=<?php echo $m["id"]; ?>">
                                <?php echo $m["tenmathang"]; ?>
                            </a>
                        </h6>
                        <div class="d-flex justify-content-center small text-warning mb-2">
                            <div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div>
                        </div>
                        <div class="mt-auto">
                            <!-- Hiển thị giá -->
                            <?php if(isset($m["giagoc"]) && $m["giagoc"] > $m["giaban"]): ?>
                                <span class="text-muted text-decoration-line-through me-2"><?php echo number_format($m["giagoc"], 0, ',', '.'); ?>đ</span>
                            <?php endif; ?>
                            <span class="text-danger fw-bolder"><?php echo number_format($m["giaban"], 0, ',', '.'); ?>đ</span>
                        </div>
                    </div>
                    
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                        <a class="btn btn-outline-info w-100" href="?action=detail&id=<?php echo $m["id"]; ?>">Chọn mua</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php 
    endif;
endforeach; 
?>

<?php include("inc/bottom.php"); ?>