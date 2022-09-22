<html>
<!DOCTYPE html>

<head>
        <?php
include 'sarver.php';

?>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>SlimSons Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">
<style>
        /* Set height of body and the document to 100% to enable "full page tabs" */
body, html {
  height: 100%;
  margin: 0;
  font-family: 'Overpass', sans-serif;
  background-color: whitesmoke;
  font-size:16px;
}
/* style image */
#logo{
    position: absolute;
    left: 37%;
    top:8%;
    transform: translate(-50%,-50%);
}
 /* style h1 */
 h1{
     margin-top: 37px;
     margin-bottom: 80px;
     text-align: center;
     font-size: xx-large;
 }
/* Style tab links */
.tablink {
  background-color: #f5a516;
  color: #555;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width:14.285%;
}

.tablink:hover {
  background-color: #f5c675;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: black;
  display: none;
  padding: 100px 20px;
  height: 100%;
}
table{
    width:100%;
}
#Home {background-color: white; text-align: center;}
table{
    border-color: #f5a516;
    padding:5px;
    border-spacing: 5px;
}
.count{
    font-size: 24px;
    padding-top: 50px;
    display:inline-block;
    background-color: #f7d885;
    width:30%;
    margin:1%;
    height:250px;
}
#Reviews {background-color: white;text-align: center;}
#Users {background-color: white;text-align: center;}
/* AVATAR RADIO BUTTONS */
#char{
            display: inline-flex;
            flex: row wrap;
            align-items: center;
        }
        #avatar{
            width: 200px;
        }
        label>input[type=radio] {  
            /* position: absolute; */
            opacity: 0;
            width: 0;
            height: 0;
        }
        input[type=radio] + img {
            cursor: pointer;
        }
        input[type=radio]:checked + img {
            outline: 2px solid #f5a516;
        } 
        .avatarpics{
            padding: 10px;
            display: inline;
        }
        label>img{
            margin: 0 3px;
        }
#Subscription {background-color: white;text-align: center;}
#Sponsors {background-color: white;text-align: center;}
#Plans {background-color: white;text-align: center;}
#Exercises {background-color: white;text-align: center;}
.btn, input[type=text],input[type=email], input[type=password],input[type=file],.area , .drop{
    font-size: 14px;
    background-color: transparent;
    border-radius: 10px;
    width:200px;
    border: 2px solid #f5a516;
    cursor: pointer;
    margin: 10px 40px 20px 1px;
    padding: 5px;
}
.area{
    vertical-align: top;
    height: 50px;
    width:300px;
}
.btn:hover, input[type=text]:focus,input[type=email]:focus, input[type=password]:focus,input[type=file]:focus, .area:focus, .drop:focus{
    border: 3px solid #f5c675;
    outline: none;
}
a, a:visited{
    color:orange;
    text-decoration: underline dashed black 3px;
    font-size: 25px;
    font-weight: bolder;
    
}
a:hover{
    color: black;
    text-decoration: underline dashed #f5a516 3px;
}
</style>
</head>
<body>
<img id="logo" src="images/admin.png" width="100px" height="100px">
    <h1> Admin Interface </h1> 
<button class="tablink" onclick="openTab('Home', this, 'white')" id="defaultOpen" name="block">Home</button>
<button class="tablink" onclick="openTab('Reviews', this, 'white')" >Reviews</button>
<button class="tablink" onclick="openTab('Users', this, 'white')">Users</button>
<button class="tablink" onclick="openTab('Subscription', this, 'white')">Subscriptions</button>
<button class="tablink" onclick="openTab('Sponsors', this, 'white')">Sponsors</button>
<button class="tablink" onclick="openTab('Plans', this, 'white')">Plans</button>
<button class="tablink" onclick="openTab('Exercises', this, 'white')">Exercises</button>
    
<div id="Home" class="tabcontent">
        
<div class="count"><h2>Reviews</h2> 
    <p>
    <?php 
   $queee = "select review_id from review order by review_id";
   $erun = mysqli_query($db,$queee);
   $eown = mysqli_num_rows($erun);
   $qui = "select comment_id from comment_rev order by comment_id";
   $erein = mysqli_query($db,$qui);
   $meown = mysqli_num_rows($erein);
   echo 'there are '. $eown .' reviews by video and '.$meown.' reviews by comment';
    ?>
    </p>
</div>
<div class="count"><h2>Users</h2>
    <p><?php 
   $que = "select user_id from user order by user_id";
   $run = mysqli_query($db,$que);
   $own = mysqli_num_rows($run);
 echo 'there are <br>'. $own .' users';
    ?></p></div>
<div class="count"><h2>Subscriptions</h2>
    <p><?php 
   $qui = "select s_id from subcribe order by s_id";
   $roun = mysqli_query($db,$qui);
   $ghown = mysqli_num_rows($roun);
 echo 'there are <br>'. $ghown .' subscriptions';
    ?></p></div>
<div class="count"><h2>Sponsors</h2>
    <p><?php 
   $spo = "select spo_id from sponsers order by spo_id";
   $sponsee = mysqli_query($db,$spo);
   $fetchh = mysqli_num_rows($sponsee);
 echo 'there are <br>'. $fetchh .' sponsors';
    ?></p>
