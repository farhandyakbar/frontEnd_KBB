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
                                                            src="<?= $admin_url.$gambar['gambar'] ?>"
                                                            alt="product images">
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
            <!-- End Our Product Area -->
            <!-- Start Footer Area -->
            <footer class="htc__foooter__area gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="footer__container clearfix">
                            <!-- Start Single Footer Widget -->
                            <div class="col-md-3 col-lg-4 col-sm-6">
                                <div class="ft__widget">
                                    <div class="ft__logo">
                                        <a href="index.html">
                                            <img src="images/logo/logo.png" alt="footer logo">
                                        </a>
                                    </div>
                                    <div class="footer-address">
                                        <ul>
                                            <li>
                                                <div class="address-icon">
                                                    <i class="zmdi zmdi-pin"></i>
                                                </div>
                                                <div class="address-text">
                                                    <p>194 Main Rd T, FS Rayed <br> VIC 3057, USA</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="address-icon">
                                                    <i class="zmdi zmdi-email"></i>
                                                </div>
                                                <div class="address-text">
                                                    <a href="#"> info@example.com</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="address-icon">
                                                    <i class="zmdi zmdi-phone-in-talk"></i>
                                                </div>
                                                <div class="address-text">
                                                    <p>+012 345 678 102 </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Footer Widget -->
                            <!-- Start Single Footer Widget -->
                            <div class="col-md-3 col-lg-4 col-sm-6 smt-30 xmt-30">
                                <div class="ft__widget">
                                    <h2 class="ft__title">Categories</h2>
                                    <ul class="footer-categories">
                                        <li><a href="shop-sidebar.html">Men</a></li>
                                        <li><a href="shop-sidebar.html">Women</a></li>
                                        <li><a href="shop-sidebar.html">Accessories</a></li>
                                        <li><a href="shop-sidebar.html">Shoes</a></li>
                                        <li><a href="shop-sidebar.html">Dress</a></li>
                                        <li><a href="shop-sidebar.html">Denim</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Start Single Footer Widget -->
                            <div class="col-md-3 col-lg-4 col-sm-6 smt-30 xmt-30">
                                <div class="ft__widget">
                                    <h2 class="ft__title">Infomation</h2>
                                    <ul class="footer-categories">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Returns & Exchanges</a></li>
                                        <li><a href="#">Shipping & Delivery</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Copyright Area -->
                    <div class="htc__copyright__area">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="copyright__inner">
                                    <div class="copyright">
                                        <p>© 2017 <a href="https://freethemescloud.com/">Free themes Cloud</a>
                                            All Right Reserved.</p>
                                    </div>
                                    <ul class="footer__menu">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="shop.html">Product</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Copyright Area -->
                </div>
            </footer>
            <!-- End Footer Area --
    </div>

    <!-  Body main wrapper end -->
            <!-- Placed js at the end of the document so the pages load faster -->

            <!-- jquery latest version -->
            <script src="js/vendor/jquery-1.12.0.min.js"></script>
            <!-- Bootstrap framework js -->
            <script src="js/bootstrap.min.js"></script>
            <!-- All js plugins included in this file. -->
            <script src="js/plugins.js"></script>
            <script src="js/slick.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <!-- Waypoints.min.js. -->
            <script src="js/waypoints.min.js"></script>
            <!-- Main js file that contents all jQuery plugins activation. -->
            <script src="js/main.js"></script>

    </body>

    </html>