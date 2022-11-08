<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>  
		<meta charset="UTF-8"> 
		<link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/favicon.png" type="image/ico">   
		<title>Apotek Mama</title>    
		<meta name="author" content="Paber">  
        <!-- Mobile Metas -->
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
						<h2>Hutang</h2>  
					</header>  
					<!-- start: page -->
                    <section class="panel"> 
                        <div class="panel-body">       

                            <div class="row"> 
                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <div class="row">
                                    <div class="col-md-3 col-xl-12">
                                        <section class="panel">
                                            <div class="panel-body bg-primary">
                                                <div class="widget-summary"> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Total Hutang Belum Dibayar</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="total_hutang_belum_bayar"></strong>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div> 
                                    <div class="col-md-3 col-xl-12">
                                        <section class="panel">
                                            <div class="panel-body bg-primary">
                                                <div class="widget-summary"> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Hutang Akan Jatuh Tempo</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="akan_jatuh_tempo"></strong>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div> 
                                    <div class="col-md-3 col-xl-12">
                                        <section class="panel">
                                            <div class="panel-body bg-primary">
                                                <div class="widget-summary"> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Sudah Jatuh Tempo</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="sudah_jatuh_tempo"></strong>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div> 
                                    <div class="col-md-3 col-xl-12">
                                        <section class="panel">
                                            <div class="panel-body bg-primary">
                                                <div class="widget-summary"> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Sudah Dibayar Minggu Ini</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="dibayar_minggu_ini"></strong>
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
                                <div class="col-md-6" align="left"><h2 class="panel-title">Data Hutang</h2></div>
                                <?php  
                                echo level_user('keuangan','hutang',$this->session->userdata('kategori'),'add') > 0 ? '<div class="col-md-6" align="right"><a class="btn btn-success" href="#"  data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah</a></div>':'';
                                ?> 
							</div>
                        </header>
                        <div class="panel-body"> 
                                <table class="table table-bordered table-hover table-striped" id="hutangdata">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Judul</th>
                                            <th>Nomor Faktur</th>
                                            <th>Tanggal</th> 
                                            <th>Nominal</th> 
                                            <th>Jatuh Tempo</th> 
                                            <th>Dibayar</th> 
                                            <th>Sisa</th> 
                                            <th>Lunas</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table> 
                        </div>
                    </section>
					<!-- end: page -->
				</section>
			</div>
		</section>

		
        <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <section class="panel panel-primary">
                    <?php echo form_open('keuangan/hutangtambah',' id="FormulirTambah"');?>  
                    <header class="panel-heading">
                        <h2 class="panel-title">Tambah Hutang</h2>
                    </header>
                    <div class="panel-body">
                        <div class="form-group mt-lg id_supplier">
                                <label class="col-sm-3 control-label">Pilih Supplier<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select data-plugin-selectTwo class="form-control" name="id_supplier"  required>  
    									<?php foreach ($supplier as $supp): ?>
                                        <option value="<?php echo $supp->id;?>"><?php echo $supp->nama_supplier;?></option>
                                        <?php endforeach; ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group mt-lg judul">
                                <label class="col-sm-3 control-label">Judul<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="judul"  class="form-control" required/>
                                </div>
                            </div>  
                            <div class="form-group mt-lg tanggal">
                                <label class="col-sm-3 control-label">Tanggal Hutang<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tanggal" class="form-control tanggalformat" data-plugin-datepicker required/>
                                </div>
                            </div>
                            <div class="form-group mt-lg tanggal_jatuh_tempo">
                                <label class="col-sm-3 control-label">Jatuh Tempo<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tanggal_jatuh_tempo" class="form-control tanggalformat" data-plugin-datepicker required/>
                                </div>
                            </div>
                            <div class="form-group mt-lg nominal">
                                <label class="col-sm-3 control-label">Nominal<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nominal" class="form-control mask_price" required/>
                                </div>
                            </div>
                            <div class="form-group keterangan">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control"   name="keterangan"></textarea>
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

        <div class="modal fade" id="tambahbayarHutang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <section class="panel panel-primary">
                    <?php echo form_open('keuangan/hutangtambahpembayaran',' id="FormulirTambahPembayaran"');?>  
                    <input type="hidden" name="idd" id="idhutang">
                    <header class="panel-heading">
                        <h2 class="panel-title">Form Pembayaran Hutang</h2>
                    </header>
                    <div class="panel-body">
                        <div class="form-group mt-lg id_supplier">
                                <label class="col-sm-3 control-label">Pilih Supplier<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select data-plugin-selectTwo class="form-control" id="id_supplier" name="id_supplier"  disabled>  
    									<?php foreach ($supplier as $supp): ?>
                                        <option value="<?php echo $supp->id;?>"><?php echo $supp->nama_supplier;?></option>
                                        <?php endforeach; ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group mt-lg judul">
                                <label class="col-sm-3 control-label">Judul<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="judul"  id="judul" class="form-control" readonly/>
                                </div>
                            </div>  
                            <div class="form-group mt-lg tanggal_jatuh_tempo">
                                <label class="col-sm-3 control-label">Jatuh Tempo<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"  id="tanggal_jatuh_tempo"  name="tanggal_jatuh_tempo" class="form-control" readonly/>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Total Hutang<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"  id="totalhutang"  class="form-control" readonly/>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Sudah dibayar<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"  id="totalhutangdibayar"  class="form-control" readonly/>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Sisa<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"  id="totalhutangsisa"  class="form-control" readonly/>
                                </div>
                            </div>
                            <div class="form-group mt-lg tanggal">
                                <label class="col-sm-3 control-label">Tanggal Pembayaran<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tanggal" class="form-control tanggalformat" data-plugin-datepicker required/>
                                </div>
                            </div>
                            <div class="form-group mt-lg nominal">
                                <label class="col-sm-3 control-label">Nominal<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nominal" class="form-control mask_price" required/>
                                </div>
                            </div>
                            <div class="form-group keterangan">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control"   name="keterangan"></textarea>
                                </div>
                            </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm" type="submit" id="submitformPembayaran">Submit</button>
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
                                <?php echo form_open('keuangan/hutanghapus',' id="FormulirHapus"');?>  
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
		  
        <div class="modal fade bd-example-modal-lg" id="DetailbayarData"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel panel-primary">   
                    <header class="panel-heading">
                        <div class="row">
                            <div class="col-md-3 text-left"> 
                            <h2 class="panel-title">Pembayaran Hutang</h2>  
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
       
        <div class="modal fade" id="modalHapusPembayaran" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data </h4>
                    </div>
                    <div class="modal-body">
                            <p>Yakin ingin menghapus data ini ?</p>
                    </div>
                    <div class="modal-footer"> 
                        <?php echo form_open('keuangan/hutanghapuspembayaran',' id="FormulirHapusPembayaran"');?>  
                        <input type="hidden" name="dataId" id="dataId">
                        <input type="hidden" name="nominalInt" id="nominalInt">
                        <input type="hidden" name="id" id="id">
                        <button type="submit" class="btn btn-danger" id="submitformHapusPembayaran">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                    </div>
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
        $('.tanggalformat').datepicker({
            format: 'yyyy-mm-dd' 
        });  
            var tablehutang = $('#hutangdata').DataTable({  
                "serverSide": true, 
                "order": [], 
                "ajax": {
                    "url": "<?php echo base_url()?>keuangan/datahutang",
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
                    url: '<?php echo base_url()?>keuangan/hutang_data', 
                    dataType    : 'json',
                    success: function(response) {  
                        $.each(response, function(i, item) {  
                        $('#akan_jatuh_tempo').html(item.akan_jatuh_tempo);  
                        $('#dibayar_minggu_ini').html(item.dibayar_minggu);  
                        $('#total_hutang_belum_bayar').html(item.total_hutang_belum_bayar);  
                        $('#sudah_jatuh_tempo').html(item.sudah_jatuh_tempo);  
                        }); 
                    }
                });  
                return false;
            }
            laporan_ringkas();
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
                    tablehutang.ajax.reload();   
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
            function getdataHutang(dataId){
                $('#showdetail').html('Loading...');  
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>keuangan/hutangdetail',
                    data: 'id=' + dataId,
                    dataType 	: 'json',
                    success: function(response) { 
                        var datarow='<div class="row">';
                        $.each(response.datarows, function(i, item) { 
                            datarow+='<div class="col-md-6">';
                            datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                            datarow+="<tr><td>ID</td><td>: "+item.id+"</td></tr>";
                            datarow+="<tr><td>Judul</td><td>: "+item.judul+"</td></tr>";
                            datarow+="<tr><td>Nomor Faktur</td><td>: "+item.nomor_faktur+"</td></tr>"; 
                            datarow+="<tr><td>Tanggal </td><td>: "+item.tanggal+"</td></tr>";
                            datarow+="<tr><td>Jatuh Tempo</td><td>: "+item.tanggal_jatuh_tempo+"</td></tr>";
                            datarow+="<tr><td>Nominal</td><td>: "+item.nominal+"</td></tr>"; 
                            datarow+="<tr><td>Sudah Dibayar</td><td>: "+item.nominal_dibayar+"</td></tr>";
                            datarow+="<tr><td>Sisa</td><td>: "+item.sisa+"</td></tr>";   
                            datarow+='</table></div><div class="col-md-6">';
                            datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                            datarow+="<tr><td>Status</td><td>: "+item.status+"</td></tr>";  
                            datarow+="<tr><td>Kode Supplier</td><td>: "+item.id_supplier+"</td></tr>";
                            datarow+="<tr><td>Supplier</td><td>: "+item.supplier+"</td></tr>";
                            datarow+="<tr><td>Telepon</td><td>: "+item.telepon+"</td></tr>";
                            datarow+="<tr><td>Alamat</td><td>: "+item.alamat+"</td></tr>";
                            datarow+="<tr><td>Keterangan</td><td>: "+item.keterangan+"</td></tr>";
                            datarow+="</table>"; 
                        }); 
                        datarow+='<h3>Rincian Pembayaran</h3>';
                        datarow+='<div class="table-responsive" style="max-height:420px;">';  
                        datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                        datarow+="<thead><tr>";
                        datarow+="<th>Keterangan</th>"; 
                        datarow+="<th>Tanggal</th>"; 
                        datarow+="<th>Nominal</th>"; 
                        datarow+="<th></th>";
                        datarow+="</tr></thead>";
                        datarow+="<tbody>"; 
                        $.each(response.datasub, function(i, itemsub) {
                            if(itemsub.tanggal ==''){ 
                                datarow+="<tr>"; 
                                datarow+="<td colspan='4'> Belum ada pembayaran</td>"; 
                                datarow+="</tr>"; 
                            }else{ 
                                datarow+="<tr>";
                                datarow+="<td>"+itemsub.keterangan+"</td>"; 
                                datarow+="<td>"+itemsub.tanggal+"</td>"; 
                                datarow+="<td>"+itemsub.nominal+"</td>";  
                                datarow+='<td><a onclick="hapusrincian(this)" data-id="'+itemsub.id+'" data-idd="'+dataId+'" data-id="'+itemsub.id+'" data-nominal="'+itemsub.nominalInt+'" class="btn btn-danger btn-xs" role="button">Hapus</a></td>'; 
                                datarow+="</tr>"; 
                            }
                        });   
                        datarow+="</tbody>";
                        datarow+="</table>";
                        datarow+="</div></div>";  
                        $('#showdetail').html(datarow);
                    }
                });  
                return false;
            }
            function detail(elem){ 
		        var dataId = $(elem).data("id");    
                $('#DetailbayarData').modal();   
                getdataHutang(dataId) 
            }
            function bayar(elem){ 
		        var dataId = $(elem).data("id");    
                $('#tambahbayarHutang').modal();    
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>keuangan/hutangdetail',
                    data: 'id=' + dataId,
                    dataType 	: 'json',
                    success: function(response) { 
                        var datarow='<div class="row">';
                        $.each(response.datarows, function(i, item) { 
                                 
                            $("#id_supplier").select2("val", item.id_supplier);  
                            document.getElementById("idhutang").value = item.id; 
                            document.getElementById("totalhutang").value = item.nominal; 
                            document.getElementById("totalhutangdibayar").value = item.nominal_dibayar;  
                            document.getElementById("totalhutangsisa").value = item.sisa; 
                            document.getElementById("judul").value = item.judul; 
                            document.getElementById("tanggal_jatuh_tempo").value = item.tanggal_jatuh_tempo_ymd; 
                        }); 
                        
                    }
                });  
            }
            
            function hapusrincian(elem){ 
                var id = $(elem).data("id"); 
                var dataId = $(elem).data("idd"); 
                var nominalInt = $(elem).data("nominal");  
                document.getElementById("id").setAttribute('value', id);
                document.getElementById("dataId").setAttribute('value', dataId);
                document.getElementById("nominalInt").setAttribute('value', nominalInt);
        		$('#modalHapusPembayaran').modal();        
            } 

            function hapus(elem){ 
		        var dataId = $(elem).data("id");
                document.getElementById("idddelete").setAttribute('value', dataId);
        		$('#modalHapus').modal();        
            }
            document.getElementById("FormulirHapus").addEventListener("submit", function (e) {  
			blurForm();        
            $('.help-block').hide();
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
                    tablehutang.ajax.reload();
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

            document.getElementById("FormulirHapusPembayaran").addEventListener("submit", function (e) {  
			blurForm();        
            $('.help-block').hide();
			document.getElementById("submitformHapusPembayaran").setAttribute('disabled','disabled');
			$('#submitformHapusPembayaran').html('Loading ...');
			var form = $('#FormulirHapusPembayaran')[0];
			var dataId = document.getElementById("dataId").value;
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
                        window.setTimeout(function() {  
                        document.getElementById("submitformHapusPembayaran").removeAttribute('disabled');  
                        $('#submitformHapusPembayaran').html('Delete');     
                        new PNotify({
                            title: 'Warning',
                            text: 'terjadi kesalahan, refresh browser anda',
                            type: 'danger'
                        });    
                        }, 500);
                        return false;
                } else { 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    PNotify.removeAll(); 
					laporan_ringkas();
					 document.getElementById("submitformHapusPembayaran").removeAttribute('disabled'); 
					$('#modalHapusPembayaran').modal('hide');        
					document.getElementById("FormulirHapusPembayaran").reset();    
					$('#submitformHapusPembayaran').html('Delete');
					getdataHutang(dataId) ;
					tablehutang.ajax.reload();  
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
            document.getElementById("FormulirTambahPembayaran").addEventListener("submit", function (e) {  
			blurForm();       
			$('.help-block').hide();
			$('.form-group').removeClass('has-error');
			document.getElementById("submitformPembayaran").setAttribute('disabled','disabled');
			$('#submitformPembayaran').html('Loading ...');
			var form = $('#FormulirTambahPembayaran')[0];
			var dataId = document.getElementById("idhutang").value;
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
					document.getElementById("submitformPembayaran").removeAttribute('disabled');  
					$('#submitformPembayaran').html('Submit');    
					var objek = Object.keys(data.errors);  
					for (var key in data.errors) {
						if (data.errors.hasOwnProperty(key)) { 
							var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
							$('.'+key).addClass('has-error');
							$('input[name="' + key + '"]').after(msg);  
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
					laporan_ringkas();
					document.getElementById("submitformPembayaran").removeAttribute('disabled'); 
					document.getElementById("FormulirTambahPembayaran").reset();  
					$('#submitformPembayaran').html('Submit');
					tablehutang.ajax.reload();   
					getdataHutang(dataId) ;
					$('#tambahbayarHutang').modal('hide');    
					$('#DetailbayarData').modal();   
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
        </script>
	</body>
</html>