<?php include "../auth/auth.php"; include("config.php");?>
<?php include "header.php" ?> 
      <div class="container" style="margin-top:50px;">
      <fieldset>
         <div class="well">
            <legend>
               
                  <h2><b>Assign Task</b><a href="all_task_view.php" class="btn btn-primary" style="float:right"><i class="fa-solid fa-list-check"></i> Task</a></h2>
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
                           <span style="float:right !important;"><button type="submit" name="submit" id="submit" class="btn btn-primary" ><i class="fas fa-save"></i> Submit</button>
                           <button type="submit" name="cancel" id="cancel" class="btn btn-danger" ><i class="fa-solid fa-rectangle-xmark"></i> Cancel</button></span>
                        </div>
                     </div>
                  </div>  
               </div>       
            </form>
      </fieldset>
      </div>
      </div>
      </div><!-- /.container -->
     <?php include "footer.php" ?>