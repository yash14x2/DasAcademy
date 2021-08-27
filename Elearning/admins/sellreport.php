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
    
?>

<div class="col-sm-8 mt-5">
    <form action="" method="post" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="startdate">StartDtae</label>
                <input type="date" class="form-control" id="startdate" name="startdate">
</div>
<div class="form-group col-md-3">
<label for="startdate">StartDtae</label>
<input type="date" class="form-control" id="enddate" name="enddate">
               
</div>


<input type="submit" class="btn btn-secondary mt-5" name="searchdate" value="search" >
    



</div>
            
            
        
        
    </form>
    <?php
    if(isset($_REQUEST['searchdate']))
    {
        $startdate=$_REQUEST['startdate'];
        $enddate=$_REQUEST['enddate'];
        $sql="SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            echo '<p class="bg-dark text-white p-2 mt-4">Details</p>
            <table class="table">
            <thead>
            <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Course Id</th>
            <th scope="col">Student Email</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Order Date</th>
            <th scope="col">Amount</th>
            </tr>
            </thead>
            ';
            while($row=$result->fetch_assoc())
            {
                echo '
                <tr>
                <th scope="row>'.$row['order_id'].'</th>
                <td>'.$row['course_id'].'</td>
                <td>'.$row['stu_email'].'</td>
                <td>'.$row['status'].'</td>
                <td>'.$row['order_date'].'</td>
                <td>'.$row['amount'].'</td>
                </tr>
                
                ';
            }
            echo '<td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="print" onclick="window.print()"></form></td>
            </tr>
            </tbody>
            </table>';
        }
        else
        {
            echo"<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert' style='margin-left:50px;'>No Records Found!</div>";
        }
    }
    ?>

</div>
</div>