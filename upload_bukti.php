<?php
    include('z_part/header.php');

    
    if(isset($_POST['btnUpload'])){
        // ambil data file
        $namaFile = $_POST['id_transaksi'].$_FILES['bukti_pembayaran']['name'];
        $namaSementara = $_FILES['bukti_pembayaran']['tmp_name'];

        // tentukan lokasi file akan dipindahkan
        $dirUpload = "bukti_upload/";

        // pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

        if ($terupload) {
            $sql = "UPDATE transaksi SET bukti_pembayaran='".$namaFile ."' where id=".$_POST['id_transaksi'];
                                    
                if ($conn->query($sql) === TRUE) {
                    
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                } 
        } else {
            echo "Upload Gagal!";
        }

        echo ("<script>location.href='upload_bukti.php?id_transaksi=".$_POST['id_transaksi']."'</script>");

        
    }
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
                            <div class="row">

                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <h3>Detail Pemesanan </h3>
                                    <?php
                                            if(isset($_GET['id_transaksi'])){
                                                $id = $_GET['id_transaksi'];
                                                $sqlSelect = "SELECT * FROM transaksi where id=$id";
                                                $resultSelect = mysqli_query($conn, $sqlSelect);
                                                $detailTransaksi = mysqli_fetch_assoc($resultSelect); 
                                            }      
                                        ?>
                                    <br><br>
                                    <?= $detailTransaksi['tanggal'] ?> <br>
                                    <?= $detailTransaksi['subtotal'] ?>
                                    <br><br>

                                    <hr>
                                    <?php
                                            if($detailTransaksi['status_pembayaran']=='valid') {
                                                
                                                ?>
                                    <center>Sudah Upload Bukti pembayaran : Pembayaran telah Tervalidasi</center>

                                    <?php 
                                            } else if($detailTransaksi['bukti_pembayaran']!=null){

                                                ?>
                                    <center>Sudah Upload Bukti pembayaran : Pembayaran Belum Tervalidasi</center>
                                    <center><img src="bukti_upload/<?= $detailTransaksi['bukti_pembayaran'] ?>"
                                            width="300">
                                    </center>
                                    <form action="upload_bukti.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_transaksi" value="<?= $detailTransaksi['id'] ?>">
                                        Pilih file: <input type="file" name="bukti_pembayaran" />
                                        <input type="submit" name="btnUpload" value="upload" />
                                    </form>
                                    <?php
                                            } else {
                                                echo '';
                                                ?>

                                    <center>Belum Melakukan Pembayaran</center>
                                    <form action="upload_bukti.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_transaksi" value="<?= $detailTransaksi['id'] ?>">
                                        Pilih file: <input type="file" name="bukti_pembayaran" />
                                        <input type="submit" name="btnUpload" value="upload" />
                                    </form>
                                    <?php
                                            }

                                        ?>

                                    <hr>
                                </div>


                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <h4>Pesanan Saya</h4>
                                    Detail Pemesanan Barang
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>ID Barang</td>
                                            <td>Nama Barang</td>
                                            <td>Harga Barang</td>
                                            <td>Jumlah</td>
                                            <td>total</td>
                                        </tr>
                                        <?php
                                    $sql = "SELECT * from detail_transaksi where id_transaksi=".$detailTransaksi['id']."";
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0){
                                    $no = 1;
                                    while($row =  $result->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><?= $row['id_barang'] ?></td>
                                            <td><?= $row['nama_barang'] ?></td>
                                            <td><?= number_format($row['harga_barang'],2) ?></td>
                                            <td><?= $row['jumlah'] ?></td>
                                            <td><?= number_format($row['total'],2) ?></td>
                                        </tr>
                                        <?php

                                    }
                                }
                                    ?>

                                    </table>
                                </div>

                            </div>
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