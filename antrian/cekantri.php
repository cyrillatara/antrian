<?php 
include "config/koneksi.php";
$antrian = 0;
$query = mysqli_query($koneksi,"select * from antrian where tgl_masuk = '".date('Y-m-d')."' and status = 'Proses' or tgl_masuk = '".date('Y-m-d')."' and status='Pass' or tgl_masuk = '".date('Y-m-d')."' and status='Done'");
if ($query) {
	if (mysqli_num_rows($query) > 0) {
		if (mysqli_num_rows($query) == 1) {
			$antrian = mysqli_fetch_array($query)['no_antrian'];
		}else{
			while ($data = mysqli_fetch_array($query)) {
				$antrian = $data['no_antrian'];
			}
		}
		echo $antrian;
	}else{
		echo "0";
	}
}else{
	?>
	<script>
		alert('<?php echo mysqli_error($koneksi) ?>');
	</script>
	<?php
}
?>
