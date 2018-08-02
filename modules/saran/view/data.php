<div class="normalheader small-header">
    <div class="hpanel">
        <div class="panel-body">
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li>
                        <a href="<?php echo ROOT?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <span>Kritik &amp; Saran</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Kritik &amp; Saran
            </h2>
            <small>Kritik &amp; Saran</small>
        </div>
    </div>
</div>

<div class="content">
    <div class="hpanel hred">
    	
		<div class="panel-body">
						<table class="table table-striped table-bordered table-hover <?php echo $data != FALSE ? 'dataTable':NULL;?>">
							<colgroup>
								<col class="col-sm-1" />
								<col class="col-sm-2 text-center" />
								<col class="col-sm-1" />
								<col class="col-sm-1" />
								<col class="col-sm-3" />
								<col class="col-sm-1" />
							</colgroup>
							<thead>
								<th>No</th>
								<th>Nama Costumer</th>
								<th>Email</th>
								<th>Telepon</th>
								<th>Kritik &amp; Saran</th>
								<th>Tanggal</th>
							</thead>
							<tbody>
								<?php
								if($saran)
								{
									$no = 1;
									foreach($saran as $d)
									{
									?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $d['costumer_nama'];?></td>
									<td><?php echo $d['costumer_email'];?></td>
									<td><?php echo $d['costumer_telp'];?></td>
									<td><?php echo $d['saran_isi'];?></td>
									<td><?php echo date_format(date_create($d['saran_tgl']),"d/m/Y");?></td>
									
								</tr>
									<?php
									$no++;}
								}
								else
								{
									echo '<tr><td colspan=3>Tidak Ada Data</td></tr>';
								}
								?>
							</tbody>
						</table>
				</div>
    	</div>
</div>