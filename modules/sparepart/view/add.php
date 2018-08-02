<div class="normalheader small-header">
    <div class="hpanel">
        <div class="panel-body">
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li>
                        <a href="<?php echo ROOT?>">Dashboard</a>
                    </li>
                    <li>
                        <span>Master Data</span>
                    </li>
                    <li>
                        <a href="<?php echo ROOT?>sparepart">Sparepart</a>
                    </li>
                    <li class="active">
                        <span>Tambah</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Tambah Sparepart
            </h2>
        </div>
    </div>
</div>

<div class="content">
	<div class="hpanel hblue">
		<div class="panel-body">
			<form class="form-horizontal" action="?m=add_save" method="post" autocomplete="off">
				
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Kode sparepart <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required name="kode" placeholder="Kode sparepart" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Nama sparepart <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required name="nama" placeholder="Nama sparepart" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Harga <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required autofocus name="harga" placeholder="Username" />
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-3 text-center">
						<a href="javascript:window.history.go(-1);" class="btn btn-default">Kembali</a>					
					</div>
					<div class="col-sm-9">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
