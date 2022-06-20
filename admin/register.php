<?php include "../auth/auth.php"; ?>
<?php include "header.php" ?>	
      <div class="container" style="margin-top:50px;">
         <fieldset>
            <div class="well">
               <legend>
                  <center>
                     <h2><b>Registration Form</b></h2>
                  </center>
               </legend>
               <br>
               <?php 
                  if(isset($_SESSION['success'])) 
                  { 
                         echo "<span id='session_success' class='session_success'>".$_SESSION['success']."</span>";
                          unset($_SESSION['success']);
                  }
                  if(isset($_SESSION['error'])) 
                  { 
                         echo "<span id='session_error' class='session_error'>".$_SESSION['error']."</span>";
                          unset($_SESSION['error']);
                  }
                  ?>
               <form class="form-horizontal" action="insert.php" method="post"  id="contact_form">
                  <div class="form-group">
                     <label class="col-md-4 control-label"></label>  
                     <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                           <input  name="name" placeholder="Name" id="name" class="form-control"  type="text">
                        </div>
                        <span class="text-danger msg1"></span>
                     </div>
                  </div>
                  <!-- Email -->
                  <div class="form-group">
                     <label class="col-md-4 control-label"></label>  
                     <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                           <input name="email" id="email" placeholder="E-Mail Address" class="form-control"  type="text">
                        </div>
                        <span class="text-danger msg2"></span>
                     </div>
                  </div>
                  <!-- Password input-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" ></label> 
                     <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                           <input name="password" id="password" name="password" placeholder="Password" class="form-control"  type="password">
                        </div>
                        <span class="text-danger msg3"></span>
                     </div>
                  </div>
                  <!-- Department -->
                  <div class="form-group">
                     <label class="col-md-4 control-label"></label>
                     <div class="col-md-4 selectContainer">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                           <select name="department" id="department" class="form-control selectpicker">
                              <option value="">Select Your Department</option>
                              <option value="web-devlopment">Web Devlopment</option>
                              <option value="seo">SEO</option>
                           </select>
                        </div>
                        <span class="text-danger msg4"></span>
                     </div>
                  </div>
                  <!-- Role -->
                  <div class="form-group">
                     <label class="col-md-4 control-label"></label>
                     <div class="col-md-4 selectContainer">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                           <select name="role" id="role" class="form-control selectpicker">
                              <option value="">Select Your Role</option>
                              <option value="admin">Admin</option>
                              <option value="employee">Employee</option>
                           </select>
                        </div>
                        <span class="text-danger msg4"></span>
                     </div>
                  </div>
                  <!-- <div  class="form-group">
                     <label class="col-md-4 control-label" ></label> 
                        <div class="col-md-4 inputGroupContainer">
                         <p style="text-align: center;">Already have an account? <a href="index.php">Sign in</a>.</p>
                       </div>
                     </div> -->
                  <!-- Button -->
                  <div class="form-group">
                     <label class="col-md-4 control-label"></label>
                     <div class="col-md-4">
                        <button type="submit" name="submit" id="submit" class="btn btn-warning btn-block" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRegister <span class="glyphicon glyphicon-send"></span></button>
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
      <script scr="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script>
         $(document).ready(function(){
           $('#submit').click(function(){
           	if(($('#name').val().trim()).length=='')
           	{
           		$name="Name Field is required";
           		$(".msg1").text($name);
           		$('#name').attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
           		return false;
           	}else{
           		$(".msg1").text('');
           		$('#name').attr('style', "border-radius: 5px; border:green 1px solid;");
           	}
           	if(($('#email').val().trim()).length=='')
           	{
           		$name="Email Field is required";
           		$(".msg2").text($name);
           		return false;
           	}else if(IsEmail($('#email').val()) == false) 
           	{
               $name="Not Valid Email";
           		$(".msg2").text($name);
                return false;
             }
           	else{
           		$(".msg2").text('');
           		$('#email').attr('style', "border-radius: 5px; border:green 1px solid;");
           	}
           	if(($('#password').val().trim()).length=='')
           	{
           		$name="Password Field is required";
           		$(".msg3").text($name);
           		return false;
           	}else{
           		$(".msg3").text('');
           		$('#password').attr('style', "border-radius: 5px; border:green 1px solid;");
           	}
           	if(($('#department').val().trim()).length=='')
           	{
           		$name="Department Field is required";
           		$(".msg4").text($name);
           		return false;
           	}else{
           		$(".msg4").text('');
           		$('#department').attr('style', "border-radius: 5px; border:green 1px solid;");
           	}
           
           });
           function IsEmail(email) {
                   var regex =/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                   if (!regex.test(email)) {
                       return false;
                   }
                   else {
                       return true;
                   }
               }
         
         
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