</div>
<div class="count"><h2>Plans</h2>
    <p><?php 
   $plon = "select id from plans order by id";
   $plann = mysqli_query($db,$plon);
   $pl = mysqli_num_rows($plann);
 echo 'there are <br>'. $pl .' plans';
    ?></p></div>
<div class="count"><h2>Exercises</h2>
    <p><?php 
   $exe = "select exe_id from exercise order by exe_id";
   $exersice = mysqli_query($db,$exe);
   $c_exr = mysqli_num_rows($exersice);
 echo 'there are <br>'. $c_exr .' exercices';
    ?></p>
</div>
</div>
<div id="Reviews" class="tabcontent">
    <form method ="post">
        <label class="lab">View All Of The Reviews</label>
        <input class ="btn" type ="submit" name="views" value ="View All Reviews">    
                <br><hr>
                
        </form>
<?php
    //view reviews
    if(isset($_POST['views'])){
    
  
        $sql = "SELECT * FROM review ORDER BY review_id  DESC";
        $res = mysqli_query($db, $sql);
       
        if (mysqli_num_rows($res) > 0) {
            while ($video = mysqli_fetch_assoc($res)) { 
        ?>
         
         <br><br>
         <center>
       <table border=1 id="table">
           
           <tr>
                <th>review id</th>
               <th>name</th>
               <th>vedio</th>
            </tr>
            <tr>
                <td><?php echo $video['review_id'];?></td>
            <td>
               <?php echo $video['name'];?>
            </td> 
       <td>
               <video src="uploads/<?=$video['vedio']?>" 
                  controls style="width:290px; height:200px">
               
           
               </video>
            </td>
            
           </tr>
            </table>
           
       <?php 
        }
        }else {
            echo "<h1>Empty</h1>";
        }
    
        ?>
        
         <?php 
		
        $sq = "SELECT * FROM comment_rev ORDER BY comment_id  DESC";
        $re = mysqli_query($db, $sq);
       
        if (mysqli_num_rows($re) > 0) {
            while ($vide = mysqli_fetch_assoc($re)) { 
                ?>
               
               
               <table border=1 id="table">
               <tr>
                <th>review id</th>
               <th>name</th>
               <th>comment</th>
            </tr>
                    <tr style="width:90px; height:100px">
                        
                       <td><?php echo $vide['comment_id'];?></td>
                    <td>
                       <?php echo $vide['name'];?>
                    
                       </td>
                            <td>
                       <?php echo $vide['comment'];?>
            </td>
                   </tr>
       
               <?php 
                }
                }else {
                    echo "<h1>Empty</h1>";
                }}
                ?>
        </table>
   </div>

<div id="Users" class="tabcontent">
    <form method ="post">
        <label class="lab"> Looking For Something! </label> <br>
        <input class="in" type ="text" name="search" placeholder="Search By Name" autocomplete="off" required>
        <input class ="btn" type ="submit" name="submit" value ="User Search">
        <br>
        
    </form>
    <?php
    //search for a member
    if(isset($_POST['submit'])){
    $st =$_POST['search'];
  
    $query = "SELECT * FROM `user` WHERE name='$st'";
    
    $result= mysqli_query($db,$query);

    while ($row = mysqli_fetch_array($result)){
        ?>
        <br><br>
        <center>
                    <table border=1 id="table">
                    <tr>
                <th>Id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Password</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Weight</th>
                <th>Height</th>
                <th>Subscription id</th>
                <th>Plan id</th>
                <th>Target</th>
                <th>Phone number</th>
                
                <th>Parent national id</th>
                
                
                <th>Avatar</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
                    <?php
                    echo "<tr>";
            echo "<td>".$row['user_id']."<br/>"."</td>";
            echo "<td>".$row['name']."<br/>"."</td>";
            echo "<td>".$row['email']."<br/>"."</td>";
            echo "<td>".$row['password']."<br/>"."</td>";
            echo "<td>".$row['birthdate']."<br/>"."</td>";
            echo "<td>".$row['gender']."<br/>"."</td>";
            echo "<td>".$row['weight']."<br/>"."</td>";
            echo "<td>".$row['height']."<br/>"."</td>";
            echo "<td>".$row['sub_id']."<br/>"."</td>";
            echo "<td>".$row['plan_id']."<br/>"."</td>";
            echo "<td>".$row['target']."<br/>"."</td>";
            echo "<td>".$row['phone']."<br/>"."</td>";
            
            echo "<td>".$row['national_id']."<br/>"."</td>";
           
            ?>
            <td><img src="<?=$row['avatar']?>" style="width:90px; height:95px">
            </td>
            <td> <a href="admin.php?user_id=<?php echo $row['user_id']; ?>">edit</a></td>
                  <td> <a href="del.php?user_id=<?php echo $row['user_id']; ?>">delete</a></td>
                  <?php
                    echo"</tr>";
                  
                    ?>
            
                   
                </table>
                </center>
                
            

    <?php
    }

}
?>
<div>
<form method ="post">
    <label class="lab">View All Users</label>
        <input class="btn" type ="submit" name="btn" value ="View All Users">
        <br><hr>
