<?php

include '../koneksi.php';

class usr{}
  
  $id_user = $_POST["id_user"];
  $nama_user = $_POST["nama_user"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  
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
      $query = mysql_query("INSERT INTO users (id_user,nama_user, username, password) VALUES('$id_user','$nama_user','$username','$password')");
      
      if ($query){
        $response = new usr();
        $response->status = true;
        $response->pesan = "Register berhasil, silahkan login.";
        die(json_encode($response));
        
      } else { 
        $response = new usr();
        $response->status = false;
        $response->pesan = "Username sudah ada";
        die(json_encode($response));
      }
    } 
  }
  
  mysql_close();