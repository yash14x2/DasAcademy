<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- including header -->
    <?php
    include_once ('dbconnection.php');
    include("./mainincludes/header.php")
    ?>
<!-- end of header -->






<!-- start of course bannner -->


<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./phothos/course3.jpg" alt="" style="height:300px ; width:100%; object-fit:cover; box-shadow:10px;"/>
    </div>
</div>

<!-- end of course banner -->



<!-- starting of popular courses -->
<div class="container mt-5">
  <h1 class="text-center">All Courses</h1>

 
  <div class="row">
    

  
  
    
  
    
    <?php
    $sql="SELECT * FROM course";
    $result=$conn->query($sql);
   
    if($result->num_rows>0){

    while($row=$result->fetch_assoc())
    {
      $courseid=$row['course_id'];
    
    echo '
    
    <div class="col-sm-4">
    <div class="card-deck mt-4  >
  
    <a href="coursedetail.php" class="btn " style="text-align:left  padding:0px; margin:0px;">
  <div class="card " >
    <img class="card-img-top" src="'.str_replace('..','.',$row['course_img']).'" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title text-center">'.$row['course_name'].'</h5>
      <p class="card-text text-center" style="height: 80px;">'.$row['course_desc'].'</p>
    </div>
    <div class="card-footer">
      <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_og_price'].'</del></small>
      <strong> <span class="font-weight-bolder">&#8377 '.$row['course_price'].'<span></p></strong>
      <a href="coursedetail.php?course_id='.$courseid.'" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
      </div>
  </div>
</a>
</div>
</div>

';
    }
  }
    ?>


</div>
</div>
</div>




</div>

<!-- end of most popular course -->
</div>




















<!-- start of footer -->
<?php
include("./mainincludes/footer.php")
?>
<!-- end of footer -->



</body>
</html>