<?php 

require "../inc/database.php";


    $content = $_POST['content'];
    $url     = $_POST['url'];
    
    $sql = "INSERT INTO `camera ready`(`content`,`Cr-url`) VALUES ('$content','$url')";
    
    $query = mysqli_query($connect,$sql);
if($query){
    echo "work";
    
}else{
    echo "not work".mysqli_error($connect);
}
    
    

?>