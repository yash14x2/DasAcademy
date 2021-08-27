<?php
include_once ('../dbconnection.php');
include("./admin include/sidebarcommon.php");

if(!isset($_SESSION)){
    session_start();
}


if(isset($_SESSION['is_adminlogin'])){
$adminemail=$_SESSION['adminlogemail'];
}

else {
    echo "<script> location.href='../index.php';</script>";
}
?>
<div class="col-sm-8 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course Id</label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid" required>
        </div>
            
            
        <button type="submit" class="btn btn-danger">Search</button>
    </form>
    <?php

if(isset($_REQUEST['checkid']) && is_numeric($_REQUEST['checkid'])) {    
    $sql="SELECT * FROM course WHERE course_id={$_REQUEST['checkid']}";

    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    
    if($row == null){
        die('<div class="alert alert-dark mt-4" role="alert">Course Not Found</div>');
    }

        $sql="SELECT * FROM course WHERE course_id={$_REQUEST['checkid']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        if(($row['course_id'])==$_REQUEST['checkid'])
        {
            $_SESSION['course_id']=$row['course_id'];
            $_SESSION['course_name']=$row['course_name'];
            ?>
            <h3 class="mt-5 bg-dark text-white p-2">Course Id : <?php if(isset($row['course_id'])) { echo $row['course_id'] ; } ?>
            Course Name : <?php if(isset($row['course_name'])) { echo $row['course_name'] ; } ?>
            </h3>
            <?php
            $sql="SELECT * FROM lessons WHERE course_id= {$_REQUEST['checkid']}";
            $result=$conn->query($sql);
            echo '<table class="table">
            <thead>
            <tr>
            <th scope="col">Lesson Id</th>
            <th scope="col">Lesson Name</th>
            <th scope="col">Lesson link</th>
            <th scope="col">Lesson Description</th>
            <th scope="col">action</th>
            </tr>

            </thead>
            <tboady>';
            while($row=$result->fetch_assoc())
            {
                echo '<tr>';
                echo '<th scope="row">' .$row['lesson_id'].'</th>';
                echo '<td>' .$row['lesson_name'].'</td>';
                echo '<td>' .$row['lesson_link'].'</td>';
                echo '<td>' .$row['lesson_desc'].'</td>';
                echo '<td><form action="editlesson.php" method = "post" class="d-inline">
                <input type = "hidden" name="id" value='.$row['lesson_id'].'>
                <button type="submit" class="btn btn-info mr-3" name="view" value="view">
                <i class="fas fa-pen"></i></button></form>

                <form action="#" method = "post" class="d-inline">
                <input type = "hidden" name="id" value='.$row['lesson_id'].'>
                <button type="submit" class="btn btn-secondary mr-3" name="delete" value="delete">
                <i class="fas fa-trash"></i></button></form></td>
                </tr>';
            }

            echo '</tboady>
            </table>';
         }

         echo '<div>
         <a href="addlesson.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
     </div>';

                 if(isset($_REQUEST['delete']))
                 {

                     $sql="DELETE  FROM lessons WHERE lesson_id={$_REQUEST['id']}";

                         if($conn->query($sql)==TRUE)
                         {
                             echo'<meta http-equiv="refresh" content= "0;URL=?checkid='. $_REQUEST['checkid'] .'"/> ';
                         }

                         else
                         {
                             echo "unable to delete";
                         }
                 }

}

    ?>

</div>


<?php
include("./admin include/afooter.php")
?>