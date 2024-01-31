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
          <button class="btn btn-outline-primary pull-right" data-toggle="modal" data-target="#tambah">Tambah pasien</button>
          <h3>Data Pasien</h3>
          <table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered tableku" width="100%">
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
                  Aksi
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
                  <td><?php echo $data['tempat'].' , '.date('d-m-y',strtotime($data['tgl_lahir'])) ?></td>
                  <td class="text-sm-center">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#update<?php echo $data['id_pasien'] ?>"><i class="icon-edit" data-toggle="tooltip" title="update Data"></i></button>
                    <a onclick="return confirm('Hapus data pasien?,semua riwayat antri dan riwayat medis akan terhapus')" data-toggle="tooltip" title="Hapus data" href="?p=p&act=del&id=<?php echo $data['id_pasien'] ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                    <a data-toggle="tooltip" title="Lihat Riwayat" href="?p=lr&id=<?php echo $data['id_pasien'] ?>" class="btn btn-outline-success"><i class="fa fa-search"></i></a>
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
<div class="modal fade text-xs-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Tambah Data Pasien</h4>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="row"><div class="col-md-12">

            <div class="form-group">
              <label for="">No Rekam Medis</label>
              <input required="" autocomplete="off" type="text" class="form-control" placeholder="Masukan No rekam Medis" name="no_rm" value="<?php echo date('Ymd').str_pad(mysqli_num_rows(mysqli_query($koneksi,"select * from pasien where tgl_masuk ='".date('Y-m-d')."' ")) + 1, 3,0,STR_PAD_LEFT); ?>" readonly="">
            </div>  
            <div class="row">
              <div class="col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="">No Ktp</label>
                  <input required="" autocomplete="off" type="number" class="form-control" onkeyup="cariktp()" id="ktp" required="" placeholder="Masukan No Ktp" name="no_ktp">
                  <small class="btn-danger hide" id="msg">No ktp telah terdaftar</small>
                </div>
              </div>
              <div class="col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input required="" autocomplete="off" type="text" class="form-control" required="" placeholder="Masukan Nama Lengkap" name="nama_lengkap">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Jenis Kelamin</label>
              <select name="jk" id="" class="form-control" required="">
                <option value="">--Jenis Kelamin--</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">No Handphone</label>
              <input required="" autocomplete="off" type="number" class="form-control" placeholder="Masukan No Handphone" name="no_hp">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tempat</label>
                  <input required="" autocomplete="off" type="text" class="form-control" placeholder="Masukan Tempat lahir" name="tempat">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tanggal Lahir</label>
                  <input required="" autocomplete="off" type="date" class="form-control" placeholder="Masukan tanggal lahir" name="tgl_lahir">
                </div>
              </div>
            </div></div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <button class="btn btn-outline-primary" name="submit" id="btndaftar">Tambah Pasien</button>
        </div>
      </form>

    </div>
  </div>
</div>
<?php 
$no  = 0;
$query = mysqli_query($koneksi,"select * from pasien");
while ($data = mysqli_fetch_array($query)) {
  $no++;
  ?>
<div class="modal fade text-xs-left" id="update<?php echo $data['id_pasien'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Update Data Pasien</h4>
      </div>
      <form method="post" action="editpasien.php?id=<?php echo $data['id_pasien'] ?>">
        <div class="modal-body">
          <div class="row"><div class="col-md-12">
            <div class="form-group">
              <label for="">No Rekam Medis</label>
              <input required="" value="<?php echo $data['no_rm'] ?>" autocomplete="off" type="text" class="form-control" placeholder="Masukan No rekam Medis" name="no_rm" readonly="">
            </div>  
            <div class="row">
              <div class="col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="">No Ktp</label>
                  <input required="" autocomplete="off" type="number" class="form-control" onkeyup="cariktp2('<?php echo $data['id_pasien'] ?>')" value="<?php echo $data['no_ktp'] ?>" id="ktp<?php echo $data['id_pasien'] ?>" required="" placeholder="Masukan No Ktp" name="no_ktp">
                  <small class="btn-danger hide" id="msg<?php echo $data['id_pasien'] ?>">No ktp telah terdaftar</small>
                </div>
              </div>
              <div class="col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input required="" value="<?php echo $data['nama_lengkap'] ?>" autocomplete="off" type="text" class="form-control" required="" placeholder="Masukan Nama Lengkap" name="nama_lengkap">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Jenis Kelamin</label>
              <select name="jk" id="" class="form-control" required="">
                <option value="">--Jenis Kelamin--</option>
                <option value="Laki-laki" <?php if ($data['jk']=="Laki-laki"): ?>selected=""<?php endif ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($data['jk']=="Perempuan"): ?>selected=""<?php endif ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">No Handphone</label>
              <input required="" autocomplete="off" type="number" value="<?php echo $data['no_hp'] ?>" class="form-control" placeholder="Masukan No Handphone" name="no_hp">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tempat</label>
                  <input required="" autocomplete="off" type="text" value="<?php echo $data['tempat'] ?>" class="form-control" placeholder="Masukan Tempat lahir" name="tempat">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tanggal Lahir</label>
                  <input required="" autocomplete="off" type="date" value="<?php echo $data['tgl_lahir'] ?>" class="form-control" placeholder="Masukan tanggal lahir" name="tgl_lahir">
                </div>
              </div>
            </div></div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <button class="btn btn-outline-primary" type="submit" id="btndaftar<?php echo $data['id_pasien'] ?>">Update Pasien</button>
        </div>
      </form>
    </div>
  </div>
</div>
  <?php
}
?>


