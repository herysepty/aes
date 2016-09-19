<?php
	ini_set('max_execution_time', 6000);
	ini_set('memory_limit', '256M');
	ini_set('post_max_size', '100M');
	ini_set('upload_max_filesize', '100M');

	require_once "/../control/fungsi_query.php";
	require_once "/../control/class_aes.php";  
	$mySql = new Mysql; 
	$mySql->openKoneksi();
	
	$pass_dekrip=isset($_POST['txtPass']) ? $_POST['txtPass'] : null;
	$nm_file=isset($_FILES['files']['name']) ? $_FILES['files']['name'] : null;
	$ukuran_file=isset($_FILES['files']['size']) ? $_FILES['files']['size'] : null;
	$file_type = array('txe','pne','jpe','pse','doce','doe','pde');
	$file_ext= substr($nm_file,strrpos($nm_file,'.')+1);
	$ambil_nm_file= substr($nm_file,0,strrpos($nm_file,'.'));
	if(isset($_POST['btnupload'])){
		if(!empty($nm_file)){
			if(!in_array($file_ext,$file_type)){
				echo "<p class='error_message'>Jenis File tidak diperbolehkan</p>";
			}else{
				if($ukuran_file>0){
						$query = $mySql->execute("SELECT nm_file,password FROM tb_encrypt WHERE  nm_file='$nm_file' && password='$pass_dekrip' && id_user='$user_session'");
						$cek_rows=$mySql->record_count();
						if($cek_rows>0){
							$file_move=move_uploaded_file($_FILES['files']['tmp_name'],'files/'.$user_session.'/'.$nm_file);
							if($file_move){
								if($file_ext=="jpe"){
									$ext_baru = ".jpg";
								}elseif($file_ext=="pse"){
									$ext_baru = ".psd";
								}elseif($file_ext=="doce"){
									$ext_baru = ".docx";
								}elseif($file_ext=="doe"){
									$ext_baru = ".doc";
								}elseif($file_ext=="fh1e"){
									$ext_baru = ".fh10";
								}elseif($file_ext=="cde"){
									$ext_baru = ".cdr";
								}else{
									$ext_baru = ".pdf";
								}
								$nm_file_baru = $ambil_nm_file.$ext_baru;
								$data = file_get_contents("files/".$user_session."/".$nm_file);
								unlink("files/".$user_session."/".$nm_file);
								$aes = new Aes();
								$start = microtime(true);
								$cipher = $aes->decrypt($data,$pass_dekrip);
								$end = microtime(true);
								$lama_eksekusi=($end - $start);
								$pass_dekrip="";
								$buat_file = file_put_contents('files/'.$user_session.'/'.$nm_file_baru,$cipher);
								$dir_download = 'files/'.$user_session.'/'.$nm_file_baru;
								$mySql->insertRows("tb_log", "'','".$ambil_nm_file."','Deskrip','".substr($ext_baru,1)."','".filesize($dir_download)."','".$tgl."','".$user_session."'");
									if(file_exists($dir_download)){
										//echo $lama_eksekusi;
										/*echo "<script type='text/javascript'>
										window.location='files\admin\$nm_file_baru';
										</script>";*/
										//header('location: index.php?page=decrypt&download=file');
										//header ("location: include/control/manipulasi_data.php?execute=download&id=1");
										header('Content-Description: File Transfer');
										header('Content-Type: application/octet-stream');
										header('Content-Disposition: attachment; filename='.basename($dir_download));
										header('Content-Transfer-Encoding: binary');
										header('Expires: 0');
										header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
										header('Pragma: public');
										header('Content-Length: '.filesize($dir_download));
										ob_clean();
										flush();
										readfile($dir_download);
										unlink($dir_download);
										exit;//
									}
							}else{
								echo "<p class='error_message'>File gagal di eksekusi</p>";
							}
						}else{
							echo "<p class='error_message'>Password tidak valid</p>";
						}
				}else{
					echo "<p class='error_message tengah'>Isi File kosong, tidak bisa di Dekrip</p>";
				}
			}
		}else{
			echo "<p class='error_message'>File tidak boleh kosong, silahkan pilih file</p>";
		}
	}
?>
