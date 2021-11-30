function getCategory(value){
   
    
    if(value =="default"){
        document.getElementById('form_link').setAttribute('href','#');
    }
 
    if(value =="1"){
        document.getElementById('form_link').setAttribute('href','http://localhost/theredapp/profile/realestate-ad.php');
    }
    if(value =="2"){
        document.getElementById('form_link').setAttribute('href','http://localhost/theredapp/profile/jobs-ad.php');
    }
    if(value =="3"){
        document.getElementById('form_link').setAttribute('href','http://localhost/theredapp/profile/cars-ad.php');
    }

    if(value !="1" && value!="2" && value!="3"){
        document.getElementById('form_link').setAttribute('href','http://localhost/theredapp/profile/new-ad.php');

    }

}