<div class="normalheader small-header">
    <div class="hpanel ml">
        <div class="panel-body">
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li class="active">
                        <span>Dashboard</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Dashboard
            </h2>
            <small>Selamat datang di E-BOOKING </small>
        </div>
    </div>
</div>

<div class="content" style="padding-right:20px;">
	<div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-body">
						<h4>Selamat datang di Aplikasi E-BOOKING <br/><strong>Astra Motor Plaju Palembang</strong></h4>
						<hr/>
						<h5>Alamat: Jl. Ahmad Yani No.99, Plaju Ulu, Kec. Plaju, Kota Palembang, Sumatera Selatan 30119</h5>
						<h5>Telepon: (0711) 517676</h5>
                    </div>
                </div>
            </div>
			<div class="col-lg-3">
                <div class="hpanel">
                    <div class="panel-body text-center">
                        <h2 class="m-xs"><?php echo $d['booking'] ?></h2><br/>
                        <h4 class="font-extra-bold no-margins text-success">
                            Total Booking
                        </h4>
                    </div>
                </div>
            </div>
			<div class="col-lg-3">
                <div class="hpanel">
                    <div class="panel-body text-center">
                        <h2 class="m-xs"><?php echo $d['demand'] ?></h2><br/>
                        <h4 class="font-extra-bold no-margins text-success">
                            Antrian Booking
                        </h4>
                    </div>
                </div>
            </div>
			<div class="col-lg-3">
                <div class="hpanel">
                    <div class="panel-body text-center">
                        <h2 class="m-xs"><?php echo $d['terima'] ?></h2><br/>
                        <h4 class="font-extra-bold no-margins text-success">
                            Booking Terima
                        </h4>
                    </div>
                </div>
            </div>
			<div class="col-lg-3">
                <div class="hpanel">
                    <div class="panel-body text-center">
                        <h2 class="m-xs"><?php echo $d['service'] ?></h2><br/>
                        <h4 class="font-extra-bold no-margins text-success">
                            Total Transaksi
                        </h4>
                    </div>
                </div>
            </div>
	</div>

</div>