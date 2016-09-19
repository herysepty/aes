<div class="table-data table_list_user">
	<h3>Daftar User</h3>
	<div class="messages-box">
	<?php
		include "/control/fungsi_query.php";
		$mySql = new mySql;
		$mySql->openKoneksi();
		$mySql->execute("select * from user");
		$eksekusi_berhasil = isset($_GET['execute']) ? $_GET['execute'] : null;
		if($eksekusi_berhasil=='sukses'){
			echo "<p class='sucsess_message'>Data Berhasil di Hapus.</p>";
		}
	?>
	</div>
	<table>
		<tr>
			<th>No</th>
			<th width='250px'>Nama User</th>
			<th width='150px'>Username</th>
			<th width='150px'>password</th>
			<th>Edit</th>
			<?php
			$i= 0;
			while($ambil_data=$mySql->getArray()){
				$i++;
				echo"	
					<tr>
						<td width='20px'>".$i."</td>
						<td>".$ambil_data[1]."</td>
						<td>".$ambil_data[2]."</td>
						<td>".$ambil_data[3]."</td>
						<td><a href='index.php?page=edit-user&username=".$ambil_data[2]."' title='Unduh File ".$ambil_data[1]."'><img src='img/edit.png' width='25px' height='25px'/></a></td>
					</tr>";
			}
			if($i==0){
				echo "
				<tr>
					<td colspan='4'>Data Enkripsi Tidak Data</td>
				</tr>";
			}

			?>
		</tr>
	</table>
</div>