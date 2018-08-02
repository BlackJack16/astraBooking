<div class="normalheader small-header">
    <div class="hpanel ml">
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
                        <a href="<?php echo ROOT?>costumer">Costumer</a>
                    </li>
                    <li class="active">
                        <span>Detail</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Detail costumer
            </h2>
            <small>Detail Data costumer</small>
        </div>
    </div>
</div>

<div class="content">
	
	<div class="hpanel hred">
		<div class="panel-body">
			<form class="form-horizontal" action="?m=edit_save" method="post" autocomplete="off">
				<input type="hidden" name="id" value="<?php echo $d['costumer_id'];?>" />
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Costumer Identitas <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required readonly   name="nama" readonlyplaceholder="Nama costumer" value="<?php echo $d['costumer_identitas'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Nama costumer <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required  readonly name="nama" placeholder="Nama costumer" value="<?php echo $d['costumer_nama'];?>"  />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Tgl. Lahir <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required  readonly name="tgl" placeholder="Tgl Lahir" value="<?php echo date_format(date_create($d['costumer_tgl']),"d/m/Y");?>"  />
					</div>
				</div>

				

				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Telepon <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required readonly name="telp" placeholder="Telepon" value="<?php echo $d['costumer_telp'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Alamat </strong></label>
					<div class="col-sm-9">
						<textarea class="form-control" name="alamat" readonly="" placeholder="Alamat" rows="3"><?php echo $d['costumer_alamat'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Email </strong></label>
					<div class="col-sm-9">
						<input type="email" class="form-control" readonly placeholder="Email" value="<?php echo $d['costumer_email'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Jenis Kelamin </strong></label>
					<div class="col-sm-9">
						<input type="email" class="form-control" readonly placeholder="Email" value="<?php echo $d['costumer_jk'];?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Agama </strong></label>
					<div class="col-sm-9">
						<input type="email" class="form-control" readonly placeholder="Email" value="<?php echo $d['costumer_agama'];?>" />
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


	<div class="hpanel hred">
	<div class="normalheader small-header" style="padding:0!important;">
    <div class="hpanel">
        <div class="panel-body">
           
            <h2 class="font-light m-b-xs">
                Detail Kendaraan
            </h2>
            <small>Detail Data Kendaraan Costumer</small>
        </div>
    </div>
</div>
		<div class="panel-body">
						<table class="table table-striped table-bordered table-hover <?php echo $data != FALSE ? 'dataTable':NULL;?>">
							<colgroup>
								<col class="col-sm-1" />
								<col class="col-sm-2 text-center" />
								<col class="col-sm-2" />
								<col class="col-sm-1" />
								<col class="col-sm-1" />
							</colgroup>
							<thead>
										<tr>
											<th >No </th>
											<th>Kendaraan costumer</th>
											<th>No polisi</th>
											<th>Tahun</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										if($kendaraan)
										{
											$no = 1;
											foreach($kendaraan as $d)
											{
											?>
										<tr>
											<td><?php echo $no;?></td>
											<td><?php echo $d['variant_nama'];?></td>
											<td><?php echo $d['kendCos_nopol'];?></td>
											<td><?php echo date_format(date_create($d['kendCos_thn']),"d/m/Y");?></td>
											
										</tr>
											<?php
											$no++;}
										}
										else
										{
											echo '<tr><td colspan=6>Tidak Ada Data</td></tr>';
										}
										?>
									</tbody>
						</table>
				</div>
    	</div>
					
</div>

