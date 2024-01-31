<section id="basic-examples">
  <div class="row">
    <div class="col-xs-12 mt-1 mb-3">
      <h4 class="">
        Data Pasien
      </h4>
      <p>
        Admin dapat memanage data pasien yang telah terdaftar disini.
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
          <button class="btn btn-outline-primary pull-right" data-toggle="modal" data-target="#tambah">Lihat Kunjungan</button>
          <h3>Data Kunjugan</h3>
          <table cellspacing="0" class="display nowrap table dgnbtn table-hover table-striped table-bordered " width="100%">
            <thead>
              <tr>
                <th>
                  #
                </th>
                <th>
                  No RM
                </th>
                <th>
                  KTP
                </th>
                <th>
                  Nama 
                </th>
                <th>
                  No Handphone 
                </th>
                <th>
                  Tanggal kunjung 
                </th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($_POST['dari']) && isset($_POST['sampai'])): ?>
                <?php 
                $no = 0;
                $sql = mysqli_query($koneksi,"select pasien.*,antrian.tgl_masuk from antrian inner join pasien on pasien.id_pasien = antrian.id_pasien where antrian.tgl_masuk between '$_POST[dari]' and '$_POST[sampai]'");
                if ($sql) {
                  
                while ($data = mysqli_fetch_array($sql)) {
                  $no++;
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['no_rm'] ?></td>
                    <td><?php echo $data['no_ktp'] ?></td>
                    <td><?php echo $data['nama_lengkap'] ?></td>
                    <td><?php echo $data['no_hp'] ?></td>
                    <td><?php echo $data['tgl_masuk'] ?></td>
                  </tr>

                  <?php
                }
                }else{
                  echo mysqli_error($koneksi);
                }
                 ?>
              <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<div class="modal fade text-xs-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Masukan Tanggal</h4>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Dari </label>
            <input type="date" class="form-control" required="" name="dari">
          </div>

          <div class="form-group">
            <label for="">Sampai </label>
            <input type="date" class="form-control" required="" name="sampai">
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