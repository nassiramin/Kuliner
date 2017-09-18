<?php 
$id = $_GET['id'];
include_once "header.php";
include_once "ambildata_id_fasilitas.php";
$obj = json_decode($data);
$id_fasilitas="";
$nama_fasilitas="";
$url="";

foreach($obj->results as $item){
  $id_fasilitas.=$item->id_fasilitas;
  $nama_fasilitas.=$item->nama_fasilitas;
  $url.=$item->url;
}
$title = "Edit : ".$nama_fasilitas;


?>


      <div class="row">


        <div class="col-md-12">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - <?php echo $title ?> - </strong></h2>
            </div>
            <div class="panel-body centered">
            
           
               
                     <h2>Edit Fasilitas</h2>   
                        <h5> </h5>
                       
                    </div>
                    
              </div>              
                 <!-- /. ROW  -->
                  <hr />
                  <div class="row">



 <div class="col-md-5">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Gallery- </strong></h4>
            </div>
            <div class="panel-body">
             <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="upload_foto/DONKALIBER12.jpg"   alt="Don Kaliber 12" style="width:100%;">
      </div>

      <div class="item">
        <img src="upload_foto/KedaiRotiBakar543Jogja.jpg"  alt="Roti Bakar 543" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="upload_foto/SotoAyamAmbeganCakNdhut.jpg"  alt="Soto Ayam Cak Ndhut"  style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

            </div>
          </div>
        </div>






                   <div class="col-md-7">
                     <div class="panel panel-info panel-dashboard">
                        <div class="panel-heading centered">
                             Form Edit Fasilitas
                        </div>
                        
                       <div class="panel-body">
                  <form  method="post" enctype="multipart/form-data" name="form"  action="proses_edit_fasilitas.php">
             
   <div class="form-group">
    <label class="col-form-label" for="id_tempat">ID Fasilitas</label>
   <input type="text" class="form-control" name="id_fasilitas"   placeholder="ID"  readonly="readonly" value="<?php echo $id_fasilitas; ?>"> 
  </div>

  <div class="form-group">
    <label class="col-form-label" for="nama">Nama Fasilitas </label>
   <input type="text" class="form-control" name="nama_fasilitas"  required placeholder="Nama" value="<?php echo $nama_fasilitas; ?>" > 
  </div>


<div class="form-group">
    <label class="custom-file" >Foto</label>
    <img src="upload_foto/icon_fasilitas/<?=$url?>" width="128" height="128" class="img-thumbnail"/>
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