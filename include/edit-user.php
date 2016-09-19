<div class='form_edit_user center'>

	<form class="form_input" name="frm_edit_user" method="post" action="">
		<h3>Ubah Data User</h3>
		<?php
			require "control/fungsi_query.php";
			$username = isset($_GET['username']) ? $_GET['username'] : null;
			$pass_baru = isset($_POST['txtpassword2']) ? $_POST['txtpassword2'] : null;
			$mySql = new mySql;
			$mySql->openKoneksi();
			$mySql->execute("select * from user where username='$username'");
			$ambil_data = $mySql->getArray();
			if(isset($_POST['btnubah'])){
				$query = mysql_query("UPDATE user SET password='$pass_baru' WHERE username='".$username."'");
				echo "<div class='messages-box'>";
				echo "<p class='sucsess_message'>Password Berhasil di ubah</p>";
				echo "</div>";
			}
			if(!empty($_GET['execute'])){
				echo "<div class='messages-box'>";
				echo "<p class='sucsess_message'>User Berhasil di hapus</p>";
				echo "</div>";
			}
		?>
		<table>
			<tr>
				<td width='160px'><label>Nama Lengkap</label></td>
				<td><input type='text' id="txtnmlengkap" name='txtnmlengkap' class="required" value='<?php echo $ambil_data[1];?>' disabled="disabled"/><br/></td>
			</tr>
			<tr>
				<td><label>Username</label></td>
				<td><input type='text' name='txtusername' class="required" value='<?php echo $ambil_data[2];?>' disabled="disabled"/></td>
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
				<td class="submit"><input name="btnubah" type="submit" value="Ubah"/></td>
				<td style='text-align:right'><a href="index.php?execute=delete-user&username=<?php echo $username;?>">Hapus User</a></td>
			</tr>
		</table>
	</form>
</div>