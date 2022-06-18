<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" href="assets/style.css">
<style type="text/css">
	span#session_success{
		background: green;
    color: white;
    padding: 8px 12px 8px 12px;
    position: absolute;
    top: 5px;
    right: 5px;
    font-size: 18px;
	}
	span#session_error{
		background: red;
    color: white;
    padding: 8px 12px 8px 12px;
    position: absolute;
    top: 5px;
    right: 5px;
    font-size: 18px;
	}
</style>
	
	
</head>
<body>
  <div class="container" style="margin-top:50px;">

		<fieldset>
		<div class="well">
		<legend><center><h2><b>Login</b></h2></center></legend><br>

				<?php 
				if(isset($_SESSION['error'])) 
				{ 
		         echo "<span id='session_error' class='session_error'>".$_SESSION['error']."</span>";
		          unset($_SESSION['error']);
				}
				?>
    <form class="form-horizontal" action="login.php" method="post"  id="contact_form">
		
			<div class="form-group">
			  <label class="col-md-4 control-label"></label>  
			  <div class="col-md-4 inputGroupContainer">
				  <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input  name="username" placeholder="User Name" id="username" class="form-control"  type="text">

				  </div>
				    <span class="text-danger msg1"></span>
			  </div>
			</div>

			

			<!-- Password input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" ></label> 
			    <div class="col-md-4 inputGroupContainer">
				    <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input name="password" id="password" name="password" placeholder="Password" class="form-control"  type="password">
				    </div>
				     <span class="text-danger msg3"></span>
			  </div>
			</div> 

			<!-- <div  class="form-group">
				<label class="col-md-4 control-label" ></label> 
			    <div class="col-md-4 inputGroupContainer">
				    <p style="text-align: center;">I Don't Have Account? <a href="register.php">Register Here.</a>.</p>
			   </div>
			</div> -->
			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label"></label>
			  <div class="col-md-4">
			    <button type="submit" name="submit" id="submit" class="btn btn-warning btn-block" >Login <span class="glyphicon glyphicon-send"></span></button>
			  </div>
			</div>
		</form>
		</fieldset>
	</div>
</div>
    </div><!-- /.container -->
<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
	<script scr="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <script>
 	$(document).ready(function(){

 			setTimeout(function() {
                    $('#session_error').fadeOut('slow');
                }, 2000);
 	});
 </script>
</body>
</html>
