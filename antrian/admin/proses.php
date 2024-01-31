<?php 
	include "../config/koneksi.php";
	$cek = mysqli_query($koneksi,"select * from antrian where status ='Proses' ");
	if (mysqli_num_rows($cek) > 0) {
		?>
	<script>
		alert('Gagal proses.. terdapat pasien lain yang sedang dalam proses');
		window.location.href="admin.php?p=l";
	</script>
		<?php
	}else{	
	mysqli_query($koneksi,"update antrian set status = 'Proses' where id_antrian = '$_GET[id]'");
	mysqli_query($koneksi,"insert into cek (id_antrian) values('$_GET[id]')");
	}
 ?>
 <script>
 	alert('Pasien mulai di proses');
 	window.location.href="admin.php?p=l";
 </script>