<?php 

require "../inc/database.php";


    
    $name = $_POST['name'];
    $email = $_POST['email'];  
    $aff = $_POST['aff'];
    $intrs = $_POST['intrs'];
    $address = $_POST['address'];    
    
    $sql = "INSERT INTO `member list`(`M-name`,`M-email`,`M-address`,`M-affilliation`,`field of intrest`) VALUES ('$name','$email','$address','$aff','$intrs')";
    
    $query = mysqli_query($connect,$sql);

    if($query){
        echo "work";

    }else{
        echo "not work ".mysqli_error($connect);
    }

    

?>
