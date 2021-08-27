<?php
include_once ('../dbconnection.php');
include("./studentsinclude/studentheader.php");
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['is_login'])){
$stunemail=$_SESSION['stulogemail'];
}

else {
    echo "<script> location.href='../index.php';</script>";
}


$sql="SELECT * FROM student WHERE stu_email = '$stunemail'";
$result = $conn->query($sql);
if($result->num_rows==1){
$row=$result->fetch_assoc();
$stuid=$row['stu_id'];
$stuname=$row['stu_name'];
$stuocc=$row['stu_occ'];
$stuimg=$row['stu_img'];
}

if(isset($_REQUEST['updatestunamebtn']))
{
    if($_REQUEST['stuname'] == "" || !is_uploaded_file($_FILES['stuimg']['tmp_name']))
    {
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }
    else
    {
        $stuname=$_REQUEST['stuname'];
        $stuocc=$_REQUEST['stuocc'];
        $stuimg=$_FILES['stuimg']['name'];
        $stuimg_tmp=$_FILES['stuimg']['tmp_name'];
        $stuimg_folder='../phothos/studentimg/' . $stuimg;
        move_uploaded_file($stuimg_tmp,$stuimg_folder);
        $sql="UPDATE student SET stu_name = '$stuname' , stu_occ = '$stuocc' , stu_img = '$stuimg_folder' WHERE stu_email = '$stunemail'";
        
        
        echo '<img src="'. $stuimg_folder .'" id="stu_image_path"  alt="studentimg" class="img-thumbnail round-circle" style="display:none;">';

        if($conn->query($sql) == TRUE)
        {
            $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
            
        }
    }
}
?>

    <div class="col-sm-6">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="stuid">Student Id</label>
        <input type="text" class="form-control" name="stuid" value="<?php
        if(isset($stuid)) { echo $stuid;}?>" readonly>
    </div>
    <div class="form-group">
        <label for="stuid">Email</label>
        <input type="text" class="form-control" name="stuemail" value="<?php
        if(isset($stunemail)) { echo $stunemail;}?>" readonly>
    </div>
    <div class="form-group">
        <label for="stuid">Name</label>
        <input type="text" class="form-control" id="stuname" name="stuname" value="<?php
        if(isset($stuname)) { echo $stuname;}?>">
    </div>
    <div class="form-group">
        <label for="stuid">Occupation</label>
        <input type="text" class="form-control" name="stuocc" value="<?php
        if(isset($stuocc)) { echo $stuocc;}?>">
    </div>
    <div class="form-group">
        <label for="stuid">Upload Image</label>
        <input type="file" class="form-control" name="stuimg">
    </div>
    <button type="submit" class="btn btn-primary" name="updatestunamebtn">Update</button>
    <?php if(isset($passmsg)) {echo $passmsg ; } ?>
    </form>
    </div>

    <script>
        window.onload = (event) => {
            document.getElementById('course_image').src = document.getElementById('stu_image_path').src;
        };
    </script>


<?php
include("./studentsinclude/studentfooter.php")
?>