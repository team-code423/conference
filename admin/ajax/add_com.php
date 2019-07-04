<?php 

require "../inc/database.php";

    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
    $res = mysqli_fetch_assoc($i);
    $conf_id= $res['conf-id'];  
    $sql = "INSERT INTO `committee` (`com-fname`,`com-lname`,`conf_id`) VALUES ('$fname','$lname','$conf_id')";
    $query = mysqli_query($connect,$sql);
    if($query){
        echo "work";
    }else{
        echo "not work ".mysqli_error($connect);
    }

?>
