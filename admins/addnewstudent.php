<?php
include("./admin include/sidebarcommon.php");
include_once ('../dbconnection.php');


if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['is_adminlogin'])){
$adminemail=$_SESSION['adminlogemail'];
}

else {
    echo "<script> location.href='../index.php';</script>";
}
if(isset($_REQUEST['stusubmit'])){

    
    if($_REQUEST['stu_name'] == "" || $_REQUEST['stu_email'] == "" || $_REQUEST['stu_pass'] == "" || $_REQUEST['stu_occ'] == ""){

        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Field</div>';
        }
        
else{

    $stu_name = $_REQUEST['stu_name'];
    $stu_email=$_REQUEST['stu_email'];
    $stu_pass=$_REQUEST['stu_pass'];
    $stu_occ = $_REQUEST['stu_occ'];
     $sql="INSERT INTO student (stu_name , stu_pass , stu_email ,stu_occ ) VALUES ('$stu_name' , '$stu_email' , '$stu_pass',   '$stu_occ'  )";

     if($conn->query($sql) == TRUE){
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Succesfully</div>';

     }

     else{

        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">unable to add course</div>';

     }
}
}

?>

<div class="col-sm-6 mt-1 mx-3  jumbotron">
    <h3 class="text-center ">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data" class="jumbotron">
<div class="form-group">
    <label for="Student_Name">Student Name</label>
    <input type="text" class="form-control" id="stu_name" name="stu_name">
</div>


<div class="form-group">
    <label for="Email">Email</label>
    <input type="text" class="form-control" id="stu_email" name="stu_email">
</div>


<div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="stu_pass" name="stu_pass">
</div>

<div class="form-group">
    <label for="Student_occupation">Student occupation</label>
    <input type="text" class="form-control" id="stu_occ" name="stu_occ">
</div>



<div class="text-center">
    <button type="submit" class="btn btn-danger" id="stusubmit" name="stusubmit">Submit</button>
    <a href="students.php" class="btn btn-secondary">Close</a>
</div>
<?php
if(isset($msg))
{echo $msg;
}
?>

</form>

</div>

<?php
include("./admin include/afooter.php")
?>