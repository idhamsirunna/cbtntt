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
	<link rel="stylesheet" type="text/css" href="dist/vendor/animate/animate.css">

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="dist/css/util.css">
	<link rel="stylesheet" type="text/css" href="dist/css/main.css">
	<!--===============================================================================================-->
	<link rel='stylesheet' href='<?php echo $homeurl; ?>/plugins/sweetalert2/dist/sweetalert2.min.css'>
</head>

<body>
	<div class="limiter">
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
			<img class="img-responsive" src="./school/logo.png"/>
		</div>
		<div class="nama-sekolah"><h1>Sekolah Patra</h1></div>
		<div class="nama-cbt"><h1><strong>CBT Application</strong></h1></div>
		</div>
    </div>
	<div class="container-login100">
	<div class="wrap-login100" style="padding-top:30px">
				<form id="formlogin" action="ceklogin.php" class="login100-form validate-form">
					<span class="login100-form-title p-b-20">
						<div style="text-align:left; font-size: 25px" >Selamat Datang</div>
						<div style="text-align:left" ><p>Silahkan login dengan username dan password yang anda miliki</p></div>
					</span>
					<div class="wrap-input100 validate-input" data-validate="Enter Username" required>
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="dist/vendor/jquery/jquery-3.2.1.min.js"></script>

	<!--===============================================================================================-->
	<script src="dist/vendor/bootstrap/js/popper.js"></script>
	<script src="dist/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src='<?php echo $homeurl; ?>/plugins/sweetalert2/dist/sweetalert2.min.js'></script>
	<script src="dist/js/main.js"></script>
	<script>
		$(document).ready(function() {
			$('#formlogin').submit(function(e) {
				var homeurl;
				homeurl = '<?php echo $homeurl; ?>';
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data) {
						if (data == "ok") {
							console.log('sukses');
							window.location = homeurl;
						}
						if (data == "nopass") {
							swal({
								position: 'top-end',
								type: 'warning',
								title: 'Password Salah',
								showConfirmButton: false,
								timer: 1500
							});
						}
						if (data == "td") {
							swal({
								position: 'top-end',
								type: 'warning',
								title: 'Siswa tidak terdaftar',
								showConfirmButton: false,
								timer: 1500
							});
						}
						if (data == "nologin") {
							swal({
								position: 'top-end',
								type: 'warning',
								title: 'Siswa sudah aktif',
								showConfirmButton: false,
								timer: 1500
							});
						}

					}
				})
				return false;
			});

		});

		function showpass() {
			var x = document.getElementById("pass");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>

</body>

</html>