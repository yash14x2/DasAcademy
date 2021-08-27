<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ('../dbconnection.php');

if(isset($_SESSION['is_login'])){
    $adminemail=$_SESSION['stulogemail'];
    }
    
    else {
        echo "<script> location.href='../index.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../csss/all.min.css">
    <link rel="stylesheet" href="../csss/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../csss/adminstyle.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Document</title>
</head>
<body>

    <div class="container-fluid bg-success p-2">
        <h3>Welcome To Das Acedamy</h3>
        <a href="mycourse.php" class="btn btn-danger">My Courses</a>

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                    if(isset($_GET['course_id']))
                    {
                        $course_id=$_GET['course_id'];
                        $sql="SELECT * FROM lessons WHERE course_id='$course_id'";
                        $result=$conn->query($sql);
                        if($result->num_rows > 0)
                        {
                            while($row=$result->fetch_assoc())
                            {
                                echo '<li class="nav-item border-bottom py-2" movieurl='.$row['lesson_link'].' style="cursor:pointer;">'.$row['lesson_name'].'</li>';
                            }
                        }
                    }
                    ?>
                    
                </ul>

            </div>
            <div class="col-sm-8">
                <video src="" id="videoarea" class="mt-5 w-75 ml-2" controls></video>
            </div>
        </div>
    </div>
    
</body>

</html>

<?php
include("./studentsinclude/studentfooter.php");
?>
<script src="../jsss/customstudentvideo.js"></script>