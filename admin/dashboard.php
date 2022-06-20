<?php include "../auth/auth.php"; include("config.php");?>
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
                  <td><a href="edit_user.php?id=<?= $result['id']?>" class="text-primary"><i class="fa-solid fa-pen-to-square" title="Edit"></i></a> <a href="delete_user.php?id=<?= $result['id']?>" class="text-danger delete_row" title="Delete"><i class="fa-solid fa-trash-can"></i></a></td>
               </tr>
               <?php $i++; } }?>
            </tbody>
         </table>
      </div>
      <!-- /.container -->
      <!-- jQuery library -->
     <?php include "footer.php" ?>