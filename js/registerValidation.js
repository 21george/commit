$(document).ready(function(){

    var password_reg = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$\^&\*])(?=.{6,})");
    var password ="";
    var confirm ="";

    $("#password").focusout(function(){
        var password_store = $.trim($("#password").val());
        // alert(password_store);
        $(".password_label").show();
        if(password_store.length == ""){
            $(".password-error").html("Password is required!");
            password = "";
        }
        else if(password_reg.test(password_store)){
            $(".password-error").html("<div class='successful'><i class='fa fa-check-circle'></i> Your Password is Strong</div>");
            $(".password_label").hide();
            password = password_store;
        }
        else {
            $(".password-error").html("<div class='successful'>Password must be at least 6 characters; must contain at least one lowercase, one uppercase, one numeric digit, and one special character!</div>");
            $(".password_label").show();
            password = "";
        }
    })


    $("#confirm-password").focusout(function(){
        var confirm_password_store = $.trim($("#confirm-password").val());
        // alert(password_store);
        $(".confirm_password_label").show();
        if(confirm_password_store.length == ""){
            $(".confirm-password-error").html("Password is required!");
            $(".confirm_password_label").show();
            confirm = "";
        }
        else if(confirm_password_store != password){
            $(".confirm-password-error").html("<div class='unsuccessful'><i class='fa fa-exclamation-circle'></i> Passwords didn't match</div>");
            $("#confirm-password").val('');
            $(".confirm_password_label").hide();
            confirm = "";
        }
        else {
            
           confirm = confirm_password_store;
        }
    }) //confirm pass

//Email validation

$("#email").focusout(function(){
    var email_store = $.trim($("#email").val());
    //alert(email_store);

    if(email_store !=""){
        $.ajax({
            type : "POST",
            url : "php/email-check.php",
            dataType : 'JSON',
            beforeSend : function(){
                $(".email-error").html('<i class="fa fa-spinner fa-pulse"></i>');
            },
            data:{email_check:email_store},
            success : function(data){
                // alert(data);
                setTimeout(function(){
                    if(data['response']=="email_success"){
                        $(".email").val("");
                        $(".email-error").html("<div class='unsuccessful'><i class='fa fa-exclamation-triangle'></i> The "+email_store+" is in our database! </div>");
                        //console.log('We have a positive match '+email_store+' is in our db');
                    }
                    else{
                        $(".email_label").hide();
                        $(".email-error").html("<div class='unsuccessful'><i class='fa fa-check'></i> Great continue with registration </div>");
                       // console.log('This email is not in our db We are good to proceed');
                    }
                },1700);

            }
        })

    }

})//email

});