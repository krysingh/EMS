<?php include "../auth/auth.php"; include("config.php");?>
<?php include "header.php" ?> 
      <div class="container well" style="margin-top:50px;">
      <fieldset>
            <legend>
               <center>
                  <h2><b>Assigned Task</b></h2>
               </center>
            </legend>
            <br>
      </fieldset>
       <table class="table table-striped">
            <thead>
               <tr>
                  <th>S.No</th>
                  <th>Task</th>
                  <th>Date</th>
                  <th>Action</th>
                  
               </tr>
            </thead>
            <tbody>
               <?php
                  $i=1;
                  $sql="select * from task";
                  $query=mysqli_query($conn,$sql);
                  if($row=mysqli_num_rows($query) > 0){
                     while($result=mysqli_fetch_array($query)){
                   ?>   
               <tr>
                  <td><?= $i?></td>
                  <td><?= substr($result['message'], 0,100); ?></td>
                  <td><?= $result['created_at']; ?></td>
                  <td><a href="task_view.php?id=<?php echo $result['t_id'] ?>" class="text-warning"><i class="fa-solid fa-eye" title="view"></i></a></td>
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