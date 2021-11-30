$(document).ready(function(){

    function unseenMessages(check=''){
        var uid = document.getElementById('user_id').value;
        
        $.ajax({
            url:"../php/getComments.php",
            method:"POST",
            data:{check:check,uid:uid},
            dataType:"json",
            success:function(data)
            {
                //alert(data);
                console.log(data.unseen_notification);
                $('.drop-men').html(data.notification);
               $('.countComments').html(data.unseen_notification);
            }
        });
    }

    unseenMessages();

    $(document).on('click','.unseen',function(){
        $(".dropdown").on("hidden.bs.dropdown", function(event){
            $('.countComments').html(0);
            unseenMessages('now-seen');
          }); 
    });


});