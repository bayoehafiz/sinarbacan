 <meta http-equiv="refresh" content="30"; URL="<?php echo basename($PHP_SELF); ?>">

<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Data Penawaran Pending</div>
						
		  			</div>
		  			<div class="content-box-large box-with-header">
<a href="?page=data_penawaran_pending" class="btn btn-warning">Pending</a>
<a href="?page=data_penawaran_kirim" class="btn btn-success">Terkirim</a>
<a href="?page=data_penawaran_gagal" class="btn btn-success">Gagal</a>
<a href="?page=putar_penawaran" class="btn btn-warning">Putar Penawaran</a>
<a href="?page=data_penawaran" class="btn btn-success">Semua</a>
					</div>
		  		</div>
		  	</div>


<div class="content-box-large">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>

<tr>
<th>Tanggal Penawaran</th>
<th>Nama Perusahaan</th>
<th>Purchasing</th>
<th>Telp Perusahaan</th>
<th>kota</th>
<th>Provinsi</th>
<th>Harga</th>	
<th>Pembayaran</th>	
<th>Marketing</th>
<th>Keterangan</th>
<th>Aksi</th>
</tr>

</thead>

<tbody>
<!-----------------------------------Content------------------------------------>
<?php
   $oras = strtotime("today");
$ora = date("Y/m/d",$oras);	
$newdate2 = strtotime ( 'next month' , $ora  ) ; 

$newdate = date("Y/m/d",$newdate2);	

$penawaran_query = mysql_query("select * from tb_penawaran where status_penawaran = 'pending'")or die(mysql_error());
                    while($row_pn = mysql_fetch_array($penawaran_query)){
                     $tes = strtotime( $row_pn['tempo_penawaran']);
                    
$pelanggan_query = mysql_query("select * from tb_kontak_all where id_kontak = '$row_pn[id_kontak]' ")or die(mysql_error());
                    while($row = mysql_fetch_array($pelanggan_query)){
                    
$user_query = mysql_query("select * from tb_user where id_user = '$row_pn[id_user]'")or die(mysql_error());
                    while($row_user = mysql_fetch_array($user_query)){
                    
                    
                
   
				 
				 
				 
				 
				 
				    ?>
                  
<tr>


            <td><?php echo $row_pn['tanggal_penawaran']; ?></td>
<td> <a class="" data-toggle="modal" data-target="#detail_<?php echo $row['id_kontak']; ?>">

<?php echo $row['nama_kontak']; ?></a>
<br />
<?php echo $row['alamat_kontak']; ?>-<?php echo $row['kota_kontak']; ?>

 

</td>
<td><?php echo $row['cp_kontak']; ?></td>
<td><?php echo $row['telepon_kontak']; ?></td>
            

              <td><?php echo $row['kota_kontak']; ?></td>
   
   
              <td><?php echo $row['provinsi_kontak']; ?></td>
   
   
            <td><?php echo $row_pn['harga_penawaran']; ?></td>
               <td><?php echo $row_pn['pembayaran']; ?></td>
                <td><?php echo $row_user['nama_user']; ?></td>	
                  <td><?php echo $row_pn['ket_penawaran']; ?></td>	
            <td>
<a href="?page=edit_penawaran&id_penawaran=<?php echo $row_pn['id_penawaran']; ?>" class="btn btn-warning">Edit</a>

<a href="print.php?id_penawaran=<?php echo $row_pn['id_penawaran']; ?>" class="btn btn-success" target="_blank">Kirim</a>

<a href="gagal_kirim.php?id_penawaran=<?php echo $row_pn['id_penawaran']; ?>&id_kontak=<?php echo $row['id_kontak']; ?>&id_user=<?php 

echo $row_user['id_user']; ?>" class="btn btn-danger">Gagal</a>

<a href="ganti_status.php?id_penawaran=<?php echo $row_pn['id_penawaran']; ?>&id_kontak=<?php echo $row['id_kontak']; ?>&id_user=<?php

 echo $row_user['id_user']; ?>" class="btn btn-primary">Terkirim</a>

</td>	
          
</tr>
  <div class="modal fade" id="detail_<?php echo $row['id_kontak']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">�</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $row['nama_kontak']; ?></h4>
                      </div>
                      <div class="modal-body">
                        <h4>Tracking</h4>
                        
						
						<?php
$detail_q = mysql_query("select * from tb_set where id_kontak = '$row[id_kontak]' ")or die(mysql_error());
		while($row_detail = mysql_fetch_array($detail_q)){

$detail_user = mysql_query("select * from tb_user where id_user = '$row_detail[id_user]' ")or die(mysql_error());
		$user_detail = mysql_fetch_array($detail_user);
		
		?>
                        <p>pada tanggal : <?php echo $row_detail['tgl_set']; ?> di bagi ke <?php echo $user_detail['nama_user']; 
						
						}?></p>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>

                    </div>
                  </div>
                </div>
<?php 
}
}
}?>  


                


</tbody>
                        </table>

  </div>