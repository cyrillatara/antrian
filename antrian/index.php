<?php 
include "config/koneksi.php";
@session_start();
?>   
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Dental Bakri - Dashboard Page</title>
  <link rel="apple-touch-icon" sizes="60x60" href="assets/app-assets/images/ico/apple-icon-60.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/app-assets/images/ico/apple-icon-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/app-assets/images/ico/apple-icon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/app-assets/images/ico/apple-icon-152.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/app-assets/images/ico/favicon.ico">
  <link rel="shortcut icon" type="image/png" href="assets/app-assets/images/ico/favicon-32.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="assets/app-assets/css/bootstrap.css">
  <!-- font icons-->
  <link rel="stylesheet" type="text/css" href="assets/app-assets/fonts/icomoon.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="assets/app-assets/css/bootstrap-extended.css">
  <link rel="stylesheet" type="text/css" href="assets/app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="assets/app-assets/css/colors.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/assets/css/style.css">
  <!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" style="background-color: white" class="vertical-layout vertical-menu 1-column  fixed-navbar">

  <!-- navbar-fixed-top-->
  <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow" style="height: 70px;">
    <div class="navbar-wrapper">
      <div class="navbar-header" style="height: 70px;">
        <ul class="nav navbar-nav">
          <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
          <li class="nav-item"><a href="index.html" class="navbar-brand nav-link"><img alt="branding logo" src="assets/app-assets/images/logo/robust-logo-light.png" data-expand="assets/app-assets/images/logo/robust-logo-light.png" data-collapse="assets/app-assets/images/logo/robust-logo-small.png" class="brand-logo"></a></li>
          <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
        </ul>
      </div>
      <div class="navbar-container content container-fluid">
        <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
          <ul class="nav navbar-nav">
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container" style="margin-top: 50px;">
    <div class="content-wrapper">
      <div class="content-body"><!-- Description -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3>Selamat Datang Pasien</h3>
              </div>
              <div class="card-body">
                <div class="card-block">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-body">
                          <form action="" method="post">
                            <div class="card-block">
                              <div class="form-group">
                                <label for="">No Rekam Medis</label>
                                <input required="" autocomplete="off" type="text" class="form-control" placeholder="Masukan No rekam Medis" name="no_rm" value="<?php echo date('md').str_pad(mysqli_num_rows(mysqli_query($koneksi,"select * from pasien where tgl_masuk ='".date('Y-m-d')."' ")) + 1, 2,0,STR_PAD_LEFT); ?>" readonly="">
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
                              </div>
                              <div class="form-group">
                                <button id="btndaftar" name="submit" class="btn btn-outline-primary btn-block">Daftarkan Pasien</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">

                        <div class="col-md-6">
                          <div class="card">
                            <div class="card-footer">
                              <h3 class="card-title">Antrian saat ini</h3>
                            </div>
                            <div class="card-body text-sm-center" >
                              <div class="card-block" id="chart-donut" style="height: 10rem;">
                                <h1 id="sekarang" style="font-size: 8em;color: black;text-shadow: 2px 2px 2px gray;margin-bottom: -30px;">000</h1>
                              </div>
                            </div>
                            <button class="btn btn-outline-primary btn-block" onclick="cekantri()">Perbarui Antrian</button>
                          </div>
                        </div>
                        <div class="col-md-6 ">
                          <div class="card">
                            <div class="card-footer">
                              <h3 class="card-title">Selanjut nya</h3>
                            </div>
                            <div class="card-body text-sm-center" >
                              <div id="chart-pie" class="card-block" style="height: 10rem;">
                                <h1 id="selanjutnya" style="font-size: 8em;color: black;text-shadow: 2px 2px 2px gray;margin-bottom: -30px;">000</h1>
                              </div>
                              <button class="btn btn-outline-warning btn-block" data-toggle="modal" data-target="#tambah">Ajukan Antrian</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div id="carousel-example-generic" style="height: 270px;" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators"  style="height: 270px;">
                              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox"  style="height: 270px;">
                              <div class="carousel-item active">
                                <img src="assets/2.jpg" style="height: 270px;width: 100%" alt="First slide">
                              </div>
                              <div class="carousel-item">
                                <img  style="height: 270px;width: 100%"  src="assets/3.jpg" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/1.jpg"  style="height: 270px;width: 100%"  alt="Third slide">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <link rel="stylesheet" href="assets/style.css">
        <!-- <div class="row" style="margin-top: -30px;">
         <div class="col-sm-12">
          <div class="card">
            <div class="card-block">
              <div class="table-responsive m-t-40" style="margin-bottom: 15px;">
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
      </div> -->
    </div>
  </div>
