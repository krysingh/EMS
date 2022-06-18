<?php include "../auth/auth.php"; include("config.php");?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Leave</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=PT+Serif&display=swap" rel="stylesheet">
      <style>
         body{
             font-family: 'Abril Fatface', cursive;
         font-family: 'PT Serif', serif;
         }
      </style>
      <link rel="stylesheet" href="assets/style.css">
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
      <div class="container well" style="margin-top:50px;">
      <fieldset>
            <legend>
               <center>
                   <h2><b>Applied Leave For Employee</b></h2>
               </center>
            </legend>
            <br>
      </fieldset>
       <table class="table table-striped">
            <thead>
               <tr>
                  <th>S.No</th>
                  <th>Leave From</th>
                  <th>Leave To</th>
                  <th>Earn Leave</th>
                  <th>Casual Leave</th>
                  <th>Medical Leave</th>
                  <th>Comment</th>
                  <th>Status</th>

                  <th>Action</th>
                  
               
                  
               </tr>
            </thead>
            <tbody>
               <?php
                  $i=1;
                  $id=$_SESSION['id'];
                  $sql="select * from applied_leave where assign_by=$id";
                  $query=mysqli_query($conn,$sql);
                  if($row=mysqli_num_rows($query) > 0){
                     while($result=mysqli_fetch_array($query)){
                   ?>   
               <tr>
                  <td><?= $i?></td>
                  <td><?= $result['l_from'] ?></td>
                  <td><?= $result['l_to']; ?></td>
                  <td><?= $result['e_leave']; ?></td>
                  <td><?= $result['c_leave']; ?></td>
                  <td><?= $result['m_leave']; ?></td>
                  <td><?= $result['comment']; ?></td>
                  <?php 
                     if($result['status']=='pending'){
                  ?>
                  <td ><span style="background: red;color: white;padding: 3px;border-radius: 50px;font-size: 12px;"><?= $result['status']; ?></span></td>
               <?php }else{?>
                   <td ><span style="background: forestgreen;color: white;padding: 3px;border-radius: 50px;font-size: 12px;"><?= $result['status']; ?></span></td>
               <?php }?>   
                  <?php 
                     if($result['status']=='pending'){
                  ?>
                  <td><a href="applied_edit.php?id=<?php echo $result['id']  ?>" class="btn btn-sm btn-primary">Edit</a></td>
                  <?php } else{echo "<td>...</td>";} ?>
               </tr>
               <?php $i++; } }else{
                  echo "<tr><td colspan='4'>No Records Found</td></tr>";
               }?>
            </tbody>
         </table>
      </div>
      </div>
      </div><!-- /.container -->
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
      <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
   </body>
</html>