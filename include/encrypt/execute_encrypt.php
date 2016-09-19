<?php
	ini_set('max_execution_time', 6000);
	ini_set('memory_limit', '256M');
	ini_set('post_max_size', '100M');
	ini_set('upload_max_filesize', '100M');
	require_once '/../control/fungsi_query.php';
	require_once '/../control/class_aes.php';  

	$mySql = new Mysql;
	$mySql->openKoneksi();
	
	$pass_enkrip=isset($_POST['txtPass']) ? $_POST['txtPass'] : null;
	$ket=isset($_POST['txtKet']) ? $_POST['txtKet'] : null;
	$detil_pesan="";
	
	$nm_file=isset($_FILES['files']['name']) ? $_FILES['files']['name'] : null;
	$ukuran_file=isset($_FILES['files']['size']) ? $_FILES['files']['size'] : null;
	$file_error=isset($_FILES['files']['error']) ? $_FILES['files']['error'] : null;
	
	$tipe_file = array('jpg','docx','png','psd','doc','pdf','fh10','cdr');
	$file_ext= strtolower(substr($nm_file,strrpos($nm_file,'.')+1));
	$ambil_nm_file= substr($nm_file,0,strrpos($nm_file,'.'));
	
	if(isset($_POST['btnupload'])){
		if(!empty($nm_file)){
			if(!in_array($file_ext,$tipe_file)){
				echo "<p class='error_message'>Jenis File tidak diperbolehkan</p>";
			}else{
				if($ukuran_file>10240000){
					echo "<p class='error_message'>Ukuran File harus kurang dari 10Mb</p>";
				}else{
					$ext_baru = ".".substr($file_ext,0,-1)."e";
					$nm_file_baru = $ambil_nm_file.$ext_baru;
					if(file_exists("files/".$user_session."/encrypted/".$nm_file_baru)){
						echo "<p class='error_message'>File sudah ada</p>";
					}else{
						if($ukuran_file>0 || $file_error>0){
						$file_move=move_uploaded_file($_FILES['files']['tmp_name'],'files/temp/'.$nm_file);
							if($file_move){
								$data = file_get_contents("files/temp/".$nm_file);
								unlink("files/temp/".$nm_file);
								$aes = new Aes();
								$start = microtime(true);
								$cipher = $aes->encrypt($data,$pass_enkrip);
								$end = microtime(true);
								$lama_eksekusi=($end - $start);
								$buat_file = file_put_contents('files/'.$user_session.'/encrypted/'.$nm_file_baru,$cipher);
								$new_file_size = filesize('files/'.$user_session.'/encrypted/'.$nm_file_baru);
								$mySql->insertRows("tb_encrypt", "'','$nm_file_baru','files/$user_session/encrypted/$nm_file_baru','$pass_enkrip','$ket','$tgl','$user_session'");
								$mySql->insertRows("tb_log", "'','$ambil_nm_file','Enkrip','".substr($ext_baru,1)."','$new_file_size','$tgl','$pass_enkrip','$user_session'");
								$pass_enkrip="";
								if(!empty($buat_file)){
									echo "<p class='sucsess_message'>File Berhasil di Enkrip</p>";
									$detil_pesan="<p class='detile_message center' style='text-align:center'>Waktu Eksekusi: <font color='#333'>".substr($lama_eksekusi,0,-8)." ms</font><br/><br/><font size='2'>File Asli</font><br/><font size='2'>Nama File Asli: <font color='#333'>".$nm_file."</font><br/>Ukuran File: <font color='#333'>".$ukuran_file." bytes</font><br/><br/><font size='2'>File Enkrip</font><br/><font size='2'>Nama File Enkrip: <font color='#333'>".$nm_file_baru."</font><br/>Ukuran File: <font color='#333'>".$new_file_size." bytes</font></p>";
								}else{
									echo"<p class='error_message'>File gagal di buat</p>";
								}
							}else{
								echo "<p class='error_message'>File gagal di dipindahkan</p>";
							}  
						}else{
							echo "<p class='error_message tengah'>Isi File kosong, tidak bisa di Enkrip</p>";
						}
					}
				}
			}
		}else{
			echo "<p class='error_message'>File tidak boleh kosong, silahkan pilih file</p>";
		}
	}
?>