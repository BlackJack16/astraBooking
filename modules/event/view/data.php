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
                        <span>event</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                event
            </h2>
            <small>Data event</small>
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
  							<col class="col-sm-1" />
								<col class="col-sm-2 " />
								<col class="col-sm-3" />
								<col class="col-sm-1" />
								<col class="col-sm-1" />
								<col class="col-sm-1" />
							</colgroup>
							<thead>
								<th>No</th>
								<th></th>
								<th>Nama</th>
								<th>Keterangan</th>
								<th>Tanggal Open</th>
								<th>Tanggal Close</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								<?php
								if($event)
								{
									$no = 1;
									foreach($event as $d)
									{
									?>
								<tr>
									<td><?php echo $no;?></td>
									<td><img src="<?php echo ROOT?>data/<?php echo $d['event_foto']?>" style="width:100%;"/></td>
									<td><?php echo $d['event_nama'];?></td>
									<td><?php echo $d['event_ket'];?></td>
									<td><?php echo date_format(date_create($d['event_tgl']),"d/m/Y");?></td>
									<td><?php echo date_format(date_create($d['event_akhir']),"d/m/Y");?></td>
									<td class="text-center">
										<a href="?m=edit&id=<?php echo $d['event_id'];?>" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>


										<a href="?m=delete&id=<?php echo $d['event_id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin akan menghapus data [<?php echo $d['event_nama'] ?>] ?')"><i class="fa fa-times"></i></a>
									</td>
								</tr>
									<?php
									$no++;}
								}
								else
								{
									echo '<tr><td colspan=7>Tidak Ada Data</td></tr>';
								}
								?>
							</tbody>
						</table>
				</div>
    	</div>
</div>
