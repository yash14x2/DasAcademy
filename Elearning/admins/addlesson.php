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
if(isset($_REQUEST['lessonsubmit'])){

    
    if( $_REQUEST['course_id'] == "" || $_REQUEST['lesson_description'] == "" ||  $_REQUEST['lesson_name'] == "" || $_REQUEST['course_name'] == "" || !is_uploaded_file($_FILES['lesson_link']['tmp_name'])){

        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Field</div>';
        }
        
else{

    $course_name = $_REQUEST['course_name'];
    $course_id = $_REQUEST['course_id'];
    $lesson_name = $_REQUEST['lesson_name'];
    $lesson_description=$_REQUEST['lesson_description'];
    $lesson_link=$_FILES['lesson_link']['name'];
    $lesson_link_tmp=$_FILES['lesson_link']['tmp_name'];
    $video_folder='../video/lessons_video/' . $lesson_link;
    
    move_uploaded_file($lesson_link_tmp, $video_folder
);

     $sql="INSERT INTO lessons (course_name , lesson_name , lesson_desc , lesson_link , course_id ) VALUES ('$course_name' , '$lesson_name' , '$lesson_description',   '$video_folder' , $course_id )";

     if($conn->query($sql) == TRUE){
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Succesfully</div>';

     }

     else{

        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">unable to add course</div>';

     }
}
}

?>

<div class="col-sm-6 mt-1 mx-3  jumbotron">
    <h3 class="text-center ">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data" class="jumbotron">
    <div class="form-group">
    <label for="course_id">Course ID</label>
    <input type="text" class="form-control" id="course_id" name="course_id" readonly value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id']; }?>">
</div>

<div class="form-group">
    <label for="lesson_name">Course Name</label>
    <input type="text" class="form-control" id="course_name" name="course_name" readonly  value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name']; }?>">
</div>


<div class="form-group">
    <label for="lesson_name">Lesson Name</label>
    <input type="text" class="form-control" id="lesson_name" name="lesson_name">
</div>
<div class="form-group">
    <label for="lesson_description">Lesson Description</label>
    <textarea  class="form-control" id="lesson_description" name="lesson_description" rows="2"></textarea>
</div>





<div class="form-group">
    <label for="lesson_video">Lesson Video Link</label>
    <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
</div>

<div class="text-center">
    <button type="submit" class="btn btn-danger" id="lessonsubmit" name="lessonsubmit">Submit</button>
    <a href="lessons.php" class="btn btn-secondary">Close</a>
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