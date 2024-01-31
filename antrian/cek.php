<?php 
	include "config/koneksi.php";
	$query = mysqli_query($koneksi,"select * from cek");
	if (mysqli_num_rows($query) > 0) {
		$data = mysqli_fetch_array($query);
		$antri = mysqli_fetch_array(mysqli_query($koneksi,"select antrian.*,pasien.nama_lengkap from antrian inner join pasien on pasien.id_pasien = antrian.id_pasien where id_antrian = '$data[id_antrian]'"));
		echo "Nomor antrian selanjutnya adalah :".str_pad($antri['no_antrian'],'3','0',STR_PAD_LEFT)." Atas nama :".$antri['nama_lengkap'];
		mysqli_query($koneksi,"truncate table cek");
	}else{
		echo 'ga';
	}
 ?>