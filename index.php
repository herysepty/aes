<!-- 
	KKP 2015 GENAP | Cryptography
	-Hery Septyadi
	-Fredi P
	-Yanuarius
-->
<?php
	session_start();
	$user_session = isset($_SESSION['username']) ? $_SESSION['username'] : null;
	if(empty($user_session)){
		header("location: login.php");
	}
	$tgl = date("Y/m/d");	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>PERCETAKAN GEMILANG</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/menu.css"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/control.validate.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id='header'>
				<h1>Percetakan Gemilang</h1>
				<div id="menu">
					<ul>
						<li><a href='index.php'>Beranda</a></li>
						<li><a href='index.php?page=encrypt'>Enkripsi</a></li>
						<li><a href='index.php?page=decrypt'>Deskripsi</a></li>
						<li><a href='index.php?page=file-encrypt'>File Enkripsi</a></li>
						<?php
						if($user_session=='admin'){
							echo"<li><a href='index.php?page=list-user'>Daftar User</a></li>";
							echo"<li><a href='index.php?page=log'>Log</a></li>";
						}
						echo"<li><a href='index.php?page=".$user_session."'>".$user_session." </a></li>";
						echo"<li><a href='index.php?page=logout'>Keluar</a></li>";
						?>
					</ul>
				</div>
				
			</div>
			<div id='content-wrapper'>
					<?php 
						$page = isset($_GET['page']) ? $_GET['page'] : null;
						
						switch($page){
						case"encrypt":
							include "include/encrypt/frm_encrypt.php";
						break;
						case"decrypt":
							include "include/decrypt/frm_decrypt.php";
						break;
						case"file-encrypt":
							include "include/encrypt/table_data.php";
						break;
						case"log":
							include "include/log.php";
						break;
						case"edit-user":
							include "include/edit-user.php";
						break;
						case"list-user":
							include "include/list-user.php";
						break;
						case"$user_session":
							include "include/user.php";
						break;
						case"logout":
							header ("location: include/control/manipulasi_data.php?execute=logout");
						break;
						default:
							if(!empty($_GET['execute'])){
								if(($_GET['execute']=='delete') || ($_GET['execute']=='delete-user') || ($_GET['execute']=='download')){
									include "include/control/manipulasi_data.php";
								}else{
									include"include/help.php";
								}
							}else{
								include"include/help.php";
							} 
						break;
						}
						
					?>
			</div>
		</div>
		<div id='footer'>
			<?php
				if($page==$user_session){
					echo "<img src='img/user.png'/>";
				}elseif($page=='file-encrypt'){
					echo "<img src='img/documents.png'/>";
				}elseif($page=='table-decrypt'){
					echo "<img src='img/documents.png'/>";
				}elseif($page=='help'){
					echo "<img src='img/help.png'/>";
				}elseif($page=='encrypt'){
					echo "<img src='img/file-key.png'/>";
				}elseif($page=='decrypt'){
					echo "<img src='img/file-dec.png'/>";
				}elseif($page==('log'||'list-user')){
					echo "<img src='img/list.png'/>";
				}else{
					echo "<img src='img/home.png'/>";
				}
			?>
				<p>Pengamanan File (AES 128)</p>
				<p>Copyright 2015 By<a href='http://twitter.com/herysepty'> Hery S</a>, <a href=''>Fredi P</a> & <a href=''>Yanuarius B.B</a></p>
		</div>
	</body>
</html>