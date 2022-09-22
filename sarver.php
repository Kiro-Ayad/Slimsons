<?php
error_reporting(0);
    if(!isset($_SESSION))
    {
        session_start();    
        $error=array();
        $db=mysqli_connect('localhost','root','','slimson');
        }
 //login parent
 

 if(isset($_POST['login'])){
     
    $username=mysqli_real_escape_string($db, $_POST['user']);
    $password= mysqli_real_escape_string($db, $_POST['pass']);
    

    //login
    if(empty($username)){
        array_push($error, "username is required.");
    }
    if(empty($password)){
        array_push($error, "password is required to log in.");
    }
  // if($username=="SELECT email from children" AND $password=="SELECT")
    //check user info in database
    if (count($error)==0){
        $query= "SELECT * FROM user WHERE  email='$username'  AND password='$password'";
       
        
       $result= mysqli_query($db, $query);
      $rew=mysqli_fetch_array($result);
      if($rew['sub_id']=='1'){      
            $_SESSION['username']= $username;
            $_SESSION['email']= $username;
            $_SESSION['loggedin']= " Welcome back, you are logged in.";
            header('location:userprofilebasic.php'); 
      }elseif(($rew['sub_id']=='2')){
        $_SESSION['username']= $username;
        $_SESSION['email']= $username;
        $_SESSION['loggedin']= " Welcome back, you are logged in.";
        header('location:userprofilepremium.php'); 
      }else{
        array_push($error, "incorrect email or password");
       
      }
    }
    }

  

