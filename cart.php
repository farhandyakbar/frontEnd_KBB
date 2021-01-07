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


function searchForId($id, $array) { 

    foreach ($array as $key => $val) {
        echo $val['kode']; 

        if ($val['kode'] === $id) {
            return $key;
        }
    }
    return null;
 }
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
                                
                                if(is_numeric(searchForId($_GET["code"], $_SESSION["cart_item"]))) {
                                    // if(array_search($detailBarang['id'], array_column($_SESSION["cart_item"], 'kode'))) {
                                    foreach($_SESSION["cart_item"] as $k => $v) {
                                        echo '==================<br>'.$detailBarang['id'].' --'. $v['kode'];
                                            if($detailBarang['id'] == $v['kode']) {
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
                                    if($_GET["code"] == $v['kode'])
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
                
        echo ("<script>location.href='cart.php'</script>");
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
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo $item["kode"]; ?></td>
                                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                <td style="text-align:right;"><?php echo "Rp ".$item["price"]; ?></td>
                                <td style="text-align:right;"><?php echo "Rp ". number_format($item_price,2); ?></td>
                                <td style="text-align:center;">
                                <a href="cart.php?action=remove&code=<?php echo $item["kode"]; ?>"> Remove Item
                                        </a>
                                        </td>
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
                                            <div class="wc-proceed-to-checkout">
                                                <a href="checkout.php" onClick="">Checkout Pesanan Sekarang</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <form id="" method="post" action="checkout.php">
                                        <input type="hidden" name="checkout">
                                        <input type="submit" id="confirmCheckoutForm" value="">
                                    </form> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart-main-area end -->
        </div>
        <!-- Body main wrapper end -->
        <!-- Placed js at the end of the document so the pages load faster -->
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
    </body>

    </html>