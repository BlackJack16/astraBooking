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
                    <li class="active">
                        <span>Kendaraan</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Pengaturan Kendaraan
            </h2>
        </div>
    </div>
</div>

<div class="content">
	<div class="row">		
		<div class="col-md-5">
			<div class="hpanel hred">
				<div class="panel-body" style="max-height:380px;height:380px">
					<form class="form-horizontal" action="?m=type_save" method="post" autocomplete="off">
						<input type="hidden" id="type_id" name="id" value=""/>
						<small><strong>Nama Brand </strong></small>
						
						<div class="input-group">
							<input type="text" class="form-control"  id="type_nama" required name="nama" placeholder="Nama Brand" /> 
							<span class="input-group-btn"> 
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button> 
							</span>
						</div>
					</form>
					<hr/>
					<div style="height:230px;overflow-y:auto">
						<table class="table table-striped table-bordered table-hover" style="margin:0">
							<thead>
								<tr>
									<th>Type</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if($type)
									{
										$no = 1;
										foreach($type as $t)
										{
										?>
									<tr>
										<td><?php echo $t['type_nama'];?></td>
										<td class="text-center" style="width:80px">
											<a href="#" class="btn btn-xs btn-warning edittp" data-ref="<?php echo $t['type_id'];?>" data-val="<?php echo $t['type_nama'];?>" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></a>

											<a href="?m=deletetp&id=<?php echo $t['type_id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin akan menghapus data [<?php echo $s['type_nama'] ?>] ?')"><i class="fa fa-times"></i></a>
										</td>
									</tr>
										<?php
										$no++;}
									}
									else
									{
										echo '<tr><td colspan=2>Belum Ada Brand</td></tr>';
									}
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="hpanel hred">
				<div class="panel-body" style="max-height:380px;height:380px">
					<form class="form-horizontal" action="?m=variant_save" method="post" autocomplete="off">
						<input type="hidden" id="variant_id" name="id" value=""/>
						
						<small><strong>Model </strong></small>
						
						<div class="input-group">
							<span class="input-group-btn" style="width:25%"> 
								<select class="form-control"  name="type" required>
									<?php
										if ($type){
											foreach ($type as $s){
									?>
									<option value="<?php echo $s['type_id']?>"><?php echo $s['type_nama']?></option>
									<?php
											}
										}
									?>
								</select>
							</span>
							<input type="text" class="form-control"  id="variant_nama" required name="nama" placeholder="Nama Model" /> 
							<span class="input-group-btn"> 
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button> 
							</span>
						</div>
					</form>
					<hr/>
					<div style="height:230px;overflow-y:auto">
						<table class="table table-striped table-bordered table-hover" style="margin:0">
							<thead>
								<tr>
									<th>Type</th>
									<th>Variant</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if($variant)
									{
										$no = 1;
										foreach($variant as $s)
										{
										?>
									<tr>
										<td style="width:200px"><?php echo $s['type_nama'];?></td>
										<td><?php echo $s['variant_nama'];?></td>
										<td class="text-center" style="width:80px">
											<a href="#" class="btn btn-xs btn-warning editvr" data-ref="<?php echo $s['variant_id'];?>" data-val="<?php echo $s['variant_nama'];?>" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></a>
											<a href="?m=deletevr&id=<?php echo $s['variant_id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin akan menghapus data [<?php echo $s['variant_nama'] ?>] ?')"><i class="fa fa-times"></i></a>
										</td>
									</tr>
										<?php
										$no++;}
									}
									else
									{
										echo '<tr><td colspan=2>Belum Ada Model</td></tr>';
									}
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
