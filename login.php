<?php
include "koneksi.php";
if(isset($_POST['login'])){
			$username	= $_POST['username'];
			$password	= $_POST['password'];

	$sql = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'") or die(mysql_error());
	if(mysql_num_rows($sql) == 0){
		echo 'User tidak ditemukan';
	}else{
		$row = mysql_fetch_assoc($sql);
		if($row['id_jenis_pengguna'] == 1){
			$_SESSION['admin']=$username;
			echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="home.php";</script>';
		}else{
			$_SESSION['User']=$username;
			echo '<script language="javascript">alert("Untuk id user hanya bisa mengakses di android !"); document.location="index.php";</script>';
		}
	}
}
?>