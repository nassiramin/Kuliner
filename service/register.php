<?php

include '../koneksi.php';

class usr{}
  
  $nama_user = $_POST["nama_user"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  $id_jenis_pengguna = $_POST["id_jenis_pengguna"];
  
  if ((empty($username))) { 
    $response = new usr();
    $response->status = false;
    $response->pesan = "Kolom username tidak boleh kosong"; 
    die(json_encode($response));
  } else if ((empty($password))) { 
    $response = new usr();
    $response->status = false;
    $response->pesan = "Kolom password tidak boleh kosong"; 
    die(json_encode($response));
  } else if ((empty($confirm_password)) || $password != $confirm_password) { 
    $response = new usr();
    $response->status = false;
    $response->pesan = "Konfirmasi password tidak sama"; 
    die(json_encode($response));
  } else {
    if (!empty($username) && $password == $confirm_password){
      $query = mysql_query("INSERT INTO users (nama_user, username, password,id_jenis_pengguna) VALUES('$nama_user','$username','$password','$id_jenis_pengguna')");
      $tmpObj = new stdClass();

      if ($query){
        $response = new usr();
        $response->status = true;
        $response->pesan = "Register berhasil, silahkan login.";
        $response->data = $tmpObj;

        die(json_encode($response));
        
      } else { 
        $response = new usr();
        $response->status = false;
        $response->pesan = "Username sudah ada";
        $response->data = $tmpObj;
        
        die(json_encode($response));
      }
    } 
  }
  
  mysql_close();