<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Masuk</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/home') }}"><b>Inovasi </b>Semen Padang</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Silakan Masuk menggunakan akun HIRS</p>
        <form method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <br>
        <div class="text-center">
            <p>Bukan Pegawai Semen Padang?</p> <a href="{{ url('/register') }}" class="text-center">klik disini</a>
        </div>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>













{{--<!doctype html>--}}
{{--<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->--}}
{{--<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->--}}
{{--<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->--}}
{{--<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->--}}
{{--<head>--}}
{{--<meta charset="utf-8">--}}
{{--<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge" />--}}
{{--<title>SPIE</title>--}}
{{--<meta name="description" content="">--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--<link rel="apple-touch-icon" href="apple-touch-icon.png">--}}
{{--<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />--}}
{{--<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />--}}
{{--<link rel="stylesheet" href="{{asset('landing/css/normalize.min.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('landing/css/jquery.fancybox.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('landing/css/flexslider.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('landing/css/styles.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('landing/css/styles.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('landing/css/etline-font.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('landing/bower_components/animate.css/animate.min.css')}}">--}}
{{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">--}}
{{--<script src="{{asset('landing/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>--}}
{{--</head>--}}




{{--<body id="top">--}}
{{--<!--[if lt IE 8]>--}}
{{--<![endif]-->--}}
{{--<section class="hero">--}}
{{--<section class="navigation">--}}
{{--<header>--}}
{{--<div class="header-content">--}}
{{--<div class="logo"><a href="#"></a></div>--}}
{{--<div class="header-nav">--}}
{{--<nav>--}}
{{--<ul class="primary-nav">--}}
{{--<li><a href="#assets">Tentang</a></li>--}}
{{--<li><a href="#features">Kategori</a></li>--}}
{{--</ul>--}}
{{--<ul class="member-actions">--}}
{{--<li><a href="{{route('login')}}" class="login">Masuk</a></li>--}}
{{--<li><a href="{{route('register')}}" class="btn-white btn-small">Daftar</a></li>--}}
{{--</ul>--}}
{{--</nav>--}}
{{--</div>--}}
{{--<div class="navicon">--}}
{{--<a class="nav-toggle" href="#"><span></span></a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</header>--}}
{{--</section>--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-10 col-md-offset-1">--}}
{{--<div class="hero-content text-center">--}}
{{--<h1>TPM OFFICER</h1>--}}
{{--<p class="intro">Introducing “Sedna”. A responsive one page website, designed & developed exclusively for Codrops.</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="down-arrow floating-arrow"><a href="#"><i class="fa fa-angle-down"></i></a></div>--}}
{{--</section>--}}

{{--<section class="features-extra section-padding" id="assets">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-5">--}}
{{--<div class="feature-list">--}}
{{--<h3>Semen Padang Innovation Events</h3>--}}
{{--<p>Semen Padang Innovation Events (SPIE) adalah Easily change/switch/swap every placeholder inside every image on Sedna with the included Sketch files. You’ll have this template customised to suit your business in no time! </p>--}}
{{--<p>Nam vehicula malesuada lectus, interdum fringilla nibh. Duis aliquam vitae metus a pharetra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum augue quis augue ornare, eget faucibus felis pharetra. Proin condimentum et leo quis fringilla.--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="macbook-wrap wp3"></div>--}}
{{--<div class="responsive-feature-img"><img src="{{asset('landing/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}" alt="responsive devices"></div>--}}
{{--</section>--}}

{{--<section class="features section-padding" id="features">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-6">--}}
{{--<div class="feature-list">--}}
{{--<h3>BREAKTROUGH</h3>--}}
{{--<p>Present your product, start up, or portfolio in a beautifully modern way. Turn your visitors in to clients.</p>--}}
{{--<ul class="features-stack">--}}
{{--<li class="feature-item">--}}
{{--<div class="feature-icon">--}}
{{--<span data-icon="&#xe03e;" class="icon"></span>--}}
{{--</div>--}}
{{--<div class="feature-content">--}}
{{--<h5>TPP TBG-Raw mill</h5>--}}
{{--<p>Sedna is universal and will look smashing on any device.</p>--}}
{{--<a href="#" class="btn btn-ghost btn-accent btn-small"> Download Template </a>--}}
{{--</div>--}}
{{--</li>--}}
{{--<li class="feature-item">--}}
{{--<div class="feature-icon">--}}
{{--<span data-icon="&#xe040;" class="icon"></span>--}}
{{--</div>--}}
{{--<div class="feature-content">--}}
{{--<h5>TPP Kiln-packer</h5>--}}
{{--<p>Sedna takes advantage of common design patterns, allowing for a seamless experience for users of all levels.</p>--}}
{{--<a href="#" class="btn btn-ghost btn-accent btn-small"> Download Template </a>--}}
{{--</div>--}}
{{--</li>--}}
{{--<li class="feature-item">--}}
{{--<div class="feature-icon">--}}
{{--<span data-icon="&#xe03c;" class="icon"></span>--}}
{{--</div>--}}
{{--<div class="feature-content">--}}
{{--<h5>Management</h5>--}}
{{--<p>Download and re-use the Sedna open source code for any other project you like.</p>--}}
{{--<a href="#" class="btn btn-ghost btn-accent btn-small"> Download Template </a>--}}
{{--</div>--}}
{{--</li>--}}
{{--<li class="feature-item">--}}
{{--<div class="feature-icon">--}}
{{--<span data-icon="&#xe046;" class="icon"></span>--}}
{{--</div>--}}
{{--<div class="feature-content">--}}
{{--<h5>PBB</h5>--}}
{{--<p>Download and re-use the Sedna open source code for any other project you like.</p>--}}
{{--<a href="#" class="btn btn-ghost btn-accent btn-small"> Download Template </a>--}}
{{--</div>--}}
{{--</li>--}}
{{--<li class="feature-item">--}}
{{--<div class="feature-icon">--}}
{{--<span data-icon="&#xe030;" class="icon"></span>--}}
{{--</div>--}}
{{--<div class="feature-content">--}}
{{--<h5>APA</h5>--}}
{{--<p>Download and re-use the Sedna open source code for any other project you like.</p>--}}
{{--<a href="#" class="btn btn-ghost btn-accent btn-small"> Download Template </a>--}}
{{--</div>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="col-md-6">--}}
{{--<div class="feature-list">--}}
{{--<h3>INCREAMENTAL</h3>--}}
{{--<p>Present your product, start up, or portfolio in a beautifully modern way. Turn your visitors in to clients.</p>--}}
{{--<ul class="features-stack">--}}
{{--<li class="feature-item">--}}
{{--<div class="feature-icon">--}}
{{--<span data-icon="&#xe03e;" class="icon"></span>--}}
{{--</div>--}}
{{--<div class="feature-content">--}}
{{--<h5>GKM</h5>--}}
{{--<p>Sedna is universal and will look smashing on any device.</p>--}}
{{--<a href="#" class="btn btn-ghost btn-accent btn-small"> Download Template </a>--}}
{{--</div>--}}
{{--</li>--}}
{{--<li class="feature-item">--}}
{{--<div class="feature-icon">--}}
{{--<span data-icon="&#xe040;" class="icon"></span>--}}
{{--</div>--}}
{{--<div class="feature-content">--}}
{{--<h5>PKM</h5>--}}
{{--<p>Sedna takes advantage of common design patterns, allowing for a seamless experience for users of all levels.</p>--}}
{{--<a href="#" class="btn btn-ghost btn-accent btn-small"> Download Template </a>--}}
{{--</div>--}}
{{--</li>--}}
{{--<li class="feature-item">--}}
{{--<div class="feature-icon">--}}
{{--<span data-icon="&#xe03c;" class="icon"></span>--}}
{{--</div>--}}
{{--<div class="feature-content">--}}
{{--<h5>SS</h5>--}}
{{--<p>Download and re-use the Sedna open source code for any other project you like.</p>--}}
{{--<a href="#" class="btn btn-ghost btn-accent btn-small"> Download Template </a>--}}
{{--</div>--}}
{{--</li>--}}
{{--<li class="feature-item">--}}
{{--<div class="feature-icon">--}}
{{--<span  data-icon="&#xe033;" class="icon"></span>--}}
{{--</div>--}}
{{--<div class="feature-content">--}}
{{--<h5>5S / 5P</h5>--}}
{{--<p>Download and re-use the Sedna open source code for any other project you like.</p>--}}
{{--<a href="#" class="btn btn-ghost btn-accent btn-small"> Download Template </a>--}}
{{--</div>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}
{{--</section>--}}


{{--<section class="features-extra section-padding" id="assets">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="text-center">--}}
{{--<h3 >Silakan Daftarkan Inovasi Disini</h3 >--}}
{{--<a class="btn btn-fill btn-accent btn-small" href="{{route("tims.index")}}"><i class="fa fa-lightbulb-o"></i> Daftar Inovasi</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}


{{--<footer>--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-7">--}}
{{--<div class="footer-links">--}}
{{--<p>Copyright © 2019 <a href="#">@dartikaanie</a><br>--}}
{{--<a href="http://tympanus.net/codrops/licensing/">Licence</a> | Crafted with <span class="fa fa-heart pulse2"></span> for <a href="https://tympanus.net/codrops/">TPM Officer</a>.</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</footer>--}}
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
{{--<script>window.jQuery || document.write('<script src="{{asset('landing/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"><\/script>')</script>--}}
{{--<script src="{{asset('landing/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>--}}
{{--<script src="{{asset('landing/js/jquery.fancybox.pack.js')}}"></script>--}}
{{--<script src="{{asset('landing/js/vendor/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{asset('landing/js/scripts.js')}}"></script>--}}
{{--<script src="{{asset('landing/js/jquery.flexslider-min.js')}}"></script>--}}
{{--<script src="{{asset('landing/bower_components/classie/classie.js')}}"></script>--}}
{{--<script src="{{asset('landing/bower_components/jquery-waypoints/lib/jquery.waypoints.min.js')}}"></script>--}}
{{--<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->--}}
{{--<script>--}}
{{--(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=--}}
{{--function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;--}}
{{--e=o.createElement(i);r=o.getElementsByTagName(i)[0];--}}
{{--e.src='//www.google-analytics.com/analytics.js';--}}
{{--r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));--}}
{{--ga('create','UA-XXXXX-X','auto');ga('send','pageview');--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
