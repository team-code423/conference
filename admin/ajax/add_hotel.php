<?php 

require "../inc/database.php";


    $img = $_POST['img'];

    $name = $_POST['name'];
    
    $address = $_POST['address'];
    
    $phone = $_POST['phone'];

    $site = $_POST['site'];
    
    $sql = "INSERT INTO `hotel`(`img`,`name`,`address`,`phone`,`site`) VALUES ('$img','$name','$address','$phone','$site')";
    
    $query = mysqli_query($connect,$sql);
if($query){
    echo "work";
    
}else{
    echo "not work".mysqli_error($connect);
}
    
    

?>