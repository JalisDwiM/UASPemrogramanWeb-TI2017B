<?php
include "../config.php";
session_start();
if(!isset($_SESSION['username'])){
    ?>
<script>location.href='index.php'</script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Project Wajib 2</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap-flatly.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Multi Session</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>
            <?php
                if($_SESSION['type']=='Guru'){
            ?>
            <li><a href="#">Daftar Siswa</a></li>
            <li><a href="#">Nilai</a></li>
            <li><a href="#">Jadwal Mengajar</a></li>
            <?php
                }
                if($_SESSION['type']=='Siswa'){
            ?>
            <li><a href="#">Perwalian  </a></li>
            <li><a href="#">Kartu UAS  </a></li>
            <li><a href="#">Jadwal Sekolah  </a></li>
            <?php
                }
                if($_SESSION['type']=='Administrator'){
            ?>
            <li><a href="#">Guru</a></li>
            <li><a href="#">Siswa</a></li>
            <?php
                }
            ?>
            <li><a href="#">Settings</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $_SESSION['fullname'] ?></a></li>
            <li><a href="#"><?php echo $_SESSION['type'] ?></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
      
    <div class="container">
        <div class="jumbotron">
            <h2><?php echo $_SESSION['username'] ?></h2>
            <p>Welcome <?php echo $_SESSION['type'] ?></p>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>