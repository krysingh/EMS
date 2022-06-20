<?php include "../auth/auth.php"; include("config.php");?>
<?php 
 if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql="select * from `task` where t_id=$id";
  $query=mysqli_query($conn,$sql);
  $result=mysqli_fetch_array($query);
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
      <div class="container" style="margin-top:50px;">
         <h3>Task</h3>
         <p style="background: #e3e3e3; padding: 30px;width: 100%"><?php echo $result['message'];?></p>
         <?php 

            if(isset($_POST['submit'])){
              $id=$_POST['m_id'];
              $user_id=$_POST['user_id'];
              $msg_reply=mysqli_real_escape_string($conn,$_POST['msg_reply']);
             $sql="insert into task_reply(`reply`,`m_id`,`reply_by`) values('$msg_reply',$id,$user_id)";
             $query=mysqli_query($conn,$sql);
             if($query){
               $_SESSION['success']='Task assigned successfully';
                echo "<script>window.location.href='task_view.php?id=".$id."'</script>";
             }
            }

          ?>
         <form method="post" action="">
              <div class="row">
                <div class="col-lg-2">
                  <h4>Reply Message :-</h4>
                </div>
               <div class="col-lg-10">
                <input type="hidden" name="m_id" value="<?php echo $id ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                
                 <textarea class="form-control" name="msg_reply" id="msg_reply" rows="10" placeholder="Message | Task"></textarea>
               </div>
              
                <div class="col-lg-10" style="float: right;margin-top: 5px;">
                          <span style="float:right !important;"><button type="submit" name="submit" id="submit" class="btn btn-primary" ><i class="fas fa-save"></i> Submit</button>
                           <button type="submit" name="cancel" id="cancel" class="btn btn-danger" ><i class="fa-solid fa-rectangle-xmark"></i> Cancel</button></span>
                        </div>
              </div>

         </form>
     
         <div class="row" style="margin-top: 10px;">
           <div class="col-lg-2"></div>
              
           <div class="col-lg-10">
           <?php 
                       
                        $id1=$_GET['id'];
                        $sql="select * from `task_reply` r join `user` u on r.reply_by=u.id where `m_id`='".$id1."' order by r.task_id DESC";
                        $query=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($query)){
                        while($res1=mysqli_fetch_array($query)){
                 ?>
             <span><p style="background: #18c6cf;padding: 10px;color: #ffffff;font-size: 13px;font-weight: 700;">
                       <i class="fa-solid fa-user-large text-success"></i> <?php echo $res1['name'];?> : <?php echo $res1['reply']; ?></p></span>
               <?php }} else{ echo "No Comments"; }?>
           </div>

          
         </div>
         
      </div>
      <!-- /.container -->
       <?php include "footer.php" ?>