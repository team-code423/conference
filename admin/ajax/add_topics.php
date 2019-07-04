<?php 
require "../inc/database.php";


    $title = $_POST['title'];
    $keys = $_POST['keywords'];
    $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
    $res = mysqli_fetch_assoc($i);
    $n= $res['conf-id'];
    $sql = "INSERT INTO `topic`(`topic-title`,`keywords`,`conf-id`) VALUES ('$title','$keys','$n')";
    
    $query = mysqli_query($connect,$sql);
if($query){
    echo "work";
    
}else{
    echo "not work".mysqli_error($connect);
}
    
    

?>