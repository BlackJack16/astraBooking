<div class="normalheader small-header">
    <div class="hpanel">
        <div class="panel-body">
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li>
                        <a href="<?php echo ROOT?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <span>Transaksi Service</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Transaksi Service
            </h2>
            <small>Data Service</small>
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
                            <thead>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Costumer</th>
                                <th>Kendaraan</th>
                                <th>Tgl. Transaksi</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                if($transaksi)
                                {
                                    $no = 1;
                                    foreach($transaksi as $d)
                                    {
                                    ?>
                                <tr>
                                    <td class="text-center"><?php echo $no;?></td>
                                    <td class="text-center">#<?php echo $d['trs_booking'];?></td>
                                    <td><strong><?php echo $d['costumer_nama'];?></strong><br/><i><?php echo $d['costumer_alamat'];?></i><br/><i><?php echo $d['costumer_telp'];?></i> / <i><?php echo $d['costumer_email'];?></i></td>
                                    <td><?php echo $d['type_nama']." ".$d['variant_nama'];?><br/><strong><?php echo $d['kendCos_nopol'] ?></strong></td>
                                    <td><?php echo date_format(date_create($d['trs_tgl']),"d/m/Y");?></td>
                                    <td class="text-center">
                                        <a href="?m=detail&id=<?php echo $d['trs_id'];?>" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-search"></i></a>
                                        <!--<a href="?m=delete&id=<?php echo $d['trs_id'];?>" onclick="return confirm('Anda yakin akan menghapus data service [#<?php echo $d['trs_booking'] ?>]?')" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin akan menghapus data [<?php echo $d['event_nama'] ?>] ?')"><i class="fa fa-times"></i></a>-->
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
