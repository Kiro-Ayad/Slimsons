<?php
 include "sarver.php";
$sub = $_GET['s_id'];
$qry ="delete from subcribe where s_id='$sub'";
$del = mysqli_query($db,$qry);
if($del)
{
    mysqli_close($db);
    header("location:admin.php");
}
else{
    echo"sorry there is something wrong";

}