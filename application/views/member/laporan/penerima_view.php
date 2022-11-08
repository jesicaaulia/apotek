<table class="table table-bordered table-striped table-condensed mb-none">
    <thead>
        <tr>
            <th>Nomor Referensi</th>
            <th>Tanggal Penerimaan</th>
            <th>Nomor Faktur</th> 
            <th>Nomor PO</th>  
            <th>Penerima</th>  
            <th>Keterangan</th>  
        </tr>
    </thead>
    <tbody> 
<?php foreach($posts as $post): ?> 
<tr>
    <td><?php echo $post['nomor_rec']; ?></td> 
    <td><?php echo tgl_indo($post['tanggal_penerimaan']); ?></td> 
    <td><?php echo $post['nomor_faktur']; ?></td> 
    <td><?php echo $post['nomor_po']; ?></td> 
    <td><?php echo $post['penerima']; ?></td> 
    <td><?php echo $post['keterangan']; ?></td> 
</tr> 
<?php endforeach;?>  
</tbody>
</table>
<ul class="pagination">
<?php echo $this->ajax_pagination->create_links(); ?>
</ul> 