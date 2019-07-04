<?php
require "database.php";
session_start();


if(!isset($_SESSION['id']) && !(int) $_SESSION['id'])
{
  header("location:../index.php");
  exit;
}


$_group = $_SESSION['group'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {
        
        $paper = $_POST['papertitle'];

        $abs = $_POST['abs'];

        $keys = $_POST['kw'];

        $filetmp = $_FILES['file']['tmp_name'];
        $filename = rand(0,100)."_".$_FILES['file']['name'];
        $auth_id = $_SESSION['id'];

        if(move_uploaded_file($filetmp,"../papers/".$filename))
        {
            $sql = "INSERT INTO `paper`(`paper-title`,`paper-abstract`,`keywords`,`name`,`author_id`) VALUES ('$paper','$abs','$keys','$filename','$auth_id') ";
            $query = mysqli_query($connect,$sql);

            if($query)
            {
                $paper_id = mysqli_insert_id($connect);
                $_SESSION['paper'] = $paper_id;
                echo "paper uploaded successfully!";
                mysqli_close($connect);
            }else{
                echo "failed to insert info into database : " . mysqli_error($connect);
                exit;
            }
        }else{
            echo "file not uploaded";
        }
    }
}


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Submition</title>
    <link rel="stylesheet" href="Submition.css">
</head>

<body>
    <div class="continer">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

           
            <div>
                <p class="formrow">Paper Title :</p>
                <p class=textb><span class="wpcf7-form-control-wrap pp"><input type="text" name="papertitle" /></span></p>
            </div>

            <div>
                <p class="formrow">Abstract (max. 300 words):</p>
                <p class=textb><span class="wpcf7-form-control-wrap manuscript"><textarea name="abs"></textarea></span></p>
            </div>

            <div>
                <p class="formrow">Key Words (Max 4 to 5 words):</p>
                <p class=textb><span class="wpcf7-form-control-wrap kw"><input type="text" name="kw" /></span></p>
            </div>

            <div>
                <p class="formrow">Attach your Abstract</p>
                <p class=textb><span class="wpcf7-form-control-wrap fileupload"><input type="file" name="file" /></span></p>
            </div>
        

            <input type="submit" value="submit" name="submit">

        </form>

    </div>
</body>

</html>