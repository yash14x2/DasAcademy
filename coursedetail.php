<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include('./mainincludes/header.php');
include_once ('dbconnection.php');
session_start();
?>


<!-- start of course bannner -->


<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./phothos/course3.jpg" alt="" style="height:300px ; width:100%; object-fit:cover; "/>
    </div>

    
</div>

 <!-- start main content or dtais -->
 <?php
 if(isset($_GET['course_id'])){
 $course_id=$_GET['course_id'];
 $_SESSION['course_id']=$course_id;
 $sql="SELECT * FROM course WHERE course_id = $course_id";
 $result=$conn->query($sql);
 $row=$result->fetch_assoc();
 }
 ?>

<div class="container mt-5">
<div class="row">
<div class="col-md-4">
    <?php
echo '<img src="'.str_replace('..','.',$row['course_img']).'" alt="" class="card-img-top">';
?>

</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title" style="margin-top:-20px;">Couse Name : <?php echo $row['course_name'];
?></h5>
<p class="card-text"><?php echo $row['course_desc'];?></p>
<form action="checkout.php" method="post">

<p class="card-text d-inline">Price : <small><del>&#8377 <?php echo $row['course_og_price']; ?></del></small><span class="font-weight-bolder fw-bold">&#8377
<?php echo $row['course_price']; ?></span></p>
<input type="hidden" name="id" value="<?php echo $row['course_price']; ?>">
<button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy" style="margin-left:600px ; margin-top:-15px;">Buy Now</button>
</form>
</div>
</div>
</div>
</div>

<div class="container">
<div class="row">
<table class="table table-bordered table-hover">
<thead>
<tr>
<th scop="col">Lesson No.</th>
<th scop="col">Lesson Name</th>

</tr>
</thead>
<tbody>
    <?php
    $sql="SELECT * FROM lessons";
    $result=$conn->query($sql);
    if($result->num_rows > 0)
    {
    $num=1;
    while($row=$result->fetch_assoc())
    {   if($course_id == $row['course_id'])
        {
        echo ' <tr>
        <th scope="row">'.$num.'</th>
        <td>'.$row['lesson_name'].'</td>
        </tr>';
        $num++;
        }
    }
}

else
{   
    $num=1;
    echo ' <tr>
        <th scope="row">'.$num.'</th>
        <td>'."0 result".'</td>
        </tr>';
        $num++;

}

    ?>
</tbody>
</table>
</div>
</div>



 <!-- end of main content -->

<!-- end of main content -->

<?php
include('./mainincludes/footer.php')
?>


