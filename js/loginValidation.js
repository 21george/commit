$(document).ready(function(){

    $("#submit-registration").click(function(){

        var email = $.trim($("#login-email").val());
        var password = $.trim($("#login-password").val());

      
        
        if(email.length ==""){
            $(".login-email-msg").html("Email Field is Required");
            email="";
        }
        if(password.length == ""){
            $(".login-password-msg").html("Password Field is Required");
            password="";
        }

        if(password !="" && email !=""){
            $.ajax({
                type : 'POST',
                url : 'php/login-user.php',
                dataType : 'JSON',
                data : {'login-email' : email, 'login-password' :password},
                success : function(data){
                   if(data.msgcode == "success"){
                       //console.log("Both Password and Email are Ok. We need to redirect User");
                       $(".progress").removeClass("d-none");
                       $(".error-msg").hide();
                       var elem = document.getElementById("my-pbar");
                       var width = 1;
                       var id = setInterval(frame,10);
                       function frame(){
                           if(width >= 100){
                               clearInterval(id);
                           }
                           else{
                               width++;
                               elem.style.width = width +'%';
                           }
                       }
                       setTimeout(function(){
                           location = data.msg;
                       },2000);

                   }
                  else if(data.msgcode == "no_password"){
                   // console.log("Password unknown " + data['msgcode']);
                   $(".error-msg").html("<div class='unsuccessful'><i class='fa fa-lock'></i> Wrong Password </div>");
                }
                else if(data.msgcode == "no_email"){
                    //console.log("Email unknown " + data['msgcode']);
                    $(".error-msg").html("<div class='unsuccessful'><i class='fa fa-at'></i> Wrong Email </div>");
                }
                }
            })
        }

    });
});