<?php session_start(); include_once("config.php"); ?>
<?php 

 if(isset($_POST['submit'])){
  $assigned_by=$_POST['assigned_by'];
  $message=$_POST['message'];
  $emp_list=$emp=$_POST['emp'];
 
  $sql="select * from `user` where id=$assigned_by";
  $query=mysqli_query($conn,$sql);
  $result=mysqli_fetch_array($query);
  //$user_id=$result['id'];
  //print_r($result['id']);
  foreach ($emp_list as $emp=>$res) {
      $sql_inst="insert into `task`(`t_id`,`message`,`user_id`,`assigned_by`) values('','$message','$res','$assigned_by')";
      $sql_query=mysqli_query($conn, $sql_inst);

      if($sql_query){
        $_SESSION['success']='Task assigned successfully';
        echo "<script>window.location.href='task.php'</script>";
      }
  }
 }

 ?>