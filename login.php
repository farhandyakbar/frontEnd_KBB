<?php
    include('z_part/header.php')
?>
<div class="wrapper fixed__footer">
    <?php
            include('z_part/navbar.php')
        ?>

    <?php  

if(isset($_POST['btn_login'])){  
    $username = $_POST['username']; 
    $password = $_POST['password'];  
    
    $sqlSelect = "SELECT * FROM pelanggan where username='$username' and password='$password'" ; 
    $resultSelect = mysqli_query($conn, $sqlSelect);
    if ($resultSelect->num_rows > 0) {  
        
        $login = mysqli_fetch_assoc($resultSelect);  
        $_SESSION['username'] = $login['username']; 
        $_SESSION['nama'] = $login['nama']; 
        echo ("<script>location.href='index.php'</script>");
    }
}

if(isset($_POST['btn_register'])){  
    $username = $_POST['user_name']; 
    $password = $_POST['pass_word'];
    $email  = $_POST['email'];
    
    $sql = "INSERT INTO pelanggan (username, email, password) values ('$username', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    echo("<script>alert('Register Success')</script>");
    echo ("<script>location.href='index.php'</script>");
}
// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
?>


    <body>
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
                <!-- Start Offset MEnu -->
                <div class="offsetmenu">
                    <div class="offsetmenu__inner">
                        <div class="offsetmenu__close__btn">
                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                        <div class="off__contact">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="images/logo/logo.png" alt="logo">
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt
                                ut labore.</p>
                        </div>
                        <ul class="sidebar__thumd">
                            <li><a href="#"><img src="images/sidebar-img/1.jpg" alt="sidebar images"></a></li>
                            <li><a href="#"><img src="images/sidebar-img/2.jpg" alt="sidebar images"></a></li>
                            <li><a href="#"><img src="images/sidebar-img/3.jpg" alt="sidebar images"></a></li>
                            <li><a href="#"><img src="images/sidebar-img/4.jpg" alt="sidebar images"></a></li>
                            <li><a href="#"><img src="images/sidebar-img/5.jpg" alt="sidebar images"></a></li>
                            <li><a href="#"><img src="images/sidebar-img/6.jpg" alt="sidebar images"></a></li>
                            <li><a href="#"><img src="images/sidebar-img/7.jpg" alt="sidebar images"></a></li>
                            <li><a href="#"><img src="images/sidebar-img/8.jpg" alt="sidebar images"></a></li>
                        </ul>
                        <div class="offset__widget">
                            <div class="offset__single">
                                <h4 class="offset__title">Language</h4>
                                <ul>
                                    <li><a href="#"> Engish </a></li>
                                    <li><a href="#"> French </a></li>
                                    <li><a href="#"> German </a></li>
                                </ul>
                            </div>
                            <div class="offset__single">
                                <h4 class="offset__title">Currencies</h4>
                                <ul>
                                    <li><a href="#"> USD : Dollar </a></li>
                                    <li><a href="#"> EUR : Euro </a></li>
                                    <li><a href="#"> POU : Pound </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="offset__sosial__share">
                            <h4 class="offset__title">Follow Us On Social</h4>
                            <ul class="off__soaial__link">
                                <li><a class="bg--twitter" href="#" title="Twitter"><i
                                            class="zmdi zmdi-twitter"></i></a></li>

                                <li><a class="bg--instagram" href="#" title="Instagram"><i
                                            class="zmdi zmdi-instagram"></i></a></li>
                                <li><a class="bg--facebook" href="#" title="Facebook"><i
                                            class="zmdi zmdi-facebook"></i></a></li>
                                <li><a class="bg--googleplus" href="#" title="Google Plus"><i
                                            class="zmdi zmdi-google-plus"></i></a></li>
                                <li><a class="bg--google" href="#" title="Google"><i class="zmdi zmdi-google"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Offset MEnu -->
                <!-- Start Cart Panel -->
                <div class="shopping__cart">
                    <div class="shopping__cart__inner">
                        <div class="offsetmenu__close__btn">
                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                        <div class="shp__cart__wrap">
                            <div class="shp__single__product">
                                <div class="shp__pro__thumb">
                                    <a href="#">
                                        <img src="images/product/sm-img/1.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="shp__pro__details">
                                    <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                    <span class="quantity">QTY: 1</span>
                                    <span class="shp__price">$105.00</span>
                                </div>
                                <div class="remove__btn">
                                    <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                                </div>
                            </div>
                            <div class="shp__single__product">
                                <div class="shp__pro__thumb">
                                    <a href="#">
                                        <img src="images/product/sm-img/2.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="shp__pro__details">
                                    <h2><a href="product-details.html">Brone Candle</a></h2>
                                    <span class="quantity">QTY: 1</span>
                                    <span class="shp__price">$25.00</span>
                                </div>
                                <div class="remove__btn">
                                    <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                                </div>
                            </div>
                        </div>
                        <ul class="shoping__total">
                            <li class="subtotal">Subtotal:</li>
                            <li class="total__price">$130.00</li>
                        </ul>
                        <ul class="shopping__btn">
                            <li><a href="cart.html">View Cart</a></li>
                            <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Cart Panel -->
            </div>
            <!-- End Offset Wrapper -->
            <!-- Start Login Register Area -->
            <?php
                if(isset($_SESSION['username'])) {
                    ?>
            <?php
                        echo ("<script>location.href='index.php'</script>");
                    ?>
            <?php
                } else { 
                ?>
            <div class="htc__login__register bg__white ptb--130"
                style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">

                <div class="container">
                    <div class="row">

                        <div class="col-md-6 col-md-offset-3">
                            <ul class="login__register__menu" role="tablist">
                                <li role="presentation" class="login active"><a href="#login" role="tab"
                                        data-toggle="tab">Login</a></li>
                                <li role="presentation" class="register"><a href="#register" role="tab"
                                        data-toggle="tab">Register</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Start Login Register Content -->
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="htc__login__register__wrap">
                                <!-- Start Single Content -->
                                <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                    <form id="formLogins" class="login" method="POST" action="">
                                        <input type="text" name="username" placeholder="User Name*">
                                        <input type="password" name="password" placeholder="Password*">
                                        <div class="htc__login__btn mt--30">
                                            <a onclick="document.getElementById('formLogins').submit();">Login</a>
                                            <input type="hidden" name="btn_login" value="login">
                                        </div>
                                    </form>

                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                    <form id="formRegister" class="login" method="post" >
                                        <input type="text" name="user_name" placeholder="User Name*">
                                        <input type="email" name="email" placeholder="Email*">
                                        <input type="password" name="pass_word" placeholder="Password*">
                                    <div class="htc__login__btn mt--30">
                                        <a onclick="document.getElementById('formRegister').submit();">Register</a>
                                        <input type="hidden" name="btn_register" value="Register">
                                    </div>
                                    </form>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                    <!-- End Login Register Content -->
                </div>

            </div>
            <?php
                }  
                ?>
            <!-- End Login Register Area -->
            <!-- Start Footer Area -->
            <footer class="htc__foooter__area gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="footer__container clearfix">
                            <!-- Start Single Footer Widget -->
                            <div class="col-md-3 col-lg-3 col-sm-6">
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
                                    <ul class="social__icon">
                                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Footer Widget -->
                            <!-- Start Single Footer Widget -->
                            <div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
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
                            <div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
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
                            <!-- Start Single Footer Widget -->
                            <div class="col-md-3 col-lg-3 col-lg-offset-1 col-sm-6 smt-30 xmt-30">
                                <div class="ft__widget">
                                    <h2 class="ft__title">Newsletter</h2>
                                    <div class="newsletter__form">
                                        <p>Subscribe to our newsletter and get 10% off your first purchase .</p>
                                        <div class="input__box">
                                            <div id="mc_embed_signup">
                                                <form action="#" method="post" id="mc-embedded-subscribe-form"
                                                    name="mc-embedded-subscribe-form" class="validate" target="_blank"
                                                    novalidate>
                                                    <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                                        <div class="news__input">
                                                            <input type="email" value="" name="EMAIL" class="email"
                                                                id="mce-EMAIL" placeholder="Email Address" required>
                                                        </div>
                                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                        <div style="position: absolute; left: -5000px;"
                                                            aria-hidden="true">
                                                            <input type="text"
                                                                name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef"
                                                                tabindex="-1" value=""></div>
                                                        <div class="clearfix subscribe__btn"><input type="submit"
                                                                value="Send" name="subscribe" id="mc-embedded-subscribe"
                                                                class="bst__btn btn--white__color">

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Footer Widget -->
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
            <!-- End Footer Area -->
        </div>
        <!-- Body main wrapper end -->
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