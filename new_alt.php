<!DOCTYPE html>
<html lang="en">
<head>
<?php
include "sarver.php";
ob_start();
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
$feza = $ro['email'];
$targuser = mysqli_query($db,"select * from child_history  where email = '$feza' ORDER BY id  DESC ");
$koko = mysqli_fetch_array($targuser);
$tagplan =$koko['plan_target'];
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

        <!-- PREMIUM SUBSCRIBTION ONLY -->
        
    </header>
    <section>
            <!-- <img id="img" src="images/char3sqr.png"> -->
            <aside id="links" class="links">
                <span class="close" onclick="closeNav()">&times;</span>          
                <a  class="otherpagelinks" href="userprofilepremium.php">Home</a>
                <a  class="otherpagelinks" href="exercises.php?user_id=<?php echo $ro['user_id']; ?>">Exercises</a>
                <a  class="otherpagelinks" href="meals.php?user_id=<?php echo $ro['user_id']; ?>">Meals</a>
                <a  class="otherpagelinks" href="vedio.php?user_id=<?php echo $ro['user_id']; ?>">Reviews</a>
                <a  class="otherpagelinks" href="sponsers.php?user_id=<?php echo $ro['user_id']; ?>">Our Sponsors</a>
                <a class="otherpagelinks" href="newedit.php?user_id=<?php echo $ro['user_id']; ?>">Edit Info</a>
                <a  class="otherpagelinks" href="editsubscription.php?user_id=<?php echo $ro['user_id']; ?>">Edit Subscription</a>
                <a href="userprofilepremium.php?logout='1'" id="logout">Log Out
                    <img src="images/export.png" width="20px" alt="logout">
                </a>
            </aside>
            <form id="altplan" method="post" >
                    <div id="alttitle">
                    <a id="altcancel" href="meals.php?user_id=<?php echo $ro['user_id']; ?>">Cancel</a>
                    <label id="choose" for="plans">Choose Your Alternative Plan:</label>
                    <input id="confirmalt" type="submit" name="choose_plan" value="Confirm Alternative Plan">
                </div>
                    <div id="altplanform">
                    
                        <section id="altcontainer">
                      
                            <label for="p1">
                            <?php
                                $targqu = mysqli_query($db,"select * from plan_detail where plan_id !='$pel' and target = '$tagplan' ");
                                while ($ree = mysqli_fetch_array($targqu)){
                                
                            ?>
                                <input type="radio" id="p1" name="plans" value="<?php echo $ree['plan_id']  ?>">
                                <div id="plan1">
                                    <h4 class="alth4">Alternative 1</h4>
                                    <div class="altday">
                                        <h3 class="h3"> <?php echo $ree['day']  ?> </h3>
                                        <section class="mealsection">
                                            <div class="breakfast">
                                                <h4  class="mealh4"> breakfast </h4>
                                                <img src="images/breakfast.png" height="100px">
                                                <div class="mealdiv" >                              
                                                    <p  class="mealname"><?php echo $ree['breakfast']  ?> </p>
                                                    <p><?php echo $ree['bf_description']  ?></p>
                                                </div>
                                            </div>
                                            <div class="lunch">
                                                <h4 class="mealh4">Lunch</h4>
                                                <img src="images/lunch.png" height="100px">
                                                <div class="mealdiv" >
                                                    <p class="mealname"><?php echo $ree['lunch']  ?></p>
                                                    <p><?php echo $ree['lun_description']  ?></p>
                                                </div>             
                                            </div>
                                            <div class="dinner">
                                                <h4 class="mealh4">Dinner</h4>
                                                <img src="images/dinner.png" height="100px">
                                                <div class="mealdiv" > 
                                                    <p class="mealname"><?php echo $ree['dinner']  ?></p>
                                                    <p><?php echo $ree['din_description']  ?></p>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="snacksection">                        
                                            <div class="snackdiv">
                                                <h4 class="mealh4">Snacks</h4>
                                                <img class="snackimg" src="images/proteinbar.png" height="100px">
                                                <p class="snack1"> <?php echo $ree['snack1']  ?> </p>
                                                <hr>
                                                <p class="snack2"><?php echo $ree['snack2']  ?></p>
                                            </div>
                                        </section>
                                    </div>
                  
                                </div>
                      <?php
                                }
                      ?>
                            </label>
                         
                            <!-- <hr> -->
                            <label for="p2">
                            <?php
        $quer = "SELECT * FROM `plan_detail` where plan_id ='$pel'";
                $rsua= mysqli_query($db,$quer);
            
                while ($row = mysqli_fetch_array($rsua)){
                    ?>
                                <input type="radio" id="p2" name="plans" value="<?php echo $ree['plan_id']  ?>">
                                <div id="plan2">
                                    <h4 class="alth4">Alternative 2</h4>
                                    <div class="altday">
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
                                                    <p class="mealname"><?php echo $row['lunch'] ?></p>
                                                    <p><?php echo $row['lun_description'] ?></p>
                                                </div>             
                                            </div>
                                            <div class="dinner">
                                                <h4 class="mealh4">Dinner</h4>
                                                <img src="images/dinner.png" height="100px">
                                                <div class="mealdiv" > 
                                                    <p class="mealname"><?php echo $row['dinner'] ?></p>
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
                                <?php } ?>
                            </label>
                        </section>
                    </div>
                </form>
        </article>
</section>
<?php
if(isset($_POST['choose_plan'])){
    header('location:userprofilepremium.php'); 
    $altyy=  mysqli_real_escape_string($db, $_POST['plans']);
    $sqlll="update user set plan_id =$altyy  where user_id='$id'";
    $followw = mysqli_query($db,$sqlll);

}
    
    ?>
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
   
    function cancelalt(){
        document.getElementById("altplan").style.display="none";
        document.getElementById('plan').style.display='block';
        document.getElementById('altbtn').style.display='block';
    }
    function validateradioalt(){
        var radio1 = document.getElementById('p1');
        var radio2 = document.getElementById('p2');
        if( radio1.checked || radio2.checked){
            alert('Your Choice has been recorded.');
        }
        else{
            alert('To Choose altrnative plan, please re-open alternatives and click on plan and confirm button');
        }
    }
</script>

</body>
</html>