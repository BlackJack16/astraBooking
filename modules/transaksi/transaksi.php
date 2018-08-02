<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi extends base
{
	private $m_transaksi;
	function __construct()
	{
		parent::__construct();

		if(!$this->login_lib->is_login())
		{
			redirect(ROOT."?msg=You do not have access !&type_msg=warning&lead_msg=Warning!!!");
		}
		require_once('model/m_transaksi.php');
		$this->m_transaksi = new m_transaksi();
	}

	function index()
	{
		$data['transaksi'] = $this->m_transaksi->get_transaksi();
		$this->add_css('assets/plugins/datatables/css/dataTables.bootstrap.min.css');
		$this->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->add_js('assets/plugins/datatables/js/dataTables.bootstrap.min.js');
		$this->add_js('
		$(function(){
			$(".dataTable").dataTable();
		});
		','embed');
		$this->output('data.php',$data);
	}

	private function init_js($no=0,$total=0,$no_service=0,$total_service=0)
	{
		$this->add_css('assets/plugins/jquery-ui/jquery-ui.css');
		$this->add_js('assets/plugins/jquery-ui/jquery-ui.min.js');
		$this->add_js("
				 $(document).ready(function(){

					var data = ".$this->m_transaksi->get_booking().";
                    $('#booking').autocomplete({
                        source:data,
						focus: function( event, ui ) {
       						 $( '#booking').val( ui.item.id );
        					return false;
						},
						select: function( event, ui ) {
							$('#booking_id').val( ui.item.id );
							$('#booking').val( ui.item.id );
							$('#costumer_nama').val( ui.item.nama );
							$('#costumer_telp').val( ui.item.telp );
							$('#costumer_email').val( ui.item.email );
							$('#costumer_alamat').html( ui.item.alamat );
							$('#costumer_identitas').val( ui.item.identitas );
							$('#costumer_tgl').val( ui.item.tgl );
							$('#costumer_agama').val( ui.item.agama );
							$('#costumer_jk').val( ui.item.jk );
							$('#variant').val( ui.item.variant );
							$('#nopol').val( ui.item.nopol );
							return false;
       				    }
                    })
					.autocomplete('instance' )._renderItem = function( ul, item ) {
      					return $('<li>').append('<a>#' + item.id + '<strong><br/>' +item.variant+' - '+ item.nopol +'</strong><br/><i><span class=\"icon mdi mdi-city \"></span> '+item.nama+'</i></a>' ).appendTo(ul);
    				};

    				var data = ".$this->m_transaksi->get_dsparepart().";
                    $('#sparepart_nama').change(function(){
                    	var index = document.getElementById('sparepart_nama').selectedIndex;
                    	var item  = data [index-1];
                    		$('#sparepart_harga').val(number_format(item.harga));
                    		$('#sparepart_value').val(item.nama);
	                    });


					var total=".$total.";
					var num=".$no.";
					var self = $('.table-part tbody');
					$('.part-add').click(function(){
						var id = $('#sparepart_nama').val();
						var harga = $('#sparepart_harga').val();
						var nama = $('#sparepart_value').val();


						if (nama == null || nama == ''){
							alert('sparepart belum dipilih');
						}

						else{

							var appendItem = '<tr id=\"part_'+ num +'\"><td><input type=\"hidden\" name=\"sparepart_nama[]\" value=\"'+ id +'\" />'+nama+'</td> <td><input type=\"hidden\" name=\"sparepart_harga[]\" value=\"'+ string_format(harga) +'\" />RP'+harga+'</td><td class=\"text-center\"><a data-id=\"'+num+'\" class=\"sparepart-delete text-danger \"><i class=\"icon mdi mdi-delete\"></i></a></td></tr>';

							self.append(appendItem);
							total += (string_format(harga));
							$('#total_part').html(number_format(total));
							num++;
							$('.sparepart-delete').click(function(){
								var id = $(this).data('id');
								total -= parseInt($('#item_'+id+' .sub').html().replace('.',''));
								$('#part_'+id).remove();
								$('#total_part').html(number_format(total));
							});
							clear_part();
						}
					});

					$('.sparepart-delete').click(function(){
						var id = $(this).data('id');
						total -= parseInt($('#item_'+id+' .sub').html().replace('.',''));
						$('#item_'+id).remove();
						$('#total_part').html('RP '+number_format(total));
					});


					function clear_part(){
						$('#sparepart_harga').val('');
						$('#sparepart_value').val('');
						document.getElementById('sparepart_nama').selectedIndex = 0;
					}

					 var data_service = ".$this->m_transaksi->get_dservice().";
                    $('#service_nama').change(function(){
                    	var index = document.getElementById('service_nama').selectedIndex;
                    	var item  = data_service [index-1];
                    		$('#service_harga').val(number_format(item.harga));
                    		$('#service_value').val(item.nama);
	                    });


					var total_service=".$total_service.";
					var num_service=".$no_service.";
					var self_service = $('.table-service tbody');

					$('.service-add').click(function(){
						var id = $('#service_nama').val();
						var harga = $('#service_harga').val();
						var nama = $('#service_value').val();


						if (nama == null || nama == ''){
							alert('service belum dipilih');
						}

						else{

							var appendItem = '<tr id=\"service_'+ num +'\"><td><input type=\"hidden\" name=\"service_nama[]\" value=\"'+ id +'\" />'+nama+'</td> <td><input type=\"hidden\" name=\"service_harga[]\" value=\"'+ string_format(harga) +'\" />RP'+harga+'</td><td class=\"text-center\"><a data-id=\"'+num+'\" class=\"service-delete text-danger \"><i class=\"icon mdi mdi-delete\"></i></a></td></tr>';

							self_service.append(appendItem);
							total_service += (string_format(harga));
							$('#total_service').html(number_format(total_service));
							num++;
							$('.service-delete').click(function(){
								var id = $(this).data('id');
								total_service -= parseInt($('#item_'+id+' .sub').html().replace('.',''));
								$('#service_'+id).remove();
								$('#total_service').html(number_format(total_service));
							});
							clear_service();
						}
					});

					$('.item-delete').click(function(){
						var id = $(this).data('id');
						total_service -= parseInt($('#item_'+id+' .sub').html().replace('.',''));
						$('#item_'+id).remove();
						$('#total_service').html('RP '+number_format(total_service));
					});


					function clear_service(){
						$('#service_harga').val('');
						$('#service_value').val('');
						document.getElementById('service_nama').selectedIndex = 0;
					}

                });


			","embed");
	}

	function add()
	{
		$data['service'] = $this->m_transaksi->get_service();
		$data['sparepart'] = $this->m_transaksi->get_sparepart();
		$this->init_js();
		$this->output('add.php',$data);
	}


	function add_save()
	{
		if($_POST)
		{

			$data['trs_booking'] = $this->xss->setFilter($_POST['booking_id'],'whitelist');
			if(in_array("",$data))
			{
				$msg = 'Please fill in the marked (*) !';
				redirect('?m=add&msg='.$msg);
			}
			else
			{
				$proses = $this->m_transaksi->insert_transaksi($data);
				if($proses)
				{
					sendNotif($proses['costumer_identitas'],"service", $proses['trs_id'],"Terima Kasih, Silahkan Datang Kembali! #OneHeart");

					$id = $_POST['sparepart_nama'];
					$harga = $_POST['sparepart_harga'];


					if (count($id)>0){
						for($i=0;$i<count($id);$i++){
							$item = array();
							$item['dsparepart_transaksi'] = $proses['trs_id'];
							$item['dsparepart_sparepart'] = $id[$i];
							$item['dsparepart_harga'] = $harga[$i];
							$this->m_transaksi->insert_part($item);
						}
					}

					$id = $_POST['service_nama'];
					$harga = $_POST['service_harga'];


					if (count($id)>0){
						for($i=0;$i<count($id);$i++){
							$item = array();
							$item['dservice_transaksi'] = $proses['trs_id'];
							$item['dservice_service'] = $id[$i];
							$item['dservice_harga'] = $harga[$i];
							$this->m_transaksi->insert_service($item);
						}
					}
					
					exit();
					$msg = 'Data Berhasil Disimpan !';
					redirect('?msg='.$msg.'&type_msg=success');
				}

				else
				{
					$msg = 'Data Gagal Disimpan !';
					redirect('?m=add&msg='.$msg);
				}
			}
		}
		else
		{
			show_error();
		}
	}

	function detail()
	{
		if(isset($_GET['id']))
		{
			$id_transaksi = $this->xss->setFilter($_GET['id'],'blacklist');
			$data['d'] = $this->m_transaksi->get_transaksi($id_transaksi);
			$data['part'] = $this->m_transaksi->get_detail_part($id_transaksi);
			$data['service'] = $this->m_transaksi->get_detail_service($id_transaksi);

			$this->output('detail.php',$data);
		}
		else
		{
			show_error();
		}
	}

	function delete()
	{
		if(isset($_GET['id']) and $_GET['id'] !== '0' )
		{
			$id_transaksi = $this->xss->setFilter($_GET['id'],'whitelist');
			$proses = $this->m_transaksi->delete($id_transaksi);
			if($proses)
			{
				$msg = 'Data Berhasil Dihapus !';
				redirect('?msg='.$msg.'&type_msg=success');
			}
			else
			{
				$msg = 'Data Gagal Dihapus !';
				redirect('?msg='.$msg);
			}
		}
		else
		{
			show_error();
		}
	}

}
