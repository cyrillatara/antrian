<?php 
	include "config/koneksi.php";

	$cek = mysqli_num_rows(mysqli_query($koneksi,"select * from pasien where no_rm = '$_GET[p]'"));
	if ($cek > 0) {
		echo "ada";
	}else{
		echo "ga";
	}
 ?>