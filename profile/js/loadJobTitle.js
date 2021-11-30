$(document).ready(function(){

    $('#job_classification').on('change',function(){

        var e = document.getElementById("job_classification");
        var category_id = e.options[e.selectedIndex].value;
       // var categoryID = e.options[e.selectedIndex].text;
        // categoryID = categoryID.toLowerCase();
        // categoryID = categoryID.replace(/ /g,'_');
        // alert(categoryID);
        //alert(category_id);
        if(category_id !="default"){

            $.ajax({

                type:'POST',
                url:'../php/loadJobs.php',
                data:{category_id:category_id},
                success:function(feedback){
                  
                    $('#specific_job').html(feedback);
                }
            });
        }else{
            $('#specific_job').html('<option value="">Select Job Occupation first</option>');
        }

    })
});