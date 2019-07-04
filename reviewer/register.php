<?php

session_start();
require "database.php";

if(isset($_SESSION['reviewer_id'])){
    header("location: index.php");
    exit;
}

if(isset($_POST['submit'])){

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

if(!empty($name) && !empty($email) && !empty($pass)){

$sql = " insert into reviewer(name,email,password) values ('$name','$email','$pass') ";

if(mysqli_query($connect,$sql)){
    $_SESSION['reviewer_id'] = mysqli_insert_id($connect);
    $_SESSION['rev_name'] = $name;
    header("location: index.php");
    exit;

}else{

    echo "reg error".mysqli_error($connect);
}


}else{
    echo "all fields required";
}



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h3 class="text-center">register or <a href="login.php">login</a></h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="form-group">
    <label for="name">Name:</label>
    <input type="name" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pass">
  </div>
  
  <input type="submit" class="btn btn-primary" name="submit" value="reg">

</form>
    </div>
</body>
</html>