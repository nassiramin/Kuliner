<?php
error_reporting(0);
include "../koneksi.php";

$id_tempat=$_POST['id_tempat'];
$id_user=$_POST['id_user'];
$currTime = date("Y_m_d_h_i_sa");
$url = $_FILES["url"]["name"];
$namaGambar = $currTime . $url;

function upload (){
        global $namaGambar;

		$target_dir = "/../upload_foto/foto_tempat/";
		$target_file = realpath(dirname(__FILE__)) . $target_dir . $namaGambar;
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
		// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		// && $imageFileType != "gif" ) {
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    // $uploadOk = 0;
		// }
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

	if (upload()){

		$query = mysql_query("INSERT INTO relasi_foto_tempat (id_user,id_tempat,url)
	VALUES ('$id_user','$id_tempat','$url')");
		if ($query) {
			$obj->status=true;
			$obj->pesan="sukses";
		}
		else{
			$obj->status=false;
			$obj->pesan="tambah foto gagal";
		}
	}
	else{
		$obj->status=false;
		$obj->pesan="gagal";
	}

	echo json_encode($obj);
	mysql_close($koneksi);
?>