<section id="basic-examples">
  <div class="row">
    <div class="col-xs-12 mt-1 mb-3">
      <h4 class="">
        Data User
      </h4>
      <p>
        Admin dapat memanage data user disini.
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
          <button class="btn btn-outline-primary pull-right" data-toggle="modal" data-target="#tambah">Tambah User</button>
          <h3>Data User</h3>
          <table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered tableku" width="100%">
            <thead>
              <tr>
                <th>
                  #
                </th>
                <th>
                  Username
                </th>
                <th>
                  Password
                </th>
                <th>
                  Nama User
                </th>
                <th class="text-sm-center">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no  = 0;
              $query = mysqli_query($koneksi,"select * from user order by id_user desc");
              while ($data = mysqli_fetch_array($query)) {
                $no++;
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['username'] ?></td>
                  <td><div class="form-group" style="width: 200px">
                    <div class="position-relative has-icon-right" style="width: 200px">
                      <input type="password" id="baru<?php echo $data['id_user'] ?>" value="<?php echo $data['password'] ?>" style="width: 200px" required="" class="form-control" placeholder="Password baru" name="">
                      <div class="form-control-position">
                        <i class="icon-eye4"  data-toggle="tooltip" data-placement="top" onmousedown="liat2(<?php echo $data['id_user'] ?>)" onmouseup="tutup2(<?php echo $data['id_user'] ?>)"></i>
                      </div>
                    </div>
                  </div></td>
                  <td><?php echo $data['fullname'] ?></td>
                  <td class="text-sm-center">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#update<?php echo $data['id_user'] ?>"><i class="icon-edit" data-toggle="tooltip" title="update Data"></i></button>
                    <a onclick="return confirm('Hapus data user?')" data-toggle="tooltip" title="Hapus data" href="?p=u&act=del&id=<?php echo $data['id_user'] ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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

<?php 
if (@$_GET['act']!==null) {
  if (@$_GET['id']!==null) {
    if ($_GET['id']!==@$_SESSION['id_user']) {

      mysqli_query($koneksi,"delete from user where id_user = '$_GET[id]'");
      ?>
      <script>
        alert(' Data user telah di hapus!');
        window.location.href="admin.php?p=u";
      </script>
      <?php
    }else{
      ?>
      <script>
        alert('Anda tidak bisa menghapus akun anda sendiri!');
        window.location.href="admin.php?p=u";
      </script>
      <?php
    }
  }
}

$user = mysqli_query($koneksi,"select * from user");
$no = 0;
while ($data = mysqli_fetch_array($user)) {
  ?>
  <div class="modal fade text-xs-left" id="update<?php echo $data['id_user'] ?>"  role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel1">Update user</h4>
        </div>
        <form method="post" action="upduser.php?id=<?php echo $data['id_user'] ?>">
          <div class="modal-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="form-group">
                  <label>Nama User</label>
                  <input type="text" class="form-control" value="<?php echo $data['fullname'] ?>" autocomplete="off"  placeholder="Masukan nama User" name="fullname" required="">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" value="<?php echo $data['username'] ?>" autocomplete="off"  placeholder="Masukan Username" name="username" required="">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" required="" autocomplete="off" class="form-control" value="<?php echo $data['password'] ?>" placeholder="Password" name="password">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="btn1" class="btn btn-outline-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
}
?>


<div class="modal fade text-xs-left" id="tambah"  role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Tambah User</h4>
      </div>
      <form method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label>Nama User</label>
                <input type="text" class="form-control" autocomplete="off"  placeholder="Masukan nama User" name="fullname" required="">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" autocomplete="off"  placeholder="Masukan Username" name="username" required="">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" required="" autocomplete="off" class="form-control" placeholder="Password" name="password">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button name="tambah" id="btn" class="btn btn-outline-primary">Tambah </button>
        </div>
      </form>
    </div>
  </div>
</div>  

<?php 
if (isset($_POST['tambah'])) {
  $cari = mysqli_num_rows(mysqli_query($koneksi,"select * from user where username = '$_POST[username]'"));
  if ($cari > 0) {
    ?>
    <script>alert('username telah terdaftar sebelumnya')</script>
    <?php
  }else{
    $cek = mysqli_query($koneksi,"insert into user (fullname,username,password) values('$_POST[fullname]','$_POST[username]','$_POST[password]')");

    if ($cek) {
      ?>
      <script>alert('Data user berhasil di tambahkan!');window.location.href="admin.php?p=u"</script>
      <?php
    }
  }
}
?>

<script>
   function liat2(id) {
          $("#baru"+id.toString()).attr('type','text');
          // alert('haha');
        }
        function tutup2(id) {
          $("#baru"+id.toString()).attr('type','password');
          // alert('haha');
        }
</script>