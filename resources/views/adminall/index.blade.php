<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Web Pemilihan</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../template/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../template/images/favicon.png" />
</head>
<body>
  <div class="container-scroller d-flex">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
      </div>
    </div>
    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>Navigation</p>
          <span></span>
        </li>
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'superadm')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('superadm') }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
    @endif

        
        
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row" style="height: 130px;">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu" style="margin-right: 22px;"></span>
          </button>
          <div class="navbar-brand-wrapper">
           
          </div>
          @if(Auth::user()->role == 'user')
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" > Welcome back, User</h4>
                @endif
                @if(Auth::user()->role == 'admin')
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" > Welcome back, Admin</h4>
                @endif
                @if(Auth::user()->role == 'superadm')
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" > Welcome back, Super Admin</h4>
                @endif
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                @if(Auth::user()->role == 'user')
                <span class="nav-profile-name">User</span>
                @endif
                @if(Auth::user()->role == 'admin')
                <span class="nav-profile-name">Admin</span>
                @endif
                @if(Auth::user()->role == 'superadm')
                <span class="nav-profile-name">Super Admin</span>
                @endif
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item"  href="{{ route('logout') }}" >
                  <i class="mdi mdi-logout text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
            </li>
            <li class="nav-item dropdown me-1">
              <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
               
                
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                    </h6>
                    <p class="font-weight-light small-text text-muted mb-0">
                      The meeting is cancelled
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                    </h6>
                    <p class="font-weight-light small-text text-muted mb-0">
                      New product launch
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                    </h6>
                    <p class="font-weight-light small-text text-muted mb-0">
                      Upcoming board meeting
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown me-2">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
           
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-information mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      Just now
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      Private message
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-account-box mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      2 days ago
                    </p>
                  </div>
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                      @yield('content')
                      @if(Auth::user()->role == 'superadm'|| Auth::user()->role == 'admin')
                      <div class="table-responsive pt-3">
                      
                        <div class="float-right mb-3 table-actions">
                          <a href="{{ route('adminall.tambah') }}" class="btn btn-custom-color btn-sm">
                            <i class="mdi mdi-plus-circle-outline"></i> Buat Event Baru
                        </a>
                        
                      </div>
                      
                      
                       @if(count($events) > 0)
                       <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>
                               #
                              </th>
                              <th>
                                Nama Event 
                              </th>
                        
                              <th>
                                Deskripsi
                              </th>
                              <th>
                                Active
                              </th>
                              <th>
                                Kuota Vote
                              </th>
                              <th>
                                Sembunyikan Foto
                              </th>
                              <th>
                                Actions
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($events as $event)
                            <tr class="table-info">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $event->nama_event }}</td>                          
                              <td>{{ $event->deskripsi }}</td>
                              <td>{{ $event->active ? 'Ya' : 'Tidak' }}</td>
                              <td>{{ $event->kuota_vote }}</td>
                              <td>{{ $event->sembunyikan_foto ? 'Ya' : 'Tidak' }}</td>
                              <td>
                                
                                <a href="{{ route('adminall.kandidat', ['id_event' => $event->id_event]) }}" class="btn btn-primary btn-xs">
                                  <i class="mdi mdi-eye"></i> View
                              </a>
                              
                              <a href="{{ route('adminall.edit', ['id_event' => $event->id_event]) }}" class="btn btn-warning btn-xs">
                                  <i class="mdi mdi-table-edit"></i> Edit
                              </a>
                              
                              <button class="btn btn-danger btn-xs" onclick="deleteEvent({{ $event->id_event }})">
                                  <i class="mdi mdi-delete"></i> Delete
                              </button>
                              @if(Auth::user()->role == 'superadm')
                              <a href="{{ route('adminall.result', ['id_event' => $event->id_event]) }}" class="btn btn-primary btn-xs">
                                <i class="mdi mdi-eye"></i> Result
                            </a>
                            @endif
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      @endif
                      </div>
                    </div>
                  </div>
                          </div>
                        </div>

          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="../template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../template/vendors/chart.js/Chart.min.js"></script>
  <script src="../template/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../template/js/off-canvas.js"></script>
  <script src="../template/js/hoverable-collapse.js"></script>
  <script src="../template/js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
    <script src="../template/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../template/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <!-- Delete icon trigger -->
  <!-- Delete icon trigger -->
  @if(isset($event->id_event))
    <a href="#" onclick="showDeleteConfirmation({{ $event->id_event }})">
      <i class="mdi mdi-delete"></i>
    </a>
    
    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmationModal" style="display: none;">
      <p>Are you sure you want to delete this event?</p>
      <button onclick="deleteEvent({{ $event->id_event }})">Delete</button>
      <button onclick="hideDeleteConfirmation()">Cancel</button>
    </div>
  @endif

  <!-- JavaScript to show/hide the modal and handle the deletion -->
  <script>
    function showDeleteConfirmation(id_event) {
        var modal = document.getElementById('deleteConfirmationModal');
        if(id_event) {
            modal.style.display = 'block';
            modal.dataset.eventId = id_event;
        }
    }

    function hideDeleteConfirmation() {
        var modal = document.getElementById('deleteConfirmationModal');
        modal.style.display = 'none';
    }

    function deleteEvent(id_event) {
        if(!id_event) return; // Do nothing if id_event is not provided

        var deleteUrl = "{{ url('/delete') }}/" + id_event;

        // Use Fetch API or other AJAX methods to send a DELETE request
        fetch(deleteUrl, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                // Add any other headers as needed
            },
        })
        .then(response => response.json()) // Adjust based on your response format
        .then(data => {
            if (data.success) {
                alert('Event deleted successfully.');
                // Optionally, remove the deleted event row from the table
                // For example:
                // document.getElementById(`event-row-${id_event}`).remove();
                location.reload(); // Simple way to refresh the page
            } else {
                alert('Failed to delete event.');
            }
            hideDeleteConfirmation();
        })
        .catch(error => {
            console.error('Error:', error);
            hideDeleteConfirmation();
        });
    }
  </script>
@else
  <p>No data available</p>
  @endif
</body>

</html>