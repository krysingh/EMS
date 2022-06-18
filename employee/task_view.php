 <?php include "../auth/auth.php"; include("config.php");?>
<?php 

 if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql="select * from `task` where t_id=$id";
  $query=mysqli_query($conn,$sql);
  $result=mysqli_fetch_array($query);
 }

 ?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Dashboard</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
      <link rel="stylesheet" href="assets/style.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=PT+Serif&display=swap" rel="stylesheet">
      <style>
         body{
             font-family: 'Abril Fatface', cursive;
         font-family: 'PT Serif', serif;
         }
      </style>
      <style type="text/css">
         span#session_success{
         background: green;
         color: white;
         padding: 8px 12px 8px 12px;
         position: absolute;
         top: 5px;
         right: 5px;
         font-size: 18px;
         }
         span#session_error{
         background: red;
         color: white;
         padding: 8px 12px 8px 12px;
         position: absolute;
         top: 5px;
         right: 5px;
         font-size: 18px;
         }
      </style>
   </head>
   <body>
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
                           <span style="float:right !important;"><button type="submit" name="submit" id="submit" class="btn btn-primary" >Submit</button>
                           <button type="submit" name="cancel" id="cancel" class="btn btn-danger" >Cancel</button></span>
                        </div>
              </div>

         </form>
     
         <div class="row" style="margin-top: 10px;">
           <div class="col-lg-2"></div>
              
           <div class="col-lg-10">
           <?php 
                       
                        $id1=$_GET['id'];
                        $sql="select * from task_reply where `m_id`='".$id1."' and `reply_by`='".$_SESSION['id']."'";
                        $query=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($query)){
                        while($res1=mysqli_fetch_array($query)){
                 ?>
             <span><p style="background: #18c6cf;padding: 10px;color: #ffffff;font-size: 13px;font-weight: 700;">
                         <?php echo $res1['reply']; ?></p></span>
               <?php }} else{ echo "No Comments"; }?>
           </div>

          
         </div>
         
      </div>
      <!-- /.container -->
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
      <script scr="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script>
         $(document).ready(function(){
              setTimeout(function() {
                            $('#session_success').fadeOut('slow');
                        }, 2000);
         });
      </script>
   </body>
</html>