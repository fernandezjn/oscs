<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Add User</title>

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

    <!-- Datatable Bootstrap CSS-->
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  </head>

  <body>
    <div id="wrapper">
      <div class="overlay"></div>
      
      <!-- Sidebar -->
      <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
        <div class="simplebar-content" style="padding: 0px;">
          <a class="sidebar-brand d-flex align-items-center" href="#">
            <img src="<?php echo base_url(); ?>assets/img/PUPLogo.png" alt="..." class="img-fluid rounded-circle sidebar-profile-img">
            <span class="align-middle mt-3 ml-3">
              <?php echo $user_name ?> 
              <h6 class="mt-2 font-weight-light small">Registrar's Office</h6>
            </span>
          </a>

          <ul class="navbar-nav align-self-stretch">
            <li class="sidebar-header">
              Pages
            </li>

            <li class="sidebar-link"> 
              <a href="mainPage" class="nav-link text-left"  role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-chart-line"></i>Dashboard
              </a>
            </li>
     
            <li class="sidebar-link"> 
              <a href="#" class="nav-link text-left"  role="button">
                <i class="far fa-address-card"></i> Profile 
              </a>
            </li>

            <li class="sidebar-link"> 
              <a href="#" class="nav-link text-left"  role="button" >
                <i class="far fa-bell"></i> Notifications 
              </a>
            </li>
      
            <li class="sidebar-header">
              User Management
            </li>
                
            <li class=""> 
              <a href="<?php echo base_url(); ?>index.php/admin_control/users" class="nav-link text-left" role="button">
                <i class="fas fa-users"></i> Users
              </a>
            </li>

            <li class="sidebar-header">
              Clearance
            </li>

            <li class=""> 
              <a href="<?php echo base_url(); ?>index.php/admin_control/initiate_clearance" class="nav-link text-left"  role="button" >
                <i class="fas fa-edit"></i> Initiate Clearance
              </a>
            </li>
            <li class=""> 
              <a href="<?php echo base_url(); ?>index.php/admin_control/clearance_records" class="nav-link text-left"  role="button" >
                <i class="fa fa-clipboard"></i> Clearance Records 
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
                    <div class="dropdown-menu-header p-2">99 New Notifications</div>
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
                            <div class="text-muted small mt-1">Jillian Noreen Fernandez</div>
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
                    <span class="mr-2 d-none d-lg-inline"><?php echo $user_name ?></span>
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
            <div class="container-fluid px-lg-4 pb-lg-5 pb-md-5 pb-5 pb-sm-5">
              <div class="row">
                <div class="col-md-12 mt-lg-4 mt-4">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Add User</h1>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="card p-3">
                    <div class="card-body">
                      <form method="POST"> 
                        <div class="form-row">
                          <div class="col-md-12">
                            <label for="UserRole">User Role</label>
                            <select class="custom-select my-1 mr-sm-2" id="UserRole" onchange="addUserForm()" name="userRole" required>
                              <option value="" selected>Choose...</option>
                                <?php foreach($roles as $row) { ?>
                                  <option value="<?php echo $row->id ?>"><?php echo $row->role ?></option>
                                <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-row mt-2">
                          <div class="col-md-6 mb-3">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" id="Username" placeholder="Username" name="userName" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control" id="Password" placeholder="Password" name="pass" required>
                          </div>
                        </div>

                        <button class="btn btn-success">Generate Username & Password</button>

                        <div class="form-row mt-5">
                          <div class="col-md-3 mb-3">
                            <label for="LastName">Last Name</label>
                            <input type="text" class="form-control" id="LastName" placeholder="Last Name" name="lastName" required>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="FirstName">First Name</label>
                            <input type="text" class="form-control" id="FirstName" placeholder="First Name" name="firstName" required>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="MiddleName">Middle Name</label>
                            <input type="text" class="form-control" id="nMiddleName" placeholder="Middle Name" name="middleName" required>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="Suffix">Suffix</label>
                            <input type="text" class="form-control" id="Suffix" placeholder="Suffix" name="suffixName">
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="EmailAddress">Email Address</label>
                            <input type="email" class="form-control" id="EmailAddress" placeholder="Email Address" name="email" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="ContactNumber">Contact Number</label>
                            <input type="tel" class="form-control" id="ContactNumber" placeholder="Contact Number" name="contact" required>
                          </div>
                        </div>

                        <div class="form-row" id="officeField">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="Office">Office</label>
                              <select id="Office" class="form-control" onchange="forStudentOrg()" name="office">
                                <option value="" selected>Choose...</option>
                                  <?php foreach($offices as $row) { ?>
                                    <option value="<?php echo $row->id ?>"><?php echo $row->department_name ?></option>
                                  <?php } ?>        
                              </select>
                            </div>
                          </div>
                        </div>

                        <fieldset id="StudentOrg">
                          <div class="form-row" >
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label for="StudentOrganization">Student Organization</label>
                                <select id="StudentOrganization" class="form-control" name="org">
                                  <option value="" selected>Choose...</option>
                                  <?php foreach($org as $row) { ?>
                                    <option value="<?php echo $row->id ?>"><?php echo $row->org_name ?></option>
                                  <?php } ?> 
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label for="Position">Position</label>
                                <select id="Position" class="form-control" name="position">
                                  <option value="" selected>Choose...</option>
                                    <?php foreach($positions as $row) { ?>
                                      <option value="<?php echo $row->id ?>"><?php echo $row->position_name ?></option>
                                    <?php } ?> 
                                </select>
                              </div>
                            </div>
                          </div>
                        </fieldset>

                        <fieldset id="forStudentfields">
                          <div class="form-row">
                            <div class="col-md-6">
                              <label for="StudentNumber">Student Number</label>
                              <input type="text" class="form-control" id="StudentNumber" placeholder="Student Number" name="studentNo">
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="Year">Year</label>
                                <select id="Year" class="form-control" name="year">
                                  <option value="" selected>Choose...</option>
                                  <?php foreach($year as $row) { ?>
                                    <option value="<?php echo $row->id ?>"><?php echo $row->level ?></option>
                                  <?php } ?>
                                </select> 
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="Year">Section</label>
                                <select id="Year" class="form-control">
                                  <option selected>1</option>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="col-md-9">
                              <div class="form-group">
                                <label for="Course">Course</label>
                                <select id="Course" class="form-control" name="course">
                                  <option value="" selected>Choose...</option>
                                  <?php foreach($courses as $row) { ?>
                                    <option value="<?php echo $row->id ?>"><?php echo $row->course_name ?></option>
                                  <?php } ?> 
                                </select>
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="StudentType">Student Type</label>
                                <select id="StudentType" class="form-control" name="studentType">
                                  <option value="" selected>Choose...</option>
                                    <?php foreach($student_types as $row) { ?>
                                      <option value="<?php echo $row->id ?>"><?php echo $row->type ?></option>
                                    <?php } ?> 
                                </select>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        <button class="btn btn-danger" onclick="window.location='<?php echo site_url("admin_control/users")?>'">Cancel</button>
                        <input class="btn btn-success" type="submit" name="addUser" value="Add User">
                      </form>
                    </div>
                  </div>
                </div><!-- /column -->
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
  

    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
    <script src="http://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 
  
    <script>
      $(document).ready( function () {
        $('#tableUsers').DataTable();
      } );
    </script>

     <script>
      $('#bar').click(function(){
        $(this).toggleClass('open');
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );
      });
    </script>

    <script>
      function addUserForm(){
        var userRole = document.getElementById("UserRole");

        if (userRole.value == "3"){
          document.getElementById("officeField").style.display="none";
          document.getElementById("StudentOrg").style.display="none";
          document.getElementById("forStudentfields").style.display="block";
        }
        else if (userRole.value == "4"){
          document.getElementById("forStudentfields").style.display="none";
          document.getElementById("officeField").style.display="block";
        }
      }
    </script>

    <script>
      function forStudentOrg(){
        var officeVal = document.getElementById("Office");
        if (officeVal.value == "5"){
           document.getElementById("StudentOrg").style.display="block";
        }
        else{
          document.getElementById("StudentOrg").style.display="none";
        }
      }
    </script>
  </body>
</html>