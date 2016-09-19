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
		<title>Login | PERCETAKAN GEMILANG</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/control.validate.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id='login'>
				<h1>PERCETAKAN GEMILANG</h1>
				<h3>Login</h3>
					<div class="messages-box">
						<?php
							$alert_sukses = isset($_GET['login']) ? $_GET['login'] : null;
							if($alert_sukses=='sukses'){
								echo "<p class='sucsess_message'>Berhasil Login.</p>";
							}elseif($alert_sukses=='error'){
								echo "<p class='error_message'>Username dan password tidak cocok</p>";
							}else{
								null;
							}
						?>
					</div>
					<form class="form_input" name="frmlogin" method="post" action="include/control/manipulasi_data.php?execute=login">
						<table>
							<tr>
								<td width='160px'><label>Username</label></td>
								<td><input type='text' name='txtusername' class="required" style="width:200px" placeholder="Username"/></td>
							</tr>
							<tr>
								<td><label>Password</label></td>
								<td><input type='password' name='txtpassword' class="required" style="width:200px" placeholder="password"/></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td class="submit"><input name="BtnLogin" type="submit" value="Masuk"/></td>
							</tr>
							<tr>
								<td colspan='2' style="text-align:right"><a href='registrasi.php'><font size='2'>Registrasi</font></a></td>
							</tr>
							<tr>
								<td colspan='2' style="text-align:right"><a href='forgot-password.php'><font size='2'>Lupa Password</font></a></td>
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



