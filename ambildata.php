<?php
include "koneksi.php";


$Q = mysql_query("SELECT tempat.lat,tempat.lng,tempat.id_tempat,tempat.nama_tempat, tempat.alamat, kategori_tempat.nama_kategori_tempat, tempat.url FROM tempat,kategori_tempat WHERE tempat.id_kategori_tempat=kategori_tempat.id_kategori_tempat")or die(mysql_error());
if($Q){
 $posts = array();
      if(mysql_num_rows($Q))
      {
             while($post = mysql_fetch_assoc($Q)){
                     $posts[] = $post;
             }
      }  
      $data = json_encode(array('results'=>$posts));
      echo $data;                     
}

?>