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
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Leave</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
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
                 <h2><b>Assign Leave</b><a href="all_leave_view.php" class="btn btn-primary" style="float:right">back</a></h2>
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
                           <span style="float:right !important;"><input value="Submit" type="submit" name="submit" id="submit" class="btn btn-primary submit" >
                           <a href="all_leave_view.php" class="btn btn-danger">Back</a>
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
      <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
      <script>
         $(document).ready(function(){
            $(".submit").click(function(){
               valid = true;
               if($('input[type=checkbox]:checked').length == 0)
               {
                  $error="Please check atleast one checkbox";
                  $('.msg4').text($error);
                  valid = false;
               }else{
                   $('.msg4').text('');
                  valid = true;
               }
            
               if($(".v_from").val()==''){
                  $error="Please fill The From Date";
                  $('.msg5').text($error);
                  valid = false;
               }else{
                  $('.msg5').text('');
                  valid = true;
               }

                if($(".v_to").val()==''){
                  $error="Please fill The To Date";
                  $('.msg6').text($error);
                  valid = false;
               }else{
                  $('.msg5').text('');
                  valid = true;
               }

                 return valid;
            });
               setTimeout(function()
               {
                  $('#session_success').fadeOut('slow');
               }, 2000);
         });
      </script>
      <script>
         var startDate;
         var endDate;
         $( "#datepicker1" ).datepicker({ 
            dateFormat:'yy-mm-dd',
            minDate : new Date()
         });
         $( "#datepicker2" ).datepicker({
            dateFormat:'yy-mm-dd'
         });

         $( "#datepicker1" ).change(function(){
            startDate=$(this).datepicker('getDate');
            // alert(startDate);
            $('#datepicker2').datepicker('option','minDate',startDate);
         });
          $( "#datepicker2" ).change(function(){
            endDate=$(this).datepicker('getDate');
            // alert(startDate);
            $('#datepicker1').datepicker('option','maxDate',endDate);
         });
      </script>
   </body>
</html>