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
      <?php 
         if(isset($_SESSION['success'])) 
         { 
                echo "<span id='session_success' class='session_success'>".$_SESSION['success']."</span>";
                 unset($_SESSION['success']);
         }
         
         ?>
      <div class="container well" style="margin-top:50px;">
      <fieldset>
            <legend>
               <center>
                   <h2><b>Assigned Leave</b></h2>
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
                  
               
                  
               </tr>
            </thead>
            <tbody>
               <?php
                  $i=1;
                  $id=$_SESSION['id'];
                  $sql="select * from emp_leave el join user u on el.assign_to=u.id where u.id=$id";
                  $query=mysqli_query($conn,$sql);
                  if($row=mysqli_num_rows($query) > 0){
                     while($result=mysqli_fetch_array($query)){
                   ?>   
               <tr>
                  <td><?= $i?></td>
                  <td><?= $result['name'] ?></td>
                  <td class="v_from"><?= $result['v_from'] ?></td>
                  <td class="v_to"><?= $result['v_to']; ?></td>
                  <td class="emleave"><?= $result['e_leave']; ?></td>
                  <td class="cleave"><?= $result['c_leave']; ?></td>
                  <td class="mleave"><?= $result['m_leave']; ?></td>
                 
               </tr>
               <?php $i++; } }else{
                  echo "<tr><td colspan='4'>No Records Found</td></tr>";
               }?>
            </tbody>
         </table>
      </div>
      </div>
      </div><!-- /.container -->
      <div class="container well" style="padding: 30px;">
         <div class="row">
            <div class="col-md-6 col-md-offset-5">
            <a href="all_applied_leave.php" class="btn btn-primary">All Applied Leave</a></div>
         </div><br>
         <div class="row">

             <form class="form-horizontal" action="leave_insert.php" method="post"  id="contact_form">
               <div class="form-group">
                  <div class="row">
                     <div class="col-lg-12">
                        <input type="hidden" name="assign_by" value="<?php echo $_SESSION['id']; ?>">
                        <div class="col-lg-12">
                           <div class="row">

                              <div class="col-lg-2">
                                 <label for="Date From">Valid Date From : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="date" name="l_from" id="v_from" class="form-control v_from" onblur="checkFrom(this.value)">
                                 <span class="text-danger msg5"></span>
                              </div>
                           </div>
                           <br>

                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Date To">Valid Date To : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="date" name="l_to" id="v_to" class="form-control datepicker2 v_to" onblur="checkFrom(this.value)">
                                 <span class="text-danger msg6"></span>
                              </div>
                           </div>
                           <br>

                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Earn Leave">Earn Leave : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="e_leave" id="e_leave" onblur="checkemleave(this.value)" class="form-control">
                                <span class="text-danger msg7"></span>
                              </div>
                           </div>

                           <br>
                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Casual Leave">Casual Leave : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="c_leave" id="c_leave" onblur="checkcleave(this.value)" class="form-control">
                                 <span class="text-danger msg8"></span>
                              </div>
                           </div><br>
                           <div class="row">
                              <div class="col-lg-2">
                                 <label for="Casual Leave">Medical Leave : </label>
                              </div>
                              <div class="col-md-10">
                                 <input type="text" name="m_leave" onblur="checkmleave(this.value)" id="m_leave" class="form-control">
                                 <span class="text-danger msg9"></span>
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
                           <button type="submit" name="cancel" id="cancel" class="btn btn-danger" >Cancel</button></span>
                        </div>
                     </div>
                  </div>  
               </div>       
            </form>
         </div>
      </div>
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
      <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
      <script>
         function  checkFrom(str) {
            var validFrom=$('.v_from').text();
            var validTo=$('.v_to').text();
            // alert(validTo);
            var lfrm=str;
            // alert(lfrm);
            var date1 = new Date(validFrom);
            //alert(date1);
            var date2 = new Date(lfrm);
               //alert(date2);
            var diffDays1 = parseInt((date2 - date1) / (1000 * 60 * 60 * 24)); 
            //alert(diffDays1);
            var date3 = new Date(lfrm);
            var date4 = new Date(validTo);
            var diffDays2 = parseInt((date4 - date3) / (1000 * 60 * 60 * 24)); 
           // alert(diffDays2);
           if(diffDays1<=0){
               $error="Please fill Valid Form Date";
               $('.msg5').text($error);
               return false;
           }
           else if( diffDays2<=0){
             $error="Please fill Valid To Date";
             $('.msg6').text($error);
             return false;
           }else{
             $('.msg5').text("");
             $('.msg6').text("");
             return true;
           }
         }

         
          function checkcleave(str){
            var cleave=$('.cleave').text();
            var lfrm=str;
            if(cleave >= lfrm){
                $('.msg8').html("");
               return true;
            }else{
               $error="Please fill right Casual Leave";
               $('.msg8').html($error);
               return false;
            }
         }

          function checkmleave(str){
            var mleave=$('.mleave').text();
            var lfrm=str;
            if(mleave >= lfrm){
                $('.msg9').html("");
               return true;
            }else{
               $error="Please fill right Medical Leave";
               $('.msg9').html($error);
               return false;
            } 
         }

         // function checkemleave(str){
         //    var emleave=$('.emleave').text();
         //    var elfrm=str;
         //    //alert(elfrm);
         //    if(emleave >= elfrm){
         //       alert("hello");
         //        $('.msg7').html("");
         //        return true;
         //    }else{
         //       $error="Please fill right Earning Leave";
         //       $('.msg7').html($error);
         //       return false;
         //    }
         // }

      </script>
     <script type="text/javascript">
         $(document).ready(function(){
               setTimeout(function() {
                           $('#session_success').fadeOut('slow');
                       }, 2000);
         });
      </script>
   </body>
</html>