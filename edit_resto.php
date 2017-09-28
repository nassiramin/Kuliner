<?php 
$id = $_GET['id'];
include_once "header.php";
include_once "ambildata_id.php";
$get1=mysql_query("SELECT * FROM kategori_tempat");
$get2=mysql_query("SELECT * FROM harga");
$obj = json_decode($data);
$nama_tempat="";
$id_tempat="";
$alamat="";
$deskripsi="";
$no_telp="";
$open_time="";
$close_time="";
$url="";
$lat="";
$long="";
$id_kategori_tempat="";
$id_harga="";
foreach($obj->results as $item){
  $nama_tempat.=$item->nama_tempat;
  $id_tempat.=$item->id_tempat;
  $alamat.=$item->alamat;
  $deskripsi.=$item->deskripsi;
  $no_telp.=$item->no_telp;
  $open_time.=$item->open_time;
  $close_time.=$item->close_time;
  $url.=$item->url;
  $lat.=$item->lat;
  $long.=$item->lng;
  $id_kategori_tempat.=$item->id_kategori_tempat;
  $id_harga.=$item->id_harga;
}
$title = "Edit : ".$nama_tempat;


?>
<script src="jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
<script src="css/jquery.datetimepicker.full.js"></script>
<script type="text/javascript"> 
$(function()
  {
    $('#open_time').datetimepicker({
     datepicker:false,
     showMeridian: true,
  format:'g:i a '
});
});
$(function()
  {$('#close_time').datetimepicker({
  datepicker:false,
   showMeridian: true,
  format:'g:i a '
});
});


</script>

      <div class="row">


        <div class="col-md-12">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - <?php echo $title ?> - </strong></h2>
            </div>
            <div class="panel-body centered">
            
           
               
                     <h2>Edit Resto</h2>   
                        <h5> </h5>
                       
                    </div>
                    
              </div>              
                 <!-- /. ROW  -->
                  <hr />
                  <div class="row">



 <div class="col-md-5">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Peta- </strong></h4>
            </div>
            <div class="panel-body">
              <div id="map" style="width:100%;height:380px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBt7qo7XKG3z7EyWynjlc35W2nGsLtbILY"></script>

<script type="text/javascript">
  function initialize() {
    
    var mapOptions = {   
        zoom: 13,
        center: new google.maps.LatLng(-7.8003591, 110.3569334), 
        disableDefaultUI: true
    };

    var mapElement = document.getElementById('map');

    var map = new google.maps.Map(mapElement, mapOptions);

    setMarkers(map, officeLocations);

}
initialize();
</script>

            </div>
          </div>
        </div>






                   <div class="col-md-7">
                     <div class="panel panel-info panel-dashboard">
                        <div class="panel-heading centered">
                             Form Edit Resto
                        </div>
                        
                       <div class="panel-body">
                  <form  method="post" enctype="multipart/form-data" name="form"  action="proses_edit.php">
             
   <div class="form-group">
    <label class="col-form-label" for="id_tempat">ID Tempat</label>
   <input type="text" class="form-control" name="id_tempat" id="id_tempat"  placeholder="ID"  readonly="readonly" value="<?php echo $id_tempat; ?>"> 
  </div>

  <div class="form-group">
    <label class="col-form-label" for="nama">Nama </label>
   <input type="text" class="form-control" name="nama_tempat" id="nama" required placeholder="Nama" value="<?php echo $nama_tempat; ?>" > 
  </div>

   <div class="form-group">
    <label class="col-form-label" for="id_kategori">Kategori </label>

      <select  name="id_kategori_tempat" class="form-control"> 
    <option><?php echo $id_kategori_tempat; ?></option>
