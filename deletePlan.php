<?php
 include "sarver.php";
$plan_id = $_GET['id'];
$qry ="delete from plan_detail where id='$plan_id'";
$del = mysqli_query($db,$qry);
if($del)
{
    mysqli_close($db);
    header("location:admin.php");
}
else{
    echo"sorry there is something wrong";

}