<?php
// if(!isset($_SESSION)){
//     session_start();
// }

// if(isset($_SESSION['is_login'])
// {
//     $_SESSION['stulogemail'] = $stulogemail;
// }




// else {
//     echo "<script> location.href='../index.php';</script>";
// }

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['is_login'])){
$stunemail=$_SESSION['stulogemail'];
}

else {
    echo "<script> location.href='../index.php';</script>";
}
if(isset($stunemail))
{
    $sql="SELECT * FROM student WHERE stu_email = '$stunemail'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $stu_img=$row['stu_img'];
    $stu_id=$row['stu_id'];
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../csss/all.min.css">
    <link rel="stylesheet" href="../csss/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../csss/adminstyle.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
   


<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

</head>
<body>
    
<nav class="navbar navbar-dark fixed-top p-o shadow" style="background-color: #225470; 

">
<a href="studentprofile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">DasAcedamy</a></nav>



<!-- side bar -->
<div class="container-fluid mb-5" style="margin-top:10px;">
<div class="row">
<nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <img src="<?php echo $stu_img?>" id="course_image" alt="studentimg" class="img-thumbnail round-circle img-responsive ">
            </li>
            <li class="nav-item">
                <a href="studentprofile.php" class="nav-link">
                    <i class="fab fa-accessible-icon"></i>
                    My Profile
                </a>

            </li>
            <li class="nav-item">
                <a href="mycourse.php" class="nav-link">
                    <i class="fab fa-accessible-icon"></i>
                    My Course
                </a>

            </li>

            <li class="nav-item">
                <a href="stufeedback.php" class="nav-link">
                    <i class="fab fa-accessible-icon"></i>
                    Feedback
                </a>

            </li>

            
            <li class="nav-item">
                <a href="changepassword.php" class="nav-link">
                    <i class="fab fa-accessible-icon"></i>
                    Change Password
                </a>

            </li>


            
            <li class="nav-item">
                <a href="../logout.php" class="nav-link">
                    <i class="fab fa-accessible-icon"></i>
                    Logput
                </a>

            </li>

            <li class="nav-item">
                <a href="../index.php" class="nav-link">
                    <i class="fab fa-accessible-icon"></i>
                    Home
                </a>

            </li>
        
        </ul>
    </div>
</nav>

</body>