

// /name="radio_price"
//post_price
$(document).on('click','[name="radio_price"]', function(){

   var radioInput = document.querySelector('input[name="radio_price"]:checked').value;
   if(radioInput == "amount" || radioInput =="negotiable"){
       document.getElementById("post_price").removeAttribute("readonly");
   }
   else{
    document.getElementById("post_price").readOnly=true;
    document.getElementById("post_price").value='';
   }
});