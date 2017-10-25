<?php

include("koneksi.php");

//proses edit resto
	$id_user= $_POST['id_user'];
	$nama_user= $_POST['nama_user'];
	$username= $_POST['username'];
	$url= $_FILES['url']['name'];
	//Cek Photo
if (empty($url)){
    $query1 = "UPDATE users SET nama_user='$nama_user', username='$username' WHERE id_user='$id_user'";
    $sql= mysql_query($query1);
    echo "<h3><font color=#8BB2D9><center><blink>Data user Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='user.php?id_user' title='kembali ke form lihat data'><br><br>";	
  }else{

		//upload Photo
		
		move_uploaded_file ($_FILES['url']['tmp_name'],"upload_foto/icon_fasilitas/".$url);
		
	
	//update
	$query = "UPDATE users SET nama_user='$nama_user', username='$username',url='$url' WHERE id_user='$id_user'";
	$sql = mysql_query ($query);
	//setelah berhasil update
		echo "<h3><font color=#8BB2D9><center><blink>Data fasilitas Berhasil diedit</blink></center></font></h3>
			<input type='button' value='Back To View' onclick=location.href='user.php?id_user' title='kembali ke form lihat data'><br><br>";	
}
?>