</form>
        <?php
        if(isset($_POST['btn'])){
    
  
                $quere = "SELECT * FROM `user`";
                $rsult= mysqli_query($db,$quere);
            
                while ($ro = mysqli_fetch_array($rsult)){
                    ?>
                    <br><br>
                    <center>
                    <table border=1 id="table">
                    <tr>
                <th>Id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Password</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Weight</th>
                <th>Height</th>
                <th>Subscription id</th>
                <th>Plan id</th>
                <th>Target</th>
                <th>Phone number</th>
                
                <th>Parent national id</th>
                
                
                <th>Avatar</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
                    <?php
                    echo "<tr>";
            echo "<td>".$ro['user_id']."<br/>"."</td>";
            echo "<td>".$ro['name']."<br/>"."</td>";
            echo "<td>".$ro['email']."<br/>"."</td>";
            echo "<td>".$ro['password']."<br/>"."</td>";
            echo "<td>".$ro['birthdate']."<br/>"."</td>";
            echo "<td>".$ro['gender']."<br/>"."</td>";
            echo "<td>".$ro['weight']."<br/>"."</td>";
            echo "<td>".$ro['height']."<br/>"."</td>";
            echo "<td>".$ro['sub_id']."<br/>"."</td>";
            echo "<td>".$ro['plan_id']."<br/>"."</td>";
            echo "<td>".$ro['target']."<br/>"."</td>";
            echo "<td>".$ro['phone']."<br/>"."</td>";
            
            echo "<td>".$ro['national_id']."<br/>"."</td>";
            
            ?>
            <td><img src="<?=$ro['avatar']?>" style="width:90px; height:95px">
</td>
            
            <td> <a href="admin.php?user_id=<?php echo $ro['user_id']; ?>">edit</a></td>
                  <td> <a href="del.php?user_id=<?php echo $ro['user_id']; ?>">delete</a></td>
                  <?php
                    echo"</tr>";
                  
                    ?>
            
                   
                </table>
                </center>
                
            
                <?php
                }
            
            }
            ?>
            <?php
 include "sarver.php";
 ?>
 <?php
 $id=$_GET['user_id'];
$qry1 = mysqli_query($db,"select * from user where user_id='$id'");
$ro = mysqli_fetch_array($qry1);

if(isset($_POST['update']))
{
    $name= $_POST['name'];                   
                                             
    
    $pass= $_POST['word'];
             
    $phone_number=$_POST['number'];
    
    $avatar=$_POST['avatar'];                                                
                                                                                                                                        
    
    if(empty($avatar)){
        array_push($error, "avatar is required ");
    }
    if(count($error)==0) {
    $sql1="update user set name='$name', password='$pass' , phone='$phone_number',avatar='$avatar' where user_id='$id'";
    
    $edit = mysqli_query($db,$sql1);

   
    }}
?>



<form method="POST">
<label for="childun">Username</label>
                    <input id="childusername" type="text" name="name" value="<?php echo $ro['name']?>" />
                    <label for="childpass">Password</label>
                    <input id="childpass" type="text" name="word" minlength="8" value="<?php echo $ro['password']?>" />
                    
                    <label for="phoneno">Phone Number</label>
                    <input id="phoneno" type="text" name="number" maxlength="11" value="<?php echo $ro['phone']?>"/><br>
                    
                    <!-- child avatars -->
                <div id="char">
                    <label id="avatar" for="avatar">Avatar:</label>
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
                    
                    <input class="btn" type ="submit" name="update" value ="Update"> 
                </form><br>
            </div>
</div>

            <div id="Subscription" class="tabcontent">
            <form method ="post">
        <label class="lab">View The Users' Subscriptions</label>
        <input class="btn" type ="submit" name="bmit" value ="View All Subscribthons">  
        <br><hr>
    </form>
    <?php
   
        if(isset($_POST['bmit'])){
            $qee = "SELECT * FROM `subcribe`";
            $solt= mysqli_query($db,$qee);
        
            while ($row = mysqli_fetch_array($solt)){

            ?>
    <br><br>
        <center>
        <table border=1 id="table">
            <tr>
                <th>Subscription id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>promo code </th>
                <th>discount</th>
                <th>icon</th>
                
                <th>edit</th>
                <th>delete</th>
            </tr>
            <?php
            echo "<td>".$row['s_id']."<br/>"."</td>";
            echo "<td>".$row['name']."<br/>"."</td>";
            echo "<td>".$row['price']."<br/>"."</td>";
            echo "<td>".$row['Description']."<br/>"."</td>";
            echo "<td>".$row['promo_code']."<br/>"."</td>";
            echo "<td>".$row['discount']."<br/>"."</td>";
            ?>
                <td><img src="imag/<?=$row['logo']?>" style="width:90px; height:60px">
            
            <td> <a href="admin.php?s_id=<?php echo $row['s_id']; ?>">edit</a></td>
                  <td> <a href="delete.php?s_id=<?php echo $row['s_id']; ?>">delete</a></td>
            <?php
                    echo"</tr>";
                  
                    ?>
            
                   
                </table>
                </center>
                
            
                <?php
                }
            
            }
            ?>
            <?php if (isset($_GET['error'])) :  ?>
		<p><?php echo $_GET['error'];?></p>
	<?php endif ?>
