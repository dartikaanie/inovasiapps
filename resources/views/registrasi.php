<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<?php
include "head.html";
?>
<body id="top">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!--<section class="hero">-->
        <section class="navigation">
            <header>
                <div class="header-content">
                    <div class="logo"><a href="#"><img src="landing/img/logo.png" alt="Sedna logo"></a></div>
                    <div class="header-nav">
                        <nav>
                           <ul class="member-actions">
                                <li><a href="login.php" class="login">Masuk</a></li>
                                <li><a href="index.php" class="btn-fill btn-small">Beranda</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="navicon">
                        <a class="nav-toggle" href="#"><span></span></a>
                    </div>
                </div>
            </header>
        </section>
    <!--</section>-->


    <section class="sign-up section-padding text-center" id="download">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3>Daftar</h3>
                    <p>Silakan masuk data diri anda dibawah ini</p>
                    <form class="signup-form" action="#" method="POST" role="form">
                        <div class="form-input-group">
                            <i class="fa fa-envelope"></i><input type="number" class="" placeholder="NIP" required>
                        </div>
                        <div class="form-input-group">
                            <i class="fa fa-envelope"></i><input type="text" class="" placeholder="Nama" required>
                        </div>
                        <div class="form-input-group">
                            <i class="fa fa-lock"></i><input type="text" class="" placeholder="Unit Biro" required>
                        </div>
                        <div class="form-input-group">
                            <i class="fa fa-lock"></i><input type="date" class="" placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="form-input-group">
                            <select class="form-input-group">
                                <option>Laki - laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-input-group">
                            <i class="fa fa-envelope"></i><input type="text" class="" placeholder="Email" required>
                        </div>
                        <div class="form-input-group">
                            <i class="fa fa-lock"></i><input type="text" class="" placeholder="Password" required>
                        </div>
                        Sudah memiliki akun? silahkan
                        <a href="login.php">login</a><br><br>

                        <!--<button type="submit" class="btn-fill sign-up-btn" href="dashboard/production">Daftar</button>-->
                        <button type="submit" class="btn-fill sign-up-btn" href="dashboard/production">Daftar</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <?php
    include "footer.html";
    ?>
</body>
</html>
