<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website E-Voting</title>

    <style>
         .center-text {
        text-align: center;
    }
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

.popular-course-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px 20px; /* Adjust the vertical and horizontal gap */
}

.single-popular-course {
    flex: 1 1 calc(30% - 20px); /* Adjust the percentage to make it slightly wider */
    box-sizing: border-box;
    height: 200px; /* Set a fixed height to make it shorter */
}

.thumb img {
    max-height: 100px; /* Adjust the image height to fit within the shorter box */
    object-fit: cover; /* Ensure the image covers the area without distortion */
}

@media (max-width: 768px) {
    .single-popular-course {
        flex: 1 1 calc(45% - 20px); /* Adjust for smaller screens */
    }
}

@media (max-width: 480px) {
    .single-popular-course {
        flex: 1 1 100%; /* Full width on very small screens */
    }
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
    
  <!-- ================ End Header Area ================= -->

  <!-- ================ start banner Area ================= -->
  <!-- ================ End banner Area ================= -->

  <!-- ================ Start Feature Area ================= -->
  <!-- ================ End Feature Area ================= -->

    <section class="popular-course-area section-gap">
        <div class="container-fluid">
            <div class="row justify-content-center section-title">
                <div class="col-lg-12">
                    <form action="{{ route('user.submit-vote') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_event" value="{{ $idEvent }}">
                        <input type="hidden" name="kuota_vote" value="{{ $kuotaVote }}">
                         <h3 class="center-text">KETUA SECTION</h3>
                         <br>
                        <p class="remaining-votes" data-original-votes="{{ $kuotaVote }}">Remaining Votes: <span id="remainingVotes">{{ $kuotaVote }}</span></p>
                       
                        <div class="popular-course-grid">
                            @if(count($data) > 0)
                                @foreach ($data as $kandidat)
                                    @if ($kandidat->id_event == $idEvent && $kandidat->posisi == 'ketua')
                                        <div class="single-popular-course">
                                            <div class="thumb">
                                                @if($sembunyikanFoto == 0 && $kandidat->foto)
                                                    <img class="f-img img-fluid mx-auto predefined-square vote-trigger" data-candidate-id="{{ $kandidat->id }}" src="{{ asset('storage/foto/' . $kandidat->foto) }}" alt="" />
                                                @else
                                                    <img class="f-img img-fluid mx-auto predefined-square vote-trigger" data-candidate-id="{{ $kandidat->id }}" src="img/popular-course/default-image.jpg" alt="" />
                                                @endif
                                            </div>
                                            <div class="details">
                                                <div class="d-flex justify-content-between mb-20">
                                                    <p class="name">Ketua Section</p>
                                                </div>
                                                <a class="vote-trigger" data-candidate-id="{{ $kandidat->id }}">
                                                    <h4>{{ $kandidat->nama_kandidat }}</h4>
                                                </a>
                                                <br>
                                                <label class="checkbox-container">
                                                    <input type="checkbox" name="selected_candidates[]" value="{{ $kandidat->id }}" class="vote-checkbox" data-posisi="ketua">
                                                    <span class="checkmark"></span>
                                                    Select
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <p>No data available</p>
                            @endif
                        </div>
                         <h3 class="center-text">MEMBER SECTION</h3>
                         <br>
                        <section id="member-section" class="input-token-area">
                            <div class="popular-course-grid">
                                @if(count($data) > 0)
                                    @foreach ($data as $kandidat)
                                        @if ($kandidat->id_event == $idEvent && $kandidat->posisi == 'member')
                                        <!-- Member candidate content -->
                                        <div class="single-popular-course">
                                            <div class="thumb">
                                                @if($sembunyikanFoto == 0 && $kandidat->foto)
                                                    <img class="f-img img-fluid mx-auto predefined-square vote-trigger" data-candidate-id="{{ $kandidat->id }}" src="{{ asset('storage/foto/' . $kandidat->foto) }}" alt="" />
                                                @else
                                                    <img class="f-img img-fluid mx-auto predefined-square vote-trigger" data-candidate-id="{{ $kandidat->id }}" src="img/popular-course/default-image.jpg" alt="" />
                                                @endif
                                            </div>
                                            <div class="details">
                                                <div class="d-flex justify-content-between mb-20">
                                                    <p class="name">{{ $kandidat->posisi == 'ketua' ? 'Ketua Section' : 'Member Section' }}</p>
                                                </div>
                                                <a class="vote-trigger" data-candidate-id="{{ $kandidat->id }}">
                                                    <h4>{{ $kandidat->nama_kandidat }}</h4>
                                                </a>
                                                <br>
                                                <label class="checkbox-container">
                                                    <input type="checkbox" name="selected_candidates[]" value="{{ $kandidat->id }}" class="vote-checkbox">
                                                    <span class="checkmark"></span>
                                                    Select
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                @else
                                    <p>No Member data available</p>
                                @endif
                            </div>
                        </section>

                        <button type="submit">Submit Vote</button>
                    </form>
                </section>
                </div>
            </div>
        </div>
    </section>

  <!-- ================ End Popular Course Area ================= -->
  <!-- ================ End Feature Area ================= -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var remainingVotesElement = document.getElementById('remainingVotes');
        var originalVotes = parseInt(document.querySelector('input[name="kuota_vote"]').value) || 0;

        // Function to update remaining votes
        function updateRemainingVotes() {
            var checkedCheckboxes = document.querySelectorAll('.vote-checkbox:checked');
            var allCheckboxes = document.querySelectorAll('.vote-checkbox');
            var remainingVotes = originalVotes - checkedCheckboxes.length;
            remainingVotes = Math.max(remainingVotes, 0);
            remainingVotesElement.innerText = remainingVotes;

            // Disable unchecked checkboxes if no remaining votes
            allCheckboxes.forEach(function (checkbox) {
                if (!checkbox.checked) {
                    checkbox.disabled = remainingVotes === 0;
                }
            });
        }

        // Ensure only one "ketua" candidate is selected
        function enforceSingleKetuaSelection() {
            var ketuaCheckboxes = document.querySelectorAll('input[name="selected_candidates[]"][data-posisi="ketua"]');
            ketuaCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    if (this.checked) {
                        ketuaCheckboxes.forEach(function (otherCheckbox) {
                            if (otherCheckbox !== checkbox) {
                                otherCheckbox.checked = false;
                            }
                        });
                    }
                    updateRemainingVotes();
                });
            });
        }

        // Initialize the script
        function init() {
            enforceSingleKetuaSelection();
            updateRemainingVotes();

            // Add event listeners to all checkboxes to update remaining votes
            var allCheckboxes = document.querySelectorAll('.vote-checkbox');
            allCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', updateRemainingVotes);
            });
        }

        init();
    });
</script>




   
  <!-- ================ End footer Area ================= -->

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