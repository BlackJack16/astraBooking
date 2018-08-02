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
                        <span>Detail</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Transaksi Service
            </h2>
            <small>Detail Data Service</small>
        </div>
    </div>
</div>

<div class="content">
	<div class="form-horizontal">
		<div class="row ">
	        <div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading panel-heading-divider">
						Informasi Service
						<span class="panel-subtitle">Informasi Data Service</span>
					</div>
					<div class="panel-body">
							<div class="col-sm-6" style="padding-left:0;border-right:1px solid #ededed">
								<div class="form-group">
									<label class="col-sm-4 form-label">ID Booking <span class="required">*</span></label>
									<div style="padding-left: 15px; padding-right: 15px" class="input-group col-sm-8">
										<input type="text" class="form-control " id="booking" placeholder="Isikan Kode Booking / Nomor Plat Kendaraan" value="<?php echo $d['trs_booking'] ?>" readonly /><span class="input-group-btn">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 form-label">Nama Costumer</label>
									<div class="col-sm-8">
										<input type="text" class="form-control " id="costumer_nama" placeholder="-" value="<?php echo $d['costumer_nama'] ?>"  readonly />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 form-label">No. Identitas</label>
									<div class="col-sm-8">
										<input type="text" class="form-control " id="costumer_identitas" placeholder="-" value="<?php echo $d['costumer_identitas'] ?>" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 form-label">Alamat </label>
									<div class="col-sm-8">
										<textarea type="text" class="form-control " id="costumer_alamat" name="judul"  placeholder="" style="height:77px;resize:none;" readonly=""><?php echo $d['costumer_alamat'] ?></textarea>
									</div>
								</div>
  								<div class="form-group">
  									<label class="col-sm-4 form-label">Tgl. Lahir</label>
  									<div class="col-sm-8">
  										<input type="text" class="form-control " id="costumer_tgl"  placeholder="-" value="<?php echo date_format(date_create($d['costumer_tgl']),"d/m/Y") ?>" readonly />
  									</div>
  								</div>
    								<div class="form-group">
    									<label class="col-sm-4 form-label">Jenis Kelamin</label>
    									<div class="col-sm-8">
    										<input type="text" class="form-control " id="costumer_jk"  placeholder="-" value="<?php echo $d['costumer_jk'] ?>" readonly />
    									</div>
    								</div>
							</div>

							<div class="col-sm-6" style="border-right:1px solid #ededed;">
								<div class="form-group">
									<label class="col-sm-4 form-label">Agama</label>
									<div class="col-sm-8">
										<input type="text" class="form-control " id="costumer_agama"  placeholder="-" value="<?php echo $d['costumer_agama'] ?>" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 form-label">E-mail</label>
									<div class="col-sm-8">
										<input type="text" class="form-control " id="costumer_email"  placeholder="-" value="<?php echo $d['costumer_email'] ?>" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 form-label">Telp.</label>
									<div class="col-sm-8">
										<input type="text" class="form-control " id="costumer_telp"  placeholder="-" value="<?php echo $d['costumer_telp'] ?>" readonly />
									</div>
								</div>
                <hr/>
                <h5>Informasi Kendaraan</h5>
                <hr/>
								<div class="form-group">
									<label class="col-sm-4 form-label">Type/Variant</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="variant"  placeholder="-" value="<?php echo $d['variant_nama'] ?>" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 form-label">Nomor Plat</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="nopol"  placeholder="-" value="<?php echo $d['kendCos_nopol'] ?>" readonly />
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
					<span class="panel-subtitle">Daftar Informasi Biaya Bimbingan</span>
				</div>
				<div class="panel-body" style="padding-top:0;">
					<table class="table table-part">
						<colgroup>
						</colgroup>
						<thead>
							<tr>
								<th>Nama Sparepart</th>
								<th style="width: 180px" class="text-center">Harga</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$total=0;
							if ($part){
								foreach($part as $p){
									$total +=$p['dsparepart_harga'];
						?>
							<tr><td><?php echo $p['sparepart_nama']?></td><td class="text-right">RP <?php echo number_format($p['dsparepart_harga'],0,",",".") ?></td></tr>
						<?php
								}
							}
						?>
						</tbody>
						<tfoot>
							<tr class="bold">
								<td  class="text-right">
									Total
								</td>
								<td class="text-right" id="total_part">
									RP <?php echo number_format($total, 0,',','.') ?>
								</td>
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
					<span class="panel-subtitle">Daftar Informasi Biaya Bimbingan</span>
				</div>
				<div class="panel-body" style="padding-top:0;">
					<table class="table table-service">
						<colgroup>
						</colgroup>
						<thead>
							<tr>
								<th>Nama Service</th>
								<th style="width: 180px" class="text-center">Harga</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$total=0;
							if ($service){
								foreach($service as $s){
									$total +=$s['dservice_harga'];
						?>
							<tr><td><?php echo $s['service_nama']?></td><td class="text-right">RP <?php echo number_format($s['dservice_harga'],0,",",".") ?></td></tr>
						<?php
								}
							}
						?>
						</tbody>
						<tfoot>
							<tr class="bold">
								<td  class="text-right">
									Total
								</td>
								<td class="text-right" id="total_service">
									RP <?php echo number_format($total, 0,',','.') ?>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
