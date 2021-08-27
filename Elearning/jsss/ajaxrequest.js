$(document).ready(function(){

    // ajax call form already exist
    $("#stusignemail").on("keypress blur" , function(){
        var stuemail = $("#stusignemail").val();
            
        $.ajax({

            url : "./students/addstudent.php" , 
            method:"POST" ,
            data:{
                checkmail:"checkmail",
                stuemail:stuemail,
            },

            success:function(data){

                //console.log(data);
                if(data != 0){
                    $("#stumsg2").html('<small style="color:red;">Email Id Already Used !</small>');
                    $("#signup").attr("disabled" , true)


                }

                else if(data= 1){

                    $("#stumsg2").html('<small style="color:Green;">There You Go !</small>');
                    $("#signup").attr("disabled" , false)


                }

            }

        })


    })

})



function addstu()

{
var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
var stuname = $("#stusignname").val();
var stuemail = $("#stusignemail").val();
var stupass = $("#stusignpass").val();

// checking form fields on form submission
if(stuname.trim() == "")
                {

    $("#stumsg1").html('<small style="color:red;">Please Enter Name!</small>');
    $("#stumsg1").focus();
    return false
                }

else if(stuemail.trim() == "")
                {

    $("#stumsg2").html('<small style="color:red;">Please Enter Email!</small>');
    $("#stumsg2").focus();
    return false


                } 
                else if(stuemail.trim() != "" &&  !reg.test(stuemail))
                {

    $("#stumsg2").html('<small style="color:red;">Please Enter A valid email eg:abc@gmail.com!</small>');
    $("#stumsg2").focus();
    return false


                } 


else if(stupass.trim() == "")
                {

    $("#stumsg3").html('<small style="color:red;">Please Enter Name!</small>');
    $("#stumsg3 ").focus();
    return false


                }  
                
else{

$.ajax({
        url : "./students/addstudent.php" , 
        method : "POST" ,
        data :{

            stuname:stuname ,
            stuemail:stuemail , 
            stupass:stupass,
             },
             success:function(data){
                 console.log(data);
                 if(data == 0,"OK")
                 {
                     $("#successMsg1").html("<span class='alert alert-success'>Registration Successful ! </span>");
                     clear();
                 } 

                 else if(data == 1,"failed")
                 {
                     $("#successMsg1").html("<span class='alert alert-success>Unable To Register</span>");
                     
                 }


             },
            

        

        

    });
    
}

}
function clear(){
    $("#clearform").trigger("reset");
    $("#stumsg1").html('');
    $("#stumsg2").html('');
    $("#stumsg3").html('');

}


//student login verification


function checklogin()
{

    function clear(){
        $("#loginform").trigger("reset");
        $("#stulogemail").html('');
        $("#stulogpass").html('');
        
    
    }
    var stulogemail = $("#stulogemail").val();
    var stulogpass = $("#stulogpass").val();
        if(stulogemail.trim() == ""){

            $("#stulogmsg1").html('<small style="color:red;">Please Enter Email Id</small>');
            $("#stulogmsg1 ").focus();
            return false;
        

        }
        
else if(stulogpass.trim() == "")
{

$("#stulogmsg2").html('<small style="color:red;">Please Enter Password!</small>');
$("#stulogmsg2 ").focus();
return false


}   
        else{

    $.ajax({
        url : "./students/studentlogin.php" , 
        method : "POST" ,
        data :{
            checklogemail:"checklogemail",
            stulogemail:stulogemail , 
            stulogpass:stulogpass,
             },
             success:function(data){

                console.log('success')
                console.log(data)
                if(data == 1)
                {
                
                    $("#statuslogmsg").html('<div class="spinner-border text-success" role="status"></div>');
                    setTimeout(()=>{
                        window.location.href = "index.php";
                    } , 1000);
                    clear();
                } 

                else if(data == 0)
                {

                    $("#statuslogmsg").html("<small class='alert alert-danger'>Invalid Email Or Password ! </small>");
                    clear();
                    
                }




                    
                 
             },
            

        

        

    });
 
}
}