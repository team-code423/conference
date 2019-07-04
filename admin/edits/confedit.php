<?php 
session_start();
require "../inc/database.php";
 if($_SERVER['REQUEST_METHOD']=="POST"){
    
    if(isset($_POST['save'])){

 
    $title = $_POST['title'];
    
    $year = $_POST['year'];
    
    $location = $_POST['location'];

    $keys = $_POST['keys'];
    
    $abstract = $_POST['abstract'];
    
    $status = $_POST['status'];

    
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        $no_files = count($_FILES["files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
            } else {
                $file= $_FILES["files"]["name"][$i];
                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], '../uploads/files/' . $_FILES["files"]["name"][$i]);
                    $sql = "UPDATE  `conf-images` SET `img-name`='$file', `conf-title`='$title'";
                    $query = mysqli_query($connect,$sql);
                
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
    
    
    $sql = "UPDATE  `conferance years` SET `conf-title`='$title' , `conf-year`='$year' , `location`='$location' , `keywords`='$keys' , `conf-abstract`='$abstract' , `status`='$status'";
    
    $query = mysqli_query($connect,$sql);
if($query){ 
   
    echo "work";
    
}else{
    echo "not work".mysqli_error($connect);
}
header ("location:../conferrence.php");     
}
if(isset($_POST['cancel'])){header ("location:../conferrence.php");}

 } 

?>
<html>
    <head>
        <style>
            .main{
                width: 80%;
                
                background-color: rgb(235, 240, 238);
                margin-left: 10%;
            }
            h1{
                margin: 10px;
                border-bottom: 2px solid black;
                
            }
            form{
                display: flex;
                flex-direction: column;
                width: 90%;
                margin-left: 5%;
            }


            form input , form textarea , select{
            padding: 10px 8px;
            border: none;
            outline: none;
            border-radius: 9px;
            margin: 10px 0;
            box-shadow: 0 0 1px 1px #d8d8d8;
            transition: .3s;
                    
            }

            /*form input[type="submit"]{
                background: #21d80c;
                color: #fff;
                cursor: pointer;
            }

            form input[type="submit"]:hover{
                box-shadow: 0 0 10px 5px #1ae607;
            }*/
            

            .save{
                background: #21d80c;
                color: #fff;
                cursor: pointer;
                margin-left: 15px;
                
            }
            .save:hover{
                box-shadow: 0 0 10px 5px #1ae607;
            }
            .cancel{
                background: #e21608;
                color: #fff;
                cursor: pointer;
                margin-left: 15px;
            }
            .cancel:hover{
                box-shadow: 0 0 10px 5px #ec3507;
            }
            textarea{
                resize: vertical;
            } 
        </style>

    </head>
    <body>
        <div class="main">
            <h1> Edit Conference</h1>
                    <?php
                        $s=mysqli_query($connect,"SELECT * FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1");
                        $q=mysqli_fetch_assoc($s);
                    ?>
                <form action="<?= $_SERVER['PHP_SELF'];?>"method="POST"enctype="multipart/form-data">

                    <input type="text" name="title" value="<?= $q['conf-title'];?>" id="title">
                    <input type="date" name="year" value="<?= $q['conf-year'];?>" id="year">
                    <input type="text" name="location" value="<?= $q['location'];?>" id="location">
                    <textarea name="abstract" id="abstract" cols="10" rows="3" ><?= $q['conf-abstract'];?></textarea>
                    <select name="status" id="status" >
                        <option selected value="<?= $q['status'];?>"><?= $q['status'];?></option>           
                        <option value="active">Active</option>
                        <option value="notactive" >Not Active</option>
                    </select>
                    <label>Update Your PicS</label>
                    <input type="file" name="files[]" id="imgs" style="cursor:pointer" multiple="multiple"> 

                    <input class="save" type="submit" name="save"  value="Save" >
                    <input class="cancel" type="submit" name="cancel"  value="Cancel" >
          
                </form>

            </div>

        </div>

    </body>
</html>