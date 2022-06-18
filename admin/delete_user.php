 <?php session_start(); include_once("config.php"); ?>
<?php
 
 if(isset($_GET['id'])){
   $id=mysqli_real_escape_string($conn,$_GET['id']);
    
    $sql="delete from user where id=$id";
    $query=mysqli_query($conn,$sql);
    if($query){
        $_SESSION['success']="User Deleted Successfully";
        echo "<script>window.location.href='dashboard.php'</script>";
    }
 }

 ?>