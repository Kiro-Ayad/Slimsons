<!DOCTYPE html>
<html lang="en">
<head>
<?php
 include "sarver.php";

 ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='Stylesheet2.css'>
    <title>Exercises</title>
</head>
<body>
<?php
$id=$_GET['user_id'];
$qry1 = mysqli_query($db,"select * from user where user_id='$id'");
$ro = mysqli_fetch_array($qry1);
?>
    <header id="header">
        <div id="open">
            <span onclick="openNav()">&#9776;</span>
          </div>
        <div id="headerborder"></div>
        <h1 id="headh1"><?php echo $ro['name'] ?></h1>
        <img src="<?php echo $ro['avatar'] ?>" width="120px" id="useravatar">
    
    </header>
    
    <section>
            <!-- <img id="img" src="images/char3sqr.png"> -->
            <aside id="links" class="links">
                <span class="close" onclick="closeNav()">&times;</span>               
                <?php 
                if($ro['sub_id']=='1'){?>
                <a  class="otherpagelinks" href="userprofilebasic.php">Home</a>
                <?php
                }else { ?>
                    <a  class="otherpagelinks" href="userprofilepremium.php">Home</a>
                <?php } ?>
                
                <a  class="otherpagelinks" href="exercises.php?user_id=<?php echo $ro['user_id']; ?>">Exercises</a>
                <?php 
                if($ro['sub_id']=='1'){?>
                <a  class="otherpagelinks"  href="basicmeal.php?user_id=<?php echo $ro['user_id']; ?>">meals</a>
                <?php
                }else { ?>
                    <a  class="otherpagelinks"  href="meals.php?user_id=<?php echo $ro['user_id']; ?>">meals</a>
                <?php } ?>
                
                <a  class="otherpagelinks" href="vedio.php?user_id=<?php echo $ro['user_id']; ?>">Reviews</a>
                <a  class="otherpagelinks" href="sponsers.php?user_id=<?php echo $ro['user_id']; ?>">Our Sponsors</a>
                <a class="otherpagelinks" href="newedit.php?user_id=<?php echo $ro['user_id']; ?>">Edit Info</a>
                <a  class="otherpagelinks" href="editsubscription.php?user_id=<?php echo $ro['user_id']; ?>">Edit Subscription</a>
                <a href="userprofilepremium.php?logout='1'" id="logout">Log Out
                    <img src="images/export.png" width="20px" alt="logout">
                </a>
            
            </aside>
            <article id="exercise_content" >
                <h1 id="exh1">Your Exercises</h1> <img src="images/calendar.png" style="vertical-align: middle;" alt="workout icon" width="50px" height="50px">
                <?php if (isset($_GET['error'])) {  ?>
		<p><?=$_GET['error']?></p>
	<?php } ?>
    <?php
$ssqqll = "select * from exercise";
$rsultt = mysqli_query($db,$ssqqll);
if (mysqli_num_rows($rsultt)>0){
    while ($vedio = mysqli_fetch_assoc($rsultt)){
        ?>
    
                <table id="ex">
                    <tr class="excerciserow">
                        <td class="exvideo">
                        <video src="exercises/<?=$vedio['video']?>" 
            controls style="width:490px; height:260px">
         
     
         </video>
                        </td>
                        <td class="exdescription">
                            <div class="name">
                                <h2 class="descriptionspan ">Name:</h2>
                                <p class="descriptionp "><?php echo $vedio['name'];?></p>
                            </div>
                            <div>
                                <span class="descriptionspan">Duration:</span>
                                <p class="descriptionp"><?php echo $vedio['duration'];?></p>
                            </div>
                            <div>
                                <span class="descriptionspan">Body Focus:</span>
                                <p class="descriptionp"><?php echo $vedio['focus'];?></p>
                            </div>
                        </td>
                    </tr>
                    
                </table>
                <?php
    }}?>
            </article>
        </section>
        
        <script>
            function openNav() {
            document.getElementById("links").style.width = "250px";
            document.getElementById("open").style.display= "none";
            }
    
            function closeNav() {
            document.getElementById("links").style.width = "0";
            document.getElementById("open").style.marginLeft= "0";
            document.getElementById("open").style.display= "block";
            }
        </script>
        </body>
        </html>