<?php include("inc/top.php"); ?>

<h3 class="text-info mb-4">Danh sách sản phẩm</h3>
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
<?php 
if(count($mathang) > 0):
    foreach($mathang as $m): 
?>
    <div class="col mb-5">
        <div class="card h-100 shadow-sm border-0">
            <?php if(isset($m['giagoc']) && $m['giagoc'] > $m['giaban']): ?>
                <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
            <?php endif; ?>
            <a href="?action=detail&id=<?php echo $m['id']; ?>">
                <img class="card-img-top" src="../<?php echo $m['hinhanh']; ?>" alt="<?php echo $m['tenmathang']; ?>" />
            </a>
            <div class="card-body p-4 pb-2 text-center d-flex flex-column">
                <h6 class="fw-bolder">
                    <a href="?action=detail&id=<?php echo $m['id']; ?>" class="text-info text-decoration-none"><?php echo $m['tenmathang']; ?></a>
                </h6>
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div>
                </div>
                <div class="mt-auto">
                    <?php if(isset($m['giagoc']) && $m['giagoc'] > 0): ?>
                        <span class="text-muted text-decoration-line-through me-2"><?php echo number_format($m['giagoc'], 0, ',', '.'); ?>đ</span>
                    <?php endif; ?>
                    <span class="text-danger fw-bolder"><?php echo number_format($m['giaban'], 0, ',', '.'); ?>đ</span>
                </div>
            </div>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                <a class="btn btn-outline-info w-100" href="#">Chọn mua</a>
            </div>
        </div>
    </div>
<?php 
    endforeach; 
else:
    echo "<p class='text-muted fs-5'>Chưa có sản phẩm nào trong danh mục này.</p>";
endif;
?>
</div>

<?php include("inc/bottom.php"); ?>