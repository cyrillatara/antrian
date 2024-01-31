<?php 
	include "config/koneksi.php";

	$query = mysqli_query($koneksi,"select pasien.no_rm,pasien.nama_lengkap,pasien.jk,antrian.* from antrian inner join pasien on pasien.id_pasien = antrian.id_pasien where antrian.tgl_masuk ='".date('Y-m-d')."' order by id_antrian DESC");
	while ($data = mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?php echo $data['no_rm'] ?></td>
			<td><?php echo $data['nama_lengkap'] ?></td>
			<td><?php echo $data['jk'] ?></td>
			<td><?php echo str_pad($data['no_antrian'],'3','0',STR_PAD_LEFT) ?></td>
			<td><?php echo $data['status'] ?></td>
		</tr>
		<?php
	}
 ?>