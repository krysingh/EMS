<?php include "../auth/auth.php"; include("config.php");?>
<?php
if(isset($_GET['id']))
{
   $id=$_GET['id'];

   $sq="select * from emp_leave where assign_to=$id";
   $qry=mysqli_query($conn,$sq);
   $res=mysqli_fetch_array($qry); 
}
?>
<?php include "header.php" ?> 
      <div class="container" style="margin-top:50px;">
      <fieldset>
         <div class="well">
            <legend>
                 <h2><b>Assign Leave</b><a href="all_leave_view.php" class="btn btn-primary" style="float:right"><i class="fa-solid fa-rotate-left" title="back"></i></a></h2>
            </legend>
            <br>
            <?php 
               if(isset($_SESSION['success1'])) 
               { 
                      echo "<span id='session_success' class='session_success'>".$_SESSION['success1']."</span>";
                       unset($_SESSION['success1']);
                   }
            ?>
            <form class="form-horizontal" action="leave_update.php" method="post"  id="contact_form">
               <div class="form-group">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="col-md-2 selectContainer">
                           <h5><b>Employee List</b></h5>
                           <input type="hidden" name="assigned_by" value="<?php echo $_SESSION['id']; ?>">
                           <input type="hidden" name="assign_to" value="<?php echo $res['assign_to']; ?>">
                           <div class="input-group">
                              <?php
                                 $i=1;
                                 $sql="select * from `user` where role!='admin' order by id desc";
                                 $query=mysqli_query($conn,$sql);
                                 if($row=mysqli_num_rows($query) > 0){
                                    while($result=mysqli_fetch_array($query)){
                                      
                                 ?>   
                              <div class="checkbox">
                                 <label><input type="checkbox" class="emp" id="emp" value="<?php echo $result['id']?>" <?php if($result['id'] == $_GET['id']) {echo "checked";}else{echo "disabled";} ?> name="emp[]" class="form-control emp"><?php echo $result['name']?></label>
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
                                 <input type="text" value="<?= $res['v_from'];?>" name="v_from" id="datepicker1" class="form-control v_from">
                                 <span class="text-danger msg5"></span>
                              </div>
                           </div>
                           <br>

                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Date To">Valid Date To : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="v_to" value="<?= $res['v_to'];?>" id="datepicker2" class="form-control datepicker2 v_to">
                                 <span class="text-danger msg6"></span>
                              </div>
                           </div>
                           <br>

                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Earn Leave">Earn Leave : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" value="<?= $res['e_leave'];?>" name="e_leave" id="e_leave" class="form-control">
                              </div>
                           </div><br>
                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Casual Leave">Casual Leave : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="c_leave" value="<?= $res['m_leave'];?>" id="c_leave" class="form-control">
                              </div>
                           </div><br>
                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Casual Leave">Medical Leave : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="m_leave" value="<?= $res['m_leave'];?>" id="m_leave" class="form-control">
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
                           <span style="float:right !important;"><button value="Submit" type="submit" name="submit" id="leave_edit" class="btn btn-primary submit" ><i class="fas fa-save"></i> Submit</button>
                           <a href="all_leave_view.php" class="btn btn-danger"><i class="fa-solid fa-rectangle-xmark"></i> Cancel</a>
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