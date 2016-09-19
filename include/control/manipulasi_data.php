<?php
	session_start();
	require_once "fungsi_query.php";
	$mySql = new mySql;
	$mySql->openKoneksi();
	$ambil_parameter = isset($_GET['execute']) ? $_GET['execute'] : null;
	$id_parameter = isset($_GET['id']) ? $_GET['id'] : null;
	$ambil_username = isset($_GET['username']) ? $_GET['username'] : null;
	$username = isset($_POST['txtusername']) ? strtolower($_POST['txtusername']) : null;
	$pass = isset($_POST['txtpassword']) ? $_POST['txtpassword'] : null;
	$nm_lengkap = isset($_POST['txtnmlengkap']) ? $_POST['txtnmlengkap'] : null;

	switch($ambil_parameter){
		case "delete":
			$query = $mySql->execute("SELECT * FROM tb_encrypt WHERE id_encrypt='$id_parameter'");
			$ambil_data=$mySql->getArray();
			$mySql->deleteRows('tb_encrypt','id_encrypt="'.$id_parameter.'"');
			unlink($ambil_data[2]);
			header("location: index.php?page=file-encrypt&execute=sukses");
		break;
		case "delete-user":
			rmdir("files/".$ambil_username."/encrypted/");
			rmdir("files/".$ambil_username);
			$mySql->deleteRows('user','username="'.$_GET['username'].'"');
			header("location: index.php?page=edit-user&execute=sukses");
		break;
		case "register":
			$query = $mySql->execute("SELECT username FROM user WHERE username='$username'");
			$cek_rows = $mySql->record_count();
			if($cek_rows>0){
				header("location: ../../registrasi.php?register=error");
			}else{
				$id_user=$mySql->autonumber('user','id_user','4','U');
				$mySql->insertRows("user","'$id_user','$nm_lengkap','$username','$pass'");
				mkdir('../../files/'.$username);
				mkdir('../../files/'.$username.'/encrypted');
				header("location: ../../registrasi.php?register=sukses");
			}
		break;
		case "login":
			$query = $mySql->execute("SELECT username,password FROM user WHERE username='$username' && password='$pass'");
			$cek_rows = $mySql->record_count();
			if($cek_rows > 0){
				echo "Berhasil Login";
				$_SESSION['username'] = $username; 
				header("location: ../../index.php?username=$username"); 
			}else{
				header("location: ../../login.php?login=error"); 
			}
		break;
		case "download":
			$mySql->execute("SELECT * FROM tb_encrypt WHERE id_encrypt='".$_GET['id']."'");
			$ambil_data=$mySql->getArray();
			if(!empty($ambil_data)){
				$file = $ambil_data[2];
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
				header('Content-Length: '.filesize($file));
				ob_clean();
				flush();
				readfile($file); 
				exit;
			}
		break;
		case "logout":
			if(ISSET($_SESSION['username'])) { 
				UNSET($_SESSION['username']); 
			} 
			header("location: ../../index.php"); 
			session_destroy(); 
		break;
		default:
			break;
	}
?>
