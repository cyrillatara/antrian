<?php 
	include "config/koneksi.php";

	$query = mysqli_query($koneksi,"select * from pasien where no_rm='$_GET[p]'");	
	$pasien = mysqli_fetch_array($query);
	$cek = mysqli_query($koneksi,"select * from antrian where id_pasien = '$pasien[id_pasien]' and tgl_masuk = '".date('Y-m-d')."' and status = 'Menunggu'");
	if (mysqli_num_rows($cek) > 0) {
		echo 'sedang';
	}else{
		$antrian = mysqli_num_rows(mysqli_query($koneksi,"select * from antrian where tgl_masuk='".date('Y-m-d')."'")) + 1;
		mysqli_query($koneksi,"insert into antrian values('null','$pasien[id_pasien]','$antrian','".date('Y-m-d')."','Menunggu')");
		echo str_pad($antrian,'3','0',STR_PAD_LEFT);
	}
 ?>