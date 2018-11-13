 
 	$("#register_form").submit(function(){
     if($("#password").val()!=$("#confirm-password").val())
     {
         alert("password and confirm password should be same");
         return false;
     }
 })
 