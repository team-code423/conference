<?php 

require "../inc/database.php";


    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];  
    $email = $_POST['email']; 
    $phone = $_POST['phone'];
    $aff = $_POST['aff'];
    $qual = $_POST['qual'];
    $address = $_POST['address'];    
    
    $sql = "INSERT INTO `reviwer`(`R-fname`,`R-lname`,`R-phone`,`R-email`,`R-affilliation`,`R-qualification`,`R-address`) VALUES ('$fname','$lname','$phone','$email','$aff','$qual','$address')";
    
    $query = mysqli_query($connect,$sql);

    if($query){
        echo "work";

    }else{
        echo "not work ".mysqli_error($connect);
    }

    

?>
