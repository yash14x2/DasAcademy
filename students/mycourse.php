<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ('../dbconnection.php');
include("./studentsinclude/studentheader.php");

?>
  	<div class="col-sm-8 pt-3" >
    <div class="jumbotron">
      <h4 class="text-center">All Courses</h4>
      <?php
      if(isset($stunemail))
      {
        $sql="SELECT co.order_id , c.course_id , c.course_name , c.course_duration , c.course_desc , c.course_img , c.course_author ,c.course_og_price,c.course_price FROM courseorder AS co JOIN course AS c on c.course_id=co.course_id WHERE CO.STU_EMAIL = '$stunemail'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
          while($row=$result->fetch_assoc())
          {
            ?>
            <div class="bg-dark mb-2" style="padding-bottom:10px;">
              <h5 class="card-header text-light"><?php echo $row['course_name']; ?></h5>
              <div class="row">
                <div class="col sm-3">
                  <img src="<?php echo $row['course_img'];  ?>" alt="" class="card-img-top mt-4 m-8" style="padding-left:10px;">
                </div> 
                <div class="col-sm-6 mb-3">
                  <div class="card-body">
                    <p class="card-title text-light"><?php echo $row['course_desc'] ?></p>
                    <small class="card-text text-light">Duration : <?php echo $row['course_duration']; ?></small>
                    </br>
                    <small class="card-text text-light">Instructor : <?php echo $row['course_author']; ?></small>
                    </br>
                    <small class="card-text text-light">
                    <p class="card-text text-light d-inline">Price: <small><del>&#8377 <?php echo $row['course_og_price'];?></del></small>
                    <small>
                    <strong> <span class="font-weight-bolder text-light">&#8377 <?php echo $row['course_price'];?><span></strong></small></p></small>
                    <a href="watchcourse.php?course_id=<?php echo $row['course_id'] ?>" class="btn btn-primary mt-5 float-right">Watch Course</a>

                  </div>

                </div>
              </div>
              
            </div>
            <?php
          }
        }
      }


      ?>
    </div>
  </div>

</div>


<?php
include("./studentsinclude/studentfooter.php");
?>