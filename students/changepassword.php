<?php

if(!isset($_SESSION)){
    session_start();
}
include_once ('../dbconnection.php');
include("./studentsinclude/studentheader.php");
  

if(isset($_SESSION['is_login'])){
$stuemail=$_SESSION['stulogemail'];
}

else {
    echo "<script> location.href='../index.php';</script>";
}
$stuemail=$_SESSION['stulogemail'];
if(isset($_REQUEST['requpdate'])){
    if($_REQUEST['confirm_password'] == ""){
$passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2 role="alert">Fill All Fields</div>';

    }

    else{

        if($_REQUEST['new_password'] != $_REQUEST['confirm_password']){
            $passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2 role="alert">Password not matching</div>';

        }
        else {
            
        $sql="SELECT * FROM student WHERE stu_email = '$stuemail'";
        $result=$conn->query($sql);
        if($result->num_rows == 1){
            $studentpass=$_REQUEST['confirm_password'];
            $sql = "UPDATE student SET stu_pass = '$studentpass' WHERE stu_email = '$stuemail'";
            if($conn->query($sql)== TRUE){
                $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2 role="alert">Updated Success fully</div>';
            }
            else {
                $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2 role="alert">Unable To Update</div>';
            }
        
            }
        }

}

}

    





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

.pass_show{position: relative} 

.pass_show .ptxt { 

position: absolute; 

top: 50%; 

right: 10px; 

z-index: 1; 

color: #f36c01; 

margin-top: -10px; 

cursor: pointer; 

transition: .3s ease all; 

} 

.pass_show .ptxt:hover{color: #333333;} 

        </style>
</head>
<body>
    

	
		<div class="col-sm-4 pt-5" >
		    <form action="">
            <label>Eamail</label>
            <div class="form-group pass_show"> 
                <input type="text"  class="form-control" placeholder="Email" name="Email"   value="<?php if(isset($_SESSION['stulogemail'])) { echo $stuemail; }?>"      readonly> 
            </div>
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="text" value="" class="form-control" placeholder="New Password" name="new_password"> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show" style="color:red;"> 
                <input type="text" value="" class="form-control" placeholder="Confirm Password" name="confirm_password"> 
            </div> 
            <div> 
            <button type="submit" class="btn btn-primary" id="requpdate" name="requpdate">Update</button>
            
            </div> 
            
            <?php
            if(isset($passmsg)){

                echo  $passmsg;

            }
            
            ?>

            </form>
            
		</div>  

    
</body>

<script>
      
$(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');  
});
  

$(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  
</script>
</html>

    
<?php
include("./studentsinclude/studentfooter.php");
?>







