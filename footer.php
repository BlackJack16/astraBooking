
		</div>
	</div>
	
	<script src="<?php echo ROOT;?>assets/js/jquery.min.js"></script>
	
	<script src="<?php echo ROOT;?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo ROOT;?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo ROOT;?>assets/js/jquery.slimscroll.min.js"></script>
	<script src="<?php echo ROOT;?>assets/js/metisMenu.min.js"></script>
	<script src="<?php echo ROOT;?>assets/js/icheck.min.js"></script>
	<script src="<?php echo ROOT;?>assets/js/sparkline.js"></script>
	<script src="<?php echo ROOT;?>assets/js/toastr.min.js"></script>
	<script src="<?php echo ROOT;?>assets/js/homer.js"></script>

    <script src="<?php echo ROOT;?>assets/js/custom.js"></script>
     <script type="text/javascript">
		function number_format(x){
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
		}
    	function string_format(x) {
			return parseInt(x.toString().replace(/\./g, ''));
		}
    </script>
    <?php echo $scripts;?>
	<?php echo $this->msg;?>
	</body>
</html>