<form method="POST" enctype="multipart/form-data">
     <div id="upsub">
            <label class="lab">Subscription Name</label>
            <input class="in" type ="text"  name="subnam" />
            <label class="lab">Subscription Price</label>
            <input class="in" type ="text" name="subpric" /><br>
            <label class="lab">Subscription Description</label>
            <input class="in" type ="text" name="subdesc" />
            <label class="lab">Subscription Promo Code</label>
            <input class="in" type ="text" name="subpc" autocomplete="off" required><br>
            <label class="lab">Subscription Discount</label>
            <input class="in" type ="text" name="subdisc" autocomplete="off" required>
            <label class="lab">logo</label>
            <input class="in" type ="file" name="sublogo" />
            </div>
<input class="btn" type ="submit" name="add" value ="Add">
</form>
<?php
if(isset($_POST['add']) && isset($_FILES['sublogo']))
{
    include "sarver.php";
            
            echo "<pre>";
            print_r($_FILES['sublogo']);
            echo "</pre>";
    $name=  mysqli_real_escape_string($db,$_POST['subnam']);                   
    $price=  mysqli_real_escape_string($db,$_POST['subpric']);
    $discr=  mysqli_real_escape_string($db,$_POST['subdesc']);
    $promo=  mysqli_real_escape_string($db,$_POST['subpc']);
    $discount=  mysqli_real_escape_string($db,$_POST['subdisc']);
  
    $img_name = $_FILES['sublogo']['name'];
           $img_size = $_FILES['sublogo']['size'];
            $tmp_name = $_FILES['sublogo']['tmp_name'];
            $error = $_FILES['sublogo']['error'];
            
            if($error ===0){
                if ($img_size > 925000)
                {
                    $em = "sorry it is too big";
                        
                }
                else{
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png");
                if (in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path = 'imag/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    $sobsc = "INSERT INTO subcribe(logo,name,price,Description,promo_code,discount) 
                    VALUES('$new_img_name','$name','$price','$discr','$promo','$discount')";
             mysqli_query($db, $sobsc);
 header("location: admin.php");
                }
                else {
                    $em = "You can't upload files of this type";
                    
                }
            }
        }else{
            $em = "unknowen";
            
        }
        }
    
        ?>
              <?php
 include "sarver.php";
 ?>
 <?php
 
 $id=$_GET['s_id'];
$qry = mysqli_query($db,"select * from subcribe where s_id='$id'");
$row = mysqli_fetch_array($qry);
?>
<form method="POST" enctype="multipart/form-data">

<div id="upsub">
<label class="lab">Subscription Name</label>
<input class="in" type ="text"  name="ubname" value="<?php echo $row['name']?>" />
<label class="lab">Subscription Price</label>
<input class="in" type ="text" name="ubprice" value="<?php echo $row['price']?>" /><br>
<label class="lab">Subscription Description</label>
<input class="in" type ="text" name="ubdes" value="<?php echo $row['Description']?>" />
<label class="lab">Subscription Promo Code</label>
 <input class="in" type ="text" name="subpc" value="<?php echo $row['promo_code']?>" ><br>
 <label class="lab">Subscription Discount</label>
 <input class="in" type ="text" name="subdisc" value="<?php echo $row['discount']?>" >
<img src="imag/<?php echo $row['logo'];?>" style="width:90px; height:60px" >
<input type="file" name="mylogo" /><br>
</div>
<input class="btn" type ="submit" name="salal" value ="Update">  

</form>
<?php
if(isset($_POST['salal']) && isset($_FILES['mylogo'])){

    $name= $_POST['ubname'];                   
                                             
    $price=$_POST['ubprice'];
    $discr=$_POST['ubdes'];
    $promo=$_POST['subpc'];
    $disc=$_POST['subdisc'];
    
    $img_name = $_FILES['mylogo']['name'];
    $img_size = $_FILES['mylogo']['size'];
     $tmp_name = $_FILES['mylogo']['tmp_name'];
     $error = $_FILES['mylogo']['error'];
    
     if($error ===0){
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg","jpeg","png");
        if (in_array($img_ex_lc,$allowed_exs)){
            $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path = 'imag/'.$new_img_name;
move_uploaded_file($tmp_name,$img_upload_path);
    $soql="update subcribe set name='$name' , price='$price' , Description='$discr' , promo_code='$promo' , discount='$disc' , logo='$new_img_name'  where s_id='$id'";
    
    $edoit = mysqli_query($db,$soql);
   
    }}}
    
?>

             
    
    
   
        
        </div>

