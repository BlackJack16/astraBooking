<div class="normalheader small-header">
    <div class="hpanel">
        <div class="panel-body">
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li>
                        <a href="<?php echo ROOT?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <span>Profile</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Profile
            </h2>
            <small>Profile Akun Anda</small>
        </div>
    </div>
</div>

<div class="content">
	<div class="hpanel hyellow">
		<div class="panel-body">
            <form class="form-horizontal" action="?m=edit" method="post" autocomplete="off">
				<div class="form-group">
					<label for="username" class="col-sm-3 control-label"><strong>Username</strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="username" name="username" value="<?php echo $d['login_usr'];?>" readonly />
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-3 control-label"><strong>Nama Lengkap<span class="required">*</span></strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" required id="nama" readonly value="<?php echo $d['login_nama'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label"><strong>Password</strong></label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="password" name="password" placeholder="&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;" />
					</div>
				</div>
				<div class="form-group">
					<label for="c_password" class="col-sm-3 control-label"><strong>Konfirmasi Password</strong></label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="c_password" name="c_password" placeholder="&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>