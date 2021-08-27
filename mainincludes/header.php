<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="./csss/all.min.css">
    <link rel="stylesheet" href="./csss/bootstrap.min.css">
    <link rel="stylesheet" href="./csss/custom.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

</head>
<body>

<!-- starting of the navigation -->

<nav class="navbar navbar-expand-sm navbar-light bg-dark navbar-custom fixed-top" style="padding-left: 20px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Das Academy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav custom-nav" style="padding-left: 60px;">
        <li class="nav-item custom-nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="courses.php">Course</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="paymentstatus.php">Payment</a>
        </li>

        <?php

          session_start();
          if(isset($_SESSION['is_login'])){

            echo '
            <li class="nav-item custom-nav-item">
          <a class="nav-link" href="./students/studentprofile.php">My Profile</a>  
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';

            
          }
        else{
          echo '<li class="nav-item custom-nav-item">
          <a class="nav-link"data-bs-toggle="modal" data-bs-target="#stulloginmodal " href="#">Login</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link " data-bs-toggle="modal" data-bs-target="#sturegModal" href="#">Signup</a>
        </li>
          
          ';
        }
        ?>
        
        
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="#">Feedback</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

