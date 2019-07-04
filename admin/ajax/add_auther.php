<?php 

require "../inc/database.php";


    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];  
    $email = $_POST['email'];  
    $aff = $_POST['aff'];
    $qual = $_POST['qual'];
    $address = $_POST['address'];
    $abstract = $_POST['abstract'];
    
    
    $sql = "INSERT INTO `auther`(`A-fname`,`A-lname`,`A-email`,`A-afflliation`,`A-qualification`,`A-address`,`A-abstract`) VALUES ('$fname','$lname','$email','$aff','$qual','$address','$abstract')";
    
    $query = mysqli_query($connect,$sql);

    if($query){
        echo "work";

    }else{
        echo "not work ".mysqli_error($connect);
    }

    

?>
