<?php include "../auth/auth.php"; include("config.php");?>
<?php include "header.php" ?> 
      <div class="container" style="margin-top:50px;">
      <fieldset>
         <div class="well">
            <legend>
                  <h2><b>Assign Leave</b><span style="float:right"><a href="all_leave_view.php" class="btn btn-primary" ><i class="fa-solid fa-list"></i> Leave List</a> <a href="all_applied_leave.php" class="btn btn-success"><i class="fa-solid fa-list-check"></i> Applied Leave</a></span></h2>
            </legend>
            <br>
            <?php 
               if(isset($_SESSION['success'])) 
               { 
                      echo "<span id='session_success' class='session_success'>".$_SESSION['success']."</span>";
                       unset($_SESSION['success']);
                   }
               ?>
            <form class="form-horizontal" action="leave_insert.php" method="post"  id="contact_form">
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
                                 <label><input type="checkbox" class="emp" id="emp" value="<?php echo $result['id']?>" name="emp[]" class="form-control emp"><?php echo $result['name']?></label>
                              </div>
                              
                              <?php }}?>
                              
                           </div>
                           <span class="text-danger msg4"></span>
                        </div><br>
                        <div class="col-lg-10">
                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Date From">Valid Date From : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="v_from" id="datepicker1" class="form-control v_from" autocomplete="off">
                                 <span class="text-danger msg5"></span>
                              </div>
                           </div>
                           <br>

                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Date To">Valid Date To : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="v_to" id="datepicker2" class="form-control datepicker2 v_to" autocomplete="off">
                                 <span class="text-danger msg6"></span>
                              </div>
                           </div>
                           <br>

                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Earn Leave">Earn Leave : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="e_leave" id="e_leave" class="form-control" autocomplete="off">
                              </div>
                           </div><br>
                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Casual Leave">Casual Leave : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="c_leave" id="c_leave" class="form-control" autocomplete="off">
                              </div>
                           </div><br>
                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Casual Leave">Medical Leave : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="m_leave" id="m_leave" class="form-control" autocomplete="off">
                              </div>
                           </div>
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
                           <span style="float:right !important;"><button type="submit" value="Submit" type="submit" name="submit" id="leave_submit" class="btn btn-primary submit" ><i class="fas fa-save"></i> Submit</button>
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