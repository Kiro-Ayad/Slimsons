<?php
 include "sarver.php";
$id = $_GET['spo_id'];
$qry2 ="delete from sponsers where spo_id='$id'";
$del = mysqli_query($db,$qry2);
if($del)
{
    mysqli_close($db);
    header("location:admin.php");
}
else{
    echo"sorry there is something wrong";

}
