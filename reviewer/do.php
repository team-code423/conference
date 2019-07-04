<?php

require "database.php";

$paper = $_GET['paperid'];
$action = $_GET['action'];
$rev_id = $_GET['revid'];



    if(isset($paper) && isset($rev_id) && isset($action)) {

        if($action = 'review') {

            $sql = "UPDATE paper 
            set reviewed = '1' , r_id = '$rev_id' WHERE `paper_id` = '$paper' ;";
            if(mysqli_query($connect, $sql)) {
                echo "updated..!";
            }else{
                echo "error " . mysqli_error($connect);
            }
        }
        

    }

?>