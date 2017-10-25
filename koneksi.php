<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$name = "kuliner";

$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($name) or die("Tidak ada database yang dipilih!");
?>