// function admincall()
// {

//     function clear(){
//         $("#adminloginform").trigger("reset");
//         $("#adminemail").html('');
//         $("#adminpass").html('');
        
    
//     }
//     console.log("button");
//     var adminogemail = $("#adminemail").val();
//     var adminogpass = $("#adminpass").val();
//         if(adminogemail.trim() == ""){

//             $("#logmsg1").html('<small style="color:red;">Please Enter Email Id</small>');
//             $("#logmsg1").focus();
//             return false;
        

//         }
        
// else if(adminogpass.trim() == "")
// {

// $("#logmsg2").html('<small style="color:red;">Please Enter Password!</small>');
// $("#logmsg2").focus();
// return false


// }   

// else{
//     console.log("ok");
// }

// }
function admincall()
{

    function clear(){
        $("#adminloginform").trigger("reset");
        $("#adminemail").html('');
        $("#adminpass").html('');
        
    
    }
    var adminlogemail = $("#adminemail").val();
    var adminlogpass = $("#adminpass").val();
        if(adminlogemail.trim() == ""){

            $("#logmsg1").html('<small style="color:red;">Please Enter Email Id</small>');
            $("#logmsg1").focus();
            return false;
        

        }
        
else if(adminlogpass.trim() == "")
{

$("#logmsg2").html('<small style="color:red;">Please Enter Password!</small>');
$("#logmsg2 ").focus();
return false


}   
        else{

    $.ajax({
        url : "./admins/adminlog.php" , 
        method : "POST" ,
        data :{
            checklogemail:"checklogemail",
            adminlogemail:adminlogemail , 
            adminlogpass:adminlogpass,
             },
             success:function(data){

                console.log('success')
                console.log(data)
                if(data == 1)
                {
                
            

                    setTimeout(()=>{
                        window.location.href = "./admins/admindashboard.php";
                    } , 1000);
                    clear();
                } 

                else if(data == 0)
                {

                    $("#statusadminlogmsg").html("<small class='alert alert-danger'>Invalid Email Or Password ! </small>");
                    clear();
                    
                }




                    
                 
             },
            

        

        

    });
 
}

}





