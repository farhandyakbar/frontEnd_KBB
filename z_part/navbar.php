        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="index.php">
                                    <img style="width: 110px;" src="images/logo/logo-large.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="index.php">Home</a></li>
                                    <li class="drop"><a href="#">Kategori</a>
                                        <ul class="dropdown">
                                            <?php
                                        $sql = "SELECT * FROM kategori";
                                        $result = $conn->query($sql); 
                                        if ($result->num_rows>0){
                                        $no= 1;
                                        while($row = $result ->fetch_assoc()){
                                    ?>
                                            <li><a href="by_kategori.php?id_kategori=<?= $row['id']?>">
                                                    <?= $row['nama']?> </a></li>
                                            <?php
                                        }
                                        }
                                    ?>
                                        </ul>
                                    </li>
                                    <!-- <li class="drop"><a href="#">Data</a>
                                        <ul class="dropdown">
                                            <li><a href="barang.php">data barang</a></li>
                                            <li><a href="kategori.php">data kategori</a></li>
                                        </ul>
                                    </li> -->
                                    <li><a href="semua_barang.php">Semua Barang</a></li>
                                    <?php
                                        if(isset($_SESSION['username'])) {
                                    ?>
                                    <li><a href="logout.php">Log Out</a></li>
                                    <?php
                                    }else{
                                    ?>
                                        <li><a href="login.php">Login</a></li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </nav>
                            <!-- <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="#">portfolio</a>
                                            <ul>
                                                <li><a href="portfolio-card-box-2.html">portfolio</a></li>
                                                <li><a href="single-portfolio.html">Single portfolio</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">blog</a>
                                            <ul>
                                                <li><a href="blog.html">blog 3 column</a></li>
                                                <li><a href="blog-details.html">Blog details</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>                           -->
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-2 col-sm-4 col-xs-3">
                            <ul class="menu-extra">
                                <!-- <li class="search search__open hidden-xs"><span class="ti-search"></span></li> -->
                                <!-- <li class="drop"><a href="login.php"><span class="ti-user"></span></a>
                                </li> -->
                                <li class="cart__menu"><a href="cart.php"><span class="ti-shopping-cart"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>

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