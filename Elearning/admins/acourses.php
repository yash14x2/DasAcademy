<?php
include_once ('../dbconnection.php');
include("./admin include/sidebarcommon.php");

?>

<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List Of Courses</p>
    <div class="table-responsive-md">


<?php
$sql="SELECT * FROM course";
$result=$conn->query($sql);
if($result->num_rows > 0){

?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Courses Id</th>
            <th scope="col">Name</th>
            <th scope="col">Author</th>
            <th scope="col">Action</th>
            
            

        </tr>
    </thead>
    <tbody>
        <?php
        while($row=$result->fetch_assoc()){

        
        
    echo '<tr class="mt-5">';
    echo '<th scope="row" class="align-middle" >'.$row['course_id']. '</th>';
    echo '<td class="align-middle" >'.$row['course_name'].'</td>';
    echo '<td class="align-middle" >'. $row['course_author'].'</td>';
            
    echo '<td>';
    
    echo '
    <form action="editcourse.php" class="d-inline">
    <input type="hidden" name="id" value='.$row["course_id"].'>

    <button type="submit" class="btn btn-secondary" name="view" value="view"><i class="fa fa-pen" aria-hidden="true"></i></button>
    </form>


    <form class="d-inline">
    <input type="hidden" name="id" value='.$row["course_id"].'>
    
    <button type="submit" class="btn btn-secondary" name="delete" value="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
    </form>
     
    </td>
    </tr>';
        }?>
        
     </tbody>
 </table>
<?php
}
else{
    echo "0 result";
}
if(isset($_REQUEST['delete'])){
$sql="DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
if($conn->query($sql) == TRUE){
    echo'<meta http-equiv="refresh" content="0; url=?deleted"/>';
}

else{
    echo "sorry";
}
}

?>
</div>
</div>
<div>
    <a href="addcourse.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>


<?php
include("./admin include/afooter.php")
?>