<?php
 include "sarver.php";
$id = $_GET['user_id'];
$qry2 ="delete from user where user_id='$id'";
$del = mysqli_query($db,$qry2);
if($del)
{
    mysqli_close($db);
    header("location:admin.php");
}
else{
    echo"sorry there is something wrong";

}
