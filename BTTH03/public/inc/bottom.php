</div> <!-- Đóng thẻ container của top.php -->
        </section>
        
        <!-- Carousel -->
        <div id="demo" class="carousel slide shadow" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
        
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../images/carousel/h1.jpg" alt="Dụng cụ văn phòng" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../images/carousel/h2.jpg" alt="Dụng cụ học tập" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../images/carousel/h3.jpg" alt="Văn phòng phẩm" class="d-block w-100">
                </div>
            </div>
        
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        
        <!-- Footer-->
        <footer class="py-5 bg-info mt-5">
            <div class="text-center mb-5"><a class="text-warning" href="#top"><i class="bi bi-chevron-up"  style="font-size: 3rem; font-weight: bold; color:white;"></i></a></div>
            
            <div class="container">
                <div class="row">
                    <div class="col-6 text-light">
                        <h4><span class="badge text-white bg-success">A</span>
                            <span class="badge text-white bg-danger">B</span>
                            <span class="badge text-white bg-warning">C</span> Shop - Cửa hàng văn phòng phẩm</h4>
                        <p><b><i>Địa chỉ:</i></b> 18 Ung Văn Khiêm, phường Đông Xuyên, TP Long Xuyên, An Giang<br>
                            <b><i>Điện thoại:</i></b> 076 3841190<br> 
                            <b><i>Email:</i></b> abc@abc.com</p>
                    </div>
                    <div class="col-3 text-white">
                        <h4>DANH MỤC HÀNG</h4>
                        <div class="list-group list-group-flush">
                            <?php foreach ($danhmuc as $d): ?>
                                <a href="?action=group&id=<?php echo $d["id"]; ?>" class="list-group-item list-group-item-action bg-transparent text-white border-0 py-1">
                                    <?php echo $d["tendanhmuc"]; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-3 text-white">
                        <h4>DỊCH VỤ KHÁCH HÀNG</h4>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action bg-transparent text-white border-0 py-1">Hướng dẫn mua hàng</a>
                            <a href="#" class="list-group-item list-group-item-action bg-transparent text-white border-0 py-1">Câu hỏi thường gặp</a>
                            <a href="#" class="list-group-item list-group-item-action bg-transparent text-white border-0 py-1">Liên hệ với chúng tôi</a>
                        </div>
                    </div>
                </div>
                <hr class="text-white">
                <p class="m-0 text-center text-warning fw-bolder">Copyright &copy; ABC Shop 2026</p></div>
        </footer>
    </body>
</html>