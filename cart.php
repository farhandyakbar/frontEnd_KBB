<?php
    include('z_part/header.php')
?>
<div class="wrapper fixed__footer">
    <?php
            include('z_part/navbar.php')
        ?>

    <body>
        <!-- Body main wrapper start -->
        <div class="wrapper fixed__footer">
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

            <!-- cart-main-area start -->
            <div class="cart-main-area ptb--100 bg__white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table>
                                        <tbody>
                                        <?php 
                if(!empty($_GET["action"])) {
                switch($_GET["action"]) {
                    case "add":
                        if(!empty($_POST["quantity"])) {
                        // IMAGE	PRODUCT	PRICE	QUANTITY	TOTAL	
                            $id =  $_GET["code"]; 
                            $sqlSelect = "SELECT barang.*, kategori.nama as nama_kategori FROM barang join kategori on barang.id_kategori=kategori.id where barang.id=$id";
                            $resultSelect = mysqli_query($conn, $sqlSelect);
                            $detailBarang = mysqli_fetch_assoc($resultSelect);  

                            $sqlSelect = "SELECT gambar FROM barang_detail  where id_barang=".$detailBarang['id'] ;
                            $resultSelect = mysqli_query($conn, $sqlSelect);
                            $gambar = mysqli_fetch_assoc($resultSelect);         
                            // $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                            $itemArray = array($detailBarang['id']=>array('name'=>$detailBarang["nama"], 'kode'=>$id, 'quantity'=>$_POST["quantity"], 'price'=>$detailBarang['harga'], 'image'=> $gambar['gambar']));
                            
                            if(!empty($_SESSION["cart_item"])) {
                                if(in_array($detailBarang['id'],array_keys($_SESSION["cart_item"]))) {
                                    foreach($_SESSION["cart_item"] as $k => $v) {
                                            if($detailBarang['id'] == $k) {
                                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                                }
                                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                            }
                                    }
                                } else {
                                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                                }
                            } else {
                                $_SESSION["cart_item"] = $itemArray;
                            }
                        }
                    break;
                    case "remove":
                        if(!empty($_SESSION["cart_item"])) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($_GET["code"] == $k)
                                        unset($_SESSION["cart_item"][$k]);				
                                    if(empty($_SESSION["cart_item"]))
                                        unset($_SESSION["cart_item"]);
                            }
                        }
                    break;
                    case "empty":
                        unset($_SESSION["cart_item"]);
                    break;	
                }
                }
                ?>
            <HTML>
            <!-- <HEAD> -->
            <TITLE>Simple PHP Shopping Cart</TITLE>
            <link href="style.css" type="text/css" rel="stylesheet" />
            </HEAD>
            <BODY>
                <div id="shopping-cart">
                    <div class="txt-heading">Shopping Cart</div>
                    <?php
                                if(isset($_SESSION["cart_item"])){
                                $total_quantity = 0;
                                $total_price = 0;
                            ?>
                    <table class="tbl-cart" cellpadding="10" cellspacing="1">
                        <tbody>
                            <tr>
                                <th style="text-align:left;">Name</th>
                                <th style="text-align:left;">Code</th>
                                <th style="text-align:right;" width="5%">Quantity</th>
                                <th style="text-align:right;" width="10%">Unit Price</th>
                                <th style="text-align:right;" width="10%">Price</th>
                                <th style="text-align:center;" width="5%">Remove</th>
                            </tr>
                            <?php		
                                foreach ($_SESSION["cart_item"] as $item){
                                $item_price = $item["quantity"]*$item["price"];
                            ?>
                            <tr>
                                <td><img src="<?php echo $item["image"]; ?>"
                                        class="cart-item-image" /><?php echo $item["name"]; ?></td>
                                <td><?php echo $item["kode"]; ?></td>
                                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                <td style="text-align:right;"><?php echo "Rp ".$item["price"]; ?></td>
                                <td style="text-align:right;"><?php echo "Rp ". number_format($item_price,2); ?></td>
                                <td style="text-align:center;"><a
                                        href="index.php?action=remove&code=<?php echo $item["code"]; ?>"
                                        class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                            </tr>
                            <?php
                                $total_quantity += $item["quantity"];
                                $total_price += ($item["price"]*$item["quantity"]);
                            }
                            ?>
                            <tr>
                                <td colspan="2" align="right">Total:</td>
                                <td align="right"><?php echo $total_quantity; ?></td>
                                <td align="right" colspan="2">
                                    <strong><?php echo "Rp ".number_format($total_price, 2); ?></strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                } else {
                ?>
                    <div class="no-records">Your Cart is Empty</div>
                    <?php 
                }
                ?>
                </div>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-sm-7 col-xs-12">
                                        <!-- <div class="buttons-cart">
                                            <input type="submit" value="Update Cart" />
                                            <a href="#">Continue Shopping</a>
                                        </div> -->
                                    <div class="buttons-cart">
                                        <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
                                    </div>
                                    </div>
                                    <div class="col-md-4 col-sm-5 col-xs-12">
                                        <div class="cart_totals">
                                            <h2>Cart Totals</h2>
                                            <table>
                                                <tbody>
                                                    <tr class="cart-subtotal">
                                                        <th>Subtotal</th>
                                                        <td><span class="amount">£215.00</span></td>
                                                    </tr>
                                                    <tr class="shipping">
                                                        <th>Shipping</th>
                                                        <td>
                                                            <ul id="shipping_method">
                                                                <li>
                                                                    <input type="radio" />
                                                                    <label>
                                                                        Flat Rate: <span class="amount">£7.00</span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input type="radio" />
                                                                    <label>
                                                                        Free Shipping
                                                                    </label>
                                                                </li>
                                                                <li></li>
                                                            </ul>
                                                            <p><a class="shipping-calculator-button" href="#">Calculate
                                                                    Shipping</a></p>
                                                        </td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Total</th>
                                                        <td>
                                                            <strong><span class="amount">£215.00</span></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="wc-proceed-to-checkout">
                                                <a href="checkout.html">Proceed to Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart-main-area end -->

            





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
                                                        name="mc-embedded-subscribe-form" class="validate"
                                                        target="_blank" novalidate>
                                                        <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                                            <div class="news__input">
                                                                <input type="email" value="" name="EMAIL" class="email"
                                                                    id="mce-EMAIL" placeholder="Email Address" required>
                                                            </div>
                                                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                            <div style="position: absolute; left: -5000px;"
                                                                aria-hidden="true"><input type="text"
                                                                    name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef"
                                                                    tabindex="-1" value=""></div>
                                                            <div class="clearfix subscribe__btn"><input type="submit"
                                                                    value="Send" name="subscribe"
                                                                    id="mc-embedded-subscribe"
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