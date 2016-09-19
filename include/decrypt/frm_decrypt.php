<div class='form_decrypt center'>
	<h3>Deskripsi</h3>
	<form class='form_input' name="form_input" method="post" enctype="multipart/form-data" action="">
		<?php 
			require_once "execute_decrypt.php";     
		?>
		<table>
			<tr>
				<td width='100px'><label>Pilih File </label></td>
				<td class="file"><input name="files" type="file"/></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input type='password' name='txtPass' value="<?php echo $pass_dekrip; ?>" class="required" style="width:200px" placeholder="Password"/></td>
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
?>