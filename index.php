<?php require_once("config.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST["login"])) {
    $sql = "SELECT * FROM pemilik WHERE username='$_POST[username]' AND password='".md5($_POST["password"])."'";
    if ($query = $connection->query($sql)) {
        if ($query->num_rows) {
            while ($data = $query->fetch_array()) {
              $_SESSION["is_logged"] = true;
              $_SESSION["id"] = $data["id_pemilik"];
              $_SESSION["nama"] = $data["nama"];
              $_SESSION["username"] = $data["username"];
            }
            header('location: ?page=kost');
        } else {
            echo alert("Username / Password tidak sesuai!", "index.php");
        }
    } else {
        echo "Query error!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">       
        <title>ekost indralaya</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">E-kost Indralaya</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div id="navbar" class="navbar-collapse collapse">
        <?php if (isset($_SESSION['is_logged'])): ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION["nama"]?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="?page=pemilik">Profil</a></li>
                <li><a href="?page=kost">Daftar Kost</a></li>
              </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        <?php else: ?>
          <form class="navbar-form navbar-right" action="<?=$_SERVER["REQUEST_URI"]?>" method="post">
              <div class="input-group">
                <input type="text" name="username" class="form-control" placeholder="username">
                <span class="input-group-addon" style="border-left: 0; border-right: 0;"></span>
                <input type="password" name="password" class="form-control" placeholder="password">
                <span class="input-group-btn">
                  <button class="btn btn-success" type="submit">Login</button>
                  <a href="?page=pemilik&register" class="btn btn-primary">Register</a>
                </span>
              </div>
              <input type="hidden" name="login" value="true">
          </form>
        <?php endif; ?>

        </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">E-kost Indralaya</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Sistem Informasi Kost-Kostan di Daerah Indralaya</p>
            </div>
        </header>

  <?php include page($_PAGE); ?>
  <div class="container">
  <div id="container" style="min-width: 310px; height: 100px; margin: 0 auto"></div>
  <hr>
    <footer>
      <p>&copy; 2021 E-Kost Indralaya By PolarisTeam.</p>
    </footer>
  </div> <!-- /container -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  <script type="text/javascript">
    var markerImage = 'assets/img/marker.png';
    var myCurrentLocationMarker = 'assets/img/mylocation-marker.png';
  </script>
  <script src="assets/js/maps.js"></script>

        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>