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
              <table id="myTable" class="table table-bordered table-striped table-admin" width="100%">
              <thead>
                <tr>
                  <th width="5%">No.</th>
                  <th width="20%">Nama </th>
                  <th width="25%">Alamat</th>
                  <th width="13%">Kategori</th>
                  <th width="15%">Foto</th>
                  <th width="32%">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $data = file_get_contents('http://localhost/kuliner/ambildata.php');
                $no=1;
                if(json_decode($data,true)){
                  $obj = json_decode($data);
                  foreach($obj->results as $item){
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $item->nama_tempat; ?></td>
                <td><?php echo $item->alamat; ?></td>
                <td><?php echo $item->nama_kategori_tempat; ?></td>
                <td><img src="upload_foto/<?php echo $item->url; ?>" width="150" height="150" class="img-thumbnail"/></td>
                <td class="ctr">
                  <div align="center">
                    <a target="_blank" href="detail.php?id=<?php echo $item->id_tempat; ?>" rel="tooltip" 
                      data-original-title="Lihat File" data-placement="top" class="btn btn-primary btn-sm">
                    <span class="fa fa-map-marker"> </span>&nbsp;Detail </a> | 
                    <a href="edit_resto.php?id=<?php echo $item->id_tempat; ?>"class="btn btn-success btn-sm" >
                      <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a> | 
      <a href="delete_resto.php?id_tempat=<?php echo $item->id_tempat; ?>" class="btn btn-danger btn-sm"
       OnClick="return confirm('Anda Yakin akan menghapus <?php echo $item->nama_tempat; ?> ?')">
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