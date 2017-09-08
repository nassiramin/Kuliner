<?php 
$title = "Admin Pilih Kuliner";
include_once "header.php";
include_once "koneksi.php"; ?>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - <?php echo $title ?> - </strong></h2>
            </div>
            <div class="panel-body">

               <form name="formcari" method="post" action="search_exe.php">
<table width="500" border="0" class="table table-striped table-bordered " align="center" cellpadding="0">
<tr bgcolor="#FFA800">
<td height="25" colspan="3">
<strong> Cari Tempat Makan</strong>
</td>
</tr>

<tr> <td>  Nama </td>
<td><input  class="form-control"  type="text"  name="nama1"> </td>
</tr>
<td></td>
<td><input class="btn btn-default btn-sm" type="SUBMIT" name="SUBMIT" id="SUBMIT" value="search" > </td>
</table>
              <a type="button" href="tambah_resto.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp;Tambah Resto</a>
              <table class="table table-bordered table-striped table-admin">
              <thead>
 <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Alamat </th>
                   <th>Kategori</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            
              <?php
  $Open = mysql_connect("localhost","root","");
    if (!$Open){
    die ("Koneksi ke Engine MySQL Gagal !<br>");
    }
  $Koneksi = mysql_select_db("kuliner");
    if (!$Koneksi){
    die ("Koneksi ke Database Gagal !");
    }
  $Cari="SELECT * FROM tbl_tempat ORDER BY nama";
  $Tampil = mysql_query($Cari);
  $nomer=0;
    while ( $hasil = mysql_fetch_array ($Tampil)) {
      $id_tempat = stripslashes ($hasil['id_tempat']);
      $nama = stripslashes ($hasil['nama']);
      $alamat_tempat = stripslashes ($hasil['alamat_tempat']);
       $id_kategori = stripslashes ($hasil['id_kategori']);
      $gambar = stripslashes ($hasil['gambar']);
    {
  $nomer++;
?>
<tbody>
              <tr align="left">
                <td><?=$nomer?></td>
                <td><?=$nama?></td>
                 <td width="30%"><?=$alamat_tempat?></td>
                 <td><?=$id_kategori?></td>
                <td><img src="upload_foto/<?=$gambar?>" width="150" height="150" class="img-thumbnail"/></td>
                <td>
                  <div align="center">
                    <a target="_blank" href="detail.php?id=<?=$id_tempat?>" rel="tooltip" 
                      data-original-title="Lihat File" data-placement="top" class="btn btn-primary btn-sm">
                    <span class="fa fa-map-marker"> </span>&nbsp;Detail </a> | 
                    <a href="edit_resto.php?id=<?=$id_tempat?>"class="btn btn-success btn-sm" >
                      <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a> | 
      <a href="delete_resto.php?id_tempat=<?=$id_tempat?>" class="btn btn-danger btn-sm"
       OnClick="return confirm('Anda Yakin akan menghapus <?=$nama?>  ?')">
       <span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
                   
                  </div>
                </td>
              </tr>
               <?php
                  }
                }
                mysql_close($Open)
                ?>
              
              </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include_once "footer.php" ?>