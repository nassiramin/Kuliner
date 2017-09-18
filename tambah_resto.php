<?php 
$title = "Admin Food Patrol";
include_once "header.php";
include_once "koneksi.php"; 
include 'koneksi.php';
$get=mysql_query("SELECT * FROM kategori_tempat");

$query = "SELECT id_tempat FROM tempat ORDER BY id_tempat DESC LIMIT 1";
$result = mysql_query($query, $koneksi);
$row = mysql_fetch_array($result);
$last_id = $row["id_tempat"];

$id_letter = substr($last_id, 0, 1);
$id_num = substr($last_id, 1) + 1;
$id_num = str_pad($id_num, 3, "0", STR_PAD_LEFT);
$new_id = $id_letter . $id_num;





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

<!-- Minified JS library -->









      <div class="row">


        <div class="col-md-12">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - <?php echo $title ?> - </strong></h2>
            </div>
            <div class="panel-body centered">
            
           
               
                     <h2>Tambah Resto</h2>   
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
                             Form Tambah Resto
                        </div>
                        
                       <div class="panel-body">
                  <form  method="post" enctype="multipart/form-data" name="form"  action="input_resto.php">
             
   <div class="form-group">
    <label class="col-form-label" for="id_tempat">ID Tempat</label>
   <input type="text" class="form-control" name="id_tempat" id="id_tempat"  placeholder="ID"  readonly="readonly" value="<?php echo $new_id; ?>"> 
  </div>

  <div class="form-group">
    <label class="col-form-label" for="nama">Nama </label>
   <input type="text" class="form-control" name="nama_tempat" id="nama" required placeholder="Nama" > 
  </div>

   <div class="form-group">
    <label class="col-form-label" for="id_kategori">Kategori </label>
      <select  name="id_kategori_tempat" class="form-control"> 
    <option>Please Select</option>
        <?php
            while($row = mysql_fetch_assoc($get))
            {
            ?>
            <option  value = "<?php echo($row['nama_kategori_tempat'])?>" >
                <?php echo($row['nama_kategori_tempat']) ?>
            </option>
            <?php
            }               
        ?>

    </select>

  </div>
 
  <div class="form-group">
    <label class="col-form-label"  for="alamat_tempat">Alamat</label>  
   <input type="text" class="form-control" name="alamat" id="alamat_tempat" required placeholder="Alamat"/>
  </div>

  <div class="form-group">
    <label class="col-form-label"  for="no_tempat">No.Telp</label>
   <input type="text" class="form-control" name="no_telp" id="no_tempat" required placeholder=""/>
  </div>

  <div class="form-group">
    <label  for="deskripsi_tempat">Deskripsi Tempat</label>
   <textarea type="text" class="form-control" name="deskripsi" id="deskripsi_tempat" rows="3" >
  </textarea> 
  </div>


 <div class="form-row">
    <div class="form-group col-md-6">
      <label  class="col-form-label">Jam Buka</label>
      <input  class="form-control" name="open_time" id="open_time" placeholder="Open">
    </div>
    <div class="form-group col-md-6">
      <label  class="col-form-label">Jam Tutup</label>
      <input  class="form-control" name="close_time" id="close_time" placeholder="Close">
    </div>
  </div>

 <div class="form-row"> 
  <div class="form-group col-md-6">
    <label class="col-form-label" >latitude </label>
   <input type="text" class="form-control" name="lat" id="latitude" required placeholder="latitude" > 
  </div>

  <div class="form-group col-md-6">
    <label class="col-form-label">longitude</label>
   <input type="text" class="form-control" name="lng" id="longitude" required placeholder="longitude" > 
  </div>
</div>


<div class="form-group">
  <div class="form-group col-md-6">
      <label class="col-form-label" for="id_tempat">Fasilitas</label>
        <div class="form-check">
          <label class="form-check-label">
              <table class="table ">
       <?php
          $query= mysql_query("select * from fasilitas");
          while($hasil=mysql_fetch_array($query)){
       ?>
          <tr>
           <td>
                <input type="checkbox" class="form-check-input" name="relasi_tempat_fasilitas[]" 
                value="<?php echo $hasil['id_fasilitas']?>">
          </td>
           <td>
                <?php echo $hasil['nama_fasilitas']?>
          </td>
          </tr>
       <?php
         }
       ?>
              </table>
            </label>
          </div>
  </div>
</div>




<div class="form-group">
    <label class="custom-file" >Foto
    <input class="custom-file-input" type="file" name="url" placeholder="foto" />
    <span class="custom-file-control"></span>

 </div>


  <br>
   <button class="btn btn-primary" type="submit" name="submit" id="submit" value="submit" ><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Save</button> <button type="reset" class="btn btn-default btn-sm">Reset</button></div>

 </div>
 
  </form>
            </div>
      
          </div></div></div></div>
      
    

<?php include_once "footer.php" ?>