<div id="Sponsors" class="tabcontent">
    <form method ="post">
        <label class="lab">View All Sponsors</label>
        <input class ="btn" type ="submit" name="submit_spo" value ="View All Sponsors">
        <br><hr>
    </form>
    <?php
   
   if(isset($_POST['submit_spo'])){
    $sql = "select * from sponsers";
    $resl = mysqli_query($db,$sql);
    if (mysqli_num_rows($resl)>0){
        while ($images = mysqli_fetch_assoc($resl)){?>

    <br><br>
        <center>
        <table border=1 id="table">
            <tr>
                <th>sponser id</th>
                <th>Sponsor Name</th>
                <th>Sponsor logo</th> 
                <th>edit</th>
                <th>delete</th>
            </tr>
            <tr>
            <?php
            echo "<td>".$images['spo_id']."<br/>"."</td>";?>
                <?php
            echo "<td>".$images['name']."<br/>"."</td>";?>
                <td><img src="imag/<?=$images['logo']?>" style="width:190px; height:160px">
</td>
<td> <a href="admin.php?spo_id=<?php echo $images['spo_id']; ?>">edit</a></td>
            <td> <a href="dele_spo.php?spo_id=<?php echo $images['spo_id']; ?>">Delete</a></td>
            </tr>
        </table></center>
        <?php        
}
    }

   }
   ?>
        <?php if (isset($_GET['error'])) :  ?>
		<p><?php echo $_GET['error'];?></p>
	<?php endif ?>
        <form method ="post" enctype="multipart/form-data" >
        <label class="lab">Sponsor Name</label>
        <input class="in" type ="text" name="subname">
        <label class="lab">Sponsor Photo</label>
        <input type="file" name="my_image"><br>
        <input class="btn" type ="submit" name="sobmut" value ="Add">  
</form>
        <?php
             
         if (isset($_POST['sobmut']) && isset($_FILES['my_image'])){
            include "sarver.php";
            
            echo "<pre>";
            print_r($_FILES['my_image']);
            echo "</pre>";
            $sponser=  mysqli_real_escape_string($db, $_POST['subname']);
            $img_name = $_FILES['my_image']['name'];
           $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $error = $_FILES['my_image']['error'];
            
            if($error ===0){
                if ($img_size > 925000)
                {
                    $em = "sorry it is too big";
                        
                }
                else{
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png");
                if (in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path = 'imag/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    $solo = "INSERT INTO sponsers(logo,name) 
                    VALUES('$new_img_name','$sponser')";
             mysqli_query($db, $solo);
 header("location: admin.php");
                }
                else {
                    $em = "You can't upload files of this type";
                    
                }
            }
        }else{
            $em = "unknowen";
            
        }
        }else{
            header("location: admin.php");
        }
    
        ?>
<?php
 include "sarver.php";
 ?>
 <?php
 $idd=$_GET['spo_id'];
$qry3 = mysqli_query($db,"select * from sponsers where spo_id='$idd'");
$roww = mysqli_fetch_array($qry3);
?>
<form method ="post" enctype="multipart/form-data" >
        <label class="lab">Sponsor Name</label>
        <input class="in" type ="text" name="subname" value="<?php echo $roww['name'];?>">
        <label class="lab">Sponsor Photo</label>
        <img src="imag/<?php echo $roww['logo'];?>" style="width:90px; height:60px" >
        <input type="file" name="myImage"><br>
        
        <input class="btn" type ="submit" name="up_spo" value ="update">  
</form>
<?php
 if (isset($_POST['up_spo']) && isset($_FILES['myImage'])){

$nem=$_POST['subname'];

    $img_name = $_FILES['myImage']['name'];
    $img_size = $_FILES['myImage']['size'];
     $tmp_name = $_FILES['myImage']['tmp_name'];
     $error = $_FILES['myImage']['error'];
     if($error ===0){
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg","jpeg","png");
        if (in_array($img_ex_lc,$allowed_exs)){
            $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path = 'imag/'.$new_img_name;
move_uploaded_file($tmp_name,$img_upload_path);
$sss="update sponsers set name='$nem', logo='$new_img_name' where spo_id='$idd'";
$spon = mysqli_query($db,$sss);
}
}
 }
?>
<?php
 include "sarver.php";
 ?>
 
</div>

<div id="Plans" class="tabcontent">
    <div>
        <form method="POST">
        <label class="lab">Add a Meal</label>
        <input class="in" type ="text" name="addmeal" placeholder="Write a Meal" autocomplete="off" required>
        <input class="btn" type ="submit" name="meal" value ="add">
</form>
    </div><br><br>
