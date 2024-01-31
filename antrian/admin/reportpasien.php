<section id="basic-examples">
  <div class="row">
    <div class="col-xs-12 mt-1 mb-3">
      <h4 class="">
        Report data pasien
      </h4>
      <p>
        Admin dapat mengeksport data pasien disini.
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
          <h3>Data Pasien</h3>
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
                  KTP
                </th>
                <th>
                  Nama 
                </th>
                <th>
                  No Handphone 
                </th>
                <th>
                  Tempat Tanggal lahir 
                </th>
                <th class="text-sm-center">
                  Tanggal Masuk
                </th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no  = 0;
              $query = mysqli_query($koneksi,"select * from pasien order by id_pasien desc");
              while ($data = mysqli_fetch_array($query)) {
                $no++;
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['no_rm'] ?></td>
                  <td><?php echo $data['no_ktp'] ?></td>
                  <td><?php echo $data['nama_lengkap'] ?></td>
                  <td><?php echo $data['no_hp'] ?></td>
                  <td><?php echo $data['tempat'].' , '.date('d-m-Y',strtotime($data['tgl_lahir'])) ?></td>
                  <td>
                    <?php echo date('d-m-Y',strtotime($data['tgl_masuk'])) ?>
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
</section>
