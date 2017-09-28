<?php 
$get=mysql_query("SELECT * FROM kategori_tempat");

$id = $_GET['id'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$titles="";
$idt="";
$almt="";
$des="";
$no="";
$open_time="";
$close_time="";
$foto="";
$lat="";
$long="";
$id_harga="";

$id_kategori="";
foreach($obj->results as $item){
  $titles.=$item->nama_tempat;
  $idt.=$item->id_tempat;
  $almt.=$item->alamat;
  $des.=$item->deskripsi;
  $no.=$item->no_telp;
  $open_time.=$item->open_time;
  $close_time.=$item->close_time;
  $foto.=$item->url;
  $lat.=$item->lat;
  $long.=$item->lng;
  $id_harga.=$item->id_harga;
  $id_kategori.=$item->id_kategori_tempat;
}


$title = "Detail dan Lokasi : ".$titles;
include_once "header.php"; ?>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"></script>

<script>

function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $lat ?>,<?php echo $long ?>);
  var mapOptions = {
    zoom: 13,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"><?php echo $titles ?></h1>'+
      '<div id="bodyContent">'+
      '<p><?php echo $almt ?></p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Maps Info',
      icon:'img/marker.png'
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
      <div class="row">
      <div class="col-md-5">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Lokasi - </strong></h4>
            </div>
            <div class="panel-body">
              <div id="map-canvas" style="width:100%;height:380px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Detail - </strong></h4>
            </div>
            <div class="panel-body">

               <table class="table">
                  <tr>
                 <th>Item</th>
                 <th>Detail</th>
               </tr>

              <tr class="form-group">
    <td><label class="col-form-label" for="id_tempat">Foto</label></td>
   <td> <img src="upload_foto/<?=$foto?>" width="300" height="300" class="img-thumbnail"/> </td>
      </tr>
               
      <tr class="form-group">
    <td><label class="col-form-label" for="id_tempat">ID Tempat</label></td>
   <td> <?php echo $idt ?></td>
      </tr>
         <tr class="form-group">
    <td><label class="col-form-label" for="id_tempat">Nama</label></td>
   <td> <?php echo $titles ?></td>
      </tr>
       <tr class="form-group">
    <td><label class="col-form-label" for="id_tempat">Kategori</label></td>
   <td>
    <?php echo $id_kategori ?>
   </td>
      </tr>
        <tr class="form-group">
    <td><label class="col-form-label" for="id_tempat">Alamat</label></td>
   <td>
    <?php echo $almt ?>
   </td>
      </tr>
      <tr class="form-group">
    <td><label class="col-form-label" for="id_tempat">Harga</label></td>
   <td>
    <?php echo $id_harga ?>
   </td>
      </tr>
        <tr class="form-group">
    <td><label class="col-form-label" for="id_tempat">No.Telp</label></td>
   <td>
    <?php echo $no ?>
   </td>
      </tr>
         <tr class="form-group">
    <td><label class="col-form-label" for="id_tempat">Deskripsi</label></td>
   <td>
    <?php echo $des ?>
   </td>
      </tr>
      <tr>
        <div class="form-row">
          <tr>
    
      <td><label  class="col-form-label">Jam Buka</label></td>
      <td><?php echo $open_time ?></td>
  
  </tr>
  <tr>
    
      <td><label  class="col-form-label">Jam Tutup</label></td>
      <td><?php echo $close_time ?></td>
    
  </tr>
  </div>
      </tr>
           <tr>
        <div class="form-row">
          <tr>
    
      <td><label  class="col-form-label">Latitude</label></td>
      <td><?php echo $lat ?></td>
  
  </tr>
  <tr>
    
      <td><label  class="col-form-label">Longitude</label></td>
      <td><?php echo $long ?></td>
    
  </tr>
  </div>
      </tr>






             
             </table>
            </div>
            </div>
          </div>

        
        </div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>