<?php?>
<header class="site-header">
    <div class="top-header-bar" style="background-color:#2f4f4f; border-bottom:2px solid lightgray;">
        <div class="container ">
            <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">

                <div class="col-md-12 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                    <div class="lead text-success col-5 mt-2"><a href="index.php" class="text-light">KÜTÜPHANELER GENEL MÜDÜRLÜĞÜ</a></div>
                    <div class="header-bar-email float-left col-3">
                          <span class="fa fa-envelope"> millikutuphane@ankara.com</span>
                    </div>
                    <div class="header-bar-text col-3">
                        <p><span class="fa fa-phone"> 0312 273 52 18</span>
                            <?php

                            if (isset($_SESSION['Adi']))
                            {

                                echo "<button class='btn btn-danger btn-sm ml-4'>".$_SESSION['Adi']."  ".$_SESSION['Soyadi']."</button></p>";
                            }
                            else{
                                echo "<span class=\"fa fa-phone ml-3\"> 0312 273 52 18</span>";
                            }

                            ?>


                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="site-branding d-flex align-items-center">
                        <a class="d-block" href="index.php" rel="home"><img class="d-block" src="images/travel_logo.png" alt="logo"></a> <img class="d-block ml-5" src="images/turkey_logo.png" alt="logo">
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li class="current-menu-item"><a href="index.php">Anasayfa</a></li>
                            <li><a href="#">Genel Müdürlüğümüz</a></li>
                            <li><a href="#">Faaliyetlerimiz</a></li>
                            <li><a href="#">İstatistikler</a></li>
                            <li><a href="#">Duyurular</a></li>

                            <?php

                            if (isset($_SESSION['Adi']))
                            {

                                echo "<li><a href=\"admin\">Yönetim Paneli</a></li><li><a href='cikis.php' onmouseov>Çıkış Yap</a></li>";
                            }
                            else{
                                echo "<li><a href=\"#\">İletişim</a></li><li><a href='login.php' onmouseov>Giriş Yap</a></li><li><a href='uyeol.php' onmouseov>Uye Ol</a></li>";
                            }

                            ?>


                        </ul>
                    </nav>
                    <div class="hamburger-menu d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- .hamburger-menu -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .nav-bar -->
</header>



