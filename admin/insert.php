<?php session_start(); include_once("config.php"); ?>
<?php 

 if(isset($_POST['submit'])){
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
  $department=mysqli_real_escape_string($conn,$_POST['department']);
  $role=mysqli_real_escape_string($conn,$_POST['role']);
 
  $select_email="select email from `user` where `email` = '$email'";
  $sql_query=mysqli_query($conn, $select_email);
  $result=mysqli_fetch_array($sql_query);
  if(mysqli_num_rows($sql_query)){
  	$_SESSION['error'] = "Email already available";
  	echo "<script>window.location.href='register.php'</script>";
  }else{
	   $sql="insert into `user`(`name`,`email`,`password`,`department`,`role`) values('$name','$email','$password','$department','$role')";
	   $query=mysqli_query($conn,$sql);
	    if($query){
	    $_SESSION['success'] = "Data Inserted Successfully";
	   //flash('msg','Data Inserted'); 	
	  	echo "<script>window.location.href='register.php'</script>";
	    }
  }
  
 
 }

 ?>