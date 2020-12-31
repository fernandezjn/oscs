<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/bootstrap.min.css"> 
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- theme stylesheet-->
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/PUPLogo.png">
     <!-- CSS -->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/style.css"> 


  </head>


  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
        	<a class="navbar-brand inline-block pl-4" href="#">Online Student Clearance System</a>
        	<a class="inline-block text-right pr-5" href="logout">Logout <i class="fa fa-sign-out"></i></a>
        </nav>
      </header>
      
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo base_url(); ?>assets/img/PUPLogo.png" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h3 mb-1">Super Admin</h1>
              <p>PUP Taguig</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus-->
          <ul class="list-unstyled">
            <li class="active"><a href="mainPage"><i class="fa fa-bars fa-fw"></i>Dashboard </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"><i class="fa fa-users fa-fw"></i>User Management<span class="fa fa-caret-down first"></a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="<?php echo base_url(); ?>index.php/admin_control/users">Users</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/admin_control/users">Roles</a></li>
              </ul>
            </li>
           
          </ul>
          
        </nav>
       
          <div class="content-inner">

          </div>

    </div>
  

  

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>