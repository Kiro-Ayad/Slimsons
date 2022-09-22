<!DOCTYPE html>
<html>

<head>
<?php
 include "sarver.php";
 ?>
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>SlimSons Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">
    <style>
         body{
            margin: 0;
            padding: 0;
            background-image: url('images/wallpaper.jpg');
            box-sizing: border-box;
            color: #123e4f;
            font-family: 'Overpass', sans-serif;
        }
        section{
            display: flex;
            margin: 20px 100px;
            justify-content: flex-start;
            border: thick solid #E2540C;
            box-shadow: 0px 2px 90px -20px #197EC0FF;
            background-image: url('images/bluepic.jpg');
        }
        h1{
            color: #bb460b;
            text-align: center;
            padding: 20px;
            font-size: 40px;
        }
        form{
            font-size: 18px;
            margin: 0 70px;
            position: relative;
        }
        .parentposter, .childposter{
            box-shadow: 7px 13px 137px -57px rgba(226,84,12,0.75);
        }
        .childposter,.parentposter{
            display: flex;
        }
        .childposter>img,.parentposter>img{
            position: sticky;
            top:0;
        }
             /* Form Style (parent and child textboxes) */
        input[type=email], input[type=password], input[type= text], input[type=date]{
            border: none;
            box-shadow:0 0 20px 4px rgba(52, 51, 51, 0.155);
            border-bottom: 2px solid #197EC0FF;
            background-color: transparent;
            width: 100%;
            margin: 15px 0px;
            padding: 1px 10px;
        }
        #bd, #birthday{
            width:50%;
            margin-top:10px;
        }
        #birthday{
            margin-left:12px;
        }
        input[type=email]:focus, input[type=password]:focus, input[type= text]:focus{
            border: 3px solid #fbd33b;
            outline: none;
        }
        .dis{
          margin:15px 5px;  
          margin-left:30px;
        }
        #other{
            margin:0 10px;
            width:50%;
        }
            /* containers for 2 inputs per line */
        #leftcolumncontainer{
            width:46%;
            display: inline-block;
        }
        #rightcolumncontainer{
            width:46%;
            margin-left:25px;
            display:inline-block;
        }
            /* GENDER RADIO BUTTIONS */
        .gender{
            margin:15px 0;
        }
        #male{
        
            margin-left:30px;
        }
        #female{
            margin-left:50px;
        }
            /* AVATAR RADIO BUTTONS */
        #divider{
            display: inline-flex;
            flex: row wrap;
            align-items: center;
        }
        #labelA{
            width: 300px;
            margin-bottom: 200px;
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

        input[type=submit]{
            background-color: transparent;
            border-radius: 10px;
            width:25%;
            border: 3px solid #bb460b;
            cursor: pointer;
            margin: 50px 195px;
            padding: 2px;
        }
        input[type=submit]:hover{
            background-color: rgba(235, 243, 249, 0.34);
            border: 3px solid #fbd33b;
        }
                /* already member style */
        p{
            text-align: center;
            font-size: large;
        }
        p a{
            color:#bb460b;
            text-decoration: none;
        }
        p a:hover{
            color: rgb(15, 72, 110);
        }
      
      </style>
           <?php 
            if(count($error)>0):
        ?>
            <?php
                foreach($error as $error1) {
                    echo $error1."<br>";
                }
            ?>
        </div>
        <?php endif ?>
