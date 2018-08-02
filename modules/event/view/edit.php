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
                    <li>
                        <a href="<?php echo ROOT?>service">Event</a>
                    </li>
                    <li class="active">
                        <span>Edit</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Edit Event
            </h2>
        </div>
    </div>
</div>

<div class="content">
	<div class="hpanel hblue">
		<div class="panel-body">
			<form class="form-horizontal" action="?m=edit_save" method="post" autocomplete="off" enctype="multipart/form-data">

				<input type="hidden"  name="id" value="<?php echo $d['event_id']?>" />

				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Nama Event <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required name="nama" value="<?php echo $d['event_nama']?>" placeholder="Nama Event" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Keterangan <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<textarea class="form-control" name="keterangan"  placeholder="Keterangan" rows="3"><?php echo $d['event_ket']?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Tanggal Open <span class="required">*</span></strong></label>
					<div class="col-sm-6 input-group date">
                        <input style="margin-left: 15px;" type="text" name="tgl_open" value="<?php echo date_format(date_create($d['event_tgl']),"Y-m-d")?>"  data-date-format="yyyy-mm-dd"  class="form-control datepicker" placeholder="Tanggal Open" ><span class="input-group-addon"><i style="padding-left: 20px"  class="glyphicon glyphicon-th"></i></span>
                   </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Tanggal Close <span class="required">*</span></strong></label>
					<div class="col-sm-6 input-group date">
            <input style="margin-left: 15px;" type="text" name="tgl_close" data-date-format="yyyy-mm-dd" value="<?php echo  date_format(date_create($d['event_akhir']),"Y-m-d")?>" class="form-control datepicker" placeholder="Tanggal Close"><span class="input-group-addon"><i style="padding-left: 20px"  class="glyphicon glyphicon-th"></i></span>
          </div>
				</div>

				<div class="form-group col-sm-12" style="padding:0">
					<label class="col-sm-3 control-label"><strong>Upload Foto<span class="required">*</span></strong></label>
					<div class="col-sm-5">
						<?php
									if($d['event_foto']!="" or $d['event_foto']!=NULL){
						?>
									<img src="<?php echo ROOT?>data/<?php echo $d['event_foto']?>" style="width:210px;"/>
					<?php
									}
						?>
						<input type="file" class="form-control" name="data" accept="image/*" />
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
</div>
