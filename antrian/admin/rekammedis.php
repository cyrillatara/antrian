<section id="basic-examples">
  <div class="row">
    <div class="col-xs-12 mt-1 mb-3">
      <h4 class="">
        Report Rekam Medis Pasien
      </h4>
      <p>
        Lihat Riwayat pasien disini.
      </p>
      <hr>
    </div>
    <div class="col-xs-12">
    </div>
  </div>
  <br>
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
  <div class="row" style="margin-top: -30px;">
   <div class="col-sm-12">
    <div class="card">
      <div class="card-block">
        <div class="table-responsive m-t-40" style="margin-bottom: 15px;">
          <h3>Data Riwayat</h3>
          <table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered " id="example23" width="100%">
            <thead>
              <tr>
                <th>
                  #
                </th>
                <th>
                  No RM
                </th>
                <th>
                  Nama Pasien
                </th>
                <th>
                  Periksa
                </th>
                <th>
                  Gigi 
                </th>

                <th>
                  Diagnosa 
                </th><!-- 
                <th>
                  Alergi
                </th> -->
                <th>
                  Kendala/Alergi
                </th>
                <th>
                  Anamnesa 
                </th>
                <th>
                  Tindakan
                </th><!-- 
                <th>
                  Obat 
                </th> -->
                <th>
                  Rincian Obat 
                </th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no  = 0;
              $query = mysqli_query($koneksi,"select riwatat.*,pasien.nama_lengkap,pasien.no_rm,pasien.no_ktp from riwatat inner join pasien on pasien.id_pasien = riwatat.id_pasien where riwatat.id_pasien='$_GET[id]' order by id_riwayat desc");
              while ($data = mysqli_fetch_array($query)) {
                $no++;
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['no_rm'] ?></td>
                  <td><?php echo $data['nama_lengkap'] ?></td>
                  <td><?php echo $data['tgl_periksa'] ?></td>
                  <td><?php echo $data['gigi'] ?></td>
                  <td><?php echo $data['diagnosa'] ?></td>
                  <!-- <td><?php echo $data['alergi'] ?></td> -->
                  <td><?php echo $data['kendala'] ?></td>
                  <td><?php echo $data['anamnesa'] ?></td>
                  <td><?php echo $data['tindakan'] ?></td>
                  <!-- <td><?php echo $data['obat'] ?></td> -->
                  <td><?php echo $data['rincian'] ?></td>
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
</section>
