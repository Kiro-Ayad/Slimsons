<!DOCTYPE html>
<html>

<head>
<?php include('sarver.php'); 

?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>SlimSons subscription</title>
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
        nav{
            display: inline-flex;
            flex-direction: column;
            width: fit-content;
            height: 100%;
            position: absolute;
            justify-content: space-around;
            /* align-items: center; */
            text-align: center;
            border-right: solid 2px rgb(120, 187, 246);
            background-color: #FED439FF;
            box-shadow: 0px 2px 60px -20px #197EC0FF;
        }
        nav img{
            align-self: center;
        }
        nav div{
            border-top: solid 1px #fd782a;
            border-bottom: solid 1px #fd782a;
            padding: 10px;
            position: relative;
            font-size: 18px;
            font-weight: bold;
        } 
            /* Progress steps bar */
        .progressbar{
            position: absolute;
            right: 20px;
            /* top: 0; */
            border-radius: 50%;
            background: #fff;
            border: 1px #ccc solid;
            width: 1em;
            height: 1.2em;
            z-index: 2;
        }
        #sub>span{
            background: #fd772adf;
            border: 2px #fd782a solid;
            color: #04638d;
        }
        #pay>span{
            background: #ccc;
            border: 1px #ccc solid;
        }
        #pay::before{
            content: "";
            position: absolute;
            z-index: 0;
            border-left: 2.3px #0096d8 dotted;
            height: 19%;
            right: 28px;
            top: 47px;
        }
        article{
            margin-left: 400px ;           
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
            margin-top: 50px;
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
            left: 300px;
            bottom: 0px; 
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
</head>
<?php

if(isset($_SESSION['user_reg'])){
    $name=$_SESSION['user_reg'];
    
}
if(isset($_SESSION['loggedin'])){
   echo $_SESSION['loggedin'];
   unset($_SESSION['loggedin']);
}
if(isset($_POST['bsubscribe'])){
        
    $Cobra='1';
          $ql1="update user set sub_id='$Cobra' where name='$name'";
          $edit = mysqli_query($db,$ql1);
          
          header('location:payment.php');
        }
        
       if(isset($_POST['psubscribe'])){
        
            
        $Cobr='2';
              $ql1="update user set sub_id='$Cobr' where name='$name'";
              $edit = mysqli_query($db,$ql1);
              header('location:payment.php');
           }
           
?>
<body> 
    <nav>
        <img src="images/logo.png" width="120px">
        <div> 
            <p id="sub">Subscribe<span id="subspan" class="progressbar"></span></p> <p id="pay">Payment<span id="payspan"  class="progressbar"></span></p>
        </div>
        <img id="char" src="images/payment.png" width="200px" height="200px">
    </nav> 

    <article id="subscribe">
    
        <section>
            <?php
        $sub_b = mysqli_query($db,"select * from subcribe where s_id='1'");
$subon = mysqli_fetch_array($sub_b);
?>
            <div id="basic">
                <img class="image" src="imag/<?php echo $subon['logo']; ?>" alt="basic subsription icon" width="120px" height="120px"> 
                <h2><?php echo $subon['price']; ?> <sub>EGP</sub></h2>
                <h1>Basic Plan</h1>
                <form method='POST' >
                <input type="submit" name="bsubscribe" value="subscribe" id="basicSubBtn"/>
                <img id="icon" src="images/show-more.png" height="45px" width="45px"  onclick="basicshow();">
        </form>
            </div>
            <?php
            $sub_p = mysqli_query($db,"select * from subcribe where s_id='2'");
$subo = mysqli_fetch_array($sub_p);
?>
            <div id="premium">
                <img class="image" src="imag/<?php echo $subo['logo']; ?>" alt="premium subsription icon" width="120px" height="120px">
                <h2> <?php echo $subo['price']; ?> <sub>EGP</sub></h2>
                <h1> Premium Plan</h1>
                <form method='POST' >
                <input type="submit" name="psubscribe" value="subscribe" id="premiumSubBtn" />
                <img id="icon" src="images/show-more.png" height="45px" width="45px"  onclick="preiumshow();">
            </div>   
        </form>
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
        function basicshow() {
            document.getElementById('show1').style.display='block';
            document.getElementById('show2').style.display='none';
            document.getElementById('basic').style.transform= "scale(1.2)";
            document.getElementById('premium').style.transform= "scale(0.9)";
            document.getElementById('basic').style.boxShadow="0px 2px 90px -20px black";
            document.getElementById('premium').style.boxShadow="none";
        }
    
        function preiumshow() {
            document.getElementById('show2').style.display='block';
            document.getElementById('show1').style.display='none';
            document.getElementById('premium').style.transform= "scale(1.1)";
            document.getElementById('basic').style.transform= "scale(0.9)";
            document.getElementById('basic').style.boxShadow="none";
            document.getElementById('premium').style.boxShadow="0px 2px 90px -20px black";
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
