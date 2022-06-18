<?php session_start(); include_once("config.php"); ?>
<?php 

 if(isset($_POST['submit'])){
  $assign_by=$_POST['assign_by'];
  $l_from=$_POST['l_from'];
  $l_to=$_POST['l_to'];
  $e_leave=$_POST['e_leave'];
  $c_leave=$_POST['c_leave'];
  $m_leave=$_POST['m_leave'];
 $status='pending';

 
 
  // $sql="select * from `user` where id=$assigned_by";
  // $query=mysqli_query($conn,$sql);
  // $result=mysqli_fetch_assoc($query);

    $sql="INSERT INTO applied_leave(l_from,l_to,e_leave,m_leave,c_leave,assign_by,status) VALUES('$l_from','$l_to',' $e_leave','$c_leave','$m_leave','$assign_by','$status')";
      $query=mysqli_query($conn, $sql);
      if($query){
        $_SESSION['success']='Applied Leave Successfully';
        echo "<script>window.location.href='leave.php'</script>";
      }else{
         echo "<script>window.location.href='leave.php'</script>";
      }
 
 }

 ?>