<?php 
if (@$_GET['act']!==null) {
  if ($_GET['id']!==null) {
    $cek = mysqli_num_rows(mysqli_query($koneksi,"select * from antrian where id_pasien='$_GET[id]' and status = 'Menunggu'"));
    if ($cek > 0) {
      ?>
      <script>
        alert('Pasien sedang mengantri sekarang');
        window.location.href="admin.php?p=p";
      </script>
      <?php
    }else{
      mysqli_query($koneksi,"delete from pasien where id_pasien = '$_GET[id]'");
      ?>
      <script>
        alert('Pasien berhasil di hapus');
        window.location.href="admin.php?p=p";
      </script>
      <?php
    }
  }
}
if (isset($_POST['submit'])) {
  $umur = strtotime(date('Y-m-d')) - strtotime($_POST['tgl_lahir']);
  $umur =  round($umur / 31536000);
  $cek = mysqli_query($koneksi,"INSERT INTO `pasien` (`id_pasien`, `no_rm`, `no_ktp`, `nama_lengkap`, `jk`, `tempat`, `tgl_lahir`, `umur`, `no_hp`, `tgl_masuk`) VALUES (NULL, '$_POST[no_rm]', '$_POST[no_ktp]', '$_POST[nama_lengkap]', '$_POST[jk]', '$_POST[tempat]', '$_POST[tgl_lahir]', '$umur', '$_POST[no_hp]', '".date('Y-m-d')."');");
  if ($cek) {
    $_SESSION['berhasil'] = "Pasien berhasil di daftarkan";
    ?>
    <script>
      alert('Berhasil menambahkan data pasien')
      window.location.href="admin.php?p=p";
    </script>
    <?php
  }else{
    echo mysqli_error($koneksi);
  }
}
?>

<script>
  function cariktp(){
    if ($("#ktp").val()!=='') { 
      $.ajax({
        type: "GET",
        url: "../cariktp.php?p="+$("#ktp").val(),
        success: function (data) {
          if (data=='ada') {
            $("#msg").removeClass('hide');
            $("#btndaftar").prop('disabled',true);
          }else{
            $("#msg").addClass('hide');
            $("#btndaftar").prop('disabled',false);
          }
        }
      });
    }else{
      $("#msg").addClass('hide');
      $("#btndaftar").prop('disabled',false);
    }
  }

  function cariktp2(id){
    if ($("#ktp"+id.toString()).val()!=='') { 
      $.ajax({
        type: "GET",
        url: "../cariktp.php?p="+$("#ktp"+id.toString()).val(),
        success: function (data) {
          if (data=='ada') {
            $("#msg"+id.toString()).removeClass('hide');
            $("#btndaftar"+id.toString()).prop('disabled',true);
          }else{
            $("#msg"+id.toString()).addClass('hide');
            $("#btndaftar"+id.toString()).prop('disabled',false);
          }
        }
      });
    }else{
      $("#msg"+id.toString()).addClass('hide');
      $("#btndaftar"+id.toString()).prop('disabled',false);
    }
  }
</script>