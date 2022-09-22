<?php
 include "sarver.php";
$id = $_GET['exe_id'];
$qry2 ="delete from exercise where exe_id='$id'";
$del = mysqli_query($db,$qry2);
if($del)
{
    mysqli_close($db);
    header("location:admin.php");
}
else{
    echo"sorry there is something wrong";

}
