<?php
    include('z_part/header.php')
?>
<div class="wrapper fixed__footer">
    <?php
            include('z_part/navbar.php')
        ?>

    <?php
        if(isset($_GET['id_barang'])){
            $id = $_GET['id_barang'];
            $sqlSelect = "SELECT barang.*, kategori.nama as nama_kategori FROM barang join kategori on barang.id_kategori=kategori.id where barang.id=$id";
            $resultSelect = mysqli_query($conn, $sqlSelect);
            $detailBarang = mysqli_fetch_assoc($resultSelect); 
        }          
    ?>

    <body>
        <!-- <h2><?= $detailBarang['nama'] ?></h2>
    <h2><?= $detailBarang['nama_kategori'] ?></h2> -->
        <!-- Body main wrapper start -->
        <div class="wrapper fixed__footer">
            <div class="body__overlay"></div>
            <!-- Start Offset Wrapper -->
            <div class="offset__wrapper">
                <!-- Start Search Popap -->
                <div class="search__area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search__inner">
                                    <form action="#" method="get">
                                        <input placeholder="Search here... " type="text">
                                        <button type="submit"></button>
                                    </form>
                                    <div class="search__close__btn">
                                        <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Search Popap -->

            </div>
            <!-- End Offset Wrapper -->
            <!-- Start Product Details -->
            <section class="htc__product__details pt--100 pb--100 bg__white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="product__details__container">
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <?php  
                                            $sqlSelect = "SELECT gambar FROM barang_detail  where id_barang=".$detailBarang['id'] ;
                                            $resultSelect = mysqli_query($conn, $sqlSelect);
                                            $gambar = mysqli_fetch_assoc($resultSelect);                                                    
                                        ?>
                                        <div role="tabpanel" class="tab-pane fade in active product-video-position"
                                            id="img-tab-1">
                                            <img src="<?= $admin_url.$gambar['gambar'] ?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                            <div class="htc__product__details__inner">
                                <div class="pro__detl__title">
                                    <h2><?= $detailBarang['nama'] ?></h2>
                                </div>
                                <div class="pro__details">
                                    <p><?= $detailBarang['deskripsi'] ?></p>
                                </div>
                                <ul class="pro__dtl__prize">
                                    <li class="new__price"> Rp <?= $detailBarang['harga'] ?></li>
                                </ul>
                                <div class="product-action-wrap">
                                    <div class="prodict-statas"><span>Quantity :</span></div>
                                    <div class="product-quantity">
                                        <!-- <form id='myform' method='GET' action='checkout.php'> -->

                                        <form method="post"
                                            action="cart.php?action=add&code=<?php echo $detailBarang['id']; ?>">
                                            <div class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="quantity"
                                                        value="01">
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_barang" value="<?= $detailBarang['id'] ?>">
                                            <input type="hidden" name="harga" value="<?= $detailBarang['harga'] ?>">
                                            <!-- <input type="submit" value="Beli Sekarang"> -->
                                            <input type="submit" value="Beli Sekarang" class="btnAddAction" />
                                    </div>
                                    </form>
                                    </form>
                                </div>
                            </div>
                            <ul class="pro__dtl__btn">
                                <!-- <li class="buy__now__btn"><a href="checkout.php?id_barang=">Beli Sekarang</a></li> -->
                                <!-- <li><a href="#"><span class="ti-shopping-cart"></span></a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
        </section>
</div>

</body>
<?php
        include('z_part/footer.php')
    ?>
    <!-- End Footer Area -->
</div>
    <?php
        include('z_part/quickview.php')
    ?>
    <?php
        include('z_part/script.php')
    ?>

</html>