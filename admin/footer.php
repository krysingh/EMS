 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
 <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
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
        });
 </script>
 <!-- ---------------------Leave----------------------------- -->
  <script>
         $(document).ready(function(){
            $("#leave_submit").click(function(){
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

     <!--  --------------------LeaveEdit--------------- -->

      <script>
         $(document).ready(function(){
            $("#leave_edit").click(function(){
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
     
   </body>
</html>