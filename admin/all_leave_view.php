<?php include "../auth/auth.php"; include("config.php");?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Leave</title>
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
      <div class="container well" style="margin-top:50px;">
      <fieldset>
            <legend>
               <center>
                   <h2><b>Assign Leave</b><a href="leave.php" class="btn btn-success" style="float:right">back</a></h2>
               </center>
            </legend>
            <br>
      </fieldset>
       <table class="table table-striped">
            <thead>
               <tr>
                  <th>S.No</th>
                  <th>Assign To</th>
                  <th>Date From</th>
                  <th>Date To</th>
                  <th>Earn Leave</th>
                  <th>Casual Leave</th>
                  <th>Medical Leave</th>
                  <th>Action</th>
               
                  
               </tr>
            </thead>
            <tbody>
               <?php
                  $i=1;
                  $sql="select * from emp_leave el join user u on el.assign_to=u.id ";
                  $query=mysqli_query($conn,$sql);
                  if($row=mysqli_num_rows($query) > 0){
                     while($result=mysqli_fetch_array($query)){
                   ?>   
               <tr>
                  <td><?= $i?></td>
                  <td><?= $result['name'] ?></td>
                  <td><?= $result['v_from'] ?></td>
                  <td><?= $result['v_to']; ?></td>
                  <td><?= $result['e_leave']; ?></td>
                  <td><?= $result['c_leave']; ?></td>
                  <td><?= $result['m_leave']; ?></td>
                  <td><a href="leave_edit.php?id=<?php echo $result['id'] ?>" class="btn btn-sm btn-primary">Edit</a></td>
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