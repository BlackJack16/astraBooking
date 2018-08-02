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
                    <li class="active">
                        <span>Costumer</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Costumer
            </h2>
            <small>Data Costumer</small>
        </div>
    </div>
</div>

<div class="content">
    <div class="hpanel hred">
	<div class="panel-tool">
			<a href="?m=add" class="btn btn-danger btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
		</div>
		<div class="panel-body">
						<table class="table table-striped table-bordered table-hover <?php echo $data != FALSE ? 'dataTable':NULL;?>">
							<colgroup>
								<col class="col-sm-1" />
								<col class="col-sm-3 text-center" />
								<col class="col-sm-1" />
								<col class="col-sm-1" />
								<col class="col-sm-1" />
							</colgroup>
							<thead>
								<tr>
									<th >No Identitas</th>
									<th>Info costumer</th>
									<th>Jenis Kelamin</th>
									<th>Agama</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if($data)
								{
									$no = 1;
									foreach($data as $d)
									{
									?>
								<tr>
									<td><?php echo $d['costumer_identitas'];?></td>
									<td><strong><?php echo $d['costumer_nama'];?></strong><br/><i><?php echo $d['costumer_alamat'];?></i><br/><i><?php echo $d['costumer_telp'];?></i> / <i><?php echo $d['costumer_email'];?></i></td>
									<td><?php echo $d['costumer_jk'];?></td>
									<td><?php echo $d['costumer_agama'];?> </td>
									<td class="text-center">
										<a href="?m=detail&id=<?php echo $d['costumer_id'];?>" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-search"></i></a>
									
									
										<a href="?m=delete&id=<?php echo $d['costumer_id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin akan menghapus data [<?php echo $d['costumer_nama'] ?>] ?')"><i class="fa fa-times"></i></a>
									</td>
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