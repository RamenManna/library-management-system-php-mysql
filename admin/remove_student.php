<?php
require('dbconn.php');
mysqli_select_db($conn,"lms");
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $query="DELETE FROM user WHERE RollNo= '$id' ";
    $r=mysqli_query($conn,$query);
    if($r){
       echo "<script type='text/javascript'>alert('Student Removed!!!')</script>";
       header("Refresh:0.01; url=student.php", true, 303);
    }
    else{
        echo "Print ".mysqli_error($conn);
    }
}
?>