//admin login
if(isset($_POST['adminLogIn'])){
    $user=mysqli_real_escape_string($db, $_POST['adminmail']);
    $psw= mysqli_real_escape_string($db, $_POST['adminpass']);

    if(empty($user)){
        array_push($error, "username is required.");
    }
    if(empty($psw)){
        array_push($error, "password is required to log in.");
    }
    //check user info in database
    if (count($error)==0){
        $query= "SELECT * FROM admin WHERE email='$user' AND password='$psw'";
        $result= mysqli_query($db, $query);

        if(mysqli_num_rows($result)==1){
            $_SESSION['adminmail']= $user;
            $_SESSION['loggedin']= " Welcome back, you are logged in.";
            header('location:admin.php');                
        }else{
            array_push($error, "incorrect email or password");
        }
    }
}
  



        //new register for the big teeneger
        if(isset($_POST['register'])){
            $name=mysqli_real_escape_string($db, $_POST['username']);
            $mail= mysqli_real_escape_string($db, $_POST['email']);
            $pass1= mysqli_real_escape_string($db, $_POST['pass1']);
            $pass2= mysqli_real_escape_string($db, $_POST['pass2']);

            $birthday= mysqli_real_escape_string($db, $_POST['birthday']);
            $chphone= mysqli_real_escape_string($db, $_POST['childphnum']);
            $address= mysqli_real_escape_string($db, $_POST['add']);


            $gender= mysqli_real_escape_string($db, $_POST['gender']);

            
            $weight= mysqli_real_escape_string($db, $_POST['weight']);
            $height= mysqli_real_escape_string($db, $_POST['height']);
            
            /*$targ= $weight/$height^2; */

            $date =  date("Y/m/d");
            $quererr = "select * from standard where height='$height'";
    $resulttt= mysqli_query($db,$quererr);
    if ($ro = mysqli_fetch_array($resulttt)){
            $wemax =  $ro['weight_max'];
    }
            $tag = $weight - $wemax;
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
                    $plan_target = mysqli_query($db,"select * from plan_detail where plan_id = $plan");
                    if($plan_y = mysqli_fetch_array($plan_target)){
                        $trgo = $plan_y['target']; }
                }
            }
            
            $avatar= mysqli_real_escape_string($db, $_POST['avatar']);
            
            if(empty($name)){

                array_push($error, "name is required.");
            }
          
            if(empty($mail)){
                array_push($error, "your email is required.");
            }
            if(empty($pass1)){
                array_push($error, "your password is required.");
            }
            if($pass1 != $pass2){
                array_push($error, "Passwords do not match.");
            }
            if(empty($birthday)){
                array_push($error, "your birthday is required.");
            }
            if(empty($address)){
                array_push($error, "your address is required.");
            }
            if(empty($gender)){
                array_push($error, "your gender is required.");
            }
            
            if(empty($weight)){
                array_push($error, "your weight is required.");
            }
            if(empty($height)){
                array_push($error, "your height is required.");
            } 
            if(empty($avatar)){
                array_push($error, "please choose an avatar");
            } 
            //save info in database
                if(count($error)==0) {
                    $sqll= "INSERT INTO user(name,email,password,birthdate,phone,gender,address,weight,height,target,plan_id,avatar)Values('$name','$mail','$pass1','$birthday','$chphone','$gender','$address','$weight','$height','$tag','$plan','$avatar')";
                    $ress=mysqli_query($db, $sqll);

                    $hhh="insert into child_history(email,plan_id,weight,height,plan_target,date)values('$mail','$plan','$weight','$height','$trgo','$date')";
                    $res=mysqli_query($db, $hhh);
                        $_SESSION['user_reg']= $name;
                        header('location:subscribtion.php');                
                    
                }                
            }

        
      
        // register from the parent
        if(isset($_POST['pregister'])){
            
            $name=mysqli_real_escape_string($db, $_POST['username']);
            $pass1= mysqli_real_escape_string($db, $_POST['pass1']);
            $pass2= mysqli_real_escape_string($db, $_POST['pass2']);

            $birthday= mysqli_real_escape_string($db, $_POST['birthday']);
            
            $address= mysqli_real_escape_string($db, $_POST['add']);


            $gender= mysqli_real_escape_string($db, $_POST['gender']);
            $date =  date("Y/m/d");
            
            $weight= mysqli_real_escape_string($db, $_POST['weight']);
            $height= mysqli_real_escape_string($db, $_POST['height']);
            $quererr = "select * from standard where height='$height'";
            $resulttt= mysqli_query($db,$quererr);
            if ($ro = mysqli_fetch_array($resulttt)){
                    $wemax =  $ro['weight_max'];
            }
                    $tag = $weight - $wemax;
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
                            $plan_target = mysqli_query($db,"select * from plan_detail where plan_id = $plan");
                            if($plan_y = mysqli_fetch_array($plan_target)){
                                $trgo = $plan_y['target']; }
                        }
                    }


            $phonum= mysqli_real_escape_string($db, $_POST['phnum']);
            $national= mysqli_real_escape_string($db, $_POST['natid']);
            $emil= mysqli_real_escape_string($db, $_POST['mail']); 

            $avatar= mysqli_real_escape_string($db, $_POST['pavatar']);

            
            
            
            
            if(empty($name)){

                array_push($error, "name is required.");
            }
          
           
            if(empty($pass1)){
                array_push($error, "your password is required.");
            }
            if($pass1 != $pass2){
                array_push($error, "Passwords do not match.");
            }
            if(empty($birthday)){
                array_push($error, "your birthday is required.");
            }
            if(empty($address)){
                array_push($error, "your address is required.");
            }
            if(empty($gender)){
                array_push($error, "your gender is required.");
            }
            
            if(empty($weight)){
                array_push($error, "your weight is required.");
            }
            if(empty($height)){
                array_push($error, "your height is required.");
            } 
            if(empty($avatar)){
                array_push($error, "please choose an avatar");
            } 
            //save info in database
            if(count($error)==0) {
                $sq= "INSERT INTO user(name,password,birthdate,gender,address,weight,height,target,plan_id,email,phone,national_id,avatar)Values('$name','$pass1','$birthday','$gender','$address','$weight','$height','$tag','$plan','$emil','$phonum','$national','$avatar')";
                mysqli_query($db, $sq);
                $hhh="insert into child_history(email,plan_id,weight,height,plan_target,date)values('$emil','$plan','$weight','$height','$trgo','$date')";
                $res=mysqli_query($db, $hhh);
                $_SESSION['user_reg']= $name;
                header('location:subscribtion.php');
                
            }

        }
        


    //logout
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location:log.php');
    }

?>