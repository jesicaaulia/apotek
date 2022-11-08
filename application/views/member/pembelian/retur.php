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
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/skins/default.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme-custom.css">
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
						<h2>Retur Pembelian</h2>
					</header>  
					<!-- start: page -->
                    
                    <section class="panel"> 
                        <div class="panel-body">       
                            <div class="row"> 
                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <div class="row">
                                    <div class="col-md-4 col-xl-12">
                                        <section class="panel">
                                            <div class="panel-body bg-primary">
                                                <div class="widget-summary"> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Jumlah Retur Pembelian Hari Ini</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="retur_hari_ini"></strong>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div> 
                                    <div class="col-md-4 col-xl-12">
                                        <section class="panel">
                                            <div class="panel-body bg-primary">
                                                <div class="widget-summary"> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Jumlah Retur Pembelian Minggu Ini</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="retur_minggu_ini"></strong>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div> 
                                    <div class="col-md-4 col-xl-12">
                                        <section class="panel">
                                            <div class="panel-body bg-primary">
                                                <div class="widget-summary"> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Jumlah Retur Pembelian Bulan Ini</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="retur_bulan_ini"></strong>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        </div>
                    </section>
                    <section class="panel">
                        <header class="panel-heading">    
                            <div class="row show-grid">
                                <div class="col-md-6" align="left"><h2 class="panel-title">Data Retur Pembelian</h2></div>
                                <?php  
                                echo level_user('pembelian','retur',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                                ?> 
							</div>
                        </header>
                        <div class="panel-body"> 
                                <table class="table table-bordered table-hover table-striped" id="returdata">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Tanggal Retur</th>
                                            <th>Nomor Retur</th>
                                            <th>Nomor Penerimaan</th>
                                            <th>Nomor Faktur</th>  
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table> 
                        </div>
                    </section>
					<!-- end: page -->
				</section>
			</div>
		</section>

		
        <div class="modal fade bd-example-modal-lg" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel panel-primary">
                    <?php echo form_open('pembelian/returtambah',' id="FormulirTambah" enctype="multipart/form-data"');?>  
                    <header class="panel-heading">
                        <h2 class="panel-title">Form Retur Pembelian</h2>
                    </header>
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group mt-lg nomor_rec_penerimaan">
                                <label class="col-sm-3 control-label">Nomor Penerimaan<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select data-plugin-selectTwo class="form-control"  id="nomor_rec_penerimaan" name="nomor_rec_penerimaan">  
                                        <option value="">Pilih Rec Penerimaan</option>
    									<?php foreach ($penerimaan as $supp): ?>
                                        <option value="<?php echo $supp->nomor_rec;?>"><?php echo $supp->nomor_rec;?></option>
                                        <?php endforeach; ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group mt-lg nomor_faktur">
                                <label class="col-sm-3 control-label">Nomor Faktur<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control nomor_faktur" readonly/>
                                    <input type="hidden" name="nomor_faktur" class="nomor_faktur"/>
                                </div>
                            </div>     
                            <div class="form-group mt-lg supplier">
                                <label class="col-sm-3 control-label">Supplier<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control supplier" readonly/>
                                </div>
                            </div>     
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-lg tanggal_retur">
                                <label class="col-sm-3 control-label">Tanggal Retur<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tanggal_retur" class="form-control tanggal" data-plugin-datepicker required/>
                                </div>
                            </div> 
                            <div class="form-group penerima">
                                <label class="col-sm-3 control-label">Diterima Oleh<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control penerima" readonly />
                                </div>
                            </div>
                            <div class="form-group keterangan">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control"   name="keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row" style="overflow-x: auto;white-space: nowrap;"> 
                        <div class="col-md-12">
                            <h3>Rincian Item Yang Diterima</h3> 
                            <div class="table-responsive" style="max-height:420px;"> 
                                <table class="table table-bordered table-hover table-striped dataTable no-footer listitemditerima">
                                <thead>
                                    <tr> 
                                        <th style="min-width:200px;">Nomor SKU</th>
                                        <th style="min-width:400px;">Nama Item</th>
                                        <th style="min-width:150px;">Tanggal Expired</th> 
                                        <th style="min-width:100px;">Satuan</th> 
                                        <th style="min-width:100px;">Kuantiti Diterima</th>  
                                        <th style="min-width:100px;">Kuantiti Retur</th>  
                                    </tr>
                                </thead>
                                <tbody> 
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm" type="submit" id="submitform">Submit</button>
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </footer>
                    </form>
                </section>
                </div>
            </div>
        </div> 
        <div class="modal fade bd-example-modal-lg" id="detailData"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel panel-primary">   
                    <header class="panel-heading">
                        <div class="row">
                            <div class="col-md-3 text-left"> 
                            <h2 class="panel-title">Detail Retur</h2>  
                            </div>
                            <div class="col-md-9 text-right">
                                <a class="btn btn-success" id="linkprint" target="_blank"><i class="fa fa-print"></i> Print</a>
                                <a class="btn btn-success" id="linkpdf" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                            </div>
                        </div>
                    </header>
                    <div class="panel-body" id="showdetail"> 
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
        <div class="modal fade bd-example-modal-lg" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel panel-primary">
                    <?php echo form_open('pembelian/returedit',' id="FormulirEdit" enctype="multipart/form-data"');?>  
                    <input type="hidden" name="idd" id="idd">
                    <header class="panel-heading">
                        <h2 class="panel-title">Edit Retur</h2>
                    </header>
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-lg nomor_retur">
                                <label class="col-sm-3 control-label">Nomor Retur<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="nomor_retur_view" readonly/>
                                    <input type="hidden" name="nomor_retur" class="form-control" id="nomor_retur" required/>
                                </div>
                            </div>
                            <div class="form-group mt-lg nomor_rec_penerimaan">
                                <label class="col-sm-3 control-label">Nomor Penerimaan<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select disabled data-plugin-selectTwo class="form-control" required id="nomor_rec_penerimaan_edit" name="nomor_rec_penerimaan" required>  
                                        <option value="">Pilih Rec Penerimaan</option>
    									<?php foreach ($penerimaan as $supp): ?>
                                        <option value="<?php echo $supp->nomor_rec;?>"><?php echo $supp->nomor_rec;?></option>
                                        <?php endforeach; ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group mt-lg nomor_faktur">
                                <label class="col-sm-3 control-label">Nomor Faktur<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control nomor_faktur_edit"  id="nomor_faktur_view" readonly/>
                                    <input type="hidden" name="nomor_faktur" class="form-control nomor_faktur_edit" id="nomor_faktur"/>
                                </div>
                            </div>     
                            <div class="form-group mt-lg supplier">
                                <label class="col-sm-3 control-label">Supplier<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control nama_supplier_edit" id="nama_supplier" readonly/>
                                </div>
                            </div>     
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-lg tanggal_retur">
                                <label class="col-sm-3 control-label">Tanggal Retur<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tanggal_retur" class="form-control tanggal" id="tanggal_retur_ymd" data-plugin-datepicker required/>
                                </div>
                            </div> 
                            <div class="form-group penerima">
                                <label class="col-sm-3 control-label">Diterima Oleh<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control penerima_edit" id="penerima" readonly />
                                </div>
                            </div>
                            <div class="form-group keterangan">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control" id="keterangan"   name="keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row" style="overflow-x: auto;white-space: nowrap;"> 
                        <div class="col-md-12">
                            <h3>Rincian Item Yang Diterima</h3> 
                            <div class="table-responsive" style="max-height:420px;"> 
                                <table class="table table-bordered table-hover table-striped dataTable no-footer listitemedit">
                                <thead>
                                    <tr> 
                                        <th style="min-width:200px;">Nomor SKU</th>
                                        <th style="min-width:400px;">Nama Item</th>
                                        <th style="min-width:150px;">Tanggal Expired</th> 
                                        <th style="min-width:100px;">Satuan</th>  
                                        <th style="min-width:100px;">Kuantiti Retur</th>  
                                    </tr>
                                </thead>
                                <tbody> 
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm" type="submit" id="submitformEdit">Submit</button>
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </footer>
                    </form>
                </section>
                </div>
            </div>
        </div>
 
        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <section class="panel  panel-danger">
                    <header class="panel-heading">
                        <h2 class="panel-title">Konfirmasi Hapus Data</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-icon">
                                <i class="fa fa-question-circle"></i>
                            </div>
                            <div class="modal-text">
                                <h4>Yakin ingin menghapus data ini ?</h4> 
                            </div>
                        </div>
					</div>
                    <footer class="panel-footer"> 
                        <div class="row">
                            <div class="col-md-12 text-right"> 
                                <?php echo form_open('pembelian/returhapus',' id="FormulirHapus"');?> 
                                <input type="hidden" name="idd" id="idddelete">
                                <button type="submit" class="btn btn-danger" id="submitformHapus">Delete</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
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
        $('.tanggal').datepicker({
            format: 'yyyy-mm-dd' 
        });  
		var tabelretur = $('#returdata').DataTable({  
                "serverSide": true, 
                "order": [], 
                "ajax": {
                    "url": "<?php echo base_url()?>pembelian/dataretur",
                    "type": "GET"
                }, 
                "columnDefs": [
                    { 
                        "targets": [ 0 ], 
                        "orderable": false, 
                    },
                ], 
            });
            

            function laporan_ringkas(){   
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>pembelian/retur_data', 
                    dataType    : 'json',
                    success: function(response) {  
                        $.each(response, function(i, item) {  
                        $('#retur_bulan_ini').html(item.retur_bulan);  
                        $('#retur_minggu_ini').html(item.retur_minggu);  
                        $('#retur_hari_ini').html(item.retur_hari);   
                        }); 
                    }
                });  
                return false;
            }
            laporan_ringkas(); 
        $('#nomor_rec_penerimaan').change(function(){
            var dataId = $(this).val();     
            $(".listitemditerima").find("tr:gt(0)").remove(); 
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url()?>pembelian/penerimaandetail',
                data: 'id=' + dataId,
                dataType 	: 'json',
                success: function(response) { 
                    $.each(response.datarows, function(i, item) {   
                            $('.nomor_faktur').val(item.nomor_faktur);    
                            $('.supplier').val(item.nama_supplier);      
                            $('.penerima').val(item.penerima);    
                    }); 
                    var datarow =''; 
                    $.each(response.datasub, function(i, itemsub) {
                        datarow+="<tr><td>"+itemsub.sku+"</td>"; 
                        datarow+="<td>"+itemsub.nama_item+"</td>"; 
                        datarow+="<td>"+itemsub.tgl_expired+"</td>";   
                        datarow+="<td>"+itemsub.satuan_kecil+"</td>"; 
                        datarow+="<td>"+itemsub.kuantiti+"</td>"; 
                        datarow+="<td><input type='number' name='kuantiti[]' required class='form-control'></td>";
                        datarow+="<input type='hidden' name='kode_item[]' value='"+itemsub.kode_item+"'>";
                        datarow+="<input type='hidden' name='sku[]' value='"+itemsub.sku+"'>";
                        datarow+="<input type='hidden' name='nama_item[]' value='"+itemsub.nama_item+"'>";
                        datarow+="<input type='hidden' name='tgl_expired[]' value='"+itemsub.tgl_expired_ymd+"'>";
                        datarow+="<input type='hidden' name='satuan_kecil[]' value='"+itemsub.satuan_kecil+"'>";
                        datarow+="</tr>"; 
                    });   
                    $('.listitemditerima').append(datarow);
                }
            });  
            return false; 
        }); 
        document.getElementById("FormulirTambah").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitform").setAttribute('disabled','disabled');
			$('#submitform').html('Loading ...');
			var form = $('#FormulirTambah')[0];
			var formData = new FormData(form);
			var xhrAjax = $.ajax({
			type 		: 'POST',
			url 		: $(this).attr('action'),
			data 		: formData, 
			processData: false,
			contentType: false,
			cache: false, 
			dataType 	: 'json'
			}).done(function(data) { 
			if ( ! data.success) {		
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    document.getElementById("submitform").removeAttribute('disabled');  
                    $('#submitform').html('Submit');    
                    var objek = Object.keys(data.errors);  
                    for (var key in data.errors) {
                        if (data.errors.hasOwnProperty(key)) { 
                            var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
                            $('.'+key).addClass('has-error');
                            $('input[name="' + key + '"]').after(msg);  
                            $('select[name="' + key + '"]').after(msg);  
                            $('textarea[name="' + key + '"]').after(msg); 
                        }  
                        if (key == 'fail') {   
                            new PNotify({
                                title: 'Notifikasi',
                                text: data.errors[key],
                                type: 'danger'
                            }); 
                        }
                    }    
                } else { 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    PNotify.removeAll(); 
                    tabelretur.ajax.reload();  
					laporan_ringkas();				
                    document.getElementById("submitform").removeAttribute('disabled'); 
                    document.getElementById("FormulirTambah").reset();  
                    $('#submitform').html('Submit');  
                    new PNotify({
                        title: 'Notifikasi',
                        text: data.message,
                        type: 'success'
                    });  
                    $('#tambahData').modal('hide');   
                }
                }).fail(function(data) {   
                    new PNotify({
                        title: 'Notifikasi',
                        text: "Request gagal, browser akan direload",
                        type: 'danger'
                    }); 
                    window.setTimeout(function() {  location.reload();}, 2000);
                }); 
                e.preventDefault(); 
            });
               
               
        function detail(elem){
            var dataId = $(elem).data("id");   
            $('#detailData').modal();    
            $('#showdetail').html('Loading...'); 
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url()?>pembelian/returdetail',
                data: 'id=' + dataId,
                dataType 	: 'json',
                success: function(response) { 
                    var datarow='<div class="row">';
                    $.each(response.datarows, function(i, item) {
                        document.getElementById('linkprint').setAttribute('href', '<?php echo base_url()?>pembelian/printretur/'+item.nomor_retur);
                        document.getElementById('linkpdf').setAttribute('href', '<?php echo base_url()?>pembelian/pdfretur/'+item.nomor_retur);
                        
                        datarow+='<div class="col-md-6">';
                        datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                        datarow+="<tr><td>Nomor Retur</td><td>: "+item.nomor_retur+"</td></tr>";
                        datarow+="<tr><td>Nomor Faktur</td><td>: "+item.nomor_faktur+"</td></tr>";
                        datarow+="<tr><td>Nomor Record Penerimaan </td><td>: "+item.nomor_rec_penerimaan+"</td></tr>";
                        datarow+="<tr><td>Supplier</td><td>: "+item.nama_supplier+"</td></tr>"; 
                        datarow+="</table>";
                        datarow+='</div>';
                        datarow+='<div class="col-md-6">';
                        datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                        datarow+="<tr><td>Tanggal Retur</td><td>: "+item.tanggal_retur+"</td></tr>";
                        datarow+="<tr><td>Diterima Oleh</td><td>: "+item.penerima+"</td></tr>";
                        datarow+="<tr><td>Keterangan</td><td>: "+item.keterangan+"</td></tr>";
                        datarow+="</table>";
                        datarow+='</div>';
                    });
                    datarow+='</div>';
                    datarow+='<div class="row"><div class="col-md-12">';
                    datarow+='<h3>Rincian</h3>';
                    datarow+='<div class="table-responsive" style="max-height:420px;">';  
                    datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                    datarow+="<thead><tr>";
                    datarow+="<th>No SKU</th>";
                    datarow+="<th>Nama Item</th>";
                    datarow+="<th>Tanggal Expired</th>"; 
                    datarow+="<th>Satuan</th>"; 
                    datarow+="<th>Kuantiti Retur</th>"; 
                    datarow+="</tr></thead>";
                    datarow+="<tbody>";
                    
                    $.each(response.datasub, function(i, itemsub) {
                        datarow+="<tr>";
                        datarow+="<td>"+itemsub.sku+"</td>"; 
                        datarow+="<td>"+itemsub.nama_item+"</td>"; 
                        datarow+="<td>"+itemsub.tgl_expired+"</td>"; 
                        datarow+="<td>"+itemsub.satuan_kecil+"</td>"; 
                        datarow+="<td>"+itemsub.kuantiti+"</td>";   
                        datarow+="</tr>"; 
                    });  
                    datarow+="</tbody>";
                    datarow+="</table>";
                    datarow+="</div>";
                    datarow+='</div></div>';
                    $('#showdetail').html(datarow);
                }
            });  
            return false;
        }
        function edit(elem){
		        var dataId = $(elem).data("id");   
                document.getElementById("idd").setAttribute('value', dataId);
                $(".listitemedit").find("tr:not(:first)").remove();
                $('#editData').modal();        
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>pembelian/returdetail',
                    data: 'id=' + dataId,
                    dataType 	: 'json',
                    success: function(response) {  
                        $.each(response.datarows, function(i, item) {                 
                            $("#nomor_rec_penerimaan_edit").select2("val", item.nomor_rec_penerimaan);         
                            document.getElementById("nomor_retur").value = item.nomor_retur;       
                            document.getElementById("nomor_retur_view").value = item.nomor_retur; 
                            document.getElementById("tanggal_retur_ymd").value = item.tanggal_retur_ymd;   
                            document.getElementById("penerima").value = item.penerima;        
                            document.getElementById("nomor_faktur").value = item.nomor_faktur;        
                            document.getElementById("nomor_faktur_view").value = item.nomor_faktur;        
                            document.getElementById("nama_supplier").value = item.nama_supplier;    
                            document.getElementById("keterangan").value = item.keterangan;  
                        });  

                        var datarow='';
                        $.each(response.datasub, function(i, itemsub) { 
                            datarow+="<tr><td>"+itemsub.sku+"</td>"; 
                            datarow+="<td>"+itemsub.nama_item+"</td>"; 
                            datarow+="<td>"+itemsub.tgl_expired+"</td>";   
                            datarow+="<td>"+itemsub.satuan_kecil+"</td>";  
                            datarow+="<td><input type='number' name='kuantiti[]' value='"+itemsub.kuantiti+"' required class='form-control'></td>";
                            datarow+="<input type='hidden' name='id_item[]' value='"+itemsub.id_item+"'>"; 
                            datarow+="</tr>"; 
                        });
                        $('.listitemedit').append(datarow);       
                    }
                });   
                return false;
            }

        $('#nomor_rec_penerimaan_edit').change(function(){
            var dataId = $(this).val();     
            $(".listitemditerima").find("tr:gt(0)").remove(); 
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url()?>pembelian/penerimaandetail',
                data: 'id=' + dataId,
                dataType 	: 'json',
                success: function(response) { 
                    $.each(response.datarows, function(i, item) {   
                            $('.nomor_faktur_edit').val(item.nomor_faktur);    
                            $('.supplier_edit').val(item.nama_supplier);      
                            $('.penerima_edit').val(item.penerima);    
                    }); 
                    var datarow =''; 
                    $.each(response.datasub, function(i, itemsub) {
                        datarow+="<tr><td>"+itemsub.sku+"</td>"; 
                        datarow+="<td>"+itemsub.nama_item+"</td>"; 
                        datarow+="<td>"+itemsub.tgl_expired+"</td>";   
                        datarow+="<td>"+itemsub.satuan_kecil+"</td>"; 
                        datarow+="<td>"+itemsub.kuantiti+"</td>"; 
                        datarow+="<td><input type='number' name='kuantiti[]' required class='form-control'></td>";
                        datarow+="<input type='hidden' name='kode_item[]' value='"+itemsub.kode_item+"'>";
                        datarow+="<input type='hidden' name='sku[]' value='"+itemsub.sku+"'>";
                        datarow+="<input type='hidden' name='nama_item[]' value='"+itemsub.nama_item+"'>";
                        datarow+="<input type='hidden' name='tgl_expired[]' value='"+itemsub.tgl_expired_ymd+"'>";
                        datarow+="<input type='hidden' name='satuan_kecil[]' value='"+itemsub.satuan_kecil+"'>";
                        datarow+="</tr>"; 
                    });   
                    $('.listitemditerima').append(datarow);
                }
            });  
            return false; 
        }); 
            document.getElementById("FormulirEdit").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitformEdit").setAttribute('disabled','disabled');
			$('#submitformEdit').html('Loading ...');
			var form = $('#FormulirEdit')[0];
			var formData = new FormData(form);
			var xhrAjax = $.ajax({
			type 		: 'POST',
			url 		: $(this).attr('action'),
			data 		: formData, 
			processData: false,
			contentType: false,
			cache: false, 
			dataType 	: 'json'
			}).done(function(data) { 
			if ( ! data.success) {		 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    document.getElementById("submitformEdit").removeAttribute('disabled');  
                    $('#submitformEdit').html('Submit');    
                    var objek = Object.keys(data.errors);  
                    for (var key in data.errors) {
                        if (data.errors.hasOwnProperty(key)) { 
                            var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
                            $('.'+key).addClass('has-error');
                            $('input[name="' + key + '"]').after(msg); 
                            $('select[name="' + key + '"]').after(msg);  
                            $('textarea[name="' + key + '"]').after(msg);  
                        }
                        if (key == 'fail') {   
                            new PNotify({
                                title: 'Notifikasi',
                                text: data.errors[key],
                                type: 'danger'
                            }); 
                        }
                    }    
                } else { 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    PNotify.removeAll();
                    tabelretur.ajax.reload();  
					laporan_ringkas();			  
                    document.getElementById("submitformEdit").removeAttribute('disabled'); 
                    $('#editData').modal('hide');        
                    document.getElementById("FormulirEdit").reset();    
                    $('#submitformEdit').html('Submit');   
                    new PNotify({
                        title: 'Notifikasi',
                        text: data.message,
                        type: 'success'
                    });   
                }
                }).fail(function(data) { 
                    new PNotify({
                        title: 'Notifikasi',
                        text: "Request gagal, browser akan direload",
                        type: 'danger'
                    }); 
                    window.setTimeout(function() {  location.reload();}, 2000);
                }); 
                e.preventDefault(); 
            }); 
           
           
            function hapus(elem){ 
		        var dataId = $(elem).data("id");
                document.getElementById("idddelete").setAttribute('value', dataId);
        		$('#modalHapus').modal();        
            }
            document.getElementById("FormulirHapus").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitformHapus").setAttribute('disabled','disabled');
			$('#submitformHapus').html('Loading ...');
			var form = $('#FormulirHapus')[0];
			var formData = new FormData(form);
			var xhrAjax = $.ajax({
			type 		: 'POST',
			url 		: $(this).attr('action'),
			data 		: formData, 
			processData: false,
			contentType: false,
			cache: false, 
			dataType 	: 'json'
			}).done(function(data) { 
			if ( ! data.success) {	
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    document.getElementById("submitformHapus").removeAttribute('disabled');  
                    $('#submitformHapus').html('Delete');     
                    var objek = Object.keys(data.errors);  
                    for (var key in data.errors) { 
                        if (key == 'fail') {   
                            new PNotify({
                                title: 'Notifikasi',
                                text: data.errors[key],
                                type: 'danger'
                            }); 
                        }
                    }      
                } else { 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    PNotify.removeAll();   
                    tabelretur.ajax.reload();
					laporan_ringkas();			
                    document.getElementById("submitformHapus").removeAttribute('disabled'); 
                    $('#modalHapus').modal('hide');        
                    document.getElementById("FormulirHapus").reset();    
                    $('#submitformHapus').html('Delete'); 
                    new PNotify({
                        title: 'Notifikasi',
                        text: data.message,
                        type: 'success'
                    });   
                }
                }).fail(function(data) { 
                    new PNotify({
                        title: 'Notifikasi',
                        text: "Request gagal, browser akan direload",
                        type: 'danger'
                    }); 
                    window.setTimeout(function() {  location.reload();}, 2000);
                }); 
                e.preventDefault(); 
            });    

        $(document).on('hidden.bs.modal', '.modal', function () {
            $('.modal:visible').length && $(document.body).addClass('modal-open');
        });
        </script>
	</body>
</html>