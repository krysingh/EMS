<?php include "../auth/auth.php"; include("config.php");?>
      <?php include "header.php" ?> 
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
                  <td><a href="leave_edit.php?id=<?php echo $result['id'] ?>" class="text-primary"><i class="fa-solid fa-pen-to-square" title="Edit"></i></a></td>
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