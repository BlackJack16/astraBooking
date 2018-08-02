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
                        <span>Detail Booking</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Booking
            </h2>
            <small>Detail Booking</small>
        </div>
    </div>
</div>

<div class="content">

        <div class="row projects">
            <div class="col-lg-12">
            <form  action="?m=confirm" method="post" autocomplete="off">
                <div class="hpanel hgreen">
                    <div class="panel-body">
                        <span class="label label-success pull-right">NEW</span>
                        <div class="row">
                            <div class="col-sm-8">
                                <h4><a > <?php echo $d['costumer_nama'];?></a></h4>
                                 <p><span><i class="pe-7s-map-marker"> </i></span> <?php echo $d['costumer_alamat'];?></p>
                                 <p><span ><i class="pe-7s-bicycle"> </i></span> <?php echo $d['variant_nama'];?></p> 
                                 <p><span ><i class="fa fa-calendar-o"> </i></span> <?php echo $d['booking_tgl'];?> / <?php echo $d['booking_jam'];?></p>  
                                 <p><span ><i class="pe-7s-tools"> </i></span> <?php echo $d['booking_catatan'];?> </p> 
                                 <div class="form-group" style="float: right">
                                    <div class="col-sm-9 text-center">
                                        <a href="javascript:window.history.go(-1);" class="btn btn-danger">Cancel</a>                 
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-success">Terima</button>
                                    </div>
                                </div>                                 
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Additional information about project in footer
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>