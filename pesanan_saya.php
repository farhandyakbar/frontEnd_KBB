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
                                <div class="row">
                                    <div class="col-md-8 col-sm-7 col-xs-12">
                                        <h2>Pesanan Saya</h2>
                                        Menunggu Pembayaran
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>No</td>
                                                <td>Tanggal</td>
                                                <td>Total Pembayaran</td>
                                                <td>Aksi</td>
                                            </tr>
                                            <?php
                                    $sql = "SELECT * from transaksi where id_pelanggan=".$_SESSION['user_id']."";
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0){
                                    $no = 1;
                                    while($row =  $result->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <td>1</td>
                                                <td><?= $row['tanggal'] ?></td>
                                                <td><?= number_format($row['subtotal'],2) ?></td>
                                                <td>
                                                    <a href='upload_bukti.php?id_transaksi=<?= $row['id'] ?>'
                                                        class="btn btn-info"> Upload bukti pembayaran </a>
                                                </td>
                                            </tr>
                                            <?php

                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5"><center>Kosong</center></td>
                                    </tr>
                                    <?php
                                }
                                    ?>

                                        </table>
                                    </div>
                                    
                                    <div class="col-md-8 col-sm-7 col-xs-12"> 
                                        Pembayaran bserahasil / transaksi Sukses
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>No</td>
                                                <td>Tanggal</td>
                                                <td>Total Pembayaran</td>
                                            </tr>
                                            <?php
                                    $sql = "SELECT * from transaksi where id_pelanggan=".$_SESSION['user_id']." and status_pembayaran='valid'";
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0){
                                    $no = 1;
                                    while($row =  $result->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <td>1</td>
                                                <td><?= $row['tanggal'] ?></td>
                                                <td><?= number_format($row['subtotal'],2) ?></td>
                                                
                                            </tr>
                                            <?php

                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5"><center>Kosong</center></td>
                                    </tr>
                                    <?php
                                }
                                    ?>

                                        </table>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart-main-area end -->







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
        <script>
            function confirmCheckout() {
                Swal.fire({
                    title: 'Yakin?',
                    text: "Anda akan melakukan pemesanan, dan menuju ke proses pembayaran!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'CheckOut Sekarang'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("confirmCheckoutForm").submit();
                    }
                });
            }
        </script>

    </body>

    </html>