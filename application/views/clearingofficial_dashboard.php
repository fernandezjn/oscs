<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">

    <!-- Bootstrap CSS-->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/bootstrap.min.css"> 

    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/PUPLogo.png">

    <!-- CSS -->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/style.css"> 
  </head>
  <body>
    <div id="wrapper">
      <div class="overlay"></div>
      
      <!-- Sidebar -->
      <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
        <div class="simplebar-content" style="padding: 0px;">
          <div class="sidebar-brand d-flex align-items-center" href="#">
            <img src="<?php echo base_url(); ?>assets/img/PUPLogo.png" alt="..." class="img-fluid rounded-circle sidebar-profile-img">
            <span class="align-middle mt-3 ml-3">
              <?php echo $user_name ?>
              <h6 class="mt-2 font-weight-light small">Office of Student Services</h6>
            </span>
          </div>

          <ul class="navbar-nav align-self-stretch">
            <li class="sidebar-header">
              Pages
            </li>

            <li class="sidebar-link"> 
              <a href="mainPage" class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-chart-line"></i> Dashboard 
              </a>
            </li>
            
            <li class="sidebar-link"> 
              <a href="#" class="nav-link text-left"  role="button" >
                <i class="far fa-address-card"></i> Profile 
              </a>
            </li>

            <li class="sidebar-link"> 
              <a href="#" class="nav-link text-left"  role="button" >
                <i class="far fa-bell"></i> Notifications 
              </a>
            </li>

            <li class="sidebar-header"> Clearance</li>
            <li class=""> 
              <a class="nav-link collapsed text-left"  href="#collapseClearanceRecords" role="button" data-toggle="collapse">
                <i class="fa fa-clipboard"></i> Clearance Records
                <i class="fas fa-caret-down float-right"></i> 
              </a>
              <div class="collapse menu mega-dropdown" id="collapseClearanceRecords">
                <div class="dropmenu" aria-labelledby="navbarDropdown">
                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-lg-12 px-2">
                        <div class="submenu-box"> 
                          <ul class="list-unstyled m-0">
                            <li><a href="">2nd Sem S.Y. 2019-2020</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
        
            <li class=""> 
              <a href="#" class="nav-link text-left"  role="button" >
                <i class="fas fa-file-signature"></i>   Requirements
              </a>
            </li>
          </ul>
        </div>
      </nav> 
      <!-- /#sidebar-wrapper -->
        
      <!-- Page Content -->
      <div id="page-content-wrapper">
        <div id="content">
          <div class="container-fluid p-0 px-lg-0 px-md-0">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light my-navbar">
              <!-- Sidebar Toggle (Topbar) -->
              <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span></span>
                <span></span>
                <span></span>
              </div>

              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown">
                  <a class="nav-icon dropdown mt-1" href="#" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
                    <div class="position-relative">
                      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-middle"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                      <span class="badge badge-danger badge-counter">99</span>
                    </div>
                  </a>
                  
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                    <div class="dropdown-menu-header p-2"> 99 New Notifications </div>
                    <div class="list-group list-group-flush">
                      <a href="#" class="list-group-item list-group-item-action">
                        <div class="row no-gutters align-items-center">
                          <div class="col-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                          </div>
                          <div class="col-10">
                            <div class="text-dark">Clearance Request</div>
                            <div class="text-muted small mt-1">Angelia Rose Picart</div>
                            <div class="text-muted small mt-1">BSIT 3-1</div>
                          </div>
                        </div>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action">
                        <div class="row no-gutters align-items-center">
                          <div class="col-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                          </div>
                          <div class="col-10">
                            <div class="text-dark">Clearance Request</div>
                            <div class="text-muted small mt-1">Rafael Senados</div>
                            <div class="text-muted small mt-1">BSIT 3-1</div>
                          </div>
                        </div>
                      </a>
                    </div>

                    <div class="dropdown-menu-footer p-2">
                      <a href="#" class="text-muted text-center">View All Notifications</a>
                    </div>
                  </div>
                </li>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle mr-3" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                    <span class="mr-2 d-none d-lg-inline"><?php echo $user_name?></span>
                    <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/img/PUPLogo.png">
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">View Profile</a></li>
                    <li><a class="dropdown-item" href="logout">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid px-lg-4">
              <div class="row">
                <div class="col-md-12 mt-lg-4 mt-4">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                  </div>
                </div>
              </div>
            </div> <!-- /.container-fluid -->
          </div>
        </div>
      </div> <!-- /#page-content-wrapper -->
    </div> <!-- /#wrapper -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
      $('#bar').click(function(){
        $(this).toggleClass('open');
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );

      });
    </script>
    
  </body>
</html>