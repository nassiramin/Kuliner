
<?php
error_reporting(0);
 
  include '../koneksi.php';
  
  class usr{}
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  if ((empty($username)) || (empty($password))) { 
    $response = new usr();
    $response->status = 0;
    $response->pesan = "Kolom tidak boleh kosong"; 
    die(json_encode($response));
  }
  
  $query = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'");
  
  $row = mysql_fetch_array($query);
  
  if (!empty($row)){
    $tmpObj = new stdClass();
    $tmpObj->id_user = $row['id_user'];
    $tmpObj->username = $row['username'];
    $response = new usr();
    $response->status = true;
    $response->pesan = "Selamat datang ". $row['username'];
    $response->data = $tmpObj;
    // $response->id = $row['id_user'];
    // $response->username = $row['username'];
    echo json_encode($response);
    
  } else { 
    $response = new usr();
    $response->status = false;
    $response->pesan = "Username atau password salah";
    echo json_encode($response);
  }
  
  mysql_close();
?>