<!DOCTYPE html>
    <html>

    <head>
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
                box-sizing: border-box;
                font-family: 'Overpass', sans-serif;
            }
            #admin{
                display:flex;
                margin-left:200px;
                margin-top:60px;
                width:400px;
                height: 400px;
                z-index:1;
            }
            form{
            font-size: larger;
            border-radius: 20px;
            background-color: rgba(245, 245, 245, 0.493); 
            box-shadow: 0px 0px 109px -9px rgb(0 0 0 / 76%);
            width: 35%;
            height:35%;
            padding: 20px;
            position: fixed;
            top: 40%;
            left: 58%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index:2;
            }
        h1{
            font-size: xx-large;
             margin:20px;
         }
        .login{
            float:right;
            margin: 10px 10px;
            display: flex;
            flex-direction: column;
            
        }
        img{
            margin-right:10px;
        }
            #adminmail,#adminpassword{
            width: 80%;
            margin: 5px 20px;
            background-color: transparent;
            }
            input[type=email]:focus, input[type=password]:focus{
            border: 1px solid rgb(232 161 11);
            outline: none;
        }
        input[type=submit]{
            background-color: transparent;
            font-weight: bold;
            border-radius: 10px;
            color:rgb(5, 23, 82);
            width:35%;
            font-size: x-large;
            border: none;
            background-color:#f7802e;
            cursor: pointer;
            margin: 1px 190px;
            padding: 2px;
        }
        input[type=submit]:hover{
            border: 2px solid #f7802e;
        }
        #footer{
                z-index:-1;
                width: 100%;
                height: 250px;
                position:fixed;
                bottom:0;
        }
        </style>
        </head>
        <body>
        <section>
                <div >
                    <img id="admin" src="images/admin.png">
                </div>
<?php include('sarver.php'); ?>
<form method='POST'>
            
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
            <h1>Admin Login</h1>
            <div class="login">
                        <label for="adminmail"><img src="images/user.png" width="20px" height="20px"> Email</label>
                        <input id="adminmail" type="email" name="adminmail" placeholder="urmail@domain.com..." autofocus required/>
                    </div>
                    <div class="login">
                        <label for="adminpassword"><img src="images/padlock.png" width="20px" height="20px"> Password</label>
                        <input id="adminpassword" type="password" name="adminpass" required/>
                    </div>
                    <input type="submit" value="LogIn" name="adminLogIn"/>
                  
                                
                </form>
                </section>
             <footer>
                <img id="footer" src="images/footer.png">
             </footer>
        </body>
        </html>