<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/fav.png" />
  <meta name="author" content="colorlib" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta charset="UTF-8" />
  <title>Website E-Voting</title>

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet" />
  <link rel="stylesheet" href="css/linearicons.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/owl.carousel.css" />
  <link rel="stylesheet" href="css/nice-select.css">
  <link rel="stylesheet" href="css/hexagons.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" />
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  <!-- ================ Start Header Area ================= -->
  <header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <!--<img src="img/logo.png" alt="" />-->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="lnr lnr-menu"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="#prosedur-pemilihan">Prosedur Pemilih</a></li>
            <li><a href="#kontak">Kontak</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- ================ End Header Area ================= -->

  <!-- ================ Start Banner Area ================= -->
  <section class="home-banner-area">
    <div class="container">
      <div class="row justify-content-center fullscreen align-items-center">
        <div class="col-lg-5 col-md-8 home-banner-left">
          <h1 class="text-white">
            Selamat Datang<br />
            Website E-Voting 
          </h1>
          <p class="mx-auto text-white mt-20 mb-40">
            Website Evote adalah platform online untuk pemilihan elektronik, yang mempermudah pemungutan suara melalui perangkat komputer atau seluler. 
            Tujuannya adalah untuk memfasilitasi proses pemungutan suara digital.
          </p>
        </div>
        <div class="offset-lg-2 col-lg-5 col-md-12 home-banner-right">
          <img class="img-fluid" src="img/header-img.png" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- ================ End Banner Area ================= -->

  <!-- ================ Start Feature Area ================= -->
  <section class="feature-area">
    <div class="container-fluid">
      <div class="feature-inner row">
        <div class="col-lg-2 col-md-6">
          <div class="feature-item d-flex">
            <i class="ti-book"></i>
            <div class="ml-20">
              <h4>Registrasi dan Verifikasi</h4>
              <p>
                Proses registrasi ini dapat mencakup verifikasi identitas untuk memastikan bahwa setiap pemilih adalah individu yang sah.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="feature-item d-flex">
            <i class="ti-user"></i>
            <div class="ml-20">
              <h4>Pemilihan dan Kandidat</h4>
              <p>
                Website Evote memberikan informasi tentang kandidat, platform, dan program mereka, serta gambar atau video kampanye.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="feature-item d-flex border-right-0">
            <i class="ti-desktop"></i>
            <div class="ml-20">
              <h4>Pemilihan Online</h4>
              <p>
                Mereka dapat memilih kandidat pilihan mereka dengan mengklik tombol atau tindakan serupa.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ End Feature Area ================= -->

  <!-- ================ Start Prosedur Pemilihan Area ================= -->
  <section id="prosedur-pemilihan" class="popular-course-area section-gap">
  <div class="container-fluid">
    <div class="row justify-content-center section-title">
      <div class="col-lg-12">
        <h2>
          Prosedur Pemilihan <br />
        </h2>
        <p>
          Berikut adalah langkah - langkahnya
        </p>
      </div>
    </div>
    <div class="owl-carousel popuar-course-carusel">
      <div class="single-popular-course">
        <div class="thumb">
          <img class="f-img img-fluid mx-auto" src="img/popular-course/p1.png" alt="" />
        </div>
        <div class="details">
          <div class="d-flex justify-content-between mb-20">
            <p class="name">Pendaftaran</p>
            <p class="value">1</p>
          </div>
          <h4>Pemilih mendaftar dan menerima token unik dari admin.</h4>
        </div>
      </div>
      <div class="single-popular-course">
        <div class="thumb">
          <img class="f-img img-fluid mx-auto" src="img/popular-course/p2.png" alt="" />
        </div>
        <div class="details">
          <div class="d-flex justify-content-between mb-20">
            <p class="name">Masukkan Token</p>
            <p class="value">2</p>
          </div>
          <h4>Pemilih memasukkan token ke dalam sistem</h4>
        </div>
      </div>
      <div class="single-popular-course">
        <div class="thumb">
          <img class="f-img img-fluid mx-auto" src="img/popular-course/p3.png" alt="" />
        </div>
        <div class="details">
          <div class="d-flex justify-content-between mb-20">
            <p class="name">Event</p>
            <p class="value">3</p>
          </div>
          <h4>Event Akan tersedia sesuai token yang diberikan</h4>
        </div>
      </div>
      <div class="single-popular-course">
        <div class="thumb">
          <img class="f-img img-fluid mx-auto" src="img/popular-course/p4.png" alt="" />
        </div>
        <div class="details">
          <div class="d-flex justify-content-between mb-20">
            <p class="name">Pilih</p>
            <p class="value">4</p>
          </div>
          <h4>Pemilih memilih kandidat pilihan mereka dan konfirmasi.</h4>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- ================ End Prosedur Pemilihan Area ================= -->

  <!-- ================ Start Footer Area ================= -->
  <!-- ================ End Footer Area ================= -->

  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/hexagons.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
