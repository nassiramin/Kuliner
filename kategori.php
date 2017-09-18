<?php 
$title = "Admin Pilih Kuliner";
include_once "header.php";
include_once "koneksi.php";  ?>


 <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - <?php echo $title ?> - </strong></h2>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
              <table id="" class="table table-bordered table-admin" width="100%">
              <thead>
                <tr>
                  <th width="10%">No.</th>
                  <th width="10%" >ID Kategori </th>
                  <th >Nama Kategori</th>
                  <th width="20%">Foto</th>
                  <th width="15%">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $data = file_get_contents('http://localhost/kuliner/ambildata_kategori.php');
                $no=1;
                if(json_decode($data,true)){
                  $obj = json_decode($data);
                  foreach($obj->results as $item){
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $item->id_kategori_tempat; ?></td>
                <td><?php echo $item->nama_kategori_tempat; ?></td>
                <td><img src="upload_foto/kategori_tempat/<?php echo $item->url; ?>" width="150" height="150" class="img-thumbnail"/></td>
                <td class="ctr">
                  <div align="center">
                   
                    <a href="edit_kategori.php?id=<?php echo $item->id_kategori_tempat; ?>"class="btn btn-success btn-sm" >
                      <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a> | 
      <a href="delete_kategori.php?id_kategori_tempat=<?php echo $item->id_kategori_tempat; ?>" class="btn btn-danger btn-sm"
       OnClick="return confirm('Anda Yakin akan menghapus kategori <?php echo $item->nama_kategori_tempat; ?> ?')">
       <span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
                   
                  </div>
                </td>
              </tr>
              <?php $no++; }}

              else{
                echo "data tidak ada.";
                } ?>
              
              </tbody>
            </table>
          </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once "footer.php" ?>