<div class="normalheader small-header">
    <div class="hpanel">
        <div class="panel-body">
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li>
                        <a href="<?php echo ROOT?>">Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo ROOT?>transaksi">Transaksi Service</a>
                    </li>
                    <li class="active">
                        <span>Tambah</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Transaksi Service
            </h2>
            <small>Tambah Data Service</small>
        </div>
    </div>
</div>

<div class="content">
	<form class="form-horizontal form-main-cac" action="?m=add_save" method="post" autocomplete="off">
		<div class="row">
	        <div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading panel-heading-divider">
						Informasi Service
						<span class="panel-subtitle">Formulir Informasi Data Service</span>
					</div>
					<div class="panel-body">
							<div class="col-sm-6" style="padding-left:0;border-right:1px solid #ededed">
								<div class="form-group">
									<label class="col-sm-4 form-label">ID Booking <span class="required">*</span></label>
									<div style="padding-left: 15px; padding-right: 15px" class="input-group col-sm-8">
										<input type="hidden" name="booking_id" id="booking_id"/>
										<input type="text" class="form-control " id="booking" placeholder="Isikan Kode Booking / Nomor Plat Kendaraan" required autofocus/><span class="input-group-btn">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 form-label">Nama Costumer</label>
									<div class="col-sm-8">
										<input type="text" class="form-control " id="costumer_nama" placeholder="-" readonly />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 form-label">No. Identitas</label>
									<div class="col-sm-8">
										<input type="text" class="form-control " id="costumer_identitas" placeholder="-" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 form-label">Alamat </label>
									<div class="col-sm-8">
										<textarea type="text" class="form-control " id="costumer_alamat" name="judul"  placeholder="" style="height:77px;resize:none;" readonly=""></textarea>
									</div>
								</div>
  								<div class="form-group">
  									<label class="col-sm-4 form-label">Tgl. Lahir</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control " id="costumer_tgl"  placeholder="-" readonly />
  									</div>
  								</div>
    								<div class="form-group">
    									<label class="col-sm-4 form-label">Jenis Kelamin</label>
    									<div class="col-sm-8">
    										<input type="text" class="form-control " id="costumer_jk"  placeholder="-" readonly />
    									</div>
    								</div>
							</div>

							<div class="col-sm-6" style="border-right:1px solid #ededed;">
								<div class="form-group">
									<label class="col-sm-4 form-label">Agama</label>
									<div class="col-sm-8">
										<input type="text" class="form-control " id="costumer_agama"  placeholder="-" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 form-label">E-mail</label>
									<div class="col-sm-8">
										<input type="text" class="form-control " id="costumer_email"  placeholder="-" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 form-label">Telp.</label>
									<div class="col-sm-8">
										<input type="text" class="form-control " id="costumer_telp"  placeholder="-" readonly />
									</div>
								</div>
                <hr/>
                <h5>Informasi Kendaraan</h5>
                <hr/>
								<div class="form-group">
									<label class="col-sm-4 form-label">Type/Variant</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="variant"  placeholder="-" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 form-label">Nomor Plat</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="nopol"  placeholder="-" readonly />
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
	         <div class="col-xs-6">
				<div class="panel panel-default">
				<div class="panel-heading">
					Informasi Biaya Bimbingan
					<span class="panel-subtitle">Formulir Informasi Biaya Bimbingan</span>
				</div>
				<div class="panel-body" style="padding-top:0;">
					<table class="table table-part">
						<colgroup>
						</colgroup>
						<thead>
							<tr>
								<th>Nama Sparepart</th>
								<th style="width: 180px" class="text-center">Harga</th>
								<th class="" width="50px"></th>
							</tr>
							<tr class="form">
								<th>
									<input type="hidden" id="sparepart_value"/>
									<select class="form-control" id="sparepart_nama" >
										<option value="" class="disable-select">------</option>
										<?php
											if ($sparepart){
												foreach ($sparepart as $s){
										?>
										<option value="<?php echo $s['sparepart_id']?>"><?php echo $s['sparepart_nama']?></option>
										<?php
												}
											}
										?>
									</select>

								</th>
								<th>
									<input type="text" class="form-control " id="sparepart_harga"  placeholder="-" readonly />
								</th>

								<th style="">
									<button type="button" class="form-table part-add btn-success"><i class="fa fa-plus-square-o"></i></button>
								</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
							<tr class="bold">

								<td  class="text-right">
									Total
								</td>
								<td class="text-right" id="total_part">

								</td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

		<div class="col-xs-6">
				<div class="panel panel-default">
				<div class="panel-heading">
					Informasi Biaya Bimbingan
					<span class="panel-subtitle">Formulir Informasi Biaya Bimbingan</span>
				</div>
				<div class="panel-body" style="padding-top:0;">
					<table class="table table-service">
						<colgroup>
						</colgroup>
						<thead>
							<tr>
								<th>Nama Service</th>
								<th style="width: 180px" class="text-center">Harga</th>
								<th class="" width="50px"></th>
							</tr>
							<tr class="form">
								<th>
									<input type="hidden" id="service_value"/>
									<select class="form-control" id="service_nama" >
										<option value="" class="disable-select">------</option>
										<?php
											if ($service){
												foreach ($service as $s){
										?>
										<option value="<?php echo $s['service_id']?>"><?php echo $s['service_nama']?></option>
										<?php
												}
											}
										?>
									</select>

								</th>
								<th>
									<input type="text" class="form-control " id="service_harga"  placeholder="-" readonly />
								</th>

								<th style="">
									<button type="button" class="form-table service-add btn-success"><i class="fa fa-plus-square-o"></i></button>
								</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
							<tr class="bold">

								<td  class="text-right">
									Total
								</td>
								<td class="text-right" id="total_service">

								</td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<a href="javascript:window.history.go(-1);" class="btn btn-warning">Batal</a>
					<button type="submit" class="btn btn-primary pull-right">Simpan</button>
			</div>
		</div>
	</form>
</div>
