<?php
	session_start();
	$user_session= isset($_SESSION['username']) ? $_SESSION['username'] : null;
	if(!empty($user_session)){
		header("location: index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Login | PO PERCETAKAN GEMILANG</title>
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
				<h3>Lupa Password</h3>
				<p><font>Untuk Lupa password silahkan hubungi admin untuk mereset password.</font><br/><br/><br/><br/><font size="2pt">Kembali ke halaman <a href='login.php'>Login</a></font></p>
			</div>
			<div id="footer2" class="center">
				<p>Copyright 2015</p>
				<p>By Hery S, Fredi P and Yanuarius B.H</p>
			</div>
		</div>
	</body>
</html>