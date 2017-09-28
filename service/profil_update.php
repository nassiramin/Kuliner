<?php
include "../koneksi.php";
 	

	$id_user= $_POST['id_user'];
	$nama_user= $_POST['nama_user'];
	$username= $_POST['username'];
	$password= $_POST['password'];
	
	$nama="";
	$username_lama="";
	$password_lama=""; 
	$url="";
	$query_tampil = mysql_query("SELECT * from users WHERE id_user='$id_user'");
	while($row = mysql_fetch_array($query_tampil)){
			$nama = $row['nama_user'];
			$username_lama = $row['username'];
			$password_lama = $row['password'];
		}

	
	$obj= new stdClass();
	
	if (upload()){
		$query = mysql_query("UPDATE users SET nama_user='$nama_user', username='$username', password='$password', url='$url' WHERE id_user='$id_user'");
		if ($query) {
			$obj->status=true;
			$obj->pesan="sukses";
		}
		else{
			$obj->status=false;
			$obj->pesan="update data gagal";
		}
	}
	else{
		$query_gagal = mysql_query("UPDATE users SET nama_user='$nama', username='$username_lama', password='$password_lama' WHERE id_user='$id_user'");
		$obj->status=true;
		$obj->pesan="gagal";
	}
				
		

	echo json_encode($obj);
	
	
	mysql_close($koneksi);
	
	function upload (){

		$target_dir = "/../upload_foto/";
		$target_file = realpath(dirname(__FILE__)) . $target_dir . $_FILES["url"]["name"];
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$url = $_FILES["url"]["name"];
		// Check if image file is a actual image or fake image
	
	    $check = getimagesize($_FILES["url"]["tmp_name"]);
	    if($check !== false) {
	        // echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        // echo "File is not an image.";
	        $uploadOk = 0;
	    }
		
		// Check if file already exists
		if (file_exists($target_file)) {
		    // echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["url"]["size"] > 500000) {
		    // echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		    return false;
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["url"]["tmp_name"], $target_file)) {
		    	return true;
		        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        // echo "Sorry, there was an error uploading your file.";
		        return false;
		    }
		}

	}
?>

