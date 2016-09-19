<div class="table-data table_encrypt">
	<h3>File Enkripsi</h3>
	<div class="messages-box">
		<?php
			require_once "/../control/fungsi_query.php";
			$mySql = new mySql;
			$mySql->openKoneksi();
			$mySql->execute("select * from tb_encrypt");
			
			$eksekusi_berhasil= isset($_GET['execute']) ? $_GET['execute'] : null;
			if($eksekusi_berhasil=='sukses'){
				echo "<p class='sucsess_message'>Data Berhasil di Hapus.</p>";
			}
		?>
	</div>
	<table>
		<tr>
			<th>No</th>
			<th width='500px'>Nama File</th>
			<th width='300px'>Keterangan</th>
			<th width='100px'>Tanggal</th>
			<th>Unduh</th>
			<th>Hapus</th>
			<?php
			$i= 0;
			$mySql->execute("select * from tb_encrypt where id_user='$user_session'");
			while($ambil_data=$mySql->getArray()){
				$i++;
				echo"	
					<tr>
						<td width='20px'>".$i."</td>
						<td>".substr($ambil_data[1],0,strrpos($ambil_data[1],'.'))."</td>
						<td>".$ambil_data[4]."</td>
						<td>".$ambil_data[5]."</td>
						<td style='text-align:center'><a href='index.php?execute=download&id=".$ambil_data[0]."' title='Unduh File ".$ambil_data[1]."'><img src='img/download.png' width='25px' height='25px'/></a></td>
						<td style='text-align:center'><a href='index.php?execute=delete&id=".$ambil_data[0]."' title='Hapus File'><img src='img/delete.png' width='25px' height='25px'/></a></td>
					</tr>";
			}
			if($i==0){
				echo "
				<tr>
					<td colspan='6'>File Enkripsi Tidak ada.</td>
				</tr>";
			}
			?>
		</tr>
	</table>
</div>