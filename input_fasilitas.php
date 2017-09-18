



<?php

    $id_fasilitas= $_POST['id_fasilitas'];
	$nama_fasilitas= $_POST['nama_fasilitas'];
	$url= $_FILES['url']['name'];

		if (strlen($url)>0) {
		//upload Photo
		if (is_uploaded_file($_FILES['url']['tmp_name'])) {
			move_uploaded_file ($_FILES['url']['tmp_name'],"upload_foto/icon_fasilitas/".$url);
		}
	}

	if (empty($_POST['id_fasilitas'])|| empty($_POST['nama_fasilitas'])) {
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



$cek=mysql_num_rows (mysql_query("SELECT id_fasilitas FROM fasilitas WHERE id_fasilitas='$_POST[id_fasilitas]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('ID sudah dipakai !, silahkan diulang kembali');
	document.location='tambah_fasilitas.php?id_fasilitas';
		</script>
<?php
}
//Masukan data ke Tabble
$input	= "INSERT INTO fasilitas (id_fasilitas,nama_fasilitas,url)
	VALUES ('$id_fasilitas','$nama_fasilitas','$url')" ;
$query_input =mysql_query($input);
	if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Fasilitas Berhasil diinput');
		document.location='fasilitas.php?id_fasilitas';
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















