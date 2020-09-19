<?php
    include('z_part/header.php')
?>
<div class="wrapper fixed__footer">
    <?php
            include('z_part/navbar.php')
        ?>
    <!-- Start Slider Product -->
    <section class="categories-slider-area bg__white">
        <div class="container">
            <div class="row">
                <!-- Start Left Feature -->
                <!-- Start Slider Area -->
                <!-- <div class="slider__container slider--one">
                    <div class="slider__activation__wrap owl-carousel owl-theme"> -->
                        <!-- Start Single Slide -->
                        <!-- <div class="slide slider__full--screen slider-height-inherit slider-text-right"
                            style="background: rgba(0, 0, 0, 0) url(images/slider/bg/1.png) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1>New Product <span class="text--theme">Collection</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href="cart.html">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Single Slide -->
                        <!-- Start Single Slide -->
                        <!-- <div class="slide slider__full--screen slider-height-inherit  slider-text-left"
                            style="background: rgba(0, 0, 0, 0) url(images/slider/bg/2.png) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1>New Product <span class="text--theme">Collection</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href="cart.html">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Single Slide -->
                    <!-- </div>
                </div> -->
                <!-- Start Slider Area -->
                <!-- End Left Feature -->
            </div>
        </div>
    </section>
    <!-- End Slider Product -->

    <!-- Start Categories Area -->

    <!-- End Categories Area -->

    <!-- Start Product Area -->
    <section class="htc__product__area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section__title section__title--2 text-left">
                        <h2 class="title__line">Barang Terbaru</h2>
                    </div>
                    <div class="product-style-tab">
                        <div class="tab-content another-product-style jump">
                            <div class="row">
                                <div class="product-slider-active owl-carousel">
                                    <?php   
                                        $sql = "SELECT  * from barang limit 6";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {  
                                        $no=1;
                                        while($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <?php  
                                                        $sqlSelect = "SELECT gambar FROM barang_detail  where id_barang=".$row['id'] ;
                                                        $resultSelect = mysqli_query($conn, $sqlSelect);
                                                        $gambar = mysqli_fetch_assoc($resultSelect);                                                    
                                                    ?>
                                                    <a href="detail_barang.php?id_barang=<?= $row['id']?>">
                                                        <img style="width: 400px; height: 320px; margin-right: 0px;"
                                                            src="<?= $admin_url.$gambar['gambar'] ?>"
                                                            alt="product images">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html"><?= $row['nama'] ?></a></h2>
                                                <ul class="product__price">
                                                    <li style="text-align: center;" class="new__price">Rp
                                                        <?= $row['harga'] ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Area -->

    <!-- Start Footer Area -->
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