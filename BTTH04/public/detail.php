<?php include("inc/top.php"); ?>

<div class="row mt-4 mb-5">
    <!-- Cột trái: Thông tin sản phẩm chính -->
    <div class="col-md-9 border-end pe-4">
        <div class="row">
            <div class="col-md-6 text-center mb-4">
                <img src="../<?php echo $mhct['hinhanh']; ?>" alt="<?php echo $mhct['tenmathang']; ?>" class="img-fluid border p-3 shadow-sm rounded" style="max-height: 400px; object-fit: contain;">
            </div>
            <div class="col-md-6 pt-3">
                <h3 class="text-info fw-bolder mb-3"><?php echo $mhct['tenmathang']; ?></h3>
                <div class="d-flex small text-warning mb-3 fs-5">
                    <div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div>
                </div>
                
                <?php if(isset($mhct['giagoc']) && $mhct['giagoc'] > $mhct['giaban']): ?>
                    <p class="mb-1 text-muted fs-5">Giá gốc: <del><?php echo number_format($mhct['giagoc'], 0, ',', '.'); ?> đ</del></p>
                <?php endif; ?>
                <h4 class="text-danger fw-bold mb-4">Giá bán: <?php echo number_format($mhct['giaban'], 0, ',', '.'); ?> đ</h4>
                
                <!-- Yêu cầu 3: Hiển thị lượt xem -->
                <p class="text-secondary"><i class="bi bi-eye"></i> Đã xem: <?php echo $mhct['luotxem']; ?> lượt</p>
                
                <div class="d-flex mt-4">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 4rem" />
                    <button class="btn btn-info text-white shadow flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i> Chọn mua
                    </button>
                </div>
            </div>
        </div>
        
        <h5 class="text-info border-bottom pb-2 mt-5">Mô tả sản phẩm</h5>
        <div class="mt-3 text-secondary lh-lg" style="text-align: justify;">
            <?php echo nl2br($mhct['mota']); ?>
        </div>
    </div>
    
    <!-- Cột phải: Gợi ý cùng danh mục -->
    <div class="col-md-3 ps-4">
        <h5 class="text-warning border-bottom pb-2 mb-4">Cùng danh mục</h5>
        <div class="row">
            <?php 
            $count = 0;
            foreach ($mathang_cung_loai as $m): 
                // Ẩn đi sản phẩm đang xem chi tiết
                if ($m['id'] == $mhct['id']) continue; 
                // Chỉ hiển thị tối đa 4 sản phẩm
                if ($count >= 4) break; 
                $count++;
            ?>
                <div class="col-12 mb-4">
                    <div class="card text-center shadow-sm border-0 h-100">
                        <a href="?action=detail&id=<?php echo $m['id']; ?>">
                            <img src="../<?php echo $m['hinhanh']; ?>" class="card-img-top p-2" alt="<?php echo $m['tenmathang']; ?>" style="height: 120px; object-fit: contain;">
                        </a>
                        <div class="card-body p-2 d-flex flex-column">
                            <a href="?action=detail&id=<?php echo $m['id']; ?>" class="text-decoration-none text-info fw-semibold mb-2" style="font-size: 0.9rem;">
                                <?php echo $m['tenmathang']; ?>
                            </a>
                            <p class="card-text text-danger fw-bold m-0 mt-auto" style="font-size: 0.95rem;">
                                <?php echo number_format($m['giaban'], 0, ',', '.'); ?>đ
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include("inc/bottom.php"); ?>