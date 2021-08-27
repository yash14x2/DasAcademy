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


$sql="SELECT * FROM course";
$result=$conn->query($sql);
$totalcourse= $result->num_rows;




$sql="SELECT * FROM student";
$result=$conn->query($sql);
$totalstudent= $result->num_rows;



$sql="SELECT * FROM courseorder";
$result=$conn->query($sql);
$totalcourseorder= $result->num_rows;
?>
    <div class="col-sm-8 mt-5">
        <div class="row mx-5 text-center">
            <div class="col-lg-4 col-4  mt-5">
                <div class="card text-white bg-danger mb-3" style="max-width=18rm;">
            <div class="card-header">
                courses
            </div>
            <div class="card-boady">
                <div class="card-title">
                    <h4><?php echo $totalcourse;?></h4>
                    <a href="#" class="btn text-white">View</a>
                </div>

            </div>

        </div>

        
            </div>
            
            <div class="col-lg-4 col-4 mt-5">
                <div class="card text-white bg-success mb-3" style="max-width=18rm;">
            <div class="card-header">
                Students
            </div>
            <div class="card-boady">
                <div class="card-title">
                    <h4><?php echo $totalstudent;?></h4>
                    <a href="#" class="btn text-white">View</a>
                </div>

            </div>
            

        </div>

        
        </div>
        
        <div class="col-lg-4 col-4 mt-5">
                <div class="card text-white bg-info mb-3" style="max-width=18rm;">
            <div class="card-header">
                Sold out
            </div>
            <div class="card-boady">
                <div class="card-title">
                    <h4><?php echo $totalcourseorder;?></h4>
                    <a href="#" class="btn text-white">View</a>
                </div>

            </div>

        </div>
        

        </div>
    </div> 

    <p class="bg-dark text-white p-2 mt-5">Course orderd</p>
    <div class="table-responsive-md">

    <?php

    
$sql="SELECT * FROM courseorder";
$result=$conn->query($sql);
$totalcourseorder= $result->num_rows;
if($result->num_rows>0)
{
    echo '
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Orderd Id</th>
                <th scope="col">Course Id</th>
                <th scope="col">Student Email</th>
                <th scope="col">Order Dtae</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
                

            </tr>
        </thead>';

        while($row=$result->fetch_assoc())
        {
                echo ' <tbody>
                <tr class="mt-5">
                    <th scope="row" class="align-middle" >'.$row['order_id'].'</th>
                    <td class="align-middle">'.$row['course_id'].'</td>
                    <td class="align-middle" >'.$row['stu_email'].'</td>
                    <td class="align-middle" >'.$row['order_date'].'</td>
                    <td class="align-middle" >'.$row['amount'].'</td>
                    <td>
                    <form>
                    <button type="submit" class="btn btn-secondary" name="delete" value="'.$row['order_id'].'"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                    </form>
                </tr>
            ';
        }

        echo '</table>
        </tbody>';
}


$sql="DELETE FROM courseorder WHERE order_id = '{$_REQUEST["delete"]}'";
if(isset($_REQUEST['delete']))
{
if($conn->query($sql)==TRUE)
{

    echo '<meta hhtp-equiz="refresh" content="0;url=? deleted"/>';
    
}
else{
    echo"unable to delete";
}
}

   ?> 

       
</div>
    </div>
        
    </div>


    

</div>
</div>
<?php
include("./admin include/afooter.php")
?>

    








    