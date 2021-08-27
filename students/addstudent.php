<?php
include_once ('../dbconnection.php');

// checking email alredy exist or not
if(isset($_POST['stuemail'])){
    $stuemail=$_POST['stuemail'];
    $sql="SELECT stu_email FROM student WHERE stu_email = '".$stuemail."'"; 
    $result=$conn->query($sql);
    $row = $result->num_rows;
    echo ($row);
}

else{
    echo "sorry";
}





// inserting student
if(isset($_REQUEST['stuname']) &&  isset($_REQUEST['stuemail']) && isset($_REQUEST['stupass']))
{

    $stuname=$_POST['stuname'];
    $stuemail=$_POST['stuemail'];
    $stupass=$_POST['stupass'];
    $sql= "INSERT INTO student (stu_name , stu_email , stu_pass) VALUES ('$stuname' , '$stuemail' , '$stupass')";
  if(  $conn->query($sql) == TRUE){
      echo "OK";
}

else{
    echo "failed";
    
}
}


?>