<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta name="description" content="">
    	<meta name="author" content="">

    	<title>Sign In | Online Student Clearance System</title>

		<!-- Font Awesome CSS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	    
	    <!-- Bootstrap core CSS -->
	  	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/bootstrap.min.css"> 
		
		<!-- CSS -->
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/style.css"> 
		
		<!-- Favicon -->
		<link rel="icon" href="<?php echo base_url(); ?>assets/img/PUPLogo.png">
  	</head>

  	<body>
  		<div class="signin text-center">
	  		<div id="form-group">
	    		<form class="form-signin" method="POST">
	      			<img class="mb-4" src="<?php echo base_url(); ?>assets/img/PUPLogo.png" alt="" width="72" height="72">
	      			<h1 class="h3 mb-4 font-weight-normal">Online Student Clearance System</h1>
	      			<label for="inputUsername" class="sr-only">Username</label>
	      			<div class="input-group">
	      				<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
	   		 			</div>
	     			 	<input type="text" id="inputUsername" class="form-control" placeholder="Username" name="usernameInput" required autofocus>
					</div>
	      			
	      			<label for="inputPassword" class="sr-only">Password</label>

	      			<div class="input-group">
	      				<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
	   		 			</div>
	      				<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="passwordInput" required>
	  				</div>
	  				<?php if(isset($_GET['message'])): ?>	  				                    
                            <p style="color:blue; padding-top:20px" align="center"><?= $_GET['message']?></p>                    
                    <?php endif; ?>

	      			<!--<div class="checkbox mb-3">
	        			<label>
	          				<input type="checkbox" name="rememberME"> Remember me
	        			</label>
	      			</div>-->
	      			
	      			<input class="btn btn-lg btn-primary btn-block" type="submit" name="signin" value="Sign In">
	      			<label class="font-weight-normal mt-4"><a href="<?php echo base_url(); ?>index.php/main/forgot_password">Forgot Password</a></label>
	    		</form>
			</div>
			<p class="mt-5 mb-3 text-muted fixed-bottom">&copy; Online Student Clearance System 2021</p>
  		</div>
  		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  	</body>
</html>
