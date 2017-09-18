



<?php

    $id_kategori_tempat= $_POST['id_kategori_tempat'];
	$nama_kategori_tempat= $_POST['nama_kategori_tempat'];
	$url= $_FILES['url']['name'];

		if (strlen($url)>0) {
		//upload Photo
		if (is_uploaded_file($_FILES['url']['tmp_name'])) {
			move_uploaded_file ($_FILES['url']['tmp_name'],"upload_foto/kategori_tempat/".$url);
		}
	}

	if (empty($_POST['id_kategori_tempat'])|| empty($_POST['nama_kategori_tempat'])) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
	</script>


<?php
	}
	//Jika Validasi Terpenuhi
	else {
	//buka koneksi ke engine MySQL
	$Open = mysql_connect("localhost","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
		else{
		print ("Engine Connected<br>");
		}
	//koneksi ke database
	$koneksiDB = mysql_select_db("kuliner");
		if (!$koneksiDB){
		die ("Koneksi ke Database Gagal !");
		}
		else{
		print ("Database Connected<br><br>");
		}



$cek=mysql_num_rows (mysql_query("SELECT id_kategori_tempat FROM kategori_tempat WHERE id_kategori_tempat='$_POST[id_kategori_tempat]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('ID sudah dipakai !, silahkan diulang kembali');
	document.location='tambah_kategori.php?id_kategori_tempat';
		</script>
<?php
}
//Masukan data ke Tabble
$input	= "INSERT INTO kategori_tempat (id_kategori_tempat,nama_kategori_tempat,url)
	VALUES ('$id_kategori_tempat','$nama_kategori_tempat','$url')" ;
$query_input =mysql_query($input);
	if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Kategori Berhasil diinput');
		document.location='kategori.php?id_kategori_tempat';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Fasilitas Gagal ditambah" ;
	
	}
//Tutup koneksi engine MySQL
	mysql_close($Open);
	}

?>















