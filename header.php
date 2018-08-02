<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="CV. Karya Siber Indonesia">
    <link rel="icon" href="<?php echo ROOT;?>assets/img/web_logo.png" type="image/x-icon">

    <title>ASTRA | HONDA</title>
	
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
	
    <?php echo $styles;?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo ROOT;?>assets/js/html5shiv.min.js"></script>
      <script src="<?php echo ROOT;?>assets/js/respond.min.js"></script>
    <![endif]-->
    
  </head>
<body class="light-skin fixed-navbar sidebar-scroll" style="background-image: url(<?php echo ROOT?>assets/img/bg-1.jpg); background-size: cover">
<?php 
if($this->login_lib->is_login())
{
?>
	<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version" style="background-color: #000; width: 202px;">
        <h2 style="font-size: 24px; font-weight: 300; position: absolute;margin-top: -5px;color: #fff;margin-left: -5px;" class="text-primary"> 
            E-BOOKING
        </h2>
    </div>
    <nav role="navigation">
        <div class="header-link " ><i class="fa fa-bars"></i></div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li class="dropdown">
                    <a href="<?php echo ROOT?>login?m=logout">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Navigation -->
<aside id="menu" style="width: 202px;
    background: rgba(255, 255, 255, 0.6);">
    <div id="navigation">
        <div class="profile-picture" style="display:block">

            <div class="stats-label text-color">
                <div style="margin-bottom: 10px" class="image-responsive">
                    <img style="width: 100px;max-height: 100%" src="<?php echo ROOT?>assets/img/web_logo.png">
                </div>
                
                <span class="font-extra-bold font-uppercase"><?php echo $userdata['id_user']?></span>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted"><?php echo $userdata['nama']?> <b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                        <li><a href="<?php echo ROOT?>profile">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo ROOT?>login/?m=logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav" id="side-menu" style="padding-left:20px;padding-right:20px;">
            <li class="active">
                <a href="<?php echo ROOT?>"><i class="fa fa-desktop"></i> <span class="nav-label">Dashboard</span></a>
            </li>

            <li>
                <a href="#"><span class="nav-label"><i class="fa fa-folder-open"></i> Master Data</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo ROOT?>costumer">Costumer</a></li>
                    <li><a href="<?php echo ROOT?>kendaraan">Kendaraan</a></li>
                    <li><a href="<?php echo ROOT?>service">Service</a></li>
                    <li><a href="<?php echo ROOT?>sparepart">Sparepart</a></li>
                    <li><a href="<?php echo ROOT?>event">Event</a></li>
                </ul>
            </li>		
            <li>
                <a href="<?php echo ROOT?>booking"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Booking</span></a>
            </li>
            <li>
                <a href="<?php echo ROOT?>transaksi"><i class="fa fa-upload"></i> <span class="nav-label">Transaksi</span></a>
            </li>
            <li><a href="<?php echo ROOT?>saran"><i class="fa fa-warning"></i><span class="nav-label">Kritik & Saran</span></a></li>
        </ul>
    </div>
</aside>


        
	<!-- Main Wrapper -->
	<div id="wrapper">
			<?php } ?>