<?php
 if(isset($_POST['meal'])){
    $meal=  mysqli_real_escape_string($db,$_POST['addmeal']);
    $added= "INSERT INTO meal(meal)values('$meal')";
mysqli_query($db,$added); 
}
?>
 
    <div>
    
    <?php
   
   
       $qe = "SELECT * FROM `meal`";
       $solot= mysqli_query($db,$qe);
   
       $qeo = "SELECT * FROM `meal`";
       $slt= mysqli_query($db,$qeo);

       $qeor = "SELECT * FROM `meal`";
       $sltr= mysqli_query($db,$qeor);
       
   
   
       $qe2 = "SELECT * FROM `meal`";
       $solot2= mysqli_query($db,$qe2);
   
       $qeo2 = "SELECT * FROM `meal`";
       $slt2= mysqli_query($db,$qeo2);

       $qeor2 = "SELECT * FROM `meal`";
       $sltr2= mysqli_query($db,$qeor2);

       ?>

       
       <form method ="post">
        <label class="lab">Create a Plan</label><br>
        <label class="lab">Target Weight</label>
        <input class="in" type ="text" name="target" placeholder="Write Targeted Weight" autocomplete="off" required>
        <label class="lab">Days</label>
        <select class="drop" name="days">
            <option >Sunday</option>
            <option >Monday</option>
            <option >Tuesday</option>
            <option >Wednesday</option>
            <option >Thursday</option>
            <option >Friday</option>
            <option >Saturday</option>
        </select><br>
        <label class="lab">Meal1</label>
       
        <select class="drop" name="breakfast">
            <?php
        while ($smack = mysqli_fetch_array($solot2)){
            ?>
        <option> <?php echo $smack['meal'];?> </option>
        <?php } ?>
    </select>
        
        <label class="lab">Description</label>
        <textarea class="area" name="des1" placeholder="Write Your First Meal Description"></textarea><br>
        <label class="lab">Meal2</label>
        <select class="drop" name="lanch">
            <?php
        while ($smac = mysqli_fetch_array($slt2)){
            ?>
        <option> <?php echo $smac['meal'];?> </option>
        <?php } ?>
    </select>
        <label class="lab">Description</label>
        <textarea class="area" name="des2" placeholder="Write Your Second Meal Description"></textarea><br>
        <label class="lab">Meal3</label>
        <select class="drop" name="dinner">
            <?php
        while ($sma = mysqli_fetch_array($sltr2)){
            ?>
        <option> <?php echo $sma['meal'];?> </option>
        <?php } ?>
        </select>
        <label class="lab">Description</label>
        <textarea class="area"  name="des3" placeholder="Write Your Third Meal Description"></textarea><br>
        <label class="lab" style="width:40px;">Snack1</label>
        <input class="in" style="width:200px;" type ="text" name="snack1" placeholder="Write Your Snack Description" autocomplete="off" required>
        <label class="lab" style="width:79x;">Snack2</label>
        <input class="in" style="width:315px;" type ="text" name="snack2" placeholder="Write Your Snack Description" autocomplete="off" required><br>
        <input class="btn" type ="submit" name="create" value ="create plan">
       </form>
        
    </div><br><br>
    <?php
if (isset($_POST['create']))
{
                                            $target= mysqli_real_escape_string($db,$_POST['target']);
                                            if($target <= 0){
                                                $pla = '111';
                                            }elseif($target <= 15){
                                                $pla = '222';
                                            
                                            }else{
                                                $pla = '333';
                                            }
                                            $day= mysqli_real_escape_string($db,$_POST['days']);
                                            $breakfast= mysqli_real_escape_string($db,$_POST['breakfast']);
                                            $breakdes= mysqli_real_escape_string($db,$_POST['des1']);
                                            $lunch= mysqli_real_escape_string($db,$_POST['lanch']);
                                            $lucdes= mysqli_real_escape_string($db,$_POST['des2']);
                                            $dinner= mysqli_real_escape_string($db,$_POST['dinner']);
                                            $dindes= mysqli_real_escape_string($db,$_POST['des3']);
                                            $snackbr= mysqli_real_escape_string($db,$_POST['snack1']);
                                            $snacklu= mysqli_real_escape_string($db,$_POST['snack2']);
    $planss= "INSERT INTO plan_detail(plan_id,target,day,breakfast,bf_description,snack1,lunch,lun_description,snack2,dinner,din_description)VALUES('$pla','$target','$day','$breakfast','$breakdes','$snackbr','$lunch','$lucdes','$snacklu','$dinner','$dindes')";

    mysqli_query($db,$planss);


}


?>

    <form method ="post">
        <label class="lab">View All Plans</label>
        <input class="btn" type ="submit" name="view_plans" value ="View All Plans">
    </form>
    <?php
    if(isset($_POST['view_plans'])){
        $quere = "SELECT * FROM `plan_detail`";
                $result= mysqli_query($db,$quere);
                while ($raw5 = mysqli_fetch_array($result)){
        ?>
    <br><hr>
    <center>
        <table border=1 id="table">
            <tr>
                <th>Plan Id</th>
                <th>target</th>
                <th>day</th>
                <th>breakfast</th>
                <th>breakfast description</th>
                <th>snack 1</th>
                <th>lunch</th>
                <th>lunch description</th>
                <th>snack 2</th>
                <th>dinner</th>
                <th>dinner description</th>
                <th>edit</th>   
                <th>delete</th>
            </tr>
            <?php
                    echo "<tr>";
            echo "<td>".$raw5['plan_id']."</td>";
            echo "<td>".$raw5['target']."</td>";
            echo "<td>".$raw5['day']."</td>";
            echo "<td>".$raw5['breakfast']."</td>";
            echo "<td>".$raw5['bf_description']."</td>";
            echo "<td>".$raw5['snack1']."</td>";
            echo "<td>".$raw5['lunch']."</td>";
            echo "<td>".$raw5['lun_description']."</td>";
            echo "<td>".$raw5['snack2']."</td>";
            echo "<td>".$raw5['dinner']."</td>";
            echo "<td>".$raw5['din_description']."</td>";
            ?>
            <td> <a href="admin.php?id=<?php echo $raw5['id']; ?>">edit</a></td>
                  <td> <a href="deletePlan.php?id=<?php echo $raw5['id']; ?>">delete</a></td>
            <?php
                    echo"</tr>";
                  
                    ?>
            
                   
                </table>
                </center>
                
            
                <?php
                }
            
            }
            ?>
