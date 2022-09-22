<!DOCTYPE html>
<html>

<head>
<?php
include "sarver.php";
ob_start();
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>SlimSons Edit Subscription</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">
    <style>
        body{
            /* background-image: url('images/wallpaper2.png'); */
            font-family:'Overpass', sans-serif;
            padding: 0px;
            margin: 0px;
            background-image: url('images/wallpaper.jpg');
            
        }
        #open {
            color: black;
            font-size: 45px;
            position: absolute;
            cursor: pointer;
            transition: margin-left .5s;
            padding: 16px;
        }
        #header{
            /* background-image: url('images/wallpaper.gif'); */
            width: 100%;
            height: 170px;
            z-index: 1;
            position: relative;
            background-color: #1d4ba696;
            box-shadow: 0px 2px 60px -20px #197EC0FF;
        }
        #h2{
            color: black;
            float: right;
            transform: translate(-450px, 100px);
        }
        #headerborder{ 
            margin-bottom: 20px;
            background-color: #e87e41;
            width: 98%;
            height: 50px;
            transform: translate(15px, 107px);
            z-index: -1;
            position: absolute;
            border-radius: 5px;
        }
        #useravatar{
                /* float: right; */
            transform: translate(600px, 40px);
            background-color: #91d3f6;
            border-radius: 100px;
            /* box-shadow: 0px -8px 55px -6px rgba(0,0,0,0.49); */
            border: solid 1px #91d3f6;
            /* box-shadow: 0px -8px 55px -6px rgb(43 62 72 / 26%); */
            padding: 2px;
        }
         #links {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color:#FED439FF;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
    }
    .links .close{
            padding: 8px;
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            color:#195978;
        }
        #links>button{
            text-align: left;
            background: none;
            border: none;
            
        }
        #links>a , #links>button{
            cursor: pointer;
            font-size: larger;
            padding:20px;
            text-decoration: none;
           color:#195978;
            display: block;
            transition: 0.3s;
        }
        #links>a:hover , #links>button:hover , #links>span:hover{
            /* color: #d15c3e; */
            color: #E55A36;
        }
        .otherpagelinks {
            display: inline-block;
            position: relative;            
            width: 200px;
            }
        .otherpagelinks:after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #0087ca;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
            }

        .otherpagelinks:hover:after {
            transform: scaleX(1);
            transform-origin: bottom left;
            }
        #logout>img{
            /* justify-self: flex-end; */
            transform: translate(5px, 3px);
        }
        article{
            margin-left: 200px ;           
        }
        section{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            text-align: center;
            flex-direction: row;
            align-items: center;
        }
        #basic, #premium{ 
            width: 20%;
            margin-top: 40px;
            border-radius: 10%;
            padding: 5px;
            position: relative;
            background-color: #3796bf30;
        
        }
        #premium{
            margin-right: 200px;
        }
        sub{
            font-size: small;
        }
        #icon{
            position: absolute;
            left:80%;
            z-index: 2;
            transform: translate(10px, 10px);
            cursor: pointer;
        }
        input[type=submit]{
            width:fit-content;
            height:7%;
            border-radius: 10%; 
            background-color: #ebbb14;  
            cursor: pointer;
        }
        ul{
            list-style-image:url('images/check-mark.png');
            width: 70%;
            min-height: 200px;
            /* background-image: url('images/bluepic.jpg'); */
            position: absolute;
            left: 295px;
            font-size: 22px;
            margin:0;
            padding:10px 0;
            box-shadow: 0px 2px 90px -20px black;
            border-radius: 20px 20px 0 0;

        }
        li{
            padding: 3px 5px;
        }
 

    </style>
    <?php
$id=$_GET['user_id'];
$qry1 = mysqli_query($db,"select * from user where user_id='$id'");
$ro = mysqli_fetch_array($qry1);
?>
    <?php
    if(isset($_POST['besubscribe'])){
        
            
        $Cobra='1';
              $ql1="update user set sub_id='$Cobra' where user_id='$id'";
              $edit = mysqli_query($db,$ql1);
              header('location:payment.php');
           
            }
           if(isset($_POST['pesubscribe'])){
            
                
            $Cobr='2';
                  $ql1="update user set sub_id='$Cobr' where user_id='$id'";
                  $edit = mysqli_query($db,$ql1);
                  header('location:payment.php');
               }
               
    ?>
