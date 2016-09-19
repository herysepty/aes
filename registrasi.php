<?php
	session_start();
	$user_session= isset($_SESSION['username']) ? $_SESSION['username'] : null;
	if(!empty($userSession)){
		header("location: index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Registrasi | PERCETAKAN GEMILANG</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/control.validate.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id='registrasi'>
				<h1>PERCETAKAN GEMILANG</h1>
				<h3>Registrasi</h3>
				<div class='messages-box'>
				<?php
					$alert_sukses = isset($_GET['register']) ? $_GET['register'] : null;
					if($alert_sukses=='sukses'){
						echo "<p class='sucsess_message'>Berhasil Registrasi, silahkan <a href='login.php'>login</a>.</p>";
					}elseif($alert_sukses=='error'){
						echo "<p class='error_message'>Username Sudah ada.</p>";
					}else{
						null;
					}
				?>
				</div>
				<form class="form_registrasi form_input" name="form_registrasi" method="post" action="include/control/manipulasi_data.php?execute=register">
					<table>
						<tr>
							<td width='160px'><label>Nama Lengkap</label></td>
							<td><input type='text' id="txtnmlengkap" name='txtnmlengkap' class="required" style="width:200px" placeholder="Nama Lengkap"/><br/></td>
						</tr>
						<tr>
							<td><label>Username</label></td>
							<td><input type='text' name='txtusername' value='' class="required" style="width:200px" style="width:200px" placeholder="Username"/></td>
						</tr>
						<tr>
							<td><label>Password</label></td>
							<td><input type='password' id="txtpassword" name='txtpassword' value='' class="required" style="width:200px" placeholder="Password"/></td>
						</tr>
						<tr>
							<td><label>Ulangi Password</label></td>
							<td><input type='password' id="txtpassword2" name='txtpassword2' value='' class="required" style="width:200px" placeholder="Ulangi Password"/></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td class="submit"><input name="BtnLogin" type="submit" value="Daftar"/></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td colspan='2' style="text-align:right"><font size='2'>Sudah mempunyai akun silahkan <a href='login.php'>Login</a>.</font></td>
						</tr>
					</table>
				</form>
			</div>
			<div id="footer2" class="center">
				<p>Copyright 2015</p>
				<p>By <a href="http://twitter.com/herysepty">Hery S</a>, Fredi P and Yanuarius B.H</p>
			</div>
		</div>
	</body>
</html>



