<?php

require "../inc/database.php";
session_start();

if (!isset($_SESSION['attendee']) && !(int) $_SESSION['attendee']) {
    header("location:../index.php");
}

?>
<html>

<head>
    <link rel="stylesheet" href="attende.css">
    

</head>

<body>
    <div class="continr">
        <div class="top">
            <div class="icon"><a href="logout.php">Logout</a></div>
            <div class="icon"><a href="../index.php">Home</a></div>



        </div>
        <div class="info">

            <div class="img">
                <img src="info.jpg" class="pic">
            </div>

            <div class="data">

                <p>Full name :
                    <?=$_SESSION['name'];?>
                </p>
                <p>E-mail:
                    <?=$_SESSION['email'];?>
                </p>
            </div>
            <button><a href="edit.php">Edit Your data </a></button>
            <div class="clear"></div>
        </div>


                
                
    </div>
  

</body>

</html>