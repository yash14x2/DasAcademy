<?php
include_once ('../dbconnection.php');
include("./admin include/sidebarcommon.php");
$sql="SELECT * FROM student";
$result=$conn->query($sql);
?>

<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List Of Student</p>
    <div class="table-responsive-md">


<?php
if($result->num_rows > 0){

?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">student Id</th>
            <th scope="col">student Name</th>
            <th scope="col">student Email</th>
            <th scope="col">Action</th>
            
            

        </tr>
    </thead>
    <tbody>
        <?php
        while($row=$result->fetch_assoc()){

        
        
    echo '<tr class="mt-5">';
    echo '<th scope="row" class="align-middle" >'.$row['stu_id']. '</th>';
    echo '<td class="align-middle" >'.$row['stu_name'].'</td>';
    echo '<td class="align-middle" >'. $row['stu_email'].'</td>';
            
    echo '<td>';
    
    echo '
    <form action="editstudent.php" class="d-inline">
    <input type="hidden" name="id" value='.$row["stu_id"].'>

    <button type="submit" class="btn btn-secondary" name="view" value="view"><i class="fa fa-pen" aria-hidden="true"></i></button>
    </form>


    <form class="d-inline">
    <input type="hidden" name="id" value='.$row["stu_id"].'>
    
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
$sql="DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
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
    <a href="addnewstudent.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>


<?php
include("./admin include/afooter.php")
?>