<!-- header and navigation -->

<?php
include_once ('dbconnection.php');
include("./mainincludes/header.php")

?>

<!-- end of the navigation -->





<!-- starting of video -->
<div class="container-fluid remove-vid-marg" >
  <div class="vid-parent" >
    <video playsinline autoplay muted loop >
       <source src="./video/baner.mp4">

    </video>
    <div class="vid-content">
      <h1 class="my-content">Welcome To Das Academy</h1>
      <small class="my-content">Learn And Earn</small><br>
      <?php
      if(!isset($_SESSION['is_login'])){
        echo '<a href="#" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#sturegModal">Get Started</a> ';
        
      }

      else{

        echo '<a href="./students/studentprofile.php" class="btn btn-primary ">My Profile</a>';

       }
      ?>
      

    </div>
  </div>
</div>

<!-- ending of video -->



<!-- start of text banner -->
<div class="container-fluid bg-danger txt-baner" style="margin-top: -5px;" >
  <div class="row bottom-baner">
    <div class="col-sm">
      <h5><i class="fas fa-book-open mr-3"></i>100+ Online Courses</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-users mr-3 "></i>100+ Online Courses</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-keyboard mr-3"></i>100+ Online Courses</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-rupee-sign mr-3"></i>100+ Online Courses</h5>
    </div>
  </div>
</div>

<!-- end of text banner -->



