<?php 

require "../inc/database.php";


        $title = $_POST['title'];
        
        $link = $_POST['link'];
        
        $abstract = $_POST['abstract'];
        
        $submission = $_POST['submission'];
        
        $keywords = $_POST['keys'];   
    
    
    $sql = "INSERT INTO `paper`(`paper-title`,`paper-link`,`paper-abstract`,`submission date`,`keywords`) VALUES ('$title','$link','$abstract','$submission','$keywords')";
    
    $query = mysqli_query($connect,$sql);

    if($query){
        echo "work";

    }else{
        echo "not work ".mysqli_error($connect);
    }

    

?>
