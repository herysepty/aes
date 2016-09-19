<div class='form_encrypt center'>
	<h3>Enkripsi</h3>
	<form class='form_input' name="form_input" method="post" enctype="multipart/form-data" action="">
	<?php 
		require_once "execute_encrypt.php";     
	?>
		<table>
			</tr>
			<tr>
				<td width='100px'><label>Pilih File </label></td>
				<td class="file"><input name="files" type="file"/><label><font size='2pt'>Ukuran maksimal 10 Mb</font></label></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input type="password" name="txtPass" value="<?php echo $pass_enkrip; ?>" class="required" style="width:200px" placeholder="Password"/></td>
			</tr>
			<tr>
				<td><label>Keterangan</label></td>
				<td><textarea name='txtKet' cols='26' rows='4' placeholder="Keterangan"></textarea></td>
			</tr>
			<tr>
				<td colspan='2'></td>
			</tr>
			<tr>
				<td></td>
				<td class="submit"><input name="btnupload" type="submit" value="Upload"/></td>
			</tr>
		</table>
	</form>
</div>
<?php
	echo $detil_pesan;
?>