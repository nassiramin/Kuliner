<?php

include("koneksi.php");

//proses edit resto
	$id_kategori_tempat= $_POST['id_kategori_tempat'];
	$nama_kategori_tempat= $_POST['nama_kategori_tempat'];
	$url= $_FILES['url']['name'];
	//Cek Photo
if (empty($url)){
    $query1 = "UPDATE kategori_tempat SET nama_kategori_tempat='$nama_kategori_tempat',' WHERE id_kategori_tempat='$id_kategori_tempat'";
    $sql= mysql_query($query1);
    echo "<h3><font color=#8BB2D9><center><blink>Data kategori Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='kategori.php?id_kategori_tempat' title='kembali ke form lihat data'><br><br>";	
  }else{

		//upload Photo
		
		move_uploaded_file ($_FILES['url']['tmp_name'],"upload_foto/kategori_tempat/".$url);
		
	
	//update
	$query = "UPDATE kategori_tempat SET nama_kategori_tempat='$nama_kategori_tempat',url='$url' WHERE id_kategori_tempat='$id_kategori_tempat'";
	$sql = mysql_query ($query);
	//setelah berhasil update
		echo "<h3><font color=#8BB2D9><center><blink>Data kategori Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='kategori.php?id_kategori_tempat' title='kembali ke form lihat data'><br><br>";	
}
?>