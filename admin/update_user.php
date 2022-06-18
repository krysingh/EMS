 <?php session_start(); include_once("config.php"); ?>
<?php
 
 if(isset($_POST['id'])){
   $id=mysqli_real_escape_string($conn,$_POST['id']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
    $department=mysqli_real_escape_string($conn,$_POST['department']);
    $role=mysqli_real_escape_string($conn,$_POST['role']);

    $sql="update user set name='$name',email='$email',password='$password',department='$department',role='$role' where id=$id";
    $query=mysqli_query($conn,$sql);

    if($query){
        $_SESSION['success']="Data Updated Successfully";
        echo "<script>window.location.href='dashboard.php'</script>";
    }else{
        echo "<script>window.location.href='update_user.php'</script>";
    }
 }

 ?>