<?php
 include "sarver.php";
 ?>
 <?php
 $plan_id=$_GET['id'];
$qry5 = mysqli_query($db,"select * from plan_detail where id='$plan_id'");
$raw5 = mysqli_fetch_array($qry5);
if(isset($_POST['update_plan']))
{
    $target= mysqli_real_escape_string($db,$_POST['target']);
    if($target <= 0){
        $pla = '111';
    }elseif($target <= 15){
        $pla = '222';
    
    }else{
        $pla = '333';
    }
                                                                        $day= mysqli_real_escape_string($db,$_POST['days']);
                                                                        $breakfast= mysqli_real_escape_string($db,$_POST['breakfast']);
                                                                        $breakdes= mysqli_real_escape_string($db,$_POST['des1']);
                                                                        $lunch= mysqli_real_escape_string($db,$_POST['lanch']);
                                                                        $lucdes= mysqli_real_escape_string($db,$_POST['des2']);
                                                                        $dinner= mysqli_real_escape_string($db,$_POST['dinner']);
                                                                        $dindes= mysqli_real_escape_string($db,$_POST['des3']);
                                                                        $snackbr= mysqli_real_escape_string($db,$_POST['snack1']);
                                                                        $snacklu= mysqli_real_escape_string($db,$_POST['snack2']);
                                    if(count($error)==0) {
        $sql5="update plan_detail set target='$target', plan_id='$pla' , day='$day' , breakfast='$breakfast', bf_description='$breakdes' , lunch='$lunch' , lun_description='$lucdes' , dinner='$dinner' , din_description='$dindes' , snack1='$snackbr' , snack2='$snacklu' where id='$plan_id'";
        
        $edittt = mysqli_query($db,$sql5);
    
       
        }}
?>
        <div id="upplan">
        <form method="POST">
            <div>
                <label class="lab">Update a Plan</label><br>
                <label class="lab">Target Weight</label>
        <input class="in" type ="text" name="target" value="<?php echo $raw5['target']?>">
        <label class="lab">Days</label>
        <select class="drop" name="days">
            <option >Sunday</option>
            <option >Monday</option>
            <option >Tuesday</option>
            <option >Wednesday</option>
            <option >Thursday</option>
            <option >Friday</option>
            <option >Saturday</option>
        </select><br>
        <label class="lab">Meal1</label>
       
        <select class="drop" name="breakfast">
            <?php
        while ($smack = mysqli_fetch_array($solot)){
            ?>
        <option> <?php echo $smack['meal'];?> </option>
        <?php } ?>
    </select>
        
        <label class="lab">Description</label>
        <textarea class="area" name="des1" placeholder="Write Your First Meal Description"></textarea><br>
        <label class="lab">Meal2</label>
        <select class="drop" name="lanch">
            <?php
        while ($smac = mysqli_fetch_array($slt)){
            ?>
        <option> <?php echo $smac['meal'];?> </option>
        <?php } ?>
    </select>
        <label class="lab">Description</label>
        <textarea class="area" name="des2" placeholder="Write Your Second Meal Description"></textarea><br>
        <label class="lab">Meal3</label>
        <select class="drop" name="dinner">
            <?php
        while ($sma = mysqli_fetch_array($sltr)){
            ?>
        <option> <?php echo $sma['meal'];?> </option>
        <?php } ?>
        </select>
        <label class="lab">Description</label>
        <textarea class="area"  name="des3" placeholder="Write Your Third Meal Description"></textarea><br>
        <label class="lab" style="width:40px;">Snack1</label>
        <input class="in" style="width:200px;" type ="text" name="snack1" value="<?php echo $raw5['snack1']?>" >
        <label class="lab" style="width:79x;">Snack2</label>
        <input class="in" style="width:315px;" type ="text" name="snack2" value="<?php echo $raw5['snack2']?>" ><br>
                    <input class="btn" type ="submit" name="update_plan" value ="update plan">
            </div>
        </form>
        </div>
