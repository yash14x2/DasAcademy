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
if(isset($_REQUEST['coursesubmit'])){

    
    if($_REQUEST['course_name'] == "" || $_REQUEST['course_Description'] == "" || $_REQUEST['course_og_price'] == "" || $_REQUEST['course_selling_price'] == "" || $_REQUEST['Author'] == "" || $_REQUEST['Course_Duration'] == ""  ){

        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Field</div>';
        }
        
else{

    $course_name = $_REQUEST['course_name'];
    $course_Description=$_REQUEST['course_Description'];
    $course_og_price=$_REQUEST['course_og_price'];
    $course_selling_price = $_REQUEST['course_selling_price'];
    $Author = $_REQUEST['Author'];
    $course_duration= $_REQUEST['Course_Duration'];
    $course_img=$_FILES['course_Image']['name'];
    $course_img_tmp=$_FILES['course_Image']['tmp_name'];
    $image_folder='../phothos/courseimg/' . $course_img;
    move_uploaded_file($course_img_tmp , $image_folder);
     $sql="INSERT INTO course (course_name , course_desc , course_author ,course_img , course_duration ,course_og_price , course_price) VALUES ('$course_name' , '$course_Description' , '$Author',   '$image_folder' , '$course_duration' , '$course_og_price' ,'$course_selling_price' )";

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
    <h3 class="text-center ">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data" class="jumbotron">
<div class="form-group">
    <label for="course_name">Couse Name</label>
    <input type="text" class="form-control" id="course_name" name="course_name">
</div>
<div class="form-group">
    <label for="course_Description">Couse Description</label>
    <textarea  class="form-control" id="course_Description" name="course_Description" rows="2"></textarea>
</div>

<div class="form-group">
    <label for="Author">Author</label>
    <input type="text" class="form-control" id="Author" name="Author">
</div>


<div class="form-group">
    <label for="Author">Course Duration</label>
    <input type="text" class="form-control" id="Course_Duration" name="Course_Duration">
</div>

<div class="form-group">
    <label for="course_original_price">Couse Original price</label>
    <input type="text" class="form-control" id="course_og_price" name="course_og_price">
</div>

<div class="form-group">
    <label for="course_selling_price">Couse selling price</label>
    <input type="text" class="form-control" id="course_selling_price" name="course_selling_price">
</div>


<div class="form-group">
    <label for="course_Image">Course Image</label>
    <input type="file" class="form-control-file" id="course_Image" name="course_Image">
</div>

<div class="text-center">
    <button type="submit" class="btn btn-danger" id="coursesubmit" name="coursesubmit">Submit</button>
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