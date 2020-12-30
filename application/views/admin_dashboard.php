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
        	<a class="inline-block text-right pr-5" href="#">Logout <i class="fa fa-sign-out"></i></a>
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
            <li class="active"><a href="index.html"><i class="fa fa-bars fa-fw"></i>Dashboard </a></li>
            <li><a href="#"> <i class="fa fa-users fa-fw"></i>Users </a></li>
            <li><a href="#"> List </a></li>
            <li><a href="#"> List </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> List </a></li>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            
            <li><a href="#"> List </a></li>
          </ul>
          
        </nav>
       
          <div class="content-inner">
              
          </div>
 
  </body>
</html>