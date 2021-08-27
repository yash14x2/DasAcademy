<?php

if(!isset($_SESSION)){
    session_start();
}
include("./admin include/sidebarcommon.php");
include_once ('../dbconnection.php');


if(isset($_SESSION['is_adminlogin'])){
$adminemail=$_SESSION['adminlogemail'];
}

else {
    echo "<script> location.href='../index.php';</script>";
}
$adminemail=$_SESSION['adminlogemail'];
if(isset($_REQUEST['requpdate'])){
    if($_REQUEST['confirm_password'] == ""){
$passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2 role="alert">Fill All Fields</div>';

    }

    else{

        if($_REQUEST['new_password'] != $_REQUEST['confirm_password']){
            $passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2 role="alert">Password not matching</div>';

        }
        else {
            
        $sql="SELECT * FROM admin WHERE admin_email = '$adminemail'";
        $result=$conn->query($sql);
        if($result->num_rows == 1){
            $adminpass=$_REQUEST['confirm_password'];
            $sql = "UPDATE admin SET admin_pass = '$adminpass' WHERE admin_email = '$adminemail'";
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
                <input type="password"  class="form-control" placeholder="Email" name="Email"   value="<?php if(isset($_SESSION['adminlogemail'])) { echo $adminemail; }?>"      readonly> 
            </div>
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="password" value="" class="form-control" placeholder="New Password" name="new_password"> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="password" value="" class="form-control" placeholder="Confirm Password" name="confirm_password"> 
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
include("./admin include/afooter.php")
?>