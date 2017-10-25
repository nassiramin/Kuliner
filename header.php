<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/datatable-bootstrap.css" rel="stylesheet">
    
    <script src="js/jquery.min.js"></script>

  </head>
  <body>
    <div class="footer footer2">
    <div class="container">
      
      <div class="row">
       
                <img  src="img/logofixheader.png" width="25%" height="25%" />
              </div>
             
            </div>
            <hr class="hr1 margin-b-10" />
          </div>
        </div>
      </div>
    </div>
   </div>
    <div class="container margin-b70">
    <nav class="navbar navbar-default navbar-utama" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Status</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="home.php"><i class="fa fa-home"></i> Halaman Depan</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-th-list"></i>Olah Data </a> 
                   <ul class="dropdown-menu">
            <li><a href="data.php">Data Kuliner</a></li>
            <li><a href="fasilitas.php">Data Fasilitas</a></li>
            <li><a href="kategori.php">Data Kategori</a></li>
             <li role="presentation" class="divider"></li>
            <li><a href="user.php">Data User</a></li>
          </ul>
       </li>

       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-plus"></i>Tambah Data </a> 
                   <ul class="dropdown-menu">
            <li><a href="tambah_resto.php">Tambah Kuliner</a></li>
            <li><a href="tambah_fasilitas.php">Tambah Fasilitas</a></li>
            <li><a href="tambah_kategori.php">Tambah Kategori</a></li>
          </ul>
       </li>
            <li><a href="peta.php"><i class="fa fa-map-marker"></i> Peta Persebaran Kuliner</a></li>
            <li><a href="about.php" data-toggle="modal" data-target="#about"><i class="fa fa-user"></i> About</a></li>
            <li><a href="logout.php" data-toggle="modal" data-target="#about"><i class="fa fa-sign-out"></i>Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

     