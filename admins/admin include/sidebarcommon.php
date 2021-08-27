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
    <link rel="stylesheet" href="../csss/adminstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   


<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

</head>
<?php


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
<body>
    <nav class="navbar navbar-dark fixed-top p-o shadow" style="background-color: #225470; 

">
<a href="admondashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">DasAcedamy <small class="text-white">Admin Area</small></a></nav>


<!-- slide-bar -->
<div class="container-fluid mb-5" style="margin-top:-15px;">
<div class="row">

    

    

    <nav class="col-sm-3  bg-light sidebar py-5 d-print-none">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                
                <li class="nav-item">
            
                    <a  class="nav-link mt-5" href="admindashboard.php" ><i class="fas fa-tachometer-alt"></i> Dashboard</a>

                </li>
                <li class="nav-item">
            
            <a  class="nav-link" href="acourses.php" ><i class="fab fa-accessible-icon"></i> Courses</a>

        </li>
        <li class="nav-item">
            
                    <a  class="nav-link" href="lessons.php" ><i class="fas fa-tachometer-alt"></i> Lessons</a>

                </li>
                <li class="nav-item">
            
                    <a  class="nav-link" href="students.php" ><i class="fas fa-users"></i> Student</a>

                </li>
                <li class="nav-item">
            
                    <a  class="nav-link" href="sellreport.php" ><i class="fab fa-sellsy"></i> Sell Reports</a>

                </li>
                <li class="nav-item">
            
                    <a  class="nav-link" href="adminpaymentstatus.php" ><i class="fas fa-rupee-sign"></i> payment Status</a>

                </li>
                <li class="nav-item">
            
                    <a  class="nav-link" href="admindashboard.php" ><i class="fas fa-comments"></i> Feedback</a>

                </li>
                <li class="nav-item">
            
                    <a  class="nav-link" href="chagepassword.php" ><i class="fas fa-keyboard"></i> Change Password</a>

                </li>
                <li class="nav-item">
            
                    <a  class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>
LogOut</a>

                </li>
            </ul>
            
        </div>
        
    </nav>

    <?php
include("./admin include/afooter.php")
?>
