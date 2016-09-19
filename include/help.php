<h3 style='text-align:center'>Selamat Datang <?php echo $user_session; ?></h3>

<div id='help'>
	<h3>BANTUAN</h3>
	<div id='help-main'>
		<ul>
			<li>Untuk Enkrip file silahkan pilih <font color='blue'>Menu <a href="index.php?page=encrypt">Enkripsi</a></font> kemudian pilih <font color='blue'>file</font> yang ingin diupload kemudian masukan <font color='blue'>password</font> dan <font color='blue'>keterangan</font>,klik upload untuk enkrip file.<br/><br/>Jenis dan tipe file yang diperbolehkan untuk Enkripsi berupa Dokumen(<font color='blue'>Docx,doc dan pdf</font>) dan Project Photoshop(<font color='blue'>PSD</font>), FREEHANDS(<font color='blue'>FH10</font>), dan Corel Draw(<font color='blue'>CDR</font>).
			</li>
			<li>Untuk Deskrip file, silahkan pilih menu <a href='index.php?page=decrypt'>Deskripsi</a> kemudian pilih <font color='blue'>file(Enkrip)</font> yang ingin di dekrip kemudian masukan <font color='blue'>password</font> file tersebut, klik upload untuk dekrip file.<br/>
			<br/><i>Extension</i> file yang diperbolehkan untuk Deskrip sebagai berikut: <font color="blue">DOE,DOCE,PDE,JPE,PSE dan CDE</font>
			</li>
			<li>Untuk mengganti password, silahkan klik Menu "<a href='index.php?page=<?php echo"$user_session"; ?>'>username</a>" anda pada menu, kemudian akan muncul Form Ganti Password, klik Ubah untuk mengganti password.</li>
		</ul>
	</div>
</div>