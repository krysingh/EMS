 <?php session_start(); include_once("config.php"); ?>
<?php
 
 if(isset($_GET['id'])){
 	$id=mysqli_real_escape_string($conn,$_GET['id']);
 	$sql="select * from user where id=$id";
 	$query=mysqli_query($conn,$sql);
 	$result=mysqli_fetch_array($query);
 	//print_r($result);
 }

 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=PT+Serif&display=swap" rel="stylesheet">
      <style>
         body{
             font-family: 'Abril Fatface', cursive;
         font-family: 'PT Serif', serif;
         }
      </style>
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
  <?php include "header.php" ?>	
  <div class="container" style="margin-top:50px;">

		<fieldset>
		<div class="well">
		<legend><center><h2><b>Edit Registration Form</b></h2></center></legend><br>

				<?php 
				if(isset($_SESSION['success'])) 
				{ 
		         echo "<span id='session_success' class='session_success'>".$_SESSION['success']."</span>";
		          unset($_SESSION['success']);
				}
				if(isset($_SESSION['error'])) 
				{ 
		         echo "<span id='session_error' class='session_error'>".$_SESSION['error']."</span>";
		          unset($_SESSION['error']);
				}
				?>
    <form class="form-horizontal" action="update_user.php" method="post"  id="contact_form">
		
			<div class="form-group">
			  <label class="col-md-4 control-label"></label>  
			  <div class="col-md-4 inputGroupContainer">
				  <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input  name="id" value="<?php echo $result['id'] ?>" id="name" class="form-control"  type="hidden">
					  <input  name="name" value="<?php echo $result['name'] ?>" id="name" class="form-control"  type="text">

				  </div>
				    <span class="text-danger msg1"></span>
			  </div>
			</div>

			<!-- Email -->
			<div class="form-group">
			  <label class="col-md-4 control-label"></label>  
			    <div class="col-md-4 inputGroupContainer">
				    <div class="input-group">
				        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				  		<input name="email" id="email" value="<?php echo $result['email'] ?>" class="form-control"  type="text">
				    </div>
				     <span class="text-danger msg2"></span>
			  </div>
			</div> 

			<!-- Password input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" ></label> 
			    <div class="col-md-4 inputGroupContainer">
				    <div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input name="password" id="password" name="password"  value="<?php echo $result['password'] ?>" class="form-control"  type="password">
				    </div>
				     <span class="text-danger msg3"></span>
			  </div>
			</div> 

			<!-- Department -->
			<div class="form-group"> 
			  <label class="col-md-4 control-label"></label>
			    <div class="col-md-4 selectContainer">
				    <div class="input-group">
				        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
					    <select name="department" id="department" value="<?php echo $result['department'] ?>" class="form-control selectpicker">
					      <option value="" disabled>Select Your Department</option>
					      <option value="web-devlopment" <?php if($result['department'] == 'web-devlopment') {echo "selected";} ?>>Web Devlopment</option>
					      <option value="seo" <?php if($result['department'] == 'seo') {echo "selected";} ?>>SEO</option>
					    </select>
				    </div>
				     <span class="text-danger msg4"></span>
			    </div>
			</div>

			<!-- Role -->
			<div class="form-group"> 
			  <label class="col-md-4 control-label"></label>
			    <div class="col-md-4 selectContainer">
				    <div class="input-group">
				        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
					    <select name="role" id="role"  class="form-control selectpicker">
					      <option value="" disabled>Select Your Role</option>
					      <option value="admin" <?php if($result['role'] == 'admin') {echo "selected";} ?>>Admin</option>
					      <option value="employee" <?php if($result['role'] == 'employee') {echo "selected";} ?>>Employee</option>
					    </select>
				    </div>
				     <span class="text-danger msg4"></span>
			    </div>
			</div>

			<!-- <div  class="form-group">
				<label class="col-md-4 control-label" ></label> 
			    <div class="col-md-4 inputGroupContainer">
				    <p style="text-align: center;">Already have an account? <a href="index.php">Sign in</a>.</p>
			   </div>
			</div> -->
			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label"></label>
			  <div class="col-md-4">
			    <button type="submit" name="submit" id="submit" class="btn btn-warning btn-block" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRegister <span class="glyphicon glyphicon-send"></span></button>
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
    $('#submit').click(function(){
    	if(($('#name').val().trim()).length=='')
    	{
    		$name="Name Field is required";
    		$(".msg1").text($name);
    		$('#name').attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
    		return false;
    	}else{
    		$(".msg1").text('');
    		$('#name').attr('style', "border-radius: 5px; border:green 1px solid;");
    	}
    	if(($('#email').val().trim()).length=='')
    	{
    		$name="Email Field is required";
    		$(".msg2").text($name);
    		return false;
    	}else if(IsEmail($('#email').val()) == false) 
    	{
        $name="Not Valid Email";
    		$(".msg2").text($name);
         return false;
      }
    	else{
    		$(".msg2").text('');
    		$('#email').attr('style', "border-radius: 5px; border:green 1px solid;");
    	}
    	if(($('#password').val().trim()).length=='')
    	{
    		$name="Password Field is required";
    		$(".msg3").text($name);
    		return false;
    	}else{
    		$(".msg3").text('');
    		$('#password').attr('style', "border-radius: 5px; border:green 1px solid;");
    	}
    	if(($('#department').val().trim()).length=='')
    	{
    		$name="Department Field is required";
    		$(".msg4").text($name);
    		return false;
    	}else{
    		$(".msg4").text('');
    		$('#department').attr('style', "border-radius: 5px; border:green 1px solid;");
    	}
    
    });
    function IsEmail(email) {
            var regex =/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            }
            else {
                return true;
            }
        }
 			setTimeout(function() {
                    $('#session_success').fadeOut('slow');
                }, 2000);
 			setTimeout(function() {
                    $('#session_error').fadeOut('slow');
                }, 2000);
 	});
 </script>
</body>
</html>
