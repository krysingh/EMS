<?php include "../auth/auth.php"; include("config.php");?>

<?php
if(isset($_POST['approved'])){
  $status="approved";
  $comment=$_POST['comment'];
  $id=$_POST['id'];
  $sql="update applied_leave set status='$status',comment='$comment' where a_id=$id";
  $query=mysqli_query($conn,$sql);
  if($query){
        $_SESSION['success']='Status Changed successfully';
        echo "<script>window.location.href='all_applied_leave.php'</script>";
      }else{
         echo "<script>window.location.href='leave.php'</script>";
   }
}
if(isset($_POST['rejected'])){
  $status="rejected";
  $comment=$_POST['comment'];
  $id=$_POST['id'];
  $sql="update applied_leave set status='$status',comment='$comment' where a_id=$id";
  $query=mysqli_query($conn,$sql);
  if($query){
        $_SESSION['success']='Status Changed successfully';
        echo "<script>window.location.href='all_applied_leave.php'</script>";
      }else{
         echo "<script>window.location.href='leave.php'</script>";
   }
}
 ?>
<?php include "header.php" ?> 
      <?php 
               if(isset($_SESSION['success'])) 
               { 
                      echo "<span id='session_success' class='session_success'>".$_SESSION['success']."</span>";
                       unset($_SESSION['success']);
                   }
               ?>
      <div class="container well" style="margin-top:50px;">
      <fieldset>
            <legend>
               <center>
                   <h2><b>Assign Leave</b><a href="leave.php" class="btn btn-success" style="float:right"><i class="fa-solid fa-rotate-left" title="Back"></i></a></h2>
               </center>
            </legend>
            <br>
      </fieldset>
       <table class="table table-striped">
            <thead>
               <tr>
                  <th>S.No</th>
                  <th>Assign To</th>
                  <th>Leave From</th>
                  <th>Leave To</th>
                  <th>Earn Leave</th>
                  <th>Casual Leave</th>
                  <th>Medical Leave</th>
                  <th>Status</th>
                  <th>Comment</th>
                  <th>Action</th>
 
               </tr>
            </thead>
            <tbody>
               <?php
                  $i=1;
                  $sql="select * from applied_leave el join user u on el.assign_by=u.id ";
                  $query=mysqli_query($conn,$sql);
                  if($row=mysqli_num_rows($query) > 0){
                     while($result=mysqli_fetch_array($query)){
                   ?>   
               <tr>
                  <td><?= $i?></td>
                  <td><?= $result['name'] ?></td>
                  <td><?= $result['l_from'] ?></td>
                  <td><?= $result['l_to']; ?></td>
                  <td><?= $result['e_leave']; ?></td>
                  <td><?= $result['c_leave']; ?></td>
                  <td><?= $result['m_leave']; ?></td>
                   <td><span class="text-success"><?= $result['status']; ?><span></td>
                  <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $result['a_id'] ?>">
                     <td><textarea name="comment" cols="5"></textarea></td>
                     <td><button type="submit" name="approved" class="text-success"><i class="fa-solid fa-thumbs-up" title="Approved"></i></button> <button style="margin-top:2px" type="submit" name="rejected" class="text-danger" title="Rejected"><i class="fa-solid fa-thumbs-down"></i></button></td>
                  </form>

                  
               </tr>
               <?php $i++; } }else{
                  echo "<tr><td colspan='4'>No Records Found</td></tr>";
               }?>
            </tbody>
         </table>
      </div>
      </div>
      </div><!-- /.container -->
      <?php include "footer.php" ?>