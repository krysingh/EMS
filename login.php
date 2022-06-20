<?php 
session_start();
include_once('config.php');

if(isset($_POST['submit'])){
  //$name=mysqli_real_escape_string($conn,$_POST['name']);
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=md5(mysqli_real_escape_string($conn,$_POST['password']));

  $check_email = is_email($username);
if($check_email)
{
// email & password combination
	$query = mysqli_query($conn,"SELECT * FROM `user` WHERE `email` = '$username' AND `password` = '$password'");
} else {
// username & password combination
	$query = mysqli_query($conn,"SELECT * FROM `user` WHERE `name` = '$username' AND `password` = '$password'");
}
  $result=mysqli_fetch_array($query);
	if(mysqli_num_rows($query) > 0){
		$session_id=session_id();
		$_SESSION['id']=$result['id'];
		$_SESSION['auth']=$session_id;
		$role=$result['role'];
		if($role == 'admin'){
			header("Location:admin/dashboard.php");
		}else if($role == 'employee'){
			header("Location:employee/dashboard.php");
			//echo "<script>window.location.href='employee/dashboard.php'</script>";
		}   
	}    
	else{
		$_SESSION['error']="Invalid Username or Password";
		echo "<script>window.location.href='index.php'</script>";
	}    
}

function is_email($username){
	if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
      return true;
	} else {
	  return false;
	}
}
?>