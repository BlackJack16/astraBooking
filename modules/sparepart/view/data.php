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
                        <span>Sparepart</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Sparepart
            </h2>
            <small>Data Sparepart</small>
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
								<col class="col-sm-2 text-center" />
								<col class="col-sm-2" />
								<col class="col-sm-1" />
								<col class="col-sm-1" />
							</colgroup>
							<thead>
								<th>No</th>
								<th>Kode</th>
								<th>Nama</th>
								<th>Harga</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								<?php
								if($sparepart)
								{
									$no = 1;
									foreach($sparepart as $d)
									{
									?>
								<tr>
									<td><?php echo $no;?></td>
									<td><strong><?php echo $d['sparepart_kode'];?></td>
									<td><?php echo $d['sparepart_nama'];?></td>
									<td>Rp. <?php echo number_format($d['sparepart_harga'],0,',','.');?> </td>
									<td class="text-center">
										<a href="?m=edit&id=<?php echo $d['sparepart_id'];?>" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
									
									
										<a href="?m=delete&id=<?php echo $d['sparepart_id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin akan menghapus data [<?php echo $d['sparepart_nama'] ?>] ?')"><i class="fa fa-times"></i></a>
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