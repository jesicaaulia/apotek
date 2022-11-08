<table class="table table-bordered table-striped table-condensed mb-none">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Kode Rekening</th>
            <th>Nama Rekening</th> 
            <th>Masuk</th>  
            <th>Keluar</th>  
            <th>Keterangan</th>  
        </tr>
    </thead>
    <tbody> 
<?php foreach($posts as $post): ?> 
<tr> 
    <td><?php echo tgl_indo($post['tanggal']); ?></td> 
    <td><?php echo $post['kode_rekening']; ?></td> 
    <td><?php echo $post['nama_rekening']; ?></td> 
    <td><?php echo rupiah($post['masuk']); ?></td>  
    <td><?php echo rupiah($post['keluar']); ?></td>  
    <td><?php echo $post['keterangan']; ?></td> 
</tr> 
<?php endforeach;?>  
</tbody>
</table>
<ul class="pagination">
<?php echo $this->ajax_pagination->create_links(); ?>
</ul> 