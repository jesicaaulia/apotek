<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
$idd = $this->input->post("idd"); 
$jumlah = $this->input->post("jumlah"); 
$namaitem = $this->input->post("namaitem"); 
$harga = $this->input->post("harga"); 
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>  
		<meta charset="UTF-8"> 
		<link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/favicon.png" type="image/ico">   
		<title>Apotek Mama</title>    
		<meta name="author" content="Paber">  
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/font-awesome/css/font-awesome.css" />
	 
	</head>
	<body  style="background-color:#ccc;"> 
    <?php
    $root = base_url();
    for($i = 0; $i < count($idd); $i++){ 
    if($jumlah[$i] < 1){
        $jumlah[$i] = 1;
    }   
        for($x = 0; $x < $jumlah[$i]; $x++){
            echo'
                <div class="col-xs-3" align="center" style="margin:20px; background:url('.$root.'assets/images/bgbarcode.jpg); max-width: 220px;">
                '.$namaitem[$i].'<br/>'.$harga[$i].'<br/>
                <img class="img-responsive"   src="'. base_url().'stok/barcodegenerator?code='.$idd[$i].'">
                </div>
            ';
        }
    } 
    ?>   
	</body>
</html> 