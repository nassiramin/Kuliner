<?php 
$id = $_GET['id'];
include_once "header.php";
include_once "ambildata_id.php";
$get=mysql_query("SELECT * FROM kategori_tempat");
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
$wifi="";
$smoking="";
$happy_hours="";
$live_musik="";
$rooftop="";
$outdoor="";
$id_kategori="";
foreach($obj->results as $item){
  $titles.=$item->nama;
  $idt.=$item->id_tempat;
  $almt.=$item->alamat_tempat;
  $des.=$item->deskripsi_tempat;
  $no.=$item->no_tempat;
  $open_time.=$item->open_time;
  $close_time.=$item->close_time;
  $foto.=$item->gambar;
  $lat.=$item->lat;
  $long.=$item->lng;
  $wifi.=$item->wifi;
  $smoking.=$item->smoking;
  $happy_hours.=$item->happy_hours;
  $live_musik.=$item->live_musik;
  $rooftop.=$item->rooftop;
  $outdoor.=$item->outdoor;
  $id_kategori.=$item->id_kategori;
}
$title = "Edit : ".$titles;


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
   <input type="text" class="form-control" name="id_tempat" id="id_tempat"  placeholder="ID"  readonly="readonly" value="<?php echo $idt; ?>"> 
  </div>

  <div class="form-group">
    <label class="col-form-label" for="nama">Nama </label>
   <input type="text" class="form-control" name="nama" id="nama" required placeholder="Nama" value="<?php echo $titles; ?>" > 
  </div>

   <div class="form-group">
    <label class="col-form-label" for="id_kategori">Kategori </label>

      <select  name="id_kategori" class="form-control"> 
    <option><?php echo $id_kategori; ?></option>

        <?php
            while($row = mysql_fetch_assoc($get))
            {
            ?>
            <option  value = "<?php echo($row['nama_kategori'])?>" >
                <?php echo($row['nama_kategori']) ?>
            </option>
            <?php
            }               
        ?>
    </select>
 
  <div class="form-group">
    <label class="col-form-label"  for="alamat_tempat">Alamat</label>  
   <input type="text" class="form-control" name="alamat_tempat" id="alamat_tempat" required placeholder="Alamat" value="<?php echo $almt; ?>"/>
  </div>

  <div class="form-group">
    <label class="col-form-label"  for="no_tempat">No.Telp</label>
   <input type="text" class="form-control" name="no_tempat" id="no_tempat" required placeholder="" value="<?php echo $no; ?>"/>
  </div>

  <div class="form-group">
    <label  for="deskripsi_tempat">Deskripsi Tempat</label>
   <textarea type="text" class="form-control" name="deskripsi_tempat" id="deskripsi_tempat" rows="3" ><?php echo $des; ?>
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

<div class="form-group">
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
    </div>

<div class="form-group">
    <label class="custom-file" >Foto</label>
    <img src="upload_foto/<?=$foto?>" width="200" height="200" class="img-thumbnail"/>
    <input class="custom-file-input" type="file" name="gambar" placeholder="foto"  />
    <input type="hidden" name="gambar" value="<?php echo $gambar; ?>" />
    <span class="custom-file-control"></span>

 </div>


  <br>
   <button class="btn btn-primary" type="submit" name="submit" id="submit" value="submit" ><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Edit</button> <button type="reset" class="btn btn-default btn-sm">Reset</button></div>

 </div>
 
  </form>
            </div>
      
          </div></div></div></div></div>
      
    <?php include_once "footer.php"; ?>