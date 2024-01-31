<?php 
include "../config/koneksi.php";
@session_start();
if (@$_SESSION['id_user']==null) {
	?>
	<script>window.location.href="index.php"</script>
	<?php
}
$admin = mysqli_fetch_array(mysqli_query($koneksi,"select * from user where id_user = '$_SESSION[id_user]'"));
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
	<title>Dental Bakri - Admin Page	</title>
	<link rel="apple-touch-icon" sizes="60x60" href="../assets/app-assets/images/ico/apple-icon-60.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/app-assets/images/ico/apple-icon-76.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../assets/app-assets/images/ico/apple-icon-120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../assets/app-assets/images/ico/apple-icon-152.png">
	<link rel="shortcut icon" type="image/x-icon" href="../assets/app-assets/images/ico/favicon.ico">
	<link rel="shortcut icon" type="image/png" href="../assets/app-assets/images/ico/favicon-32.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<!-- BEGIN VENDOR CSS-->
	<link rel="stylesheet" type="text/css" href="../assets/app-assets/css/bootstrap.css">
	<!-- font icons-->
	<link rel="stylesheet" type="text/css" href="../assets/app-assets/fonts/icomoon.css">
	<link rel="stylesheet" type="text/css" href="../assets/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/app-assets/vendors/css/extensions/pace.css">
	<!-- END VENDOR CSS-->
	<!-- BEGIN ROBUST CSS-->
	<link rel="stylesheet" type="text/css" href="../assets/app-assets/css/bootstrap-extended.css">
	<link rel="stylesheet" type="text/css" href="../assets/app-assets/css/app.css">
	<link rel="stylesheet" type="text/css" href="../assets/app-assets/css/colors.css">
	<!-- END ROBUST CSS-->
	<!-- BEGIN Page Level CSS-->
	<link rel="stylesheet" type="text/css" href="../assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
	<link rel="stylesheet" type="text/css" href="../assets/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
	<link rel="stylesheet" type="text/css" href="../assets/app-assets/css/plugins/animate/animate.css">
	<!-- END Page Level CSS-->
	<!-- BEGIN Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../assets/assets/css/style.css">
	<!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

	<!-- navbar-fixed-top-->
	<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow ">
		<div class="navbar-wrapper">
			<div class="navbar-header">
				<ul class="nav navbar-nav">
					<li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
					<li class="nav-item"><a href="index.html" class="navbar-brand nav-link"><img alt="branding logo" src="../assets/app-assets/images/logo/robust-logo-light.png" data-expand="../assets/app-assets/images/logo/robust-logo-light.png" data-collapse="../assets/app-assets/images/logo/robust-logo-small.png" class="brand-logo"></a></li>
					<li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
				</ul>
			</div>
			<div class="navbar-container content container-fluid">
				<div id="navbar-mobile" class="collapse navbar-toggleable-sm">
					<ul class="nav navbar-nav">
						<li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
						<li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
					</ul>
					<ul class="nav navbar-nav float-xs-right">
						<li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="../assets/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name"><?php echo $admin['fullname'] ?></span></a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="dropdown-divider"></div><a href="?p=lg" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>


	<!-- main menu-->
	<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
		<!-- main menu header-->
		<div class="main-menu-header">
			<input type="text" placeholder="Search" style="width: 100%" class="menu-search form-control"/>
		</div>
		<!-- / main menu header-->
		<!-- main menu content-->
		<div class="main-menu-content">
			<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
				<li class=" nav-item"><a href="admin.php"><i class="icon-home3"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Dashboard</span></a>
				</li>
				<li class=" nav-item"><a href="?p=u"><i class="icon-users"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">User</span></a>
				</li>
				<li class=" nav-item"><a href="?p=l"><i class="icon-list"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">List Antrian</span></a>
				</li>
				<li class=" nav-item"><a href="?p=p"><i class="icon-users"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Data Pasien</span></a>
				</li>
				<li class=" nav-item"><a href="index.html"><i class="icon-clip"></i><span data-i18n="nav.dash.main" class="menu-title">Laporan</span><span class="tag tag tag-primary tag-pill float-xs-right mr-2">2</span></a>
					<ul class="menu-content">
						<li><a href="?p=rp" data-i18n="nav.dash.main" class="menu-item">Pasien</a>
						</li>
						<li><a href="?p=kunjungan" data-i18n="nav.dash.main" class="menu-item">Kunjungan</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>  
	</div>

	<!-- / main menu-->

	<div class="app-content content container-fluid">
		<div class="content-wrapper">
			<div class="content-body">
				<?php 
				$p = @$_GET['p'];
				if ($p==null||$p=='') {
					include "dashboard.php";
				}elseif ($p=="l") {
					include "antrian.php";
				}elseif ($p=="p") {
					include "pasien.php";
				}elseif ($p=="rp") {
					include "reportpasien.php";
				}elseif ($p=="lr") {
					include "rekammedis.php";
				}elseif ($p=="kunjungan") {
					include "kunjungan.php";
				}elseif ($p=="lg") {
					session_destroy();
					?>
					<script>
						window.location.href="admin.php";
					</script>
					<?php
				}elseif ($p=="u") {
					include "user.php";
				}
				?>
			</div>
		</div>
	</div>


	<footer class="footer footer-static footer-light navbar-border" style="position: fixed;left: 0;bottom: 0;right: 0;width: 100%">
		<p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">Dental Bakri </a>, All rights reserved. </span></p>
	</footer>

	<!-- BEGIN VENDOR JS-->
	<script src="../assets/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
	<script src="../assets/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
	<script src="../assets/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
	<script src="../assets/app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
	<script src="../assets/app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
	<script src="../assets/app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
	<script src="../assets/app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
	<script src="../assets/app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
	<!-- BEGIN VENDOR JS-->
	<!-- BEGIN PAGE VENDOR JS-->
	<script src="../assets/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
	<!-- END PAGE VENDOR JS-->
	<!-- BEGIN ROBUST JS-->
	<script src="../assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
	<script src="../assets/app-assets/js/core/app.js" type="text/javascript"></script>
	<script src="../assets//data-table/datatable.js" type="text/javascript"></script>
	<script src="../assets//data-table/datatableButton.js" type="text/javascript"></script>
	<script src="../assets//data-table/flash.js" type="text/javascript"></script>
	<script src="../assets//data-table/html5.js" type="text/javascript"></script>
	<script src="../assets//data-table/jzip.js" type="text/javascript"></script>
	<script src="../assets//data-table/pdf.js" type="text/javascript"></script>
	<script src="../assets//data-table/print.js" type="text/javascript"></script>
	<script src="../assets//data-table/vfs.js" type="text/javascript"></script>
	<script src="../assets//js/dropify.js" type="text/javascript"></script>
	<!-- <script src="{{ asset('public/assets/js/sweetalert.js') }}"></script> -->
	<script src="../assets//data-table/select2.js" type="text/javascript"></script>
	<!-- END ROBUST JS-->
	<!-- BEGIN PAGE LEVEL JS-->
	<script src="../assets/app-assets/js/scripts/pages/dashboard-2.js" type="text/javascript"></script>
	<script src="../assets/sweetalert.js" type="text/javascript"></script>
	<?php 
	if (@$_SESSION['berhasil']!=null || @$_SESSION['berhasil']!='') {
		?>
		<script>
			swal('Berhasil','<?php echo $_SESSION['berhasil'] ?>','success');
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

	?>
	<script>
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

		$('.dgnbtn').DataTable({
    dom: 'Bfrtip',
    buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
		$(".select2").select2();
		$(".dropify").dropify();
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<!-- END PAGE LEVEL JS-->
</body>
</html>
