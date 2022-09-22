<!DOCTYPE html>
<html lang="en">
<head>
<?php  
include  "sarver.php";
if(isset($_SESSION['username'])){
     $username=$_SESSION['username'];
     
}
if(isset($_SESSION['loggedin'])){
    echo $_SESSION['loggedin'];
    unset($_SESSION['loggedin']);
}
$quere = "SELECT * FROM `user` where email='$username' ";
$result= mysqli_query($db,$quere);


    
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">
    <title>User Profile</title>
    <link rel='stylesheet' type='text/css' href='stylesheet2.css'>
</head>
<body>
    
    <article id="modal"  >
        <div id="modalcontent">
            <section id="loading">
                <img src="images/char4sqr.png" class="char" id="leftchar">
                <div id="notice">
                    <h1>Sorry to interrupt your day!</h1>
                    <h2>it's time for your weekly follow-up</h2>
                    <div id="progressbar">
                        <div id="loadingbar"></div>
                    </div>
                    <p id="loadingp">Loading your form</p>
                </div>
                <img src="images/char3sqrr.png" class="char" id="rightchar">
            </section>

            <section id="followUp">
                    <h1 id="formh1">
                        <img id="followicon" src="images/diet.png" height="50px" width="50px">
                        Follow up form
                    </h1>
                    <p id="formExplainp">To ensure we give you the best service we can, We routinely update your information every week.</p>           
                <form name="fform" onsubmit="return formValidation()" method ="post">
                    <div class="inputs">
                    <?php
    if ($ro = mysqli_fetch_array($result)){
        ?>
                    <input class="wght" type="hidden" name="email" value="<?php echo $ro['email'] ?>" />
                    <input class="wght" type="hidden" name="plan" value="<?php echo $ro['plan_id'] ?>" />
                        <label for="weight" class="weight">Please enter your weight (kg)</label>
                        <input class="wght" type="text" name="weight" maxlength="4"/>
                    </div>
                    <div class="inputs">
                        <label for="hght" class="height">Please enter your height (cm)</label>
                        <input class="height" type="text" name="height" maxlength="4"/>
                    </div> 
                    <div id="submitbtns">
                             <!-- Redirect to review(add and read) page after submit
                        <label for="submitEditreview" class="com">If you have any feedback over the past month, we would like to know them!</label>
                        <input type="submit" id="submitEditreview" value="Reviews"> -->
                            <!-- Return to user homepage after submit-->
                            
                        <!-- <label for="submitEdit" id="homepage" class="com">Not now.</label> -->
                        <input type="submit" id="submitEdit" value="Update" name="follow_up">     
                    </div>
                </form>
            </section>
        </div>
    </article>
    <?php
    if(isset($_POST['follow_up'])){
            $maill=  mysqli_real_escape_string($db, $_POST['email']);
            $pllan= mysqli_real_escape_string($db, $_POST['plan']);
            $weightt= mysqli_real_escape_string($db, $_POST['weight']);
            $heightt=  mysqli_real_escape_string($db, $_POST['height']);
            $quererr = "select * from standard where height='$heightt'";
            $resulttt= mysqli_query($db,$quererr);
            if ($rowwe = mysqli_fetch_array($resulttt)){
                    $wemax =  $rowwe['weight_max'];
            }
                    $tag = $weightt - $wemax;
                    if($tag <= 0){
                        $id_pl = ("select plan_id from plan_detail where target = '0'");
                        $planx=mysqli_query($db,$id_pl);
                        if($plan_x = mysqli_fetch_array($planx)){
                            $plan = $plan_x['plan_id'];
                            $plan_target = mysqli_query($db,"select * from plan_detail where plan_id = $plan");
                            if($plan_y = mysqli_fetch_array($plan_target)){
                                $trgo = $plan_y['target']; }
                        }
                    }elseif($tag <= 15){
                        $id_pl = ("select plan_id from plan_detail where target = '15'");
                        $planx=mysqli_query($db,$id_pl);
                        if($plan_x = mysqli_fetch_array($planx)){
                            $plan = $plan_x['plan_id'];
                            $plan_target = mysqli_query($db,"select * from plan_detail where plan_id = $plan");
                            if($plan_y = mysqli_fetch_array($plan_target)){
                                $trgo = $plan_y['target']; }
                        }
                    }else{
                        $id_pl = ("select plan_id from plan_detail where target = '30'");
                        $planx=mysqli_query($db,$id_pl);
                        if($plan_x = mysqli_fetch_array($planx)){
                            $plan = $plan_x['plan_id'];

                        }
                        $plan_target = mysqli_query($db,"select * from plan_detail where plan_id = $plan");
                        if($plan_y = mysqli_fetch_array($plan_target)){
                            $trgo = $plan_y['target']; }
                    }
            $date =  date("Y/m/d");
            $follow="insert into child_history(email,plan_id,weight,height,plan_target,date)values('$maill','$pllan','$weightt','$heightt','$trgo','$date')";
                    $rees=mysqli_query($db, $follow);

                    $sqlll="update user set weight='$weightt', height='$heightt' , target='$tag' , plan_id='$plan'  where email='$username'";
    
                    $followw = mysqli_query($db,$sqlll);
        }
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
              
                <a  class="otherpagelinks" href="userprofilebasic.php">Home</a>
                <a  class="otherpagelinks" href="exercises.php?user_id=<?php echo $ro['user_id']; ?>">Exercises</a>
                <a  class="otherpagelinks"  href="basicmeal.php?user_id=<?php echo $ro['user_id']; ?>">Meals</a>
                <a  class="otherpagelinks" href="vedio.php?user_id=<?php echo $ro['user_id']; ?>">Reviews</a>
                <a  class="otherpagelinks" href="sponsers.php?user_id=<?php echo $ro['user_id']; ?>">Our Sponsors</a>
                <a class="otherpagelinks" href="newedit.php?user_id=<?php echo $ro['user_id']; ?>">Edit Info</a>
                <a  class="otherpagelinks" href="editsubscription.php?user_id=<?php echo $ro['user_id']; ?>">Edit Subscription</a>
                <?php
            }?>
                <!-- <hr> -->
                <a href="userprofilebasic.php?logout='1'" id="logout">Log Out
                    <img src="images/export.png" width="20px" alt="logout">
                </a>
            
            </aside>
   
        <article id="page_content">
            <div class="servicescard">
                <div class="services">
                    <img class="gifservice" src="images/salad.gif" width="50px">
                    <h2 class="serviceh2">Check out your meals for today.</h2>
                    <a class="arrow" href="basicmeal.php?user_id=<?php echo $ro['user_id']; ?>"><img class="nextarrow" src="images/arrow.png" alt="arrow next" width="50px" ></a>
                </div>
                <div class="services">
                    <img class="gifservice" src="images/walking.gif" width="50px">
                    <h2 class="serviceh2">Don't forget to move and be active today!</h2>
                    <a class="arrow" href="exercises.php?user_id=<?php echo $ro['user_id']; ?>"><img class="nextarrow" src="images/arrow.png" alt="arrow next" width="50px"></a>
                </div>
            </div>
            <?php
            $copon = mysqli_query($db,"select * from subcribe where s_id='1'");
