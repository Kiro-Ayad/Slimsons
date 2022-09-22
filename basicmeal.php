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
    <title>Meals Page</title>
    <link rel='stylesheet' type='text/css' href='stylesheet2.css'>
</head>
<body>
<?php
$id=$_GET['user_id'];
$qry1 = mysqli_query($db,"select * from user where user_id='$id'");
$ro = mysqli_fetch_array($qry1);
$pel = $ro['plan_id'];
?>
    <nav id="header">
        <div id="open">
            <span onclick="openNav()">&#9776;</span>
          </div>
        <div id="headerborder"></div>
        <h1 id="headh1"><?php echo $ro['name'] ?></h1>
        <img src="<?php echo $ro['avatar'] ?>" width="120px" id="useravatar">
        </nav>
    <header id="headermeal">
        <h1 id="mealh1">Your Meals</h1>

    </header>
    <section>
            <!-- <img id="img" src="images/char3sqr.png"> -->
            <aside id="links" class="links">
                <span class="close" onclick="closeNav()">&times;</span>          
                <a  class="otherpagelinks" href="userprofilebasic.php">Home</a>
                <a  class="otherpagelinks" href="exercises.php?user_id=<?php echo $ro['user_id']; ?>">Exercises</a>
                <a  class="otherpagelinks" href="basicmeal.php?user_id=<?php echo $ro['user_id']; ?>">Meals</a>
                <a  class="otherpagelinks" href="vedio.php?user_id=<?php echo $ro['user_id']; ?>">Reviews</a>
                <a  class="otherpagelinks" href="sponsers.php?user_id=<?php echo $ro['user_id']; ?>">Our Sponsors</a>
                <a class="otherpagelinks" href="newedit.php?user_id=<?php echo $ro['user_id']; ?>">Edit Info</a>
                <a  class="otherpagelinks" href="editsubscription.php?user_id=<?php echo $ro['user_id']; ?>">Edit Subscription</a>
                <a href="userprofilebasic.php?logout='1'" id="logout">Log Out
                    <img src="images/export.png" width="20px" alt="logout">
                </a>
            </aside>
            <?php
        $quer = "SELECT * FROM `plan_detail` where plan_id ='$pel'";
                $rsua= mysqli_query($db,$quer);
            
                while ($row = mysqli_fetch_array($rsua)){
                    ?>
        <article id="meal_content" >
                <div id="plan" style="height:400px" >
                  <div>
                    <h3 class="h3"><?php echo $row['day'] ?></h3>
                    <section class="mealsection">
                        <div class="breakfast">
                            <h4  class="mealh4">Breakfast</h4>
                            <img src="images/breakfast.png" height="100px">
                            <div class="mealdiv" >                              
                                <p  class="mealname"><?php echo $row['breakfast'] ?></p>
                                <p><?php echo $row['bf_description'] ?></p>
                            </div>
                        </div>
                        <div class="lunch">
                            <h4 class="mealh4">Lunch</h4>
                            <img src="images/lunch.png" height="100px">
                            <div class="mealdiv" >
                                <p class="mealname"> <?php echo $row['lunch'] ?></p>
                                <p><?php echo $row['lun_description'] ?></p>
                            </div>             
                        </div>
                        <div class="dinner">
                            <h4 class="mealh4">Dinner</h4>
                            <img src="images/dinner.png" height="100px">
                            <div class="mealdiv" > 
                                <p class="mealname"> <?php echo $row['dinner'] ?></p>
                                <p><?php echo $row['din_description'] ?></p>
                            </div>
                        </div>
                    </section>
                    <section class="snacksection">                        
                        <div class="snackdiv">
                            <h4 class="mealh4">Snacks</h4>
                            <img class="snackimg" src="images/proteinbar.png" height="100px">
                            <p class="snack1"><?php echo $row['snack1'] ?></p>
                            <hr>
                            <p class="snack2"><?php echo $row['snack2'] ?></p>
                        </div>
                    </section>
                </div>

                
                </div>
                <?php
                }
        ?>
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