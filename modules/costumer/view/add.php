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
                        <span>Tambah</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Tambah Costumer
            </h2>
        </div>
    </div>
</div>

<div class="content">
	
	<div class="hpanel hred">
		<div class="panel-body">
			<form class="form-horizontal" action="?m=registrasi" method="post" autocomplete="off">
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Costumer Identitas <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required   name="id" placeholder="Identitas costumer"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Nama costumer <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required  name="nama" placeholder="Nama costumer"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Tgl. Lahir<span class="required">*</span></strong></label>
					<div class="col-sm-6 input-group date">
                        <input style="margin-left: 15px;" type="text" name="tgl_lahir" data-date-format="yyyy-mm-dd"  class="form-control datepicker" placeholder="Tgl. Lahir"><span class="input-group-addon"><i style="padding-left: 20px"  class="glyphicon glyphicon-th"></i></span>
                   </div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Telepon <span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required name="telp" placeholder="Telepon"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Alamat </strong></label>
					<div class="col-sm-9">
						<textarea class="form-control" name="alamat" placeholder="alamat" rows="3"></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Jenis Kelamin </strong></label>
					<div class="col-sm-9">
						<input class="form-control" name="jk" placeholder="Jenis Kelamin" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Agama </strong></label>
					<div class="col-sm-9">
						<input class="form-control" name="agama" placeholder="Agama"/>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Email<span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="email" class="form-control"  name="email" placeholder="Email" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><strong>Password<span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input class="form-control"  name="pwd" placeholder="Password" required/>
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

