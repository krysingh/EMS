 <?php session_start(); include_once("config.php"); ?>
<?php
 
 if(isset($_POST['assign_to'])){
    $id=$_POST['assign_to'];
    $v_from=$_POST['v_from'];
    $v_to=$_POST['v_to'];
    $e_leave=$_POST['e_leave'];
    $c_leave=$_POST['c_leave'];
    $m_leave=$_POST['m_leave'];
    $emp_list=$_POST['emp'];



$sql="update emp_leave set v_from='$v_from',v_to='$v_to',e_leave='$e_leave',c_leave='$c_leave',m_leave='$m_leave' where assign_to=$id";
    $query=mysqli_query($conn,$sql);

    if($query){
        $_SESSION['success1']="Data Updated Successfully";
        echo "<script>window.location.href='all_leave_view.php'</script>";
        return true;
    }else{
        echo "<script>window.location.href='leave_edit.php?id=$id'</script>";
        return false;
    }
 }

 ?>