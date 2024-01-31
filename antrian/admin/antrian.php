<section id="basic-examples">
	<div class="row">
		<div class="col-xs-12 mt-1 mb-3">
			<h4 class="">
				List Antrian
			</h4>
			<span class="pull-right">Total pengunjung hari ini : <b style="font-weight: bolder"><?php echo mysqli_num_rows(mysqli_query($koneksi,"select * from antrian where tgl_masuk = '".date('Y-m-d')."'")) ?></b></span>
			<p>
				Admin dapat memproses data pasien yang telah antri.
			</p>
			<hr>
		</div>
		<div class="col-xs-12">
		</div>
	</div>
	<br>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<div class="row" style="margin-top: -30px;">
		<div class="col-md-8">
			<div class="card">
				<div class="card-footer" style="margin-bottom: -30px;">
					<h3 class="">Daftar antrian</h3>
				</div>
				<div class="container">
					<div class="card-body">
						<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
							<table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered tableku" width="100%">
								<thead>
									<tr>
										<th>
											#
										</th>
										<th>
											NO RM
										</th>
										<th>
											Nama Pasien
										</th>
										<th class="text-sm-center">
											Aksi
										</th>
									</tr>
								</thead>
								<tbody id="isi">
									<?php 
									$no = 0;
									$query = mysqli_query($koneksi,"select antrian.*,pasien.no_rm,pasien.nama_lengkap from antrian inner join pasien on pasien.id_pasien = antrian.id_pasien where antrian.tgl_masuk = '".date('Y-m-d')."' and status != 'Proses' and status != 'Done' and status != 'Pass' order by no_antrian asc");
									while ($data = mysqli_fetch_array($query)) {
										$no++;
										?>
										<tr>
											<td><?php echo $no ?></td>
											<td><?php echo $data['no_rm'] ?></td>
											<td><?php echo $data['nama_lengkap'] ?></td>
											<td class="text-sm-center">
												<?php if ($no==1): ?>
													<a href="proses.php?id=<?php echo $data['id_antrian'] ?>" class="btn btn-outline-success" >Proses Pasien</a>
												<?php endif ?>
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<?php 
			$pasien = mysqli_fetch_array(mysqli_query($koneksi,"select antrian.*,pasien.no_rm,pasien.nama_lengkap from antrian inner join pasien on pasien.id_pasien = antrian.id_pasien where status='Proses'"));
			?>
			<div class="card">
				<div class="card-header">
					<h3>Pasien saat ini</h3>
				</div>
				<div class="card-body">
					<div class="card-block">
						<span>No antri : <b><?php echo $pasien['no_antrian'] ?></b></span><br><br>
						<span>Nama Lengkap : <b><?php echo $pasien['nama_lengkap'] ?></b></span><br><br>
						<span>No Rm : <b><?php echo $pasien['no_rm'] ?></b></span><br><br>
						<?php if ($pasien['no_antrian']!==null): ?>
							<a href="?p=l&act=batal&id=<?php echo $pasien['id_antrian'] ?>" class="btn btn-outline-warning">Pass</a>
							<button class="btn btn-outline-primary" data-toggle="modal" data-target="#selesai">Selesai</button>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal fade text-xs-left" id="selesai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel1">Masukan Riwayat Pasien</h4>
			</div>
			<form action="" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Gigi</label>
								<input type="text" class="form-control" name="gigi" placeholder="Masukan text" required="" autocomplete="off">
							</div>

							<div class="form-group">
								<label for="">Diagnosa</label>
								<input type="text" class="form-control" name="diagnosa" placeholder="Masukan text" required="" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="">Alergi</label>
								<input type="text" class="form-control" name="alergi" placeholder="Masukan text" required="" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="">Kendala Alergi</label>
								<input type="text" class="form-control" name="kendala" placeholder="Masukan text" required="" autocomplete="off">
							</div>
							
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label for="">Anamnesa</label>
								<input type="text" class="form-control" name="anamnesa" placeholder="Masukan text" required="" autocomplete="off">
							</div>

							<div class="form-group">
								<label for="">Tindakan</label>
								<input type="text" class="form-control" name="tindakan" placeholder="Masukan text" required="" autocomplete="off">
							</div>

							<div class="form-group">
								<label for="">Obat</label>
								<input type="text" class="form-control" name="obat" placeholder="Masukan text" required="" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="">Rincian Obat</label>
								<input type="text" class="form-control" name="rincian" placeholder="Masukan text" required="" autocomplete="off">
							</div>

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
					<button class="btn btn-outline-primary" name="submit" id="btnajukan">Submit Riwayat</button>
				</div>
			</form>

		</div>
	</div>
</div>

<?php 
if (@$_GET['act']=='batal') {
	if ($_GET['id']!==null) {
		mysqli_query($koneksi,"update antrian set status = 'Pass' where id_antrian = '$_GET[id]'");
		?>
		<script>
			alert('Berhasil membatalkan proses');
			window.location.href="admin.php?p=l";
		</script>
		<?php
	}
}

if (isset($_POST['submit'])) {
	$pasien = mysqli_fetch_array(mysqli_query($koneksi,"select antrian.*,pasien.no_rm,pasien.nama_lengkap from antrian inner join pasien on pasien.id_pasien = antrian.id_pasien where status='Proses'"));
	mysqli_query($koneksi,"INSERT INTO `riwatat` (`id_riwayat`, `id_pasien`, `tgl_periksa`, `gigi`, `diagnosa`, `alergi`, `anamnesa`, `tindakan`, `obat`, `kendala`, `rincian`) VALUES (NULL, '".$pasien[id_pasien]."','".date('Y-m-d')."', '".$_POST[gigi]."', '".$_POST[diagnosa]."', '".$_POST[alergi]."', '".$_POST[anamnesa]."','".$_POST[tindakan]."', '".$_POST[obat]."', '".$_POST[kendala]."', '".$_POST[rincian]."')");
	mysqli_query($koneksi,"update antrian set status = 'Done' where id_antrian = '".$pasien['id_antrian']."'");
	?>
	<script>	
	alert('Proses telah selesai');window.location.href="admin.php?p=l"
	</script>
	<?php
}
?>