</div>
<?php 
$query = mysqli_query($koneksi,"select * from pasien");
while ($data = mysqli_fetch_array($query)) {
  ?>
  <div class="modal fade text-xs-left" id="detail<?php echo $data['id_pasien'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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
                <input readonly required="" value="<?php echo $data['no_rm'] ?>" autocomplete="off" type="text" class="form-control" placeholder="Masukan No rekam Medis" name="no_rm" readonly="">
              </div>  
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label for="">No Ktp</label>
                    <input readonly required="" autocomplete="off" type="number" class="form-control" onkeyup="cariktp2('<?php echo $data['id_pasien'] ?>')" value="<?php echo $data['no_ktp'] ?>" id="ktp<?php echo $data['id_pasien'] ?>" required="" placeholder="Masukan No Ktp" name="no_ktp">
                    <small class="btn-danger hide" id="msg<?php echo $data['id_pasien'] ?>">No ktp telah terdaftar</small>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input readonly required="" value="<?php echo $data['nama_lengkap'] ?>" autocomplete="off" type="text" class="form-control" required="" placeholder="Masukan Nama Lengkap" name="nama_lengkap">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jk" id="" class="form-control" required="" disabled="">
                  <option value="">--Jenis Kelamin--</option>
                  <option value="Laki-laki" <?php if ($data['jk']=="Laki-laki"): ?>selected=""<?php endif ?>>Laki-laki</option>
                  <option value="Perempuan" <?php if ($data['jk']=="Perempuan"): ?>selected=""<?php endif ?>>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">No Handphone</label>
                <input readonly required="" autocomplete="off" type="number" value="<?php echo $data['no_hp'] ?>" class="form-control" placeholder="Masukan No Handphone" name="no_hp">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Tempat</label>
                    <input readonly required="" autocomplete="off" type="text" value="<?php echo $data['tempat'] ?>" class="form-control" placeholder="Masukan Tempat lahir" name="tempat">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input readonly required="" autocomplete="off" type="date" value="<?php echo $data['tgl_lahir'] ?>" class="form-control" placeholder="Masukan tanggal lahir" name="tgl_lahir">
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
<div class="modal fade text-xs-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Ajukan Antrian</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">No Rekam Medis</label>
          <input type="number" id="no_rm" name="no_rm" placeholder="Masukan No Rekam Medis" class="form-control" required="" autocomplete="off" onkeyup="carirm()">
          <small class="btn-danger hide" id="msgantrian">No rekam medis tak terdaftar</small>
          <small class="btn-primary hide" id="msgada">No rekam medis tersedia</small>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
        <button class="btn btn-outline-primary" onclick="antri()" id="btnajukan">Ajukan</button>
      </div>
    </div>
  </div>
</div>
<footer class="footer footer-static footer-light navbar-border" style="position: relative;left: 0">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved.  </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="assets/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="assets/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="assets/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="assets/app-assets/js/core/app.js" type="text/javascript"></script>

<script src="assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="assets/app-assets/js/core/app.js" type="text/javascript"></script>
<script src="assets/data-table/datatable.js" type="text/javascript"></script>
<script src="assets/data-table/datatableButton.js" type="text/javascript"></script>
<script src="assets/data-table/flash.js" type="text/javascript"></script>
<script src="assets/data-table/html5.js" type="text/javascript"></script>
<script src="assets/data-table/jzip.js" type="text/javascript"></script>
<script src="assets/data-table/pdf.js" type="text/javascript"></script>
<script src="assets/data-table/print.js" type="text/javascript"></script>
<script src="assets/data-table/vfs.js" type="text/javascript"></script>
<script src="assets/js/dropify.js" type="text/javascript"></script>
<script src="assets/data-table/select2.js" type="text/javascript"></script>
<script src="assets/sweetalert.js" type="text/javascript"></script>
<?php 
if (@$_SESSION['berhasil']!=null || @$_SESSION['berhasil']!='') {
  ?>
  <script>
    swal('<?php echo substr($_SESSION['berhasil'],0,6) ?>','<?php echo substr($_SESSION['berhasil'],6,100) ?>','success');
  </script>
  <?php
  $_SESSION['berhasil'] = '';
}

if (@$_SESSION['error']!=null || @$_SESSION['error']!='') {
  ?>
  <script>
    swal('Gagal','<?php echo $_SESSION['error'] ?>','error');
  </script>
  <?php
  $_SESSION['error'] = '';
}
if (isset($_POST['submit'])) {
  $umur = strtotime(date('Y-m-d')) - strtotime($_POST['tgl_lahir']);
  $umur =  round($umur / 31536000);
  $cek = mysqli_query($koneksi,"INSERT INTO `pasien` (`id_pasien`, `no_rm`, `no_ktp`, `nama_lengkap`, `jk`, `tempat`, `tgl_lahir`, `umur`, `no_hp`, `tgl_masuk`) VALUES (NULL, '$_POST[no_rm]', '$_POST[no_ktp]', '$_POST[nama_lengkap]', '$_POST[jk]', '$_POST[tempat]', '$_POST[tgl_lahir]', '$umur', '$_POST[no_hp]', '".date('Y-m-d')."');");
  if ($cek) {
    $_SESSION['berhasil'] = $_POST['no_rm']." Pasien dengan nama ".$_POST['nama_lengkap']." berhasil di daftarkan";
    ?>
    <script>
      window.location.href="index.php";
    </script>
    <?php
  }else{
    echo mysqli_error($koneksi);
  }
}
?>
<script>
  window.onload = function(){
    tampil();
    cekantri();
    panggil('5');
  }
  function cariktp(){
    if ($("#ktp").val()!=='') { 
      $.ajax({
        type: "GET",
        url: "cariktp.php?p="+$("#ktp").val(),
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

  function carirm(){
    if ($("#no_rm").val()!=='') { 
      $.ajax({
        type: "GET",
        url: "carino_rm.php?p="+$("#no_rm").val(),
        success: function (data) {
          if (data=='ga') {
            $("#msgantrian").removeClass('hide');
            $("#msgada").addClass('hide');
            $("#btnajukan").prop('disabled',true);
          }else{
            $("#msgada").removeClass('hide');
            $("#msgantrian").addClass('hide');
            $("#btnajukan").prop('disabled',false);
          }
        }
      });
    }else{
      $("#msgantrian").addClass('hide');
      $("#msgada").addClass('hide');
      $("#btnajukan").prop('disabled',false);
    }
  }

  function antri(){
    if ($("#no_rm").val()!=='') { 
      $.ajax({
        type: "GET",
        url: "antri.php?p="+$("#no_rm").val(),
        success: function (data) {
          if (data!="sedang") {
            swal("Berhasil","Nomor antrian pasien adalah : "+data,"success");
            tampil();
          }else{
            swal("Gagal",'Pasien telah mengantri sebelumnya',"error");
            tampil();
          }
        }
      });
    }
  }
  var x = 0;
  function panggil(duration){
    var timer = duration, minutes, seconds;

    var interVal=  setInterval(function () {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      $("#waktu").html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
      if (--timer < 0) {
        timer = duration;
            // SubmitFunction();
            // $('#waktu').empty();
            cek();
            cekantri();
            tampil();
            clearInterval(interVal)
          }
        },1000);
  }
  function cek(){
    $.ajax({
      type: "GET",
      url: "cek.php",
      success: function (data) {
        if (data!="ga") {
          swal('Info',data,'info');
          panggil(5);
        }else{
          panggil(5);
        }
      }
    });
  }

  function tampil(){
    $.ajax({
      type: "GET",
      url: "tampil.php",
      success: function (data) {
        $("#isi").html(data);
      }
    });
  }

  function cekantri(){
   $.ajax({
    type: "GET",
    url: "cekantri.php",
    success: function (data) {
      var selanjutnya = parseInt(data) + 1;
      $("#sekarang").html(data);
      if(data.length=='1'){
        $("#sekarang").html('00'+data.toString());
      }else if (data.length=='2') {
        $("#sekarang").html('0'+data.toString());
      }else{
        $("#sekarang").html(data.toString());
      }
      if (data==0) {
        $("#selanjutnya").html('001');
      }
      if(data.length=='1'){
        $("#selanjutnya").html('00'+selanjutnya.toString());
      }else if (data.length=='2') {
        $("#selanjutnya").html('0'+selanjutnya.toString());
      }else{
        $("#selanjutnya").html(selanjutnya.toString());
      }
        // alert(data);/
      }
    }); 
 }

 $('#example23').DataTable({
  dom: 'Bfrtip',
  buttons: [
  'copy', 'csv', 'excel', 'pdf', 'print'
  ]
});
 $('#example22').DataTable({
  dom: 'Bfrtip',
  buttons: [
    // 'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
 $('.tableku').DataTable({
    // dom: 'Bfrtip',
    buttons: [
    // 'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
 $('.guru').DataTable({
    // dom: 'Bfrtip',
    buttons: [
    // 'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
 $(".select2").select2();
 $(".dropify").dropify();
 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>
