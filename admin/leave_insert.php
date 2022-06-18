<?php session_start(); include_once("config.php"); ?>
<?php 

 if(isset($_POST['submit'])){
  $assigned_by=$_POST['assigned_by'];
  $v_from=$_POST['v_from'];
  $v_to=$_POST['v_to'];
  $e_leave=$_POST['e_leave'];
  $c_leave=$_POST['c_leave'];
  $m_leave=$_POST['m_leave'];
  $emp_list=$_POST['emp'];

 
 
  $sql="select * from `user` where id=$assigned_by";
  $query=mysqli_query($conn,$sql);
  $result=mysqli_fetch_assoc($query);
  //$user_id=$result['id'];
  //print_r($result['id']);
  foreach ($emp_list as $res) {
      // print_r($res);
    $sql="INSERT INTO emp_leave(v_from,v_to,e_leave,m_leave,c_leave,assign_to,assign_by) VALUES('$v_from','$v_to',' $e_leave','$c_leave','$m_leave','$res','$assigned_by')";
      $query=mysqli_query($conn, $sql);
      //print_r($sql_query);die();

      if($query){
        $_SESSION['success']='Leave assigned successfully';
        echo "<script>window.location.href='leave.php'</script>";
      }else{
         echo "<script>window.location.href='leave.php'</script>";
      }
  }
 }

 ?>