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
						<h2>Piutang Penjualan</h2>  
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
                                                            <h4 class="title">Total Piutang Belum Dibayar</h4>
                                                            <div class="info">
                                                                <strong class="amount" id="total_piutang_belum_dibayar"></strong>
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
                                                            <h4 class="title">Piutang Akan Jatuh Tempo</h4>
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
                                <div class="col-md-6" align="left"><h2 class="panel-title">Data Piutang Penjualan</h2></div>
                            </div>
                        </header>
                        <div class="panel-body"> 
                                <table class="table table-bordered table-hover table-striped" id="hutangdata">
                                    <thead>
                                        <tr>
                                            <th></th> 
                                            <th>Kode Struk</th>
                                            <th>Pembeli</th>
                                            <th>No HP</th>
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

		
        <div class="modal fade" id="tambahbayarPiutang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <section class="panel">
                    <?php echo form_open('keuangan/piutangtambahpembayaran',' id="FormulirTambahPembayaran"');?>  
                    <input type="hidden" name="idd" id="idpiutang">
                    <header class="panel-heading">
                        <h2 class="panel-title">Form Pembayaran Piutang</h2>
                    </header>
                    <div class="panel-body"> 
                            <div class="form-group mt-lg nama_pembeli">
                                <label class="col-sm-3 control-label">Nama Pembeli<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"   id="nama_pembeli" class="form-control" readonly/>
                                </div>
                            </div>  
                            <div class="form-group mt-lg jenis_kelamin">
                                <label class="col-sm-3 control-label">Jenis Kelamin<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"   id="jenis_kelamin" class="form-control" readonly/>
                                </div>
                            </div>  
                            <div class="form-group mt-lg telepon">
                                <label class="col-sm-3 control-label">Telepon<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"   id="telepon" class="form-control" readonly/>
                                </div>
                            </div>  
                            <div class="form-group mt-lg handphone">
                                <label class="col-sm-3 control-label">Handphone<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"   id="handphone" class="form-control" readonly/>
                                </div>
                            </div>  
                            <div class="form-group mt-lg kode_struk">
                                <label class="col-sm-3 control-label">Kode Struk<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"   id="kode_struk" class="form-control" readonly/>
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
 
 
        <div class="modal fade bd-example-modal-lg" id="DetailbayarData"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:90%">
                <div class="modal-content">
                <section class="panel">   
                    <header class="panel-heading">
                        <div class="row">
                            <div class="col-md-3 text-left"> 
                            <h2 class="panel-title">Rincian Piutang </h2>  
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
                        <?php echo form_open('keuangan/piutanghapuspembayaran',' id="FormulirHapusPembayaran"');?>  
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
            "ajax": { 
                url : "<?php echo base_url()?>keuangan/datapiutang", 
                type : 'GET' 
                }, 
            });  
            function laporan_ringkas(){   
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>keuangan/piutang_data', 
                    dataType    : 'json',
                    success: function(response) {  
                        $.each(response, function(i, item) {  
                        $('#dibayar_minggu_ini').html(item.dibayar_minggu);  
                        $('#total_piutang_belum_dibayar').html(item.total_piutang_belum_bayar);  
                        $('#akan_jatuh_tempo').html(item.akan_jatuh_tempo);  
                        $('#sudah_jatuh_tempo').html(item.sudah_jatuh_tempo);  
                        }); 
                    }
                });  
                return false;
            }
            laporan_ringkas();
            function getdataPiutang(dataId){
                $('#showdetail').html('Loading...');  
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>keuangan/piutangdetail',
                    data: 'id=' + dataId,
                    dataType 	: 'json',
                    success: function(response) { 
                        var datarow='<div class="row">';
                        $.each(response.datarows, function(i, item) { 
                            datarow+='<div class="col-md-6">';
                            datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                            datarow+="<tr><td>ID</td><td>: "+item.id+"</td></tr>";
                            datarow+="<tr><td>Judul</td><td>: "+item.judul+"</td></tr>";
                            datarow+="<tr><td>Kode Struk</td><td>: "+item.id_penjualan+"</td></tr>"; 
                            datarow+="<tr><td>Tanggal </td><td>: "+item.tanggal+"</td></tr>";
                            datarow+="<tr><td>Jatuh Tempo</td><td>: "+item.tanggal_jatuh_tempo+"</td></tr>";
                            datarow+="<tr><td>Nominal</td><td>: "+item.nominal+"</td></tr>"; 
                            datarow+="<tr><td>Sudah Dibayar</td><td>: "+item.nominal_dibayar+"</td></tr>";  
                            datarow+="<tr><td>Sisa</td><td>: "+item.sisa+"</td></tr>";
                            datarow+="<tr><td>Nama Pembeli</td><td>: "+item.nama_pembeli+"</td></tr>";
                            datarow+="<tr><td>Jenis Kelamin</td><td>: "+item.jenis_kelamin+"</td></tr>";
                            datarow+="<tr><td>Telepon</td><td>: "+item.telepon+"</td></tr>";
                            datarow+="<tr><td>Handphone</td><td>: "+item.handphone+"</td></tr>";
                            datarow+="<tr><td>Alamat</td><td>: "+item.alamat+"</td></tr>";
                            datarow+="</table>";
                            datarow+='</div>';
                            datarow+='<div class="col-md-6">';
                            datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                            datarow+="<tr><td>Status</td><td>: "+item.status+"</td></tr>";  
                            datarow+="<tr><td>Sisa</td><td>: "+item.sisa+"</td></tr>";   
                            datarow+="<tr><td>Keterangan</td><td>: "+item.keterangan+"</td></tr>";
                            datarow+="</table>"; 
                        });  
                        datarow+='<h3>Detail Barang Dibeli</h3>';
                        datarow+='<div class="table-responsive" style="max-height:420px;">';  
                        datarow+='<table class="table table-bordered table-hover table-striped dataTable no-footer">';
                        datarow+="<thead><tr>";
                        datarow+="<th>Nama Produk</th>"; 
                        datarow+="<th>Kode Produk</th>"; 
                        datarow+="<th>Harga</th>"; 
                        datarow+="<th>Kuantiti</th>"; 
                        datarow+="<th>Diskon</th>"; 
                        datarow+="<th>Total</th>";  
                        datarow+="</tr></thead>";
                        datarow+="<tbody>"; 
                        $.each(response.dataproduk, function(i, itemsub) { 
                                datarow+="<tr>";
                                datarow+="<td>"+itemsub.nama_item+"</td>"; 
                                datarow+="<td>"+itemsub.kode_item+"</td>"; 
                                datarow+="<td>"+itemsub.harga+"</td>"; 
                                datarow+="<td>"+itemsub.kuantiti+"</td>"; 
                                datarow+="<td>"+itemsub.diskon+"</td>";  
                                datarow+="<td>"+itemsub.total+"</td>";  
                                datarow+='</tr>'; 
                        });   
                        datarow+="</tbody>";
                        datarow+="</table>";
                        datarow+="</div>";

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
                        datarow+="</div>";
                        datarow+="</div>";  
                        $('#showdetail').html(datarow);
                    }
                });  
                return false;
            }
            function detail(elem){ 
		        var dataId = $(elem).data("id");    
                $('#DetailbayarData').modal();   
                getdataPiutang(dataId) 
            }
            function bayar(elem){ 
		        var dataId = $(elem).data("id");    
                $('#tambahbayarPiutang').modal();    
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url()?>keuangan/piutangdetail',
                    data: 'id=' + dataId,
                    dataType 	: 'json',
                    success: function(response) { 
                        var datarow='<div class="row">';
                        $.each(response.datarows, function(i, item) { 
                                 
                            $("#id_supplier").select2("val", item.id_supplier);  
                            document.getElementById("idpiutang").value = item.id; 
                            document.getElementById("nama_pembeli").value = item.nama_pembeli; 
                            document.getElementById("jenis_kelamin").value = item.jenis_kelamin; 
                            document.getElementById("telepon").value = item.telepon; 
                            document.getElementById("handphone").value = item.handphone; 
                            document.getElementById("kode_struk").value = item.id_penjualan; 
                            document.getElementById("totalhutang").value = item.nominal; 
                            document.getElementById("totalhutangdibayar").value = item.nominal_dibayar;  
                            document.getElementById("totalhutangsisa").value = item.sisa;  
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
                    PNotify.removeAll(); laporan_ringkas();
                    window.setTimeout(function() {   
                        document.getElementById("submitformHapusPembayaran").removeAttribute('disabled'); 
                		$('#modalHapusPembayaran').modal('hide');        
                        document.getElementById("FormulirHapusPembayaran").reset();    
                        $('#submitformHapusPembayaran').html('Delete');getdataPiutang(dataId) ;tablehutang.ajax.reload();  
                    }, 1000);
                    window.setTimeout(function() {  
                        new PNotify({
                            title: 'Notifikasi',
                            text: data.message,
                            type: 'success'
                        }); 
                    }, 500); 
                }
                }).fail(function(data) {   
                    alert('request gagal');
                    location.reload();
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
			var dataId = document.getElementById("idpiutang").value;
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
                        document.getElementById("submitformPembayaran").removeAttribute('disabled');  
                        $('#submitformPembayaran').html('Submit');    
                        var objek = Object.keys(data.errors);  
                        for (var key in data.errors) {
                            if (data.errors.hasOwnProperty(key)) { 
                                var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
                                $('.'+key).addClass('has-error');
                                $('input[name="' + key + '"]').after(msg);  
                            }
                        }   
                        }, 500);
                        return false;
                } else { 
                    $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
                    PNotify.removeAll(); laporan_ringkas();
                    window.setTimeout(function() {   
                        document.getElementById("submitformPembayaran").removeAttribute('disabled'); 
                        document.getElementById("FormulirTambahPembayaran").reset();  
                        $('#submitformPembayaran').html('Submit');tablehutang.ajax.reload();   
                        $('#tambahbayarPiutang').modal('hide');    
                        $('#DetailbayarData').modal();    getdataPiutang(dataId) ;
                    }, 1000);
                    window.setTimeout(function() {  
                        new PNotify({
                            title: 'Notifikasi',
                            text: data.message,
                            type: 'success'
                        }); 
                    }, 500); 
                }
                }).fail(function(data) {   
                    alert('request gagal');
                    location.reload();
                }); 
                e.preventDefault(); 
            }); 
        </script>
	</body>
</html>