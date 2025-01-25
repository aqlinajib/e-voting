<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/fav.png" />
  <!-- Author Meta -->
  <meta name="author" content="colorlib" />
  <!-- Meta Description -->
  <meta name="description" content="" />
  <!-- Meta Keyword -->
  <meta name="keywords" content="" />
  <!-- meta character set -->
  <meta charset="UTF-8" />
  <!-- Site Title -->
  <title>Website E-Voting</title>

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet" />
  <!--
      CSS
      =============================================
    -->
  <link rel="stylesheet" href="../css/linearicons.css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" />
  <link rel="stylesheet" href="../css/bootstrap.css" />
  <link rel="stylesheet" href="../css/magnific-popup.css" />
  <link rel="stylesheet" href="../css/owl.carousel.css" />
  <link rel="stylesheet" href="../css/nice-select.css">
  <link rel="stylesheet" href="../css/hexagons.min.css" />
  <link rel="stylesheet" href="../https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" />
  <link rel="stylesheet" href="../css/main.css" />
</head>

<body>
  <!-- ================ Start Header Area ================= -->
  <header class="default-header">
    <nav class="navbar navbar-expand-lg  navbar-light">
       <img src="{{ asset('storage/foto/logo.png') }}" style="max-width: 100px;">
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
            <li><a href="{{ route('logintoken') }}">Input Token</a></li>
            <li><a href="#teknologi">Teknologi</a></li>
            <li><a href="#kontak">Kontak</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>

          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- ================ End Header Area ================= -->

  
  
<section id="input-token" class="input-token-area section-gap">
  <!-- ================ Start Registration Area ================= -->
  <section class="registration-area1">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5" style="margin-left: -50px;">
          <div class="section-title text-left text-white">
            <h2 class="text-white">
              <img src="{{ asset('storage/foto/MUSYDA-2.png') }}" style="max-width: 150px;">
            </h2>
          </div>
        </div>
        <div class="col-lg-2">
          <h3 class="text-white" style="margin-left: -300px;">Musyawarah Daerah
          </h3><h3 class="text-white"  style="margin-left: -300px;"> Ikatan Mahasiswa Muhammadiyah
            </h3><h3 class="text-white" style="margin-left: -300px;"> Jawa Barat</h2>
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="course-form-section">
            <h3 class="text-white">Token</h3>
            <p class="text-white">Gunakan Disini</p>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('logintoken') }}" method="POST" class="course-form-area contact-page-form course-form text-right">
              @csrf
              <div class="form-group col-md-12">
                <input type="token" name="token" class="form-control" placeholder="token" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">
              </div>
              <div class="col-lg-12 text-center">
                <button class="btn text-uppercase">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>