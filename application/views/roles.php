<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Roles | Admin Dashboard</title>
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
 
   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>



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
            <li><a href="mainPage"><i class="fa fa-bars fa-fw"></i>Dashboard </a></li>
            <li class="active"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"><i class="fa fa-users fa-fw"></i>User Management<span class="fa fa-caret-down first"></a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="<?php echo base_url(); ?>index.php/admin_control/users">Users</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/admin_control/roles">Roles</a></li>
              </ul>
            </li>
           
          </ul>
          
        </nav>
       
          <div class="content-inner">
              <div class="container mb-5" >


                <div class="row mt-5">
                  <div class="col-lg-8">
                    <h1 class="mt-2">Roles</h1>

                  </div> 
                  <div class="col-lg-4">
                            <button type="button" class="btn btn-secondary btn-sm float-right mt-3">Add Role</button>
                     </div> 
                </div>

                  

                <div class="row">
                  <div class="container">

                    <div class="row mb-3 mt-3 p-3" id="RolesTable">
                      <div class="col">
                        <table class="table table-striped" id="tableRoles" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Role</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Administrator</td>
                                <td>User Management</td>
                                <td> 
                                      <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                      <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                              </tr>
                            
                            </tbody>
                          </table>

                      </div>  
                    </div>



                  </div>
                </div>


            </div>

    </div>
  
  </div>








   

<script>
    $(document).ready( function () {
    $('#tableRoles').DataTable();
} );
    </script>
  

  </body>
</html>