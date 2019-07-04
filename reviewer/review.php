<?php
session_start();

if (!isset($_SESSION['reviewer_id'])) {
    header("location: login.php");
    exit;
}

require "database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reviewer profile</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>

     <style>
    nav{
        background : #000;
        margin-bottom :20px;
    }
    h4{
        margin:18px;
        font-weight:300;
        letter-spacing:1px;
    }
    </style>
</head>

<body>
      <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DashBoard</a>
    </div>
    <ul class="nav navbar-nav">
      <a href="logout.php" class="btn btn-danger">Log Out</a></li>
    </ul>
  </div>
</nav>

<?php
$rev = $_SESSION['reviewer_id'];
$paper = @$_GET['id'];
?>

<div class="container">
<h4 class="text-center">Upload Report</h4>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
<input type="hidden" name="paperid" value="<?= $paper ?>">   

<?php

$sql = "select * from `paper` where `R-id` = '$rev' and `paper-id` = '$paper';";
$q = mysqli_query($connect, $sql);
if ($q) {
    while ($row = mysqli_fetch_assoc($q)) {
        extract($row);
    
echo '<div class="jumbotron">';
echo '<h6>Paper Title :<h6>';
echo '<h1>'.$row['paper-title'].'</h1>';

echo '</div>';
echo '<input type="hidden" name="title" value="'.$row['paper-title'].'">';

echo '<input type="hidden" name="author" value="'.$author_id.'">';
    }

}else{
    echo "error".mysqli_error($connect);
}


?>
<input type="file" name="repo">
<input type="submit" name="submit" value="report" class="btn btn-success">
</form>
<?php

if(isset($_POST['submit'])){

    $paper = $_POST['paperid'];
    $author_id=  $_POST['author'];
    $title = $_POST['title'];
    $filetmp = $_FILES['repo']['tmp_name'];
    $filename = rand(0,1000)."_".$_FILES['repo']['name'];
        
         if(move_uploaded_file($filetmp,"../papers/".$filename))
        {
            $sql = "INSERT INTO `paper report`(`paper_id`,`report_title`,`report_content`,`rev_id`,`auth_id`) VALUES ('$paper','$title','$filename','$rev','$author_id')";

            $q = mysqli_query($connect,$sql);
            
            if($q){
            
                echo "<span class='aler alert-success'>Done!</span>";
                mysqli_close($connect);
            }else{
                echo "failed".mysqli_error($connect);
            }
        }else{
            echo "failed to upload file";
        }


}

?>
    </div>

</body>

</html>