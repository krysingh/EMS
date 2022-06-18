<?php include "../auth/auth.php"; include("config.php");?>
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
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Department</th>
                  <th>Role</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $i=1;
                  $sql="select * from user";
                  $query=mysqli_query($conn,$sql);
                  if($row=mysqli_num_rows($query) > 0){
                  	while($result=mysqli_fetch_array($query)){
                  		//print_r($result);
                  
                  
                   ?>	
               <tr>
                  <td><?= $i?></td>
                  <td><?= $result['name'] ?></td>
                  <td><?= $result['email'] ?></td>
                  <td><?= $result['department'] ?></td>
                  <td><?= $result['role'] ?></td>
                  <td><a href="edit_user.php?id=<?= $result['id']?>" class="btn btn-sm btn-primary">Edit</a> <a href="delete_user.php?id=<?= $result['id']?>" class="btn btn-sm btn-danger delete_row">Delete</a></td>
               </tr>
               <?php $i++; } }?>
            </tbody>
         </table>
      </div>
      <!-- /.container -->
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
      <script scr="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script>
         $(document).ready(function(){
          
         	$('.delete_row').click(function(event){
         	     if(!confirm('Really Want To Delete?')){
         	         event.preventDefault();
         	     }
         	})
         			setTimeout(function() {
                            $('#session_success').fadeOut('slow');
                        }, 2000);
         			setTimeout(function() {
                            $('#session_error').fadeOut('slow');
                        }, 2000);
         });
      </script>
   </body>
</html>