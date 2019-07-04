<?php 

require "../inc/database.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $day = $_POST['day'];

    $from = $_POST['from'];
    $to = $_POST['to'];
$details = $_POST['details'];


    $query = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` WHERE `status` = 'active'");


    $res = mysqli_fetch_assoc($query);
    $conf_id= $res['conf-id'];

    $sql = "INSERT INTO `day` (`day_name`,`conf-id`) VALUES ('$day','$conf_id')";
    $query = mysqli_query($connect,$sql);
    
        $last = mysqli_insert_id($connect);
        
$s = "";
    
    if($query){
        
$s .= "INSERT INTO `times` (`_from`,`_to`,`details`,`day_id`) VALUES ";
    
        $done = array_map(function($f,$t,$d) use ($last){

            $GLOBALS['s'] .= "('$f','$t','$d','$last'),";
            
        },$from , $to , $details );
        $s = trim($s,','). ";";
       $q = mysqli_query($connect , $s);
            if($q){echo "added successfulu";}else{echo "error". mysqli_error($connect);}
        
        print_r($s);
    }else{
        echo "failed ";
    }
    
    }

?>
