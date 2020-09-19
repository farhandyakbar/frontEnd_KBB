<?php
    include('z_part/header.php')
?>
<div class="wrapper fixed__footer">
    <?php
            include('z_part/navbar.php')
        ?>
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
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
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

        <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="checkout-form">
                            <h2 class="section-title-3">Billing details</h2>
                        </div>
                        <div class="ckeckout-left-sidebar">                          
                            <!-- Start Payment Box -->
                            <div class="payment-form">
                                <p>Pesanan Anda sudah kami terima</p>
                                <p>Silahkan lanjutkan pembayaran dalam x24 jam ke rekening berikut</p>
                                <hr>
                                <b>BANK BCA</b>
                                <p>0123456789a.n. Aris Triwibowo</p>
                                <hr>
                                <b>Upload Bukti Pembayaran</b>
                                <form action="/action_page.php">
                                  <input type="file" id="myFile" name="filename">
                                  <input type="submit">
                                </form>

<!--                                 <div class="payment-form-inner">
                                    <div class="single-checkout-box">
                                        <input type="text" placeholder="Name on Card*">
                                        <input type="text" placeholder="Card Number*">
                                    </div>
                                    <div class="single-checkout-box select-option">
                                        <select>
                                            <option>Date*</option>
                                            <option>Date</option>
                                            <option>Date</option>
                                            <option>Date</option>
                                            <option>Date</option>
                                        </select>
                                        <input type="text" placeholder="Security Code*">
                                    </div>
                                </div> -->
                            </div>
                            <!-- End Payment Box -->

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="cart_totals">
                            <h2 style="margin-right: 140px">Cart Totals</h2>
                            <table>
                                <tbody>
                                    <!-- <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="amount">£215.00</span></td>
                                    </tr> -->
                                    <tr class="shipping">
                                        <th>Shipping</th>
                                        <td>
                                            <ul id="shipping_method">
                                                <!-- <li>
                                                    <input type="radio" /> 
                                                    <label>
                                                        Flat Rate: <span class="amount">£7.00</span>
                                                    </label>
                                                </li>
                                                <!-- <li>
                                                    <input type="radio" /> 
                                                    <label>
                                                        Free Shipping
                                                    </label>
                                                </li>
                                                <li></li> --> 
                                                <li>QTY : <?= $_GET['qty'] ?></li>
                                                <li>harga : <?= $_GET['harga'] ?></li>
                                            </ul>
                                            <p><a class="shipping-calculator-button" href="#">Calculate Shipping</a></p>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="amount">Rp. <?= $_GET['qty']*$_GET['harga'] ?></span></strong>
                                        </td>
                                    </tr>                                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Checkout Area -->
        <!-- Start Footer Area -->
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