</div>
<div id="Exercises" class="tabcontent">
    <form method ="post">
        <label class="lab">View All Exercises</label>
        <input class="btn" type ="submit" name="exer" value ="View All Exercises">
        <br><hr>
    </form>
    <?php
   
   if(isset($_POST['exer'])){
    $ssql = "select * from exercise";
    $resultt = mysqli_query($db,$ssql);
    if (mysqli_num_rows($resultt)>0){
        while ($vedio = mysqli_fetch_assoc($resultt)){
            ?>

    <br><br>
        <center>
        <table border=1 id="table">
            <tr>
                <th>Exercises id</th>
                <th>name</th>
                <th>Video</th>
                <th>duration</th>
                <th>body focus</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            <tr>
            <?php
            echo "<td>".$vedio['exe_id']."<br/>"."</td>";?>
            <?php
            echo "<td>".$vedio['name']."<br/>"."</td>";?>
               <td> 
            <video src="exercises/<?=$vedio['video']?>" 
            controls style="width:490px; height:260px">
         
     
         </video>
</td>
<?php
            echo "<td>".$vedio['duration']."<br/>"."</td>";?>
             <?php
            echo "<td>".$vedio['focus']."<br/>"."</td>";?>
            <td> <a href="admin.php?exe_id=<?php echo $vedio['exe_id']; ?>">edit</a></td>
            <td> <a href="ex_delete.php?exe_id=<?php echo $vedio['exe_id']; ?>">Delete</a></td>
            </tr>
        
        </table></center>
        <?php
        }}}
        ?>
        <form 
	       method="post"
	       enctype="multipart/form-data">
        <div id="upex">
            
            <label class="lab">name</label>
            <input class="in" type ="text" name="exe_name" >
           
            <label class="lab">Vedio</label>
            <input type="file" name="my_vedio" />
            <label class="lab">duration</label>
            <input class="in" type ="text" name="duration" >
            <label class="lab">body focus</label>
            <input class="in" type ="text" name="focus" >
            <br>
            <input class="btn" type ="submit" name="add_exe" value ="Add">
        </div>
        </form>
        <?php

if (isset($_POST['add_exe']) or isset($_FILES['my_vedio'])) {
    $video_name = $_FILES['my_vedio']['name'];
    $tmp_name = $_FILES['my_vedio']['tmp_name'];
    $error = $_FILES['my_vedio']['error'];
    if ($error === 0) {
        $nam= mysqli_real_escape_string($db, $_POST['exe_name']);
        $duration= mysqli_real_escape_string($db, $_POST['duration']);
        $focus = mysqli_real_escape_string($db, $_POST['focus']);
     
    	$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

    	$video_ex_lc = strtolower($video_ex);

    	$allowed_exs = array("mp4", 'webm', 'avi', 'flv');
        if (in_array($video_ex_lc, $allowed_exs)) {
    		
    		$new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
            $video_upload_path = 'exercises/'.$new_video_name;
            move_uploaded_file($tmp_name, $video_upload_path);
            $sqql = "INSERT INTO exercise(video,name,duration,focus) 
            VALUES('$new_video_name','$nam','$duration','$focus')";
     mysqli_query($db, $sqql);
     
 }else {
     $em = "You can't upload files of this type";
     header("Location: admin.php?error=$em");
 }
}

}

    ?>
    <?php
 include "sarver.php";
 ?>
 <?php
 $iidd=$_GET['exe_id'];
$qry4 = mysqli_query($db,"select * from exercise where exe_id='$iidd'");
$rooww = mysqli_fetch_array($qry4);
?>
     <form 
	       method="post"
	       enctype="multipart/form-data">
        <div id="upex">
            
            <label class="lab">name</label>
            <input class="in" type ="text" name="exer_name" value="<?php echo $rooww['name'];?>" >
           
            <label class="lab">Vedio</label>
            
            <input type="file" name="myVedio" />
            <label class="lab">duration</label>
            <input class="in" type ="text" name="dur" value="<?php echo $rooww['duration'];?>" >
            <label class="lab">body focus</label>
            <input class="in" type ="text" name="focus_body" value="<?php echo $rooww['focus'];?>">
            <br>
            <input class="btn" type ="submit" name="up_exe" value ="Update">
        </div>
        </form>
        <?php
        if (isset($_POST['up_exe']) && isset($_FILES['myVedio'])) {
    $video_name = $_FILES['myVedio']['name'];
    $tmp_name = $_FILES['myVedio']['tmp_name'];
    $error = $_FILES['myVedio']['error'];
    if ($error === 0) {
        $nam= mysqli_real_escape_string($db, $_POST['exer_name']);
        $duration= mysqli_real_escape_string($db, $_POST['dur']);
        $focus = mysqli_real_escape_string($db, $_POST['focus_body']);
     
    	$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

    	$video_ex_lc = strtolower($video_ex);

    	$allowed_exs = array("mp4", 'webm', 'avi', 'flv');
        if (in_array($video_ex_lc, $allowed_exs)) {
    		
    		$new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
            $video_upload_path = 'exercises/'.$new_video_name;
            move_uploaded_file($tmp_name, $video_upload_path);
            $sqqlll = "update exercise set video='$new_video_name' , name='$nam' , duration='$duration' ,focus='$focus' where exe_id='$iidd'";
            
     mysqli_query($db, $sqqlll);
     
 }}}
?>
</div>
<footer>
    <a style="text-decoration:none; color:orange;" href="adminLogin.php" >Logout</a>
</footer>
          <script>
    function openTab(tabName, tab, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(tabName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  tab.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>