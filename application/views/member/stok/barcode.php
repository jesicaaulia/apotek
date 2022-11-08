<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>  
		<meta charset="UTF-8"> 
		<link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/favicon.png" type="image/ico">   
		<title>Apotek Mama</title>    
		<meta name="author" content="Paber">  
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/skins/default.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/theme-custom.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.css" />

		<!-- Head Libs -->
		<script src="<?php echo base_url()?>/assets/vendor/modernizr/modernizr.js"></script>
	</head>
	<body class="bgbody">
		<section class="body">

			<?php $this->load->view("komponen/header.php") ?>
			<div class="inner-wrapper"> 
				<?php $this->load->view("komponen/sidebar.php") ?>
				<section role="main" class="content-body">
					<header class="page-header">  
						<h2>Barcode</h2>
					</header>  
					<!-- start: page -->
					<?php echo form_open('stok/viewbarcode','target="_blank"');?>  

                   	<section class="panel">
                        <header class="panel-heading">    
                            <div class="row show-grid">
                                <div class="col-md-6" align="left"><h2 class="panel-title">Cetak Barcode Produk</h2></div>
                                <div class="col-md-6" align="right">
									<a href="#" class="btn btn-warning" id="tambahObat" ><i class="fa fa-plus"></i> Pilih Item</a>
									<button type="submit" class="btn btn-primary" href="#"  ><i class="fa fa-print"></i> Cetak</button>
								</div>
							</div>
                        </header>
                        <div class="panel-body  table-responsive" > 
                                <table class="table table-bordered table-hover table-striped listobat">
                                    <thead>
                                        <tr>
                                            <th>Kode Item (Barcode)</th>
                                            <th>Nama Item</th>
                                            <th>Harga Jual</th> 
                                            <th>Jumlah</th> 
                                            <th>Pilih</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table> 
                        </div>
                    </section>
					</form>
					<!-- end: page -->
				</section>
			</div>
		</section>
		<div class="modal fade bd-example-modal-lg" id="modal-listitems"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel panel-primary">   
                    <header class="panel-heading">
                        <h2 class="panel-title">Data Produk</h2>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover table-responsive"  id="itemsdata">
                            <thead>
                                <tr> 
                                    <th>Kode Item</th>
                                    <th>Nama Item</th> 
                                    <th>Kategori</th>  
									<th>Harga Jual</th>
                                    <th>Satuan</th>  
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table> 
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </footer> 
                </section>
                </div>
            </div>
        </div>
	 
        <!-- Vendor -->
		<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/select2/select2.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script>    
		<script src="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script> 
		<script type="text/javascript">		
			var tableitems = $('#itemsdata').DataTable({  
				"serverSide": true, 
				"order": [], 
				"ajax": {
					"url": "<?php echo base_url()?>stok/dataitems",
					"type": "GET"
				}, 
				"columnDefs": [
					{ 
						"targets": [ 5 ], 
						"orderable": false, 
					},
				],  
			}); 
			$(document).on('shown.bs.modal','#modal-listitems', function (e) {
				var urutan = $(e.relatedTarget).data('urutan');   
				createCookie("urutan-row-barcode", urutan, 30);
			}); 
			function pilih(elem){ 
            urutan = readCookie("urutan-row-barcode"); 
            var namaitem = $(elem).data("namaitem"); 
            var harga = $(elem).data("harga"); 
            var id = $(elem).data("id");  
            $('.kode-item'+urutan).val(id);
            $('.namaitem'+urutan).val(namaitem);   
            $('.harga'+urutan).val(harga);   
            $('.jumlah'+urutan).val('1');   
            $('#modal-listitems').modal('hide');  
            eraseCookie("urutan-row-barcode");  
       	 }
			var max_fields      = 1000; 
			var wrapperItem     = $(".listobat");
			var add_button_mg   = $("#tambahObat");
			var x = 0;  
			$(add_button_mg).click(function(e){
				e.preventDefault();
				if(x < max_fields){
					x=x+1;       
					var formtambah='<tr><td><div class="input-group input-group-icon" style="width:150px;"><input type="text" required data-urutan="'+x+'" data-toggle="modal" data-target="#modal-listitems"  class="form-control kode-item'+x+'" placeholder="Pilih Item"><span class="input-group-addon"><span class="icon"><i class="fa fa-search"></i></span></span></div></td>';
					formtambah+='<td><input type="hidden" name="idd[]"  class="kode-item'+x+'"> <input type="text" name="namaitem[]"  class="form-control input-sm namaitem'+x+'"></td>';
					formtambah+='<td><input type="text" name="harga[]"  class="form-control input-sm harga'+x+'"></td>';
					formtambah+='<td><input type="number" name="jumlah[]"  min="1" max="99" class="form-control input-sm jumlah'+x+'"></td>';
					formtambah+='<td><a href="javascript:void(0);" class="mb-xs mt-xs mr-xs btn btn-danger deleterow"><i class="fa fa-trash-o"></i></a></td></tr>'; 
					$(wrapperItem).append(formtambah); 
				}
				else
				{ 
				document.getElementById("tambahObat").setAttribute('disabled','disabled'); 
				alert('Maksimal '+max_fields+' form')
				}
			});    
			$(wrapperItem).on("click",".deleterow", function(e){
				e.preventDefault(); $(this).parent().parent().remove();
				document.getElementById("tambahObat").removeAttribute('disabled');  
			}) 
        </script>
	</body>
</html> 