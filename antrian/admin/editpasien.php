<?php 
include "../config/koneksi.php";
mysqli_query($koneksi,"update pasien set nama_lengkap = '$_POST[nama_lengkap]',no_ktp = '$_POST[no_ktp]',jk = '$_POST[jk]',no_hp = '$_POST[no_hp]',tempat = '$_POST[tempat]',tgl_lahir = '$_POST[tgl_lahir]' where id_pasien = '$_GET[id]'");
?>
<script>
	alert('Update berhasil');
	window.location.href="admin.php?p=p";
</script>