<!-- starting of popular courses -->
<div class="container mt-5">
  <h1 class="text-center">Popular Courses</h1>

  <!-- starting of card -->
  <div class="row">
    

  
  
    
  
    
    <?php
    $sql="SELECT * FROM course LIMIT 3";
    $result=$conn->query($sql);
   
    if($result->num_rows>0){

    while($row=$result->fetch_assoc())
    {
      $courseid=$row['course_id'];
    
    echo '
    
    <div class="col-sm-4">
    <div class="card-deck mt-4  >
  
    <a href="#" class="btn " style="text-align:left  padding:0px; margin:0px;">
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
    <div class="row">
    

  
  
    
  
    
    <?php
    $sql="SELECT * FROM course LIMIT 3,3";
    $result=$conn->query($sql);
   
    if($result->num_rows>0){

    while($row=$result->fetch_assoc())
    {
      $courseid=$row['course_id'];
    
    echo '
    
    <div class="col-sm-4">
    <div class="card-deck mt-4  >
  
    <a href="#" class="btn " style="text-align:left  padding:0px; margin:0px;">
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




  <!-- ending of 1 row cards -->
  <!-- <div class="container mt-3">
  <div class="row mt-4">
  <div class="col-sm-4">
  <div class="card-deck">
    <a href="#" class="btn" style="text-align:left  padding:0px; margin:0px;">
  <div class="card">
    <img class="card-img-top" src="./phothos/php.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
    <div class="card-footer">
      <p class="card-text d-inline">Price: <small><del>&#8377 2000</del></small>
      <strong> <span class="font-weight-bolder">&#8377 200<span></p></strong>
      <a href="#" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
    </div>
  </div>
</a>
</div>
</div>




<div class="col-sm-4">
  <div class="card-deck">
    <a href="#" class="btn" style="text-align:left  padding:0px; margin:0px;">
  <div class="card">
    <img class="card-img-top" src="./phothos/c++.jfif" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
    <div class="card-footer">
      <p class="card-text d-inline">Price: <small><del>&#8377 2000</del></small>
      <strong> <span class="font-weight-bolder">&#8377 200<span></p></strong>
      <a href="" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
    </div>
  </div>
</a>
</div>
</div>


<div class="col-sm-4">
  <div class="card-deck">
    <a href="#" class="btn" style="text-align:left  padding:0px; margin:0px;">
  <div class="card">
    <img class="card-img-top" src="./phothos/py.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
    <div class="card-footer">
      <p class="card-text d-inline">Price: <small><del>&#8377 2000</del></small>
      <strong> <span class="font-weight-bolder">&#8377 200<span></p></strong>
      <a href="#" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
    </div>
  </div>
</a>
</div>
</div>





</div> -->

<!-- end of most popular course -->
<div class="text-center m-2">
  <a class="btn btn-danger btn-sm" href="courses.php">View All Course</a>
</div>
</div>
</div>

  <!-- starting of 2 nd row  -->
  
  <!-- ending of 2 nd row  -->

<!-- end of popular cousrses -->



<!-- start of contact -->
<!--Section: Contact v.2-->
<!--Section: Contact v.2-->
<!-- end of contact -->
<?php
include('contactus.php');

?>

<!--Section: Contact v.2-->
<!-- ending of contact us -->


<div class="slider-area">
<div class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="img-area">
      <img src="./phothos/php.png" alt="...">
      </div>
      <div class="carousel-caption">
      <h4>yash joshi</h4>
      <h3>webdevloper</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima, placeat a architecto officiis ut blanditiis ullam, dignissimos laudantium libero tempore rerum hic totam consequuntur numquam similique! Labore dolores nihil nisi.</p>
      
      </div>
      
    </div>












    <div class="carousel-item">
    <div class="img-area">
      <img src="./phothos/php.png" alt="...">
      </div>
      <div class="carousel-caption">
      <h4>yash joshi</h4>
      <h3>webdevloper</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima, placeat a architecto officiis ut blanditiis ullam, dignissimos laudantium libero tempore rerum hic totam consequuntur numquam similique! Labore dolores nihil nisi.</p>
      
      </div>
    
    </div>























    <div class="carousel-item">
    <div class="img-area">
      <img src="./phothos/php.png" alt="...">
      </div>
      <div class="carousel-caption">
      <h4>yash joshi</h4>
      <h3>webdevloper</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima, placeat a architecto officiis ut blanditiis ullam, dignissimos laudantium libero tempore rerum hic totam consequuntur numquam similique! Labore dolores nihil nisi.</p>
      
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</div>
</div>



<!-- end of our student review-->

<!-- start social foloow -->
<div class="container-fluid bg-danger ">
  <div class="row text-white text-center ">
    <ul class="social ">
  <li class="social_links"><div class="col-sm set">
    <a href="" class="text-white social-hover"><i class="fab fa-facebook-f"></i> Facebook</a>
  </div></li>
  <li class="social_links"><div class="col-sm set">
    <a href="" class="text-white social-hover"><i class="fab fa-twitter"></i> Twitter</a>
  </div></li>
  <li class="social_links"><div class="col-sm set">
    <a href="" class="text-white social-hover"><i class="fab fa-whatsapp"></i> Wthatsapp</a>
  </div></li>
  <li class="social_links"><div class="col-sm set">
    <a href="" class="text-white social-hover "><i class="fab fa-instagram"></i> Instagram</a>
  </div></li>
</ul>
</div>
</div>
<!-- end of social foloow -->

<!-- start about section -->
<div class="container-fluid p-4" style="background-color:#E9ECEF">
<div class="container" style="background-color:#E9ECEF">
<div class="row text-center">
  <div class="col-sm">
    <h5>About Us</h5>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi provident obcaecati qui? Sunt blanditiis et culpa quam laborum, accusamus modi odit aut, repudiandae eum quis neque commodi a molestias incidunt!</p>
  </div>
  <div class="col-sm">
    <h5>Catogory</h5>
    <div class="catogary">
      
    <a href="" class="text-dark">webdevloper</a><br>
   <a href="" class="text-dark">webdevloper</a><br>
   <a href="" class="text-dark">webdevloper</a><br>
   <a href="" class="text-dark">webdevloper</a><br>
   <a href="" class="text-dark">webdevloper</a><br>
    <a href="" class="text-dark">webdevloper</a>
   
   </div>
    
  </div>
  <div class="col-sm ">
    <h5>Contact Us</h5>
    <p>Dasacedemy pvt ltd <br> near dahisar station <br> mumbai <br> ph . 7977372750
  </div>
</div>

</div>

</div>
<!-- end of section -->
  



<!-- start of footer -->


<!-- start of footer -->
<?php
include("./mainincludes/footer.php")
?>
<!-- end of footer -->