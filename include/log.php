<?php
	if(($user_session)!=='admin'){
		header("location: index.php");
	}
	require_once "control/fungsi_query.php";
	$mySql = new mySql;
	$mySql->openKoneksi();
	$page = 1;
	if (isset($_GET['next-page']) && !empty($_GET['next-page']))
		$page = (int)$_GET['next-page'];
	$dataPerPage = 5;
	if (isset($_GET['result']) && !empty($_GET['result']))
		$dataPerPage = (int)$_GET['result'];
	$table = 'tb_log';
	$dataTable = $mySql->getTableData($table, $page, $dataPerPage);

	//$mySql->execute("select * from tb_log");
	?>
<div class="table-data table_log">
	<h3>Daftar Log</h3>
	<table>
		<tr>
			<th>No</th>
			<th width='300px'>Nama File</th>
			<th>Jenis</th>
			<th>Tipe File</th>
			<th>Size File</th>
			<th>Tanggal</th>
			<th>Password</th>
			<th width='120px'>Username</th>
			<?php
			foreach($dataTable as $i => $data) 
			{
				$no = ($i + 1) + (($page - 1) * $dataPerPage);
				echo '<tr>
						<td>'.$no.'</td>
						<td>'.$data[1].'</td>
						<td>'.$data[2].'</td>
						<td>'.$data[3].'</td>
						<td>'.$data[4].' bytes</td>
						<td>'.$data[5].'</td>
						<td>'.$data[6].'</td>
						<td>'.$data[7].'</td>
					</tr>';
			}
			if(empty($no)){
				echo "
				<tr>
					<td colspan='7'>Tidak ada data log</td>
				</tr>";
			}
			?>
		</tr>
	</table>
	<?php 
	if(!empty($no)){
		echo"<p>Halaman "; $mySql->showPagination($table, $dataPerPage)."/p>"; 
	}
	?>
</div>