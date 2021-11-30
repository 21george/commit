
$(document).ready(function(){
  printComment();
  function printComment(){
     var post_id = $('#post_id').val();
     $.ajax({
       url:"../php/get-comments.php",
       method:"POST",
       data:{post_id:post_id},
       success:function(data){
        
         $('#my-container').html(data);
       }

     });
  }
    $('#post_comment').on('submit', function(event){
     event.preventDefault();
     var form_data = $(this).serialize();
     var sender_name = document.getElementById("comment_name").value;
     $.ajax({
      url:"../php/add-comment.php",
      method:"POST",
      data:form_data,
      dataType:"json",
      success:function(data)
      {
        //alert(data);
        console.log(data);
        if(data.msg =='success'){
          $('#comment_notification').html('<h1 class=" text-center text-success p-2">Comment of '+sender_name+' has added comment!</h1>');
        printComment();
        }
        else{
          $('#comment_notification').html('<h1 class=" text-center text-danger p-2">Comment of '+sender_name+' has not been added!</h1>');
        }
    
     }
    });
  
});

$(document).on('click','.reply',function(){
  var new_comment_id = $(this).attr("id");
  $('#comment_id').val(new_comment_id);
  $('#comment_name').val('');
  $('#comment_email').val('');
  $('#comment_body').val('');
  $('#comment_name').focus();

})
});