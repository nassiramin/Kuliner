
<?php

    $id_tempat= $_POST['id_tempat'];
	$nama= $_POST['nama'];
	$alamat_tempat	= $_POST['alamat_tempat'];
	$deskripsi_tempat	= $_POST['deskripsi_tempat'];
	$no_tempat	= $_POST['no_tempat'];
	$id_kategori = $_POST ['id_kategori'];
	$open_time= $_POST['open_time'];
	$close_time= $_POST['close_time'];
	$lat= $_POST['lat'];
	$lng= $_POST['lng'];
	$wifi=$_POST['wifi'];
	$smoking=$_POST['smoking'];
	$happy_hours=$_POST['happy_hours'];
	$live_musik=$_POST['live_musik'];
	$rooftop=$_POST['rooftop'];
	$outdoor=$_POST['outdoor'];
	$gambar= $_FILES['gambar']['name'];

		if (strlen($gambar)>0) {
		//upload Photo
		if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
			move_uploaded_file ($_FILES['gambar']['tmp_name'],"upload_foto/".$gambar);
		}
	}

	if (empty($_POST['id_tempat'])|| empty($_POST['nama'])) {
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

$cek=mysql_num_rows (mysql_query("SELECT id_tempat FROM tbl_tempat WHERE id_tempat='$_POST[id_tempat]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('ID sudah dipakai !, silahkan diulang kembali');
	document.location='tambah_resto.php?id';
		</script>
<?php
}
//Masukan data ke Table Karyawan
$input	= "INSERT INTO tbl_tempat (id_tempat,nama,alamat_tempat,no_tempat,deskripsi_tempat,id_kategori,gambar,open_time,close_time,lat,lng,
	wifi,smoking,happy_hours,live_musik,rooftop,outdoor)
	VALUES ('$id_tempat','$nama','$alamat_tempat','$no_tempat','$deskripsi_tempat','$id_kategori','$gambar','$open_time','$close_time','$lat','$lng',
		'$wifi','$smoking','$happy_hours','$live_musik','$rooftop','$outdoor')" ;
$query_input =mysql_query($input);
	if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Resto Berhasil diinput');
		document.location='data.php?id';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Resto Gagal ditambah" ;
	
	}
//Tutup koneksi engine MySQL
	mysql_close($Open);
	}

?>















