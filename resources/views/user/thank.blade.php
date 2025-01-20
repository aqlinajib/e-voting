<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website E-Voting</title>

    <style>
       header {
    background-color: #931A25;
    color: #fff;
    padding: 10px;
    text-align: center;
}

nav {
    display: flex;
    justify-content: center;
    background-color: #B63E42;
    padding: 5px;
}

nav a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    margin: 0 10px;
}

nav a:hover {
    background-color: #777;
} 
.ml-auto {
    margin-left: auto;
}
    </style>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/fav.png" />
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" />
  <link rel="stylesheet" href="../css/main.css" />
  
</head>

<body>
  <!-- ================ Start Header Area ================= -->
  <header>
        <h1 style="color: white;">Pemilihan</h1>
    </header>
    <nav>
        <a href="{{ route('logout') }}" id="logoutBtn" style="color: white; margin-right: 10px;" class="ml-auto" ><i class="fa fa-sign-out"></i> Logout</a>
    </nav>
    <br>
    <section id="member" >
    <div class="content">
<p>Terimakasih sudah memilih</p>

    @if(session('pdfPath'))
        <a href="{{ route('download.pdf', ['path' => session('pdfPath')]) }}">Download Your Selected Candidates PDF</a>
    @endif
     @if(session('pdfPath'))
        <a id="downloadLink" href="{{ route('download.pdf', ['path' => session('pdfPath')]) }}" style="display: none;">Download Your Selected Candidates PDF</a>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var downloadLink = document.getElementById('downloadLink');
                if (downloadLink) {
                    downloadLink.click();
                }
            });
        </script>
    @endif
<a href="{{ route('logintoken') }}"  class="btn btn-secondary btn-sm">
    <i class="mdi mdi-arrow-left"></i> Back
</a>
    </div>
    </section>
<script src="../js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
  <script src="../js/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="../js/jquery.ajaxchimp.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/parallax.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.sticky.js"></script>
  <script src="../js/hexagons.min.js"></script>
  <script src="../js/jquery.counterup.min.js"></script>
  <script src="../js/waypoints.min.js"></script>
  <script src="../js/jquery.nice-select.min.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>