</head>
<body>
<section id="childregister">
                    <div class="childposter">                         
                        
                            <!-- Would you like to add a Parent's Account?
                            <input type="checkbox" name="parentAccntChckbx" id="parentAccntChckbx" onchange="showparent();"> <br>  -->
                        <img id="childp" src="images/childposter.gif" alt="poster of children" width="450px" height="600px"></div>

                    <form class="childreg" method="POST" >
                  
                        <h1  id="child">Registration</h1> 
                        <label for="birthday" id="bd">Enter your Date of birth</label>
                                <input id="birthday" type="date" name="birthday" min="2003-01-01" max="2009-12-31" required onchange="parentAccount();"/>
                                <p style="font-size: small; ">(children under 16 years must have a Parent account linked).</p>
                        <label for="childusername">Username</label>
                                <input id="childusername" type="text" name="username" placeholder="username..." required/>
                                <div id="leftcolumncontainer">
                                    <label for="childpassword">Enter your password</label>
                                    <input id="childpassword" type="password" name="pass1" minlength="8" required/></div>
                                <div id="rightcolumncontainer">
                                    <label for="childrepassword">Confirm password</label>
                                    <input id="childrepassword" type="password" name="pass2" minlength="8" required/></div>
                                <br>
                                
                                <div id="mail"><label for="childemail">Please enter your Email address</label>
                                <input id="childemail" type="email" name="email" placeholder="urmail@domain.com" required/></div>
                                <label for="childphoneno">Enter your Phone Number</label>
                                <input id="childphoneno" type="text" name="childphnum" maxlength="11" required/>
                                <br>
                                    <label for="add">Enter your Address</label>
                                    <input id="add" type="text" name="add" required/> 
                                <div id="leftcolumncontainer">
                                    <label for="weight" class="weight">Please enter your weight (kg)</label>
                                    <input class="weight" type="text" name="weight" maxlength="4" required/></div>
                                <div id="rightcolumncontainer">
                                    <label for="height" class="height">Please enter your height (cm)</label>
                                    <input class="height" type="text" name="height" maxlength="4" required/></div>
                                <label for="gender" class="gender">Select your Gender:</label>
                                <input type="radio" id="male" class="gender" name="gender" value="male"/>
                                <label for="male" class="gender">Male</label>
                                <input type="radio" id="female" class="gender" name="gender" value="female"/>
                                <label for="female" class="gender">Female</label>  
                                
                                     <!-- user avatars -->
                                <div id="divider">
                                    <label id="labelA" for="avatar">Select your avatar:</label>
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
            
                                <input id="registerchild" type="submit" value="Register" name="register"/>
                    </form>
                </section>

            
         <!-- Parent register form -->
    <section id="parentRegister" style="display: none;"> 
        <form class="parentreg" method="POST" action="register.php">
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
        <h1>Supervised Registration</h1>
            <label for="childusername">Username</label>
            <input id="childusername" type="text" name="username" placeholder="username..." required/>
            <label for="email">Please enter your Email address</label>
            <input id="email" type="email" name="mail" placeholder="urmail@domain.com" required/>
            <br>
            <label for="phoneno">Enter your Phone Number</label>
            <input id="phoneno" type="text" name="phnum" maxlength="11" required/>
            <br>
            <label for="natid">Enter your national ID</label>
            <input id="natid" type="text" name="natid" maxlength="14" required/>
                                <div id="leftcolumncontainer">
                                    <label for="childpassword">Enter your password</label>
                                    <input id="childpassword" type="password" name="pass1" minlength="8" required/></div>
                                <div id="rightcolumncontainer">
                                    <label for="childrepassword">Confirm password</label>
                                    <input id="childrepassword" type="password" name="pass2" minlength="8" required/></div>
                                <br>
                                <label for="birthday" id="bd">Enter your Date of birth</label>
                                <input id="birthday" type="date" name="birthday" min="2006-01-01" max="2009-12-31"/><br>
                                
                                    <label for="add">Enter your Address</label>
                                    <input id="add" type="text" name="add" required/> 
                                <div id="leftcolumncontainer">
                                    <label for="weight" class="weight">Please enter your weight (kg)</label>
                                    <input class="weight" type="text" name="weight" maxlength="4" required/></div>
                                <div id="rightcolumncontainer">
                                    <label for="height" class="height">Please enter your height (cm)</label>
                                    <input class="height" type="text" name="height" maxlength="4" required/></div>
                                  <label for="gender" class="gender">Select your Gender:</label>
                                <input type="radio" id="male" class="gender" name="gender" value="male"/>
                                <label for="male" class="gender">Male</label>
                                <input type="radio" id="female" class="gender" name="gender" value="female"/>
                                <label for="female" class="gender">Female</label>  <br>
                                
                                                <!-- user avatars -->
                                                <div id="divider">
                                                <label id="labelA" for="avatar">Select your avatar:</label>
                                        <div class="avatarpics">
                                            
                                            <label for="pic7">
                                                <input type="radio" id="pic7" name="pavatar" value="images/male1.png">
                                                <img src="images/male1.png" width="110px" height="150px"> </label>
                                            <label for="pic8">
                                                <input type="radio" id="pic8" name="pavatar" value="images/male2.png">
                                                <img src="images/male2.png" width="110px" height="150px"> </label>  
                                            <label for="pic9">
                                                <input type="radio" id="pic9" name="pavatar" value="images/male3.png">
                                                <img src="images/male3.png" width="110px" height="150px"> </label>   
                                            <label for="pic10">
                                                <input type="radio" id="pic10" name="pavatar" value="images/female1.png">
                                                <img src="images/female1.png" width="110px" height="150px" ></label> 
                                            <label for="pic11">
                                                <input type="radio" id="pic11" name="pavatar" value="images/female2.png">
                                                <img src="images/female2.png" width="110px" height="150px"></label> 
                                            <label for="pic12">
                                                <input type="radio" id="pic12" name="pavatar" value="images/female3.png">
                                                <img src="images/female3.png" width="110px" height="150px"></label>
                                        </div> 
                                </div>
            
            
                                <input id="registerparent" type="submit" value="Register" name="pregister"/>
        </form>
        <div class="parentposter"> <img id="parentp" src="images/family.gif" alt="poster of parents" width="450px" height="600px"></div>

    </section>

    <p> Already a member? <a href="log.php">LogIn</a></p>
    <script>
    var birthday = document.getElementById("birthday");
    var mail = document.getElementById("mail");

function parentAccount(){
    var bdv = birthday.value;
    var birth = Date.parse(bdv);
    var datenow= Date.now();
    var ageDate = datenow - birth;
    var minutes= 1000*60;
    var hours= minutes*60;
    var days=hours*24;
    var years= days*365;
    var age = Math.round(ageDate/years);

    if( age < '16'){
        alert(' Sorry , Children Under 16 Years Must Have Parent Supervision! ');
        parentRegister.style.display = 'flex';
        childregister.style.display='none';
        mail.style.display='none';
    }
    else{
        parentRegister.style.display = 'none';
        registerchild.style.display='block';
        mail.style.display='block';
    };
}
// function showparent(){
//     if(parentAccntChckbx.checked){
//         parentRegister.style.display = 'flex';
//         registerchild.style.display='none';
//     }
//     else{
//         parentRegister.style.display = 'none';
//         registerchild.style.display='block';
//     };
// }
    </script>
</body>
</html>