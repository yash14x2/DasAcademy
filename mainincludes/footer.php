<footer class="container-fluid bg-dark text-center p-2">
  <small class="text-white">Copyright &copy; 2021 || Designed By Dasacedemy || <a href="#login" data-bs-toggle="modal" data-bs-target="#adminModallogin"> Admin Login</a></small> 
</footer>
<!-- end of footer -->
      


<!-- start of modal registration -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="sturegModal" tabindex="-1" aria-labelledby="sturegModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sturegModalLabel">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <!-- start of student registraion -->
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
  
  
  
</form>
      <!-- end of student registration -->
      </div>
      <div class="modal-footer">
      <span id="successMsg1"></span>
    
      <button type="button" class="btn btn-primary" onclick="addstu()" id="signup">Sign Up</button>
    
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearform.reset()">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- end of modal regustration-->

















<!-- start of modal login -->

<div class="modal fade" id="stulloginmodal" tabindex="-1" aria-labelledby="stuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuModalLabel">Student Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
  
  
  
</form>
      </div>
      <div class="modal-footer">
      <small id="statuslogmsg"></small>
      <button type="button" class="btn btn-primary" onclick="checklogin()">Login</button>
        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>

<!-- end of login model -->



<!-- admiin login modal -->
<div class="modal fade" id="adminModallogin" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminModalLabel">Admin Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="adminloginform">
  

      <div class="mb-3">
  <div class="form-group">
      <i class="fas fa-envelope"></i><label for="adminemail" class="pl-2 font-weight-bold mb-1"><strong>Email</strong></label><small id="logmsg1"></small><input type="email" class="form-control" id="adminemail" placeholder="Email" name="adminemail" ><small class="form-text">we'll never share your email with anyone else.</small>
    </div>
</div>
  
  <div class="mb-3">
  <div class="form-group">
      <i class="fas fa-key"></i><label for="adminpass" class="pl-2  mb-1"><strong>Password</strong></label><small id="logmsg2"></small><input type="password" class="form-control" id="adminpass" placeholder="Email" name="adminpass">
    </div>

  </div>
  
  
  
</form>
      </div>
      <div class="modal-footer">
        <small id="statusadminlogmsg"></small>
      
      <button type="button" class="btn btn-primary" id="adminloginbtn" onclick="admincall()">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>

<!-- end of admin login model -->


 <script src="./jsss/jquery.js"></script>
 <script src="./jsss/poper.js"></script>
 <script src="./jsss/bootstrap.min.js"></script>
 
 <script src="./jsss/all.min.js"></script>
 <script src="./jsss/ajaxrequest.js"></script>
 <script src="./jsss/adminrequestajax.js"></script>
 
 

</body>
</html>