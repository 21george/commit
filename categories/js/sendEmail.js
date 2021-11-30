$(document).ready(function (){

    $("#btnSubmit").click(function (event){
        event.preventDefault();
        //alert("Clicked");
        //Get The form
        var form = $('#emailForm')[0];

        //create FormData object

        var data = new FormData(form);

        //disable the submition
        $("#btnSubmit").prop("disabled",true);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "../php/send-email.php",
            data: data,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache : false,
            timeout:600000,
            success: function (data) {
                

                $('.message').removeClass('d-none');
                if(data.type=="success"){
                    console.log("Success:",data.message);
             // <i class = "fa fa-check-circle"></i>
             $('.message').removeClass('message-bgdanger');
             $('.message').addClass('message-bgcolor');
             $('.message-icon').html('<i class = "fa fa-check-circle"></i>');
             $('.fail').html(data.type);
             $('.u-italic').html('<i class = "fa fa-paper-plane"></i> '+data.message);
             console.log("Success:",data.message);
             //enable the submition
               $("#btnSubmit").prop("disabled",false);
                }
                else if(data.type=="error"){
                                 // <i class = "fa fa-check-circle"></i>
                $('.message').removeClass('message-bgcolor');
                $('.message').addClass('message-bgdanger');
                $('.message-icon').html('<i class = "fa fa-times"></i>');
                $('.fail').html(data.type);
                $('.u-italic').html('<i class = "fa fa-chain-broken"></i> '+data.message);
                console.log("Fail:",data.message);
                //enable the submition
             $("#btnSubmit").prop("disabled",false);
                }

                function closeMessage(m){
                    m.addClass('d-none');
                }

                setTimeout(function(){
                    closeMessage($('#closeMe'));
                },5000);
   
            },
            error: function (e){
                console.log("Error:",e);  
                $("#btnSubmit").prop("disabled",false);
            }
        })
    })
});