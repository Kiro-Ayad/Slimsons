<!DOCTYPE html>
<html>
<head>
<?php include('sarver.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>SlimSons LogIn</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">
    <style>
        body{
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
            font-weight: 500;
            background-image: url(images/wallpaper.gif);
            background-size: cover;
            background-repeat: repeat-y;
            background-attachment: scroll;
            font-family: 'Overpass', sans-serif;
        }
        section{
            display: flex;
            width:775px;
            transform: translate(38%,19%);
            /* margin: 100px 280px; */
            border-radius: 20px;
            box-shadow: 0px 2px 90px -20px #197EC0FF;
            background-image: url('images/bluepic.jpg');
        }
        h1{
            color: #416172;
            text-align: center;
            padding: 20px;
            font-size: 40px;
        }
        form{
            display:flex;
            align-items: center;
            flex-direction: column;
            font-size: 24px;
            margin: 0 5px;
            position: relative;
            
        }
        #enter{
            display: flex;
            box-shadow: 7px 13px 137px -57px rgba(226,84,12,0.75);
        }
        #enter>img{
            width:300px;
            height:300px;
            transform: translate(-4%, 30%);
        }
       input[type=password], input[type= email]{
            font-size: 18px;
            display:flex;
            border: none;
            box-shadow:0 0 20px 4px rgba(52, 51, 51, 0.155);
            border-bottom: 2px solid #e87e41;
            color: #416172;
            background-color: transparent;
            width: 100%;
            margin: 15px 0px;
            padding: 1px 10px;
        }
        input[type=email]:focus, input[type=password]:focus, input[type= text]:focus{
            border: 3px solid #fbd33b;
            outline: none;
        }
        #btn{
            color: #416172;
            font-size: x-large;
            font-weight: bolder;
            display:flex;
            justify-content: center;
            background-color: transparent;
            border-radius: 10px;
            width:25%;
            border: 3px solid #e87e41;
            cursor: pointer;
            margin: 25px 195px;
            padding: 2px;
        }
        #btn:hover{
            font-weight: lighter;
            border: 3px solid #fbd33b;
        }
        p{
            text-align: center;
            font-size: large;
        }
        p a{
            color:#bb460b;
            text-decoration:none;
        }
        p a:hover{
            color: rgb(15,72,110);
        }
</style>
</head>

<section id="userlogin">
<form method='POST' class="login" >
            
            <?php 
                if(count($error)>0):
            ?>
            <div class="error">
                <?php
                    foreach($error as $error1) {
                        echo $error1."<br>";
                    }
                ?>
            </div>
            <?php endif ?>
            <h1>Member Login</h1>
           <div id="container1">
               <label for="loginmail"><img src="images/user.png" width="20px" height="20px"> Email</label>
               <input id="loginmail" type="email" name="user" placeholder="urmail@domain.com..." autofocus required/>
           </div>
           <div id="container2">
               <label for="loginpassword"><img src="images/padlock.png" width="20px" height="20px"> Password</label>
               <input id="loginpassword" type="password" name="pass" required/>
           </div>
           <input id="btn" type="submit" value="LogIn" name="login"/>
           <p>new member? <a href="register.php">Register Now</a></p>
       </form>
       <div id="enter"><img src="images/loginenter2.png" alt="enter avatar"></div>                                
                </form>
                
                </section>
   </body>
</html>