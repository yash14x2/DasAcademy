<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ('../dbconnection.php');
if(!isset($_SESSION['is_login'])){
if(isset($_POST['checklogemail']) && isset($_POST['stulogemail'])  && isset($_POST['stulogpass'])  ){

    $stulogemail=$_POST['stulogemail'];
    $stulogpass=$_POST['stulogpass'];
    $sql = "SELECT stu_email , stu_pass FROM student WHERE stu_email = '".$stulogemail."' AND stu_pass = '".$stulogpass."'";
    $result=$conn->query($sql);
    $row=$result->num_rows;
    if($row === 1){
        echo ($row);
        $_SESSION['is_login'] = "true";
        $_SESSION['stulogemail'] = $stulogemail;
    }

    else if($row === 0){

        echo ($row);

    }


}
}

?>