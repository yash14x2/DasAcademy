
<?php
include_once("dbconnection.php");
include("./mainincludes/header.php");
?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./phothos/course3.jpg" alt="" style="height:300px; width:100%; object-fit:cover; box-shadow:10px;">
    </div>
</div>

<div class="container jumbotron mb-5" style="background-color: #C8C8C8;">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3 mt-5">
                If Already Registered !! Login
            </h5>
            <form id="loginform">
  

      <div class="mb-3">
  <div class="form-group">
      <i class="fas fa-envelope"></i><label for="stulogemail" class="pl-2 font-weight-bold mb-1"><strong>Email</strong></label><small id="stulogmsg1"></small><input type="email" class="form-control" id="stulogemail" placeholder="Email" name="stulogemail" autofill="off" ><small class="form-text">we'll never share your email with anyone else.</small>
    </div>
</div>
  
  <div class="mb-3">
  <div class="form-group">
      <i class="fas fa-key"></i><label for="stuplogpass" class="pl-2  mb-1"><strong>Password</strong></label><small id="stulogmsg2"></small><input type="password" class="form-control" id="stulogpass" placeholder="Email" name="stulogpass">
    </div>

  </div>


      <button type="button" class="btn btn-primary" onclick="checklogin()">Login</button>
        
      
  
  
  
</form><br/>
<small id="statuslogmsg"></small>
                </div>
                <div class="col-md-6 offset-md-1">
    <h5 class="mb-3 mt-5">New User !! Sign In</h5>



<form id="clearform" name = "clearform">
  <div class="mb-3">
    <div class="form-group">
      <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold mb-1"><strong>Name</strong></label><small id="stumsg1"></small><input type="text" class="form-control" id="stusignname" placeholder="Name" name="stusignname" autocomplete="off">
    </div>
  </div>
  <div class="mb-3">
  <div class="form-group">
      <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold mb-1"><strong>Email</strong></label><small id="stumsg2"></small><input type="email" class="form-control" id="stusignemail" placeholder="Email" name="stusignemail" autocomplete="off"><small class="form-text">we'll never share your email with anyone else.</small>
    </div>
</div>
  <div class="mb-3">
  <div class="form-group">
      <i class="fas fa-key"></i><label for="stusignpass" class="pl-2  mb-1"><strong>New Password</strong></label><small id="stumsg3"></small><input type="password" class="form-control" id="stusignpass" placeholder="Password" name="stusignpass">
    </div>

  </div>
  
    
      <button type="button" class="btn btn-primary" onclick="addstu()" id="signup">Sign Up</button>
    
        
      
  
  
  
</form><br/>
<span id="successMsg1"></span>

                
        
            
            
            
        </div>
        
        
        
        



    </div>
</div>
    
    

    


<?php
include('contactus.php');
?>


<?php
include('./mainincludes/footer.php');
?>