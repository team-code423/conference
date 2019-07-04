<?php 
session_start();
require "../inc/database.php";
if($_SERVER['REQUEST_METHOD'] ==  "POST"){
    
    $title = $_POST['title'];
    
    $year = $_POST['year'];
    
    $location = $_POST['location'];

    //$keys = $_POST['keys'];
    
    $abstract = $_POST['abstract'];
    
    $status = $_POST['status'];

    
    
    
    
    $sql = "INSERT INTO `conferance years`(`conf-title`,`conf-year`,`location`,`conf-abstract`,`status`) VALUES ('$title','$year','$location','$abstract','$status')";
    
    $query = mysqli_query($connect,$sql);

    
    $id = mysqli_insert_id($connect);


    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        $no_files = count($_FILES["files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
            } else {
                $file= $_FILES["files"]["name"][$i];
                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], '../uploads/files/' . $_FILES["files"]["name"][$i]);
                    $s = "INSERT INTO `conf-images`(`img-name`, `conf-id`) VALUES ('$file','$id')";
                    $q = mysqli_query($connect,$s);
                    if($q){
                        echo "files added";
                    }else{
                        echo "file not add";
                    }
                
            }
        }
    } else {
        echo 'Please choose at least one file';
    }



if($query){ 
    $_SESSION['conf'] = mysqli_insert_id($connect);
    echo "work";
   
}else{
    echo "not work".mysqli_error($connect);
}
    
    
}
?>