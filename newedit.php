
<!DOCTYPE html>
<html>

<head>
<?php
 include "sarver.php";
 ob_start();
 ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>SlimSons Edit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">
    <style>
        body{
            margin: 0;
            padding: 0;
            background-image: url('images/wallpaper.jpg');
            box-sizing: border-box;
            color: #1d4ba6;
            font-family: 'Overpass', sans-serif;
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
        h2{
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
        #icon{
            transform: translate(576px, 16px);
            /* z-index: 2; */
        }
        #useravatar{
            /* z-index:1; */
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
        h1{
            text-align:left;
            padding: 20px;
            margin-left: 120px;
            font-size: 40px;
        }
        #user{
            position: absolute;
            left:45%;
            top:11%;
            z-index: 2;
        }
        #un{
            background-color:#89cef4 ;
            border-radius: 100px;
            border: thick solid #fbfdff;
        }
        #edit{
            display: flex;
            margin: 20px 120px;
            justify-content: flex-start;
            border: thick solid #E2540C;
            box-shadow: 0px 2px 90px -20px #197EC0FF;
            background-image: url('images/bluepic.jpg');
            width:80%;
            height:40%;
        }
        form{
            font-size: 18px;
            margin: 90px 70px;
        }
        input[type=email], input[type=password], input[type= text]{
            border: none;
            box-shadow:0 0 20px 4px rgba(52, 51, 51, 0.155);
            border-bottom: 2px solid #197EC0FF;
            background-color: transparent;
            width: 100%;
            margin: 19px 0px;
            padding: 1px 10px;
        }
        input[type=email]:focus, input[type=password]:focus, input[type= text]:focus{
            border: 3px solid #fbd33b;
            outline: none;
        }
         /* containers for 2 inputs per line */
         #leftcontainer{
            width:48%;
            display: inline-block;
        }
        #rightcontainer{
            width:48%;
            margin-left:25px;
            display:inline-block;
        }
        /* AVATAR RADIO BUTTONS */
        #char{
            display: inline-flex;
            flex: row wrap;
            align-items: center;
            margin-top: 20px;
        }
        #avatar{
            width: 200px;
        }
        label>input[type=radio] {  
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        input[type=radio] + img {
            cursor: pointer;
        }
        input[type=radio]:checked + img {
            outline: 2px solid #E2540C;
        } 
        .avatarpics{
            padding: 10px;
            display: inline;
        }
        label>img{
            margin: 0 3px;
        }
        #back, input[type=submit]{
            font-size: 16px;
            background-color: transparent;
            border-radius: 10px;
            border: 3px solid #bb460b;
            cursor: pointer;
            margin: 10px;
            padding: 5px;
        }
        #submitedit{
            transform: translate(830px,70px);
            width:15%;
        }
        #back{
            transform: translate(-210px,70px);
            display: inline-block;
            text-align: center;
            text-decoration: none;
            color: black;
            width:10%;
        }
        input[type=submit]:hover, #back:hover{
            background-color: rgba(235, 243, 249, 0.34);
            border: 3px solid #fbd33b;
        }
    </style>
</head>




 <?php
 $id=$_GET['user_id'];
$qry1 = mysqli_query($db,"select * from user where user_id='$id'");
$ro = mysqli_fetch_array($qry1);

if(isset($_POST['update']))
{
    $name= $_POST['username'];                   
    $pass= $_POST['pasw1'];
    $pasw= $_POST['pasw2'];
    $phone_number=$_POST['childphnum'];
    $address=$_POST['add'];              
    $ava=$_POST['avatar'];                                             
    if($pasw != $pass){
        array_push($error, "Passwords do not match.");
    }                       
    

    $ql1="update user set name='$name', password='$pass',phone='$phone_number' ,address='$address' ,avatar='$ava'  where user_id='$id'";
    
    $edit = mysqli_query($db,$ql1);

   
    if($edit)
    {
        header('location:userprofilepremium.php');
           
    }
    else{
    
        echo mysqli_error($db);
    }
}
?>
<body>
<nav>
        <header id="header">
            <div id="open">
                <span onclick="openNav()">&#9776;</span> </div>
            <div id="headerborder"></div>
            <h2><?php echo $ro['name'] ?></h2>
            <img src="<?php echo $ro['avatar'] ?>" width="120px" id="useravatar" alt="avatar">
            <a href="#childusername" ><img id="icon" src="images/edit.png" alt="edit icon" width="30px" height="30px"></a>
        </header>
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
    </nav>
    <h1> Edit Profile</h1>
    <section>
        
        <div id="edit">
            <form method="POST">
                <label for="childun">Username</label>
                <input id="childusername" type="text" name="username" value="<?php echo $ro['name']?>" required/>
                <div id="leftcontainer">
                    <label for="childpass">Enter your new your password</label>
                    <input id="childpass" type="password" name="pasw1" minlength="8" required/></div>
                <div id="rightcontainer">
                    <label for="childrepass">Confirm your new password</label>
                    <input id="childrepass" type="password" name="pasw2" minlength="8" required/></div>
                <br>
                
                <label for="phoneno">Edit your Phone Number</label>
                <input id="phoneno" type="text" name="childphnum" maxlength="11" value="<?php echo $ro['phone']?>" required/> 
                <label for="add">Edit your Address</label>
                <input id="add" type="text" name="add"  value="<?php echo $ro['address']?>" />
                <!-- child avatars -->
                <div id="char">
                    <label id="avatar" for="avatar">Edit your avatar:</label>
                        <div class="avatarpics">
                            <label for="pic1">
                                <input type="radio" id="pic1" name="avatar" value="images/male1.png">
                                <img src="images/male1.png" width="110px" height="150px"> </label>
                            <label for="pic2">
                                <input type="radio" id="pic2" name="avatar" value="images/male2.png">
                                <img src="images/male2.png" width="110px" height="150px"> </label>  
                            <label for="pic3">
                                <input type="radio" id="pic3" name="avatar" value="images/male3.png">
                                <img src="images/male3.png" width="110px" height="150px"> </label>   
                            <label for="pic4">
                                <input type="radio" id="pic4" name="avatar" value="images/female1.png">
                                <img src="images/female1.png" width="110px" height="150px" ></label> 
                            <label for="pic5">
                                <input type="radio" id="pic5" name="avatar" value="images/female2.png">
                                <img src="images/female2.png" width="110px" height="150px"></label> 
                            <label for="pic6">
                                <input type="radio" id="pic6" name="avatar" value="images/female3.png">
                                <img src="images/female3.png" width="110px" height="150px"></label>
                        </div> 
                </div>
            
        
        <input id="submitedit" type="submit" value="Submit Edit" name="update"/>
        <a id="back" href="userprofilepremium.php" >Back</a>
</form>
</div>

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
<?php /*
<h3 id="up">what do you want new?</h3>
<form method="POST">
    <input class="boxes" type="text" name="name" value="<?php echo $ro['name']?>">
    <input class="boxes" type="text" name="email" value="<?php echo $ro['email']?>">

    <input class="boxes" type="text" name="password" value="<?php echo $ro['password']?>">
    <input class="boxes" type="text" name="number" value="<?php echo $ro['phone']?>">
    <input class="boxes" type="text" name="national_id" value="<?php echo $ro['national_id']?>">
    <input class="boxes" type="text" name="address" value="<?php echo $ro['address']?>">
    <input class="boxes" type="text" name="payment" value="<?php echo $ro['method_of_payment']?>">
    
    <input id="button" type="submit" name="update" value="update">

</from>
*/?>