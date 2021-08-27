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
    if($_REQUEST['course_id'] == "" || $_REQUEST['course_name'] == ""  || $_REQUEST['course_Description'] == "" || $_REQUEST['Author'] == "" || $_REQUEST['Course_Duration'] == "" || $_REQUEST['course_og_price'] == "" || $_REQUEST['course_selling_price'] == "" )
    {
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill all fields</div>';
    }

    else{

        $cid=$_REQUEST['course_id'];
        $course_name= $_REQUEST['course_name'];
        $course_description=$_REQUEST['course_Description'];
        $author=$_REQUEST['Author'];
        $course_duration=$_REQUEST['Course_Duration'];
        $course_og_price=$_REQUEST['course_og_price'];
        $course_selling_price=$_REQUEST['course_selling_price'];
        $course_img=$_FILES['course_Image']['name'];
    $course_img_tmp=$_FILES['course_Image']['tmp_name'];
    $image_folder='../phothos/courseimg/' . $course_img;
    move_uploaded_file($course_img_tmp , $image_folder);

        

        $sql="UPDATE  course SET course_name = '$course_name' , course_desc = '$course_description' , 
        
        course_author = '$author' , course_duration = '$course_duration' , course_og_price = '$course_og_price' , course_price = '$course_selling_price'  , course_img = '$image_folder'   WHERE course_id='$cid' ";

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

        $sql="SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

    }
?>
    <form action="" method="POST" enctype="multipart/form-data" class="jumbotron">
    <div class="form-group">
    <label for="course_id">Couse Id</label>
    <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])) { echo $row['course_id']; }?>" readonly>
</div>
<div class="form-group">
    <label for="course_name">Couse Name</label>
    <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])) { echo $row['course_name']; }?>">
</div>
<div class="form-group">
    <label for="course_Description">Couse Description</label>
    <textarea  class="form-control" id="course_Description" name="course_Description" rows="2" ><?php if(isset($row['course_desc'])) { echo $row['course_desc']; }?></textarea>
</div>

<div class="form-group">
    <label for="Author">Author</label>
    <input type="text" class="form-control" id="Author" name="Author" value="<?php if(isset($row['course_author'])) { echo $row['course_author']; }?>">
</div>


<div class="form-group">
    <label for="Author">Course Duration</label>
    <input type="text" class="form-control" id="Course_Duration" name="Course_Duration" value="<?php if(isset($row['course_duration'])) { echo $row['course_duration']; }?>">
</div>

<div class="form-group">
    <label for="course_original_price">Couse Original price</label>
    <input type="text" class="form-control" id="course_og_price" name="course_og_price" value="<?php if(isset($row['course_og_price'])) { echo $row['course_og_price']; }?>">
</div>

<div class="form-group">
    <label for="course_selling_price">Couse selling price</label>
    <input type="text" class="form-control" id="course_selling_price" name="course_selling_price" value="<?php if(isset($row['course_price'])) { echo $row['course_price']; }?>">
</div>


<div class="form-group">
    <label for="course_Image">Course Image</label>
    <input type="file" class="form-control-file" id="course_Image" name="course_Image">
    <img src="<?php if(isset($row['course_img'])) { echo $row['course_img']; } ?>" alt="" >
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
