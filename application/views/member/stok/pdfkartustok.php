<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
$startdate = $this->input->post("startdate");   
$enddate = $this->input->post("enddate");   
$idd = $this->input->post("idd");    
$stok_sebelum = $total_masuk - $total_keluar;
?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<title>Kartu Stok</title> 
    <style>
    .invoice-box {
        width: 21cm;
        margin: auto;
        padding: 10px;
        border: 2px solid #eee;     
        color: #555;
    } 
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 1px;
        vertical-align: top;
    } 
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title { 
        line-height: 45px;
        color: #333;
    }
     
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 2px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 21cm) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block; 
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block; 
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    } 
    .rincianitem {
        margin-top:20px;  
        padding : 3px;    border-collapse: collapse;
    }
    .rincianitem thead th {
        border: 1px solid #999; 
        padding: 2px;
        font-size:13px;
        text-align:left;
    }
    .rincianitem tr td {
        border: 1px solid #999;
        font-size:13px;
        padding: 2px;
        text-align:left;
    }
    .kuantiti{
        width:80px;
    }
  
    .footer {  
        padding : 3px;    border-collapse: collapse;
        
    } 
    .footer tr td {
        border: 1px solid #999;
        font-size:13px;
        padding: 2px;
        text-align:left;
    } 
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table style="border-bottom:1px solid;">
                        <tr>
                            <td class="title">
                            <img src="<?php echo base_url()?>assets/images/<?php echo $profil->row()->logo; ?>" width="200">
						
                            </td>
                            <td  align="right">
                                <h2>Kartu Stok</h2>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
							<b><?php echo $profil->row()->nama_apotek; ?></b>
							<br/>
							<?php echo $profil->row()->alamat; ?> 
                            </td>
                            <td align="right" width="50%">
                                <table>
                                    <tr>
                                        <td>Kode Item</td>
                                        <td width="5%">:</td>
                                        <td><?php echo $idd; ?></td>
                                    </tr> 
                                    <tr>
                                        <td>Nama Item</td>
                                        <td width="5%">:</td>
                                        <td><?php echo $namaproduk->row()->nama_item; ?></td>
                                    </tr> 
                                    <tr>
                                        <td>Tanggal Awal</td>
                                        <td width="5%">:</td>
                                        <td><?php echo tgl_indo($startdate); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal akhir</td>
                                        <td width="5%">:</td>
                                        <td><?php echo tgl_indo($enddate); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Cetak</td>
                                        <td width="5%">:</td>
                                        <td><?php echo tgl_indo($enddate);?> <?php echo date('h:i:s');?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
             
        <table class="rincianitem">
            <thead>
                <tr>
                    <th>Nomor Record</th>
                    <th>Tanggal</th>
                    <th>Nama Transaksi</th>  
                    <th class="kuantiti">Masuk</th> 
                    <th class="kuantiti">Keluar</th> 
                    <th class="kuantiti">Sisa</th>   
                </tr>
                <tr> 
                    <td>-</td>  
                    <td><?php echo $this->security->xss_clean(tgl_indo($startdate));?></td>  
                    <td colspan="3">Stok Awal</td>   
                    <td><?php echo $stok_sebelum;?></td>  
                </tr> 
            </thead>
            <tbody> 
            <?php  
            $sisa = $stok_sebelum;
            foreach($rincianstok->result() as $r) {
            $sisa = $sisa + $r->jumlah_masuk - $r->jumlah_keluar;  
            ?>
                <tr> 
                    <td><?php echo $this->security->xss_clean($r->id);?></td>  
                    <td><?php echo $this->security->xss_clean(tgl_indo($r->tanggal));?></td> 
                    <td><?php echo $this->security->xss_clean($r->jenis_transaksi);?></td>   
                    <td><?php echo $this->security->xss_clean(bilanganbulat($r->jumlah_masuk));?></td>
                    <td><?php echo $this->security->xss_clean(bilanganbulat($r->jumlah_keluar));?></td> 
                    <td><?php echo $this->security->xss_clean(bilanganbulat($sisa));?></td>  
                </tr> 
            <?php  
            } ?>
            <tr> 
                <td colspan="3" style="border:none;">&nbsp;
                </td>
                <td colspan="2"><b>Stok Akhir</b></td>
                <td><?php echo bilanganbulat($sisa);?></td> 
            </tr>
        </table>
          
    </div>
 
</body>
</html>
 