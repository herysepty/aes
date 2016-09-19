
<div class='form_user center'>
<?php
	require_once "control/fungsi_query.php";
	$pass = isset($_POST['txtPasswordOld']) ? $_POST['txtPasswordOld'] : null;
	$pass_baru = isset($_POST['txtpassword2']) ? $_POST['txtpassword2'] : null;
	$mySql = new mySql;
	$mySql->openKoneksi();
?>
<form class="form_input" name="form_login" method="post" action="">
		<h3>Ganti Password</h3>
<?php
	if(isset($_POST['btnubah'])){
	$mySql->execute("SELECT username,password FROM user WHERE username='$user_session' && password='$pass'");
	$cek_rows = $mySql->record_count();
		if($cek_rows>0){
			$query = mysql_query("UPDATE user SET password='$pass_baru' WHERE username='$user_session'");
			echo "<p class='sucsess_message'>Password Berhasil di ubah</p>";
		}else{
			echo "<p class='error_message'>Password Lama Salah</p>";
		}
	}
?>
		<table>
			<tr>
				<td width='160px'><label>Password Lama</label></td>
				<td><input type='password' name='txtPasswordOld' value='' class="required" placeholder="Password Lama"/></td>
			</tr>
			<tr>
				<td><label>Password Baru</label></td>
				<td><input type='password' id="txtpassword" name='txtpassword' value='' class="required" placeholder="Password Baru"/></td>
			</tr>
			<tr>
				<td><label>Ulangi Password Baru</label></td>
				<td><input type='password' id="txtpassword2" name='txtpassword2' value='' class="required" placeholder="Ulangi Password Baru"/></td>
			</tr>
			<tr>
				<td colspan='2'></td>
			</tr>
			<tr>
				<td></td>
				<td class="submit"><input name="btnubah" type="submit" value="Ubah"/></td>
			</tr>
		</table>
	</form>
</div>