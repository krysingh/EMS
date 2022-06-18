<?php include "../auth/auth.php"; include("config.php");?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Register</title>
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
      </style>
   </head>
   <body>
      <?php include "header.php" ?> 
      <div class="container" style="margin-top:50px;">
      <fieldset>
         <div class="well">
            <legend>
               
                  <h2><b>Assign Task</b><a href="all_task_view.php" class="btn btn-primary" style="float:right">All Taks</a></h2>
               
            </legend>
            
            <br>
            <?php 
               if(isset($_SESSION['success'])) 
               { 
                      echo "<span id='session_success' class='session_success'>".$_SESSION['success']."</span>";
                       unset($_SESSION['success']);
                   }
               ?>
            <form class="form-horizontal" action="task_insert.php" method="post"  id="contact_form">
               <div class="form-group">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="col-md-2 selectContainer">
                           <h5><b>Employee List</b></h5>
                           <input type="hidden" name="assigned_by" value="<?php echo $_SESSION['id']; ?>">
                           <div class="input-group">
                              <?php
                                 $i=1;
                                 $sql="select * from `user` where role!='admin' order by id desc";
                                 $query=mysqli_query($conn,$sql);
                                 if($row=mysqli_num_rows($query) > 0){
                                    while($result=mysqli_fetch_array($query)){
                                 ?>   
                              <div class="checkbox">
                                 <label><input type="checkbox" value="<?php echo $result['id']?>" name="emp[]"><?php echo $result['name']?></label>
                              </div>
                              <?php }}?>
                           </div>
                           <span class="text-danger msg4"></span>
                        </div>
                        <div class="col-lg-10">
                           <h5><b>Message</b></h5>
                           <textarea class="form-control" name="message" placeholder="Message | Task" rows="10"></textarea>
                        </div>
                     </div>
                  </div>  
               </div> 
                <div class="form-group">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="col-md-2 selectContainer">

                        </div>
                        <div class="col-lg-10" style="float: right;">
                           <span style="float:right !important;"><button type="submit" name="submit" id="submit" class="btn btn-primary" >Submit</button>
                           <button type="submit" name="cancel" id="cancel" class="btn btn-danger" >Cancel</button></span>
                        </div>
                     </div>
                  </div>  
               </div>       
            </form>
      </fieldset>
      </div>
      </div>
      </div><!-- /.container -->
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
      <script scr="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
               setTimeout(function() {
                           $('#session_success').fadeOut('slow');
                       }, 2000);
         });
      </script>
   </body>
</html>