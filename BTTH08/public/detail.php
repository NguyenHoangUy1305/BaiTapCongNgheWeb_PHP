<?php include("inc/top.php"); ?>
    
  <div class="row mt-4 mb-5">
    <div class="col-sm-9 pe-4 border-end">      

      <h3 class="text-info fw-bolder mb-4"><?php echo $mhct["tenmathang"]; ?></h3>
      
      <div class="text-center mb-4">
          <img style="max-height: 400px; object-fit: contain;" src="../<?php echo $mhct["hinhanh"]; ?>" class="img-fluid border p-3 shadow-sm rounded">
      </div>

      
      <div class="bg-light p-4 rounded mb-4">
          <h4 class="text-primary mb-3">Giá bán: 
            <span class="text-danger fw-bold ms-2"><?php echo number_format($mhct["giaban"], 0, ',', '.'); ?> đ</span>
          </h4>

          <!-- Form chọn số lượng thêm vào giỏ hàng -->
          <form method="post" action="index.php" class="form-inline mt-4 w-50">
            <input type="hidden" name="action" value="chovaogio">
            <input type="hidden" name="id" value="<?php echo $mhct["id"]; ?>">
            <div class="row align-items-center">
              <div class="col-4">
                <input type="number" class="form-control text-center" name="soluong" value="1" min="1" max="<?php echo $mhct["soluongton"]; ?>">
              </div>
              <div class="col-8">
                <input type="submit" class="btn btn-primary w-100 py-2" value="Chọn mua">
              </div>
            </div>    
          </form>     
      </div>
    
      <div class="mt-5">
        <h4 class="text-primary border-bottom pb-2">Mô tả sản phẩm: </h4>
        <div class="mt-3 text-secondary lh-lg" style="text-align: justify;">
            <?php echo nl2br($mhct["mota"]); ?>
        </div>
      </div>
      <br>
    </div>
    
    <div class="col-sm-3 ps-4"> 
      
      <h4 class="text-warning border-bottom pb-2 mb-4">Cùng danh mục:</h4>

      <?php
      $count = 0;
      foreach($mathang as $m):  
        if($m["id"] != $mhct["id"]){
            if ($count >= 4) break; 
            $count++;
      ?>
      <div class="mb-4">
        <div class="card h-100 shadow-sm border-0">
            <!-- Sale badge-->
            <?php if ($m["giaban"] < $m["giagoc"]){ ?>
            <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
            <?php } ?>
            
            <!-- Product image-->
            <a href="?action=detail&id=<?php echo $m["id"]; ?>" class="text-center">
                <img class="card-img-top p-2" src="../<?php echo $m["hinhanh"]; ?>" alt="<?php echo $m["tenmathang"]; ?>" style="height: 150px; object-fit: contain;" />
            </a>
            
            <!-- Product details-->
            <div class="card-body p-3 d-flex flex-column text-center">
                <!-- Product name-->
                <a class="text-decoration-none text-info fw-semibold mb-2" style="font-size: 0.95rem;" href="?action=detail&id=<?php echo $m["id"]; ?>">
                    <?php echo $m["tenmathang"]; ?>
                </a>
                
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                </div>
                
                <!-- Product price-->
                <div class="mt-auto">
                    <?php if ($m["giaban"] < $m["giagoc"]){ ?>
                        <span class="text-muted text-decoration-line-through me-1 small"><?php echo number_format($m["giagoc"], 0, ',', '.'); ?>đ</span>
                    <?php } ?>
                    <span class="text-danger fw-bold"><?php echo number_format($m["giaban"], 0, ',', '.'); ?>đ</span>
                </div>
            </div>
            
            <!-- Product actions (Thay bằng form add to cart nhanh) -->
            <div class="card-footer p-3 pt-0 border-top-0 bg-transparent text-center">
                <form method="post" action="index.php">
                    <input type="hidden" name="action" value="chovaogio">
                    <input type="hidden" name="id" value="<?php echo $m["id"]; ?>">
                    <input type="hidden" name="soluong" value="1">
                    <input type="submit" class="btn btn-outline-info w-100" value="Chọn mua">
                </form>
            </div>
        </div>
      </div>
      <?php 
        }
      endforeach; 
      ?>
    </div>    
  </div>
  
<?php include("inc/bottom.php"); ?>