$pro = mysqli_fetch_array($copon);
?>
            <div id="discount">
                <div id="percentdiv">
                    <p class="percentp">Get</p> <p id="percent"><?php echo $pro['discount']; ?></p> <p class="percentp">off</p>
                </div>
                <div id="discountcode">
                    <h3 id="sponsor">Sponsor</h3><h3 id="sponsordiscount">Discount</h3>
                    <table><tr>
                        <td> <hr> </td>
                        <td><span>Code</span></td> 
                        <td><hr></td>
                    </tr></table>                   
                </div>
                <div id="codess">
                <p  id="code"><?php echo $pro['promo_code']; ?></p> <p id="codename">Your code</p>
                </div>
            </div>
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

            // Update form
        function showupdateform(){
            let day = new Date();
            
            if(day.getDay() == 4){
 
                if(localStorage.last){
                    if( (localStorage.last - Date.now() ) / (1000*60*60*24) >= 1){ //Date.now() is in milliseconds, so convert it all to days, and if it's more than 1 day, show the div
                        document.getElementById('modal').style.display = 'flex'; //Show the div
                        localStorage.last = Date.now(); //Reset your timer
                        console.log((localStorage.last - Date.now() ) / (1000*60*60*24) +"first");
                        document.getElementById('header').style.filter = 'blur(1px)';
                        document.getElementById('links').style.filter = 'blur(1px)';
                        document.getElementById('page_content').style.filter = 'blur(1px)';
                    }
                    else if( (localStorage.last - Date.now() ) / (1000*60*60*24) <= 1){
                    console.log('succsess');
                    localStorage.clear();
                }
                }
                
                else {
                    localStorage.last = Date.now();
                    document.getElementById('modal').style.display = 'flex'; //Show the div because you haven't ever shown it before.
                    document.getElementById('header').style.filter = 'blur(1px)';
                    document.getElementById('links').style.filter = 'blur(1px)';
                    document.getElementById('page_content').style.filter = 'blur(1px)';
                }

            }

            else{
                document.getElementById('modal').style.display= 'none';
                document.getElementById('header').style.filter = 'blur(0px)';
                document.getElementById('links').style.filter = 'blur(0px)';
                document.getElementById('page_content').style.filter = 'blur(0px)';
            }
        }

        
        showupdateform();
    </script>
    
</body>
</html>