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
                        <span>booking</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                booking
            </h2>
            <small>Data booking</small>
        </div>
    </div>
</div>

<div class="content">
    <div class="hpanel hred ">
    	
		<div class="panel-body">
						<table class="table table-striped table-bordered table-hover <?php echo $data != FALSE ? 'dataTable':NULL;?>">
							
							<thead>
								<th>No</th>
								<th>Kode Booking</th>
								<th>Tgl. Booking</th>
								<th>Jam Booking</th>
								<th>Nama Costumer</th>
								<th>Kendaraan</th>
								<th>Keterangan</th>
								<th>Status</th>
								<th class="text-center">Aksi</th>
							</thead>
							<tbody>
								<?php
								if($booking)
								{
									$no = 1;
									foreach($booking as $d)
									{
									?>
								<tr>
									<td><?php echo $no;?></td>
									<td class="text-center">#<?php echo $d['booking_id'] ?></td>
									<td><?php echo date_format(date_create($d['booking_tgl']),"d/m/Y");?></td>
									<td><?php echo $d['booking_jam'] ?></td>
									<td><?php echo $d['costumer_nama'];?></td>
									<td><?php echo $d['type_nama']." ".$d['variant_nama'];?></td>
									<td><?php echo $d['booking_catatan'] ?></td>
									<td>
										<?php
                                                    if($d['booking_status']  == 1){
                                                        echo '<span class="label label-info">Booking</span>';
                                                    }
                                                    	else if($d['booking_status']  == 2){
                                                        	echo '<span class="label label-success">Terima</span>';
                                                   		 } 
                                                   		 	else {
                                                   		 		echo '<span class="label label-danger">Tolak</span>';
                                                   		 	}
                                                    ?>
								
											
										</td>
									<td class="text-center">
										<?php
											if($d['booking_status']  == 1){
										?>
										<a href="?m=submit&id=<?php echo $d['booking_id'];?>" class="btn btn-xs btn-success" onclick="return confirm('Anda yakin akan menerima bookingan ini?')" data-toggle="tooltip" data-placement="top" title="Terima"><i class="fa fa-check"></i></a>
										
										<a href="?m=cancel&id=<?php echo $d['booking_id'];?>" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin akan menolak bookingan ini?')" data-toggle="tooltip" data-placement="top" title="Tolak"><i class="fa fa-close"></i></a>
											<?php } ?>
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