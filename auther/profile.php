<?php
require "database.php";
session_start();

if (!isset($_SESSION['id']) && !(int) $_SESSION['id']) {
    header("location:../index.php");
    exit;
}

?>
<html>

<head>
    <link rel="stylesheet" href="auther-profile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">

</head>

<body>
    <div class="continr" style="text-align:center;">
    <?php
$a_id = $_SESSION['id'];
$sql = "SELECT accepted from paper where author_id  = '$a_id'";

$q = mysqli_query($connect,$sql);
if($q){
    while($row = mysqli_fetch_assoc($q)){

        if($row['accepted'] == 'waiting'){echo "<p>your paper is waiting for reviewing</p> <br>";
        }elseif($row['accepted'] == 'refused'){echo "<p>your paper has been refused</p><br>";}elseif($row['accepted'] == 'accepted'){echo "<p>your paper has been accepted </p><br>";}
    }
}

?>
        <div class="top">
            <div class="icon"><a href="logout.php">Logout</a></div>


        </div>
        <div class="info">

            <div class="img">
                <img src="info.jpg" class="pic">
            </div>

            <div class="data">

                <p>Full name :
                    <?=$_SESSION['fullname'];?>
                </p>
                <p>E-mail:
                    <?=$_SESSION['email'];?>
                </p>
                <p> Gender:
                    <?=$_SESSION['gender'];?>
                </p>
                <p>Company:
                    <?=$_SESSION['company'];?>
                </p>
                <p>Faculty:
                    <?=$_SESSION['faculty'];?>
                </p>
                <p>Department :
                    <?=$_SESSION['dep'];?>
                </p>
                <p>Address :
                    <?=$_SESSION['address'];?>
                </p>
                <p> State/Province :
                    <?=$_SESSION['state'];?>
                </p>
                <p>Country :
                    <?=$_SESSION['country'];?>
                </p>
                <p>Mobile/HP No:
                    <?=$_SESSION['phone'];?>
                </p>
            </div>
            <button><a href="edit-profile.php">Edit Your data <i class="fas fa-user-edit"></i></a></button>
            <div class="clear"></div>
        </div>


        <div class="paper">
<?php

$sql = "SELECT * FROM `paper` WHERE `author_id` = '$a_id' ";
$query = mysqli_query($connect, $sql);
?>
            <?php if (mysqli_num_rows($query) > 0) : ?>

            <h3>Your papers</h3>
            
            <?php  while($row = mysqli_fetch_assoc($query)): ?>
            <p><a download="download" href="<?= "../papers/".$row['name']; ?>"><?= $row['paper-title']; ?></a></p>
            <?php endwhile; ?>
            <?php else: ?>
            <p style="color:red;text-align:center;text-transform:capitalize;font-size:15px;">You have not uploaded any paper yet</p>
            <?php endif; ?>
            <div class="footer">
                <div class="submit">
                    <button><a href="submition.php">submit new paper <i class="fas fa-arrow-alt-circle-up"></i></a></button>
                </div>
                <div class="contact">
                    <button><a href="contactus.html">Contact Us <i class="far fa-envelope"></i></a></button>
                </div>
                <div class="clear"></div>
            </div>


        </div>
        <div class="clear"></div>


    </div>
    </div>

</body>

</html