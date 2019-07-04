<?php

require "database.php";

$paper = $_GET['paperid'];
$auth_id = $_GET['auth_id'];



    if(isset($paper) && isset($auth_id) ) {

        

            $sql = "UPDATE paper
            set accepted = 'refused'  WHERE `paper-id` = '$paper' and `author_id` = '$auth_id';";
            if(mysqli_query($connect, $sql)) {
                echo "<span class='alert alert-success'>sent..!</span>";
            }else{
                echo "error" . mysqli_error($connect);
            }
        }
    
        

?>