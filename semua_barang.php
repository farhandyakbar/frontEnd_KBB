<?php
    include('z_part/header.php')
?>
<div class="wrapper fixed__footer">
    <?php
            include('z_part/navbar.php')
        ?>
    </head>

    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

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
            <!-- Start Our Product Area -->
            <section class="htc__product__area shop__page ptb--100 bg__white">
                <div class="container">
                    <div class="htc__product__container">
                        <div class="section__title section__title--2 text-left">
                            <h2 class="title__line">Menampilkan Semua Barang</h2>
                        </div>
                        <div class="row">
                            <div class="product__list another-product-style">
                                <!-- Start Single Product -->
                                <?php
                                    $sql = "SELECT * from barang";
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0){
                                    $no = 1;
                                    while($row =  $result->fetch_assoc()){
                                ?>
                                <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                                    <div class="product foo">
                                        <div class="product__inner">
                                            <div class="pro__thumb">
                                                <?php  
                                                    $sqlSelect = "SELECT gambar FROM barang_detail  where id_barang=".$row['id'] ;
                                                    $resultSelect = mysqli_query($conn, $sqlSelect);
                                                    $gambar = mysqli_fetch_assoc($resultSelect);                                                    
                                                ?>
                                                <a href="detail_barang.php?id_barang=<?= $row['id']?>">
                                                    <img style="width: 350px; height: 300px; margin-right: 0px;"
                                                        src="<?= $admin_url.$gambar['gambar'] ?>" alt="product images">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product__details">
                                            <h2><a href="product-details.html"><?= $row['nama'] ?></a></h2>
                                            <ul class="product__price">
                                                <li class="new__price">Rp
                                                    <?= $row['harga'] ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                    }
                                ?>
                                <!-- End Single Product -->
                            </div>
                        </div>
                        <!-- Start Load More BTn -->
                        <div class="row mt--60">
                            <div class="col-md-12">
                                <div class="htc__loadmore__btn">
                                    <a href="#">load more</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Load More BTn -->
                    </div>
                </div>
            </section>
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