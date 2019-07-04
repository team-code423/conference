
<?php 

require "../inc/database.php";


        $name = $_POST['name'];
        
        $logo = $_FILES['file']['tmp_name'][0];

        $file = rand(0,100).$_FILES['file']['name'][0];

        $move  =  move_uploaded_file($logo, "../uploads/files/".$file);

        $email = $_POST['email'];

        $s=mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1");

        $q=mysqli_fetch_assoc($s);

        $conf=$q['conf-id'];




if($move){
    
    
     $sql = "INSERT INTO `sponser`(`sp-name`,`sp-logo`,`sp-email`,`conf-id`) VALUES ('$name','$file','$email','$conf')";
    
    $query = mysqli_query($connect,$sql);

    if($query){
        echo "work";

    }else{
        echo "not work ".mysqli_error($connect);
    }
    
}else{
    echo "not moved";
}

        
    
    /*
    $sql = "INSERT INTO `paper`(`paper-title`,`paper-link`,`paper-abstract`,`submission date`,`keywords`) VALUES ('$title','$link','$abstract','$submission','$keywords')";
    
    $query = mysqli_query($connect,$sql);

    if($query){
        echo "work";

    }else{
        echo "not work ".mysqli_error($connect);
    }
*/
    

?>
