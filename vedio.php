<!DOCTYPE html>
    <html lang="en">
    <head>
    <?php
include "sarver.php";
?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reviews Page</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">
        <style>
        body{
            background-image: url('images/bluepic.jpg');
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #1d4ba6;
            font-family: 'Overpass', sans-serif;
            min-width: fit-content;
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
        h1{
            text-align: center;
            padding: 20px;
            font-size: 40px;
        }
        #addrevbox{
            display:flex;
            justify-content: space-evenly;
        }
        form{
            color: #1d4ba6;
            text-align: center;
            font-size: 18px;
            margin: 20px 70px;
            /* display: flex;
            justify-content: space-evenly; */
        }
        #text{
           display:flex;
           flex-direction: column;
           align-items: center;
           height:300px;
           vertical-align: middle;
        }
        /* #un, #unlabel{
            width: 50%;
        } */
        #video{
            display:flex;
            flex-direction: column;
            align-items: center;
            vertical-align: middle;
            height:300px;
        }
        .username{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            margin-top: 15px;
        }
        input[type=text]{
            margin-left:15px;
            background-color:#d9edf4;
           margin-bottom: 15px;
            width:250px;
            border: none;
            color: #1d4ba6;
        }
        textarea{
            background-color:#d9edf4;
            width:350px;
            height: 95px;
            margin-bottom: 15px;
            color: #1d4ba6;
            border: none;

        }
        
        input[type=file]{
            background-color:#d9edf4;
            height: 98px;
            margin-bottom: 15px;
            width:350px;
            color: #1d4ba6;
        }
        textarea:focus, input[type=file]:focus, input[type= text]:focus{
            border-bottom: 3px solid #1d4ba6;
            outline: none;
        }
        input[type=submit]{
            font-size: 18px;
            background-color:#d9edf4;
            border-radius: 10px;
            width:350px;
            border: 3px solid #e87e41;
            cursor: pointer;
            margin: 10px 15px;
            padding: 5px;
            color: #1d4ba6;
        }
        input[type=submit]:hover{
            /* background-color: #e87e41; */
            font-weight: bolder;
            color: #e87e41;
            border: 3px solid #1d4ba6;
        }
        
        #table{
            border-spacing: 30px;
            margin: 30px 80px 0 80px;
        }
        
         td{
            text-align: center;
            vertical-align: middle;
            border:20px solid ;
            border-color: #e87e41;
            border-radius: 25px 0px 25px 0px;
            padding:10px 40px;
        } 
        .name{
            text-align: left;
            margin:15px;
            font-size: 28px;
        }
        .rev{
           line-height: 20px;
        }
        </style>
    </head>
    <body>
     
        
       
<?php
$id=$_GET['user_id'];
$qry1 = mysqli_query($db,"select * from user where user_id='$id'");
$ro = mysqli_fetch_array($qry1);
?>
<nav>
            <header id="header">
                <div id="open">
                    <span onclick="openNav()">&#9776;</span> </div>
                <div id="headerborder"></div>
                <h2><?php echo $ro['name'] ?></h2>
                <img src="<?php echo $ro['avatar'] ?>" width="110px" id="useravatar">
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
        <h1> Reviews&nbsp;Page</h1>
        
	<?php if (isset($_GET['error'])) {  ?>
		<p><?=$_GET['error']?></p>
	<?php } ?>
    <div id="addrevbox">
	<form 
	       method="post"
	       enctype="multipart/form-data">
        <div id="text">
            
            <input type="hidden" name="naming" value="<?php echo $ro['name']?>"/><br>
			<input type="file"
	 	       name="my_video">
		

            <input type="submit" name="sbmit" value="Add Video Review">
        </div>
	</form>
	 <form 
	       method="post"
	       enctype="multipart/form-data">
		  
		   <div id="video">
        
        <input id="un" type="hidden" name="naming" value="<?php echo $ro['name']?> " required/><br>
		<textarea rows="5" cols="30" name="type" placeholder="Write Your Review..."></textarea>
	 	<input type="submit" name="mit" value="Add Written Review">
    </div>
        </form>
        </div>
				
	 
                

       
	<?php

if (isset($_POST['sbmit']) or isset($_FILES['my_video'])) {
	
	

    $video_name = $_FILES['my_video']['name'];
    $tmp_name = $_FILES['my_video']['tmp_name'];
    $error = $_FILES['my_video']['error'];
    
    if ($error === 0) {
        $pe_id= mysqli_real_escape_string($db, $_POST['naming']);
     
    	$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

    	$video_ex_lc = strtolower($video_ex);

    	$allowed_exs = array("mp4", 'webm', 'avi', 'flv');

    	if (in_array($video_ex_lc, $allowed_exs)) {
    		
    		$new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
    		$video_upload_path = 'uploads/'.$new_video_name;
    		move_uploaded_file($tmp_name, $video_upload_path);

    		// Now let's Insert the video path into database
            $sql = "INSERT INTO review(vedio,name) 
                   VALUES('$new_video_name','$pe_id')";
            mysqli_query($db, $sql);
            
    	}else {
    		$em = "You can't upload files of this type";
    		header("Location: vedio.php?error=$em");
    	}
    }

    }


if (isset($_POST['mit'])){
	
	$name= mysqli_real_escape_string($db, $_POST['naming']);
	$comment= mysqli_real_escape_string($db, $_POST['type']);
	$sq = "INSERT INTO comment_rev(comment,name) 
	VALUES('$comment','$name')";
mysqli_query($db, $sq);

}
	?>
    
	<div class="tab">
    <table id="table">
		<?php 
		 
		 $sql = "SELECT * FROM review ORDER BY review_id  DESC";
		 $res = mysqli_query($db, $sql);
		
		 if (mysqli_num_rows($res) > 0) {
		 	while ($video = mysqli_fetch_assoc($res)) { 
		 ?>
			 <tr>
				
			 <td>
				<p class="name"><?php echo $video['name'];?></p>
			 
		
		        <video src="uploads/<?=$video['vedio']?>" 
	        	   controls style="width:490px; height:260px">
				</video>
			 </td>
			
			</tr>

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
		
					 <tr>
						
					 <td>
						<p class="name"><?php echo $vide['name'];?></p>
					 
				
						<?php echo $vide['comment'];?>
					 </td>
					 
					</tr>
		
				<?php 
				 }
				 }else {
					 echo "<h1>Empty</h1>";
				 }
				 ?>
		 
	</div>
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