s
        <?php
            while($row = mysql_fetch_assoc($ge1))
            {
            ?>
            <option  value = "<?php echo($row['id_kategori_tempat'])?>" >
                <?php echo($row['nama_kategori_tempat']) ?>
            </option>
            <?php
            }               
        ?>
    </select>
  </div>

     <div class="form-group">
    <label class="col-form-label" for="harga">Harga </label>
      <select  name="id_harga" class="form-control"> 
    <option><?php echo $id_harga; ?></option>
        <?php
            while($row = mysql_fetch_assoc($get2))
            {
            ?>
            <option  value = "<?php echo($row['id_harga'])?>" >
                <?php echo($row['harga']) ?>
            </option>
            <?php
            }               
        ?>

    </select>

  </div>
 
 
  <div class="form-group">
    <label class="col-form-label"  for="alamat_tempat">Alamat</label>  
   <input type="text" class="form-control" name="alamat" id="alamat_tempat" required placeholder="Alamat" value="<?php echo $alamat; ?>"/>
  </div>

  <div class="form-group">
    <label class="col-form-label"  for="no_tempat">No.Telp</label>
   <input type="text" class="form-control" name="no_telp" id="no_tempat" required placeholder="" value="<?php echo $no_telp; ?>"/>
  </div>

  <div class="form-group">
    <label  for="deskripsi_tempat">Deskripsi Tempat</label>
   <textarea type="text" class="form-control" name="deskripsi" id="deskripsi_tempat" rows="3" ><?php echo $deskripsi; ?>
  </textarea> 
  </div>


 <div class="form-row">
    <div class="form-group col-md-6">
      <label  class="col-form-label">Jam Buka</label>
      <input  class="form-control" name="open_time" id="open_time" placeholder="Open" value="<?php echo $open_time; ?>">
    </div>
    <div class="form-group col-md-6">
      <label  class="col-form-label">Jam Tutup</label>
      <input  class="form-control" name="close_time" id="close_time" placeholder="Close" value="<?php echo $close_time; ?>">
    </div>
  </div>

 <div class="form-row"> 
  <div class="form-group col-md-6">
    <label class="col-form-label" >latitude </label>
   <input type="text" class="form-control" name="lat" id="latitude" required placeholder="latitude" value="<?php echo $lat; ?>" > 
  </div>

  <div class="form-group col-md-6">
    <label class="col-form-label">longitude</label>
   <input type="text" class="form-control" name="lng" id="longitude" required placeholder="longitude" value="<?php echo $long; ?>"> 
  </div>
</div>

<!-- <div class="form-group">
  <div class="form-group col-md-6">
      <label class="col-form-label" for="id_tempat">Fasilitas</label>
        <div class="form-check">
      <label class="form-check-label">
        <input type="hidden" name="wifi" value="no">
        <input class="form-check-input" name="wifi" type="checkbox"  value="yes" <?php echo ($wifi=='yes') ? "checked": ""?>> Wifi
      </label>
    </div>
     <div class="form-check">
      <label class="form-check-label">

        <input type="hidden" name="smoking" value="no">
        <input class="form-check-input" name="smoking" type="checkbox" value="yes" <?php echo ($smoking=='yes') ? "checked": ""?>> Smoking Area
      </label>
    </div>
     <div class="form-check">
      <label class="form-check-label">
        <input type="hidden" name="happy_hours" value="no">
        <input class="form-check-input" name="happy_hours"  type="checkbox" value="yes" <?php echo ($happy_hours=='yes') ? "checked": ""?>> Happy Hours
      </label>
    </div>
     <div class="form-check">
      <label class="form-check-label">
        <input type="hidden" name="live_musik" value="no">
        <input class="form-check-input" name="live_musik" type="checkbox" value="yes" <?php echo ($live_musik=='yes') ? "checked": ""?>> Live Musik
      </label>
    </div>
     <div class="form-check">
      <label class="form-check-label">
        <input type="hidden" name="rooftop" value="no">
        <input class="form-check-input" name="rooftop" type="checkbox" value="yes" <?php echo ($rooftop=='yes') ? "checked": ""?>> Rooftop
      </label>
    </div>
     <div class="form-check">
      <label class="form-check-label">
        <input type="hidden" name="outdoor" value="no">
        <input class="form-check-input" name="outdoor" type="checkbox" value="yes" <?php echo ($outdoor=='yes') ? "checked": ""?>> Outdoor
      </label>
    </div>
        
     </div>
    </div> -->

<div class="form-group">
    <label class="custom-file" >Foto</label>
    <img src="upload_foto/<?=$url?>" width="200" height="200" class="img-thumbnail"/>
    <input class="custom-file-input" type="file" name="url" placeholder="foto"  />
    <input type="hidden" name="url" value="<?php echo $url; ?>" />
    <span class="custom-file-control"></span>

 </div>


  <br>
   <button class="btn btn-primary" type="submit" name="submit" id="submit" value="submit" ><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Edit</button> <button type="reset" class="btn btn-default btn-sm">Reset</button></div>

 </div>
 
  </form>
            </div>
      
          </div></div></div></div></div>
      
    <?php include_once "footer.php"; ?>