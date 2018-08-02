<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/homer_admin-v2.0/light-shadow/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Mar 2017 07:49:25 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>ASTRA | HONDA</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- assets/css/ styles -->
    <link rel="stylesheet" href="<?php echo ROOT;?>assets/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo ROOT;?>assets/css/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo ROOT;?>assets/css/animate.css" />
    <link rel="stylesheet" href="<?php echo ROOT;?>assets/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo ROOT;?>assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo ROOT;?>assets/css/helper.css" />
    <link rel="stylesheet" href="<?php echo ROOT;?>assets/css/toastr.min.css" />
    <link rel="stylesheet" href="<?php echo ROOT;?>assets/css/style.css">
    <link href="<?php echo ROOT;?>assets/css/custom.css" rel="stylesheet">

</head>
<body class="light-skin blank" style="background-image: url(<?php echo ROOT?>assets/img/bg-1.jpg); background-size: cover">
   
<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <img style="width: 150px;max-height: 100%; margin-left: 20px" src="<?php echo ROOT?>assets/img/web_logo.png"><br/>
                <h4 ><strong style="color: red"> One</strong> <strong style="color: #FFF">HEART !!!</strong></h4>
            </div>
            <div class="hpanel">
                <div class="panel-body"  style="background-color:rgba(255, 255, 255, 0.19)">
                        <form   method="POST" action="?m=do_login"">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                           
                            <button class="btn btn-danger btn-block" type="submit">Login</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong style="color: #000">E-Booking</strong> <span style="color: #000">  Aplikasi Pelayanan Booking Service</span> <br/> <span style="color: #000"><strong>2017 Copyright Karya Siber Indonesia </strong> </span>
        </div>
    </div>
</div>




		
 