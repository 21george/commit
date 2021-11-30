
function selectPaymentMethod(val){
    if(val !="free"){
        document.querySelector("#dates_box").classList.remove('d-none');
    }
    else{
        document.querySelector("#dates_box").classList.add('d-none');
    }
}


function getDates(){
    
    var startDate = new Date(document.getElementById("startDate").value);
    var todayDate = new Date();
    var selectedDay  = startDate.getDate();
    var today = todayDate.getDate();
    // console.log(today);
    // console.log("Selecetd date is"+selectedDay);
    if(today == selectedDay){
    
        var endDate = new Date(document.getElementById("endDate").value);
        totalDays = parseInt((endDate-startDate)/(24*3600*1000));

        if(totalDays>1){
            return totalDays;
        }
        else{
            return "You need to select the end date to be bigger than start date";
        }
    }
    else{
        alert("Please select today's date");
        document.getElementById("startDate").value= "";
    }
}

function calculatePrice(){
 var days = getDates();

 if(days<15){
     alert("The minimum is 15 days");
     document.getElementById("endDate").value= "";
     document.getElementById("daysCalculated").value= "";
     document.getElementById("priceCalculated").value= "";
     return sum ="Min is 15 days";
 }
 else{
     var sum = days*1;
     return sum;
 }
}

function numDays(){

if(document.getElementById("startDate") && document.getElementById("endDate")){
    document.getElementById("daysCalculated").value = getDates()+" -days";
    document.getElementById("priceCalculated").value = calculatePrice();
}
}