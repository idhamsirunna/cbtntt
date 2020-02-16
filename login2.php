<?php
require("config/config.default.php");
require("config/config.candy.php");
$cekdb = mysqli_query($koneksi, "SELECT 1 FROM pengawas LIMIT 1");
if ($cekdb == false) {
	header("Location: install.php");
}

// if ($_SERVER["QUERY_STRING"] <> KEY) {
// 	echo '<img src="dist/img/octo.gif" style="display: block; margin: auto;">';
// 	exit;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Siswa | Aplikasi CBT Disdik NTT</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="dist/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="dist/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	
	<link href="dist/assets/css/bs3.min.css" rel="stylesheet" type="text/css" />
	
	<link href="dist/assets/css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	
	<link href="dist/style/user-side.css" rel="stylesheet" type="text/css" />
	
	<link href="dist/style/loading.css" rel="stylesheet" type="text/css" />
	
	<link href="dist/style/responsive.css" rel="stylesheet" type="text/css" />
	
	<script src="dist/assets/js/jqueryslim.min.js" language="javascript" type="text/javascript" /></script>
	
	<script src="dist/style/bs3.min.js" language="javascript" type="text/javascript" /></script>
	
	<script src="dist/style/jquery.zoom.min.js" language="javascript" type="text/javascript" /></script>
	
	<script type="text/javascript">

</head>

<body class="">
	<div class="container-fluid">
	   
<div class="row  full-width-row">
    <div class="col-lg-12 nopadding">
    	<div class="header"> 

		<svg  style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
viewBox="0 0 52148.16 7524.47" >
 <defs>
  <style type="text/css">
   <![CDATA[
    .fil0 {fill:#336666}
    .fil2 {fill:#003333;fill-opacity:0.090196}
    .fil1 {fill:#003333;fill-opacity:0.231373}
   ]]>
  </style>
 </defs>
 <g id="Layer_x0020_1">
  <metadata id="CorelCorpID_0Corel-Layer"/>
  <rect class="fil0" width="52148.16" height="7524.46"/>
  <polygon class="fil1" points="-0,4464.56 3216.7,7524.47 14964.62,7524.47 12346.87,0 -0,0 "/>
  <polygon class="fil2" points="4621.34,0 10048.38,5996.89 22051.69,0 "/>
 </g>
</svg>
		<div class="logo-header">
			<img class="img-responsive" src="https://smartps.my.id/media/school/logo.png"/>
		</div>
		<div class="nama-sekolah"><h1>Sekolah Patra</h1></div>
		<div class="nama-cbt"><h1><strong>CBT Application</strong></h1></div>
    	</div>
    </div>
</div>	<div style="padding-bottom:60px">
		<div class="row">
			<div class="offset-md-4 col-md-4 noppading-mobile">
				<div class="panel panel-default panel-login">
					
					<div class="panel-body">
						<div class="panel-heading-text"><h2><strong>Selamat Datang</strong></h2>
							<p>Silakan login dengan username dan password yang anda miliki</p></div>
						<div class="peringatan"></div>
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div> <input style="border-top-style: hidden;outline: none!important;box-shadow: none;margin-right: 0px;" type="text" class="form-control" id="username" placeholder="Username" name="username" autocomplete="off">
									</div>
								</div>

							</div>
							<div class="form-group">
						
								<div class="col-sm-12">
									<div class="input-group">
										<div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div> <input style="border-top-style: hidden;outline: none!important;box-shadow: none;" type="password" class="form-control" id="password" placeholder="Password" name="password" required><span class="input-group-btn"><button style="border-top-style: hidden;outline: none!important;color:#9a9a9a; box-shadow: none;" type="submit" onclick="change_type('password'); return false;" class="btn btn-flat btn-lihat-pass"><i class="glyphicon glyphicon-eye-open"></i></button></span>
									</div>
								</div>

							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<button onclick="loginuser(); return false;" type="submit" style="background: #336666;border-color: #336666;padding: 14px;border-radius: 50px;" class="btn btn-success btn-block m-b-20">LOGIN</button>
								</div>

							</div>
						</form>
					</div>
					<div class="box-ukuran">
					<p class="width-layar"></p>
					<p class="height-layar"></p>
					</div>
					<div class="panel-footer panel-footer-login"><p>Copyright &copy; ExamPatra V 1.1.1.3</strong> All rights</p></div>
				</div>
			</div>
		</div>
	</div>
	<!-- <footer class="footer">
  <div class="container">
    <span class="text-light"><strong>Copyright &copy; ExamPatra V 1.1.1.3</strong> All rights
    reserved.</span>
  </div>
</footer> -->
</div>
	<!--===============================================================================================-->
	<script src="dist/vendor/jquery/jquery-3.2.1.min.js"></script>

	<!--===============================================================================================-->
	<script src="dist/vendor/bootstrap/js/popper.js"></script>
	<script src="dist/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src='<?php echo $homeurl; ?>/plugins/sweetalert2/dist/sweetalert2.min.js'></script>
	<script src="dist/js/main.js"></script>
<script>

	function change_type(elem_id) {
		var input_type = $('#' + elem_id).attr('type');
		var change_type = input_type === 'password' ? 'text' : 'password';
		$('#' + elem_id).attr('type', change_type);
	}

	function loginuser() {
	$("body").addClass("loading")
	 $("#submit, #username, #password").attr("disabled", "disabled");
		var username = $("#username").val();
		var pass = $("#password").val();
		if (username == '' || pass == '') {
			
			$('.peringatan').html('<div class="error">Username dan Password tidak boleh kosong</div>');
			$("#submit, #username, #password").removeAttr("disabled", "false");
			$("body").removeClass("loading")
		} else if (username != '' && pass != '') {
			var values = {
				username: username,
				password: pass
			};

			$.post(_BASE_URL + "loginuser/processuser",
				values,
				function(response) {
					if (response.type == 'ip_error') {
						$("body").removeClass("loading");
						$('.peringatan').html('<div class="error">' + response.message + '</div>');
						$("#submit, #username, #password").removeAttr("disabled", "false");
					} else if (response.type == 'user_error') {
						$("body").removeClass("loading");
						$('.peringatan').html('<div class="error">' + response.message + '</div>');
						$("#submit, #username, #password").removeAttr("disabled", "false");
					} else if (response.type == 'success') {
						window.location = _BASE_URL + "konfirm";
					}
				})
		}
	}
		$(document).ready(function() {
  var height = $(window).height();
  var width = $(window).width();

  
    $('.width-layar').text("Lebar layar: " + width);
    $('.height-layar').text("Tinggi layar: " + height);
  
 });
</script>	<script>
		$(document).ready(function() {
			history.pushState(null, null, location.href);
			window.onpopstate = function() {
				history.go(1);
			};
		})
	</script>
</body>

</html>