</head>
<body> 

    <nav>
        <header id="header">
            <div id="open">
                <span onclick="openNav()">&#9776;</span> </div>
            <div id="headerborder"></div>
            <h2 id="h2"><?php echo $ro['name'] ?></h2>
            <img src="<?php echo $ro['avatar'] ?>" width="120px" id="useravatar">
        </header>
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
    </nav>
    <?php
        $sub_b = mysqli_query($db,"select * from subcribe where s_id='1'");
$subon = mysqli_fetch_array($sub_b);
?>
    <article id="subscribe">
        <section>
            <div id="basic">
                <img class="image" src="imag/<?php echo $subon['logo']; ?>" alt="basic subsription icon" width="120px" height="120px"> 
                <h2><?php echo $subon['price']; ?> <sub>EGP</sub></h2>
                <h1>Basic Plan</h1>
                <form method='POST' >
                <input type="submit" name="besubscribe" value="subscribe" id="basicSubBtn"/>
                <img id="icon" src="images/show-more.png" height="45px" width="45px"  onclick="basicshow();">
            </form>
            </div>
            <?php
            $sub_p = mysqli_query($db,"select * from subcribe where s_id='2'");
$subo = mysqli_fetch_array($sub_p);
?>
            <div id="premium">
                <img class="image" src="imag/<?php echo $subo['logo']; ?>" alt="premium subsription icon" width="120px" height="120px">
                <h2><?php echo $subo['price']; ?> <sub>EGP</sub></h2>
                <h1> Premium Plan</h1>
                <form method='POST' >
                <input type="submit" name="pesubscribe" value="subscribe" id="premiumSubBtn" />
                <img id="icon" src="images/show-more.png" height="45px" width="45px"  onclick="preiumshow();">
            </form>
            </div>   
        </section>

            <div id="showoffers">
                <ul id="show1" style="display:none;">
                    <li>Daily meal plans are offered, giving you some healthy meal ideas for your day.</li>
                    <li>Daily exercies are offered, to assist you in living a daily active life and forming a healthy body through a healthy lifestyle. </li>
                    <li>10% Discount code for our sponsors (restaurants, healthy supermarkets and gyms), we partnered with the best only to give you the best!</li>
                    <li>Weekly follow up, us checking in to see your progress and make sure you don't lose your motivation.</li>
                    <!-- <img src="images/show-less.png"  height="60px" width="60px" onclick="document.getElementById('show1').style.display='none'"> -->
                </ul>
                <ul id="show2" style="display:none;">
                    <li>Daily meal plans are offered, giving you some healthy meal ideas for your day.</li>
                    <li>We like to pamper our premium subscribers by giving them alternative plans to choose among</li>
                    <li>Daily exercies are offered, to assist you in living a daily active life and forming a healthy body through a healthy lifestyle. </li>
                    <li>25% Discount code for our sponsors (restaurants, healthy supermarkets and gyms), we partnered with the best only to give you the best!</li>
                    <li>Weekly follow up, us checking in to see your progress and make sure you don't lose your motivation.</li>
                    <!-- <img src="images/show-less.png"  height="60px" width="60px" onclick="document.getElementById('show2').style.display='none'"> -->
                </ul>
            </div>
    </article>

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
        function basicshow() {
            document.getElementById('show1').style.display='block';
            document.getElementById('show2').style.display='none';
            document.getElementById('basic').style.transform= "scale(1.2)";
            document.getElementById('premium').style.transform= "scale(0.9)";
            document.getElementById('basic').style.boxShadow="0px 2px 90px -20px black";
            document.getElementById('premium').style.boxShadow="none";
            document.getElementById('show1').style.marginTop= "100px";
        }
    
        function preiumshow() {
            document.getElementById('show2').style.display='block';
            document.getElementById('show1').style.display='none';
            document.getElementById('premium').style.transform= "scale(1.2)";
            document.getElementById('basic').style.transform= "scale(0.9)";
            document.getElementById('basic').style.boxShadow="none";
            document.getElementById('premium').style.boxShadow="0px 2px 90px -20px black";
            document.getElementById('show2').style.marginTop= "100px";
        }   
            // label in stepper bar
        var subLabel = document.getElementById('subspan'); 
        function subscribeShow(){
            subscribe.style.display='block';
            payment.style.display='none';
            payLabel.style.background='#ccc';
            payLabel.style.border='1px #ccc solid';
            subLabel.innerHTML=' ';
        }
    </script>
</body>
</html>