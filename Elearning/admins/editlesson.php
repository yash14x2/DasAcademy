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

if(isset($_REQUEST['requpdate']))
{
    if($_REQUEST['lesson_id'] == "" || $_REQUEST['lesson_name'] == "" )
    {
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill all fields</div>';
    }

    else{

        $lid=$_REQUEST['lesson_id'];
        $lesson_name= $_REQUEST['lesson_name'];
        $lesson_description=$_REQUEST['lesson_description'];
    //     $lesson_link=$_FILES['lesson_link']['name'];
    // $lesson_link_tmp=$_FILES['lesson_link']['tmp_name'];
    // $video_folder='../video/lessons_video/' . $lesson_link;
    
    // move_uploaded_file($lesson_link_tmp, $video_folder);


        

        $sql="UPDATE  lessons SET lesson_name = '$lesson_name' , lesson_desc = '$lesson_description' 
        
           WHERE lesson_id='$lid' ";

        if($conn->query($sql)==TRUE){
        $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">data updated</div>';
        
        }

        else {
            
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">unable to update the data</div>';
        }




    }

    
     

}






?>

<div class="col-sm-6 mt-1 mx-3  jumbotron">
    <h3 class="text-center ">Update The Course</h3>
    <?php

    if(isset($_REQUEST['view']))
    {

        $sql="SELECT * FROM lessons WHERE lesson_id = {$_REQUEST['id']}";
$result=$conn->query($sql);
$row=$result->fetch_assoc();


    }
?>
    <form action="" method="POST" enctype="multipart/form-data" class="jumbotron">
    <div class="form-group">
    <label for="course_id">Lesson Id</label>
    <input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])) { echo $row['lesson_id']; }?>" readonly>
</div>
<div class="form-group">
    <label for="course_name">Lesson Name</label>
    <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name'])) { echo $row['lesson_name']; }?>">
</div>
<div class="form-group">
    <label for="course_name">Lesson Description</label>
    <input type="text" class="form-control" id="lesson_description" name="lesson_description" value="<?php if(isset($row['lesson_desc'])) { echo $row['lesson_desc']; }?>">
</div>


<div class="form-group">
    <label for="course_Image">Lesson Link</label>
    <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
    
</div>

<div class="text-center">
    <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
    <a href="acourses.php" class="btn btn-secondary">Close</a>
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
