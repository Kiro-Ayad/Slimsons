<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reviews Page</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">
        <style>
        body {
            background-image: url('images/bluepic.jpg');
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #1d4ba6;
            font-family: 'Overpass', sans-serif;
            width: fit-content;
        }
        h1{
            text-align: center;
            padding: 20px;
            font-size: 40px;
        }
        #add{
            text-align: right;
            margin:0 40px;
            display: flex;
            justify-content: space-between;
        }
        .btn{
          vertical-align: middle;
          padding-top: 1px;
          margin-right: 8px;
        }
        a{
            color: #1d4ba6;
            text-decoration: none;
            font-size: x-large;
            
        }
        #table{
            /* margin-top:100px; */
            border-spacing: 30px;
            margin: 90px 80px 0 80px;
        }
        tr{
           margin:0 20px;
        }
         td{
           width:100%;
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
        <h1> Reviews Page</h1>
        <div id="add">
        <a href="SlimSons_Homepage.html"><img class="btn" src="images/back-button.png" width="30px" height="30px" >Back</a>
            <a href="register.php"><img class="btn" src="images/add.png" width="30px" height="30px">Add Your Review</a></div>
		<?php  

//view the children

    include  "sarver.php";
  
 ?>
	<div class="tab">
    <table id="table">
		<?php 
		 include "sarver.php";
         
		 $sql = "SELECT * FROM review ORDER BY review_id  DESC";
		 $res = mysqli_query($db, $sql);
		
		 if (mysqli_num_rows($res) > 0) {
		 	while ($video = mysqli_fetch_assoc($res)) { 
		 ?>
			 <tr>
				
			 <td>
				<p class="name"><?php echo $video['name'];?></p>
		        <video src="uploads/<?=$video['vedio']?>" 
	        	   controls style="width:490px; height:260px">>
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
</body>
</html>

