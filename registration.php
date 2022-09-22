
<?php  
    include  "sarver.php";
    if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
        if(isset($_SESSION['loggedin'])){
            echo $_SESSION['loggedin'];
            unset($_SESSION['loggedin']);
        }
        $quere = "SELECT * FROM `user` where email='$username' ";
        $result= mysqli_query($db,$quere);
        if ($ro = mysqli_fetch_array($result)){
            ?>
            <a href="seteid.php?user_id=<?php echo $ro['user_id']; ?>">kero</a>
            <a href="vedio.php?user_id=<?php echo $ro['user_id']; ?>">edit</a>
            <a href="newedit.php?user_id=<?php echo $ro['user_id']; ?>">dodo</a>
            <a href="edit.php?user_id=<?php echo $ro['user_id']; ?>">soso</a>
            <a href="see.php?user_id=<?php echo $ro['user_id']; ?>">revirevi</a>
            <?php